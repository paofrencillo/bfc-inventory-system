<?php
    /* at the top of 'check.php' */
    if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {
        /* 
           Up to you which header to send, some prefer 404 even if 
           the files does exist for security
        */
        header( 'HTTP/1.0 500 Internal Server Error', TRUE, 500 );

        /* choose the appropriate page to redirect users */
        die( header( 'location: ../500.html' ) );
    }
    else {?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Receiving Items</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->

        <section class="content">
          <div class="container-fluid">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">RECEIVE NEW STOCKS</h3>
              </div>
              <div class="card-body">
                <div class="col-md-2">
                  <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#addnew">
                    <i class="fas fa-plus-circle"></i> ADD STOCKS
                  </button>
                </div>
              </div>
              <!-- /.card-body -->
            </div>

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table id="example1" class="table table-bordered table-hover dt-center">
                      <thead>
                        <tr>
                          <th>Barcode</th>
                          <th>Product Description</th>
                          <th>Quantity</th>
                          <th>Lot No.</th>
                          <th>Exp. Date</th>
                          <th>Last Edited</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $query = "SELECT * FROM product_in ORDER BY last_edited_on DESC;";
                          
                          $result = mysqli_query($conn, $query);
                          while ($row = mysqli_fetch_array($result)) {
                            $last_user = $row['last_edited_by'];
                            $date = date_create($row["last_edited_on"]);
                            $date = date_format($date, "d/m/Y h:i");
                        ?>
                        <tr>
                        <td>
                            <?php echo $row["barcode"]; ?>
                          </td>
                          <td>
                            <?php echo $row["description"]; ?>
                          </td>
                          <td>
                            <?php echo $row["in_quantity"];?>
                          </td>
                          <td><?php echo $row["lot_no"];?></td>
                          <td><?php echo $row["exp_date"];?></td>
                          <td class="text-italic"><small><?php echo $last_user . ' | ' . $date;?></small></td>
                          <td>
                            <button class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#details" onclick="viewModal(this);" data-id=<?php echo $row["id"];?>>
                              <i class="fas fa-eye"></i>
                              Details
                            </button>
                          </td>
                        <?php }?>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
              </div>
            </div>
          </div>

          <!-- Product Details Modal -->
          <div class="modal fade" id="details">
            <div class="modal-dialog modal-dialog-centered modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Product Details</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form name="update-prod-in-form" id="update-prod-in-form">
                    <input type="hidden" name="id-details" id="id-details">
                    <input type="hidden" name="action" value="update_prod_in">
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="barcode-details">Barcode:</label>
                          <input type="text" class="form-control" id="barcode-details" name="barcode-details" readonly disabled>
                        </div>
                      </div>
                      <div class="col-sm-8">
                        <div class="form-group">
                          <label for="desc-details">Product Description:</label>
                          <input type="text" class="form-control" id="desc-details" name="desc-details" readonly>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="quantity-details">Quantity</label>
                          <input type="number" class="form-control" id="quantity-details" name="quantity-details" onkeyup="this.value = this.value.toUpperCase();" min="0" readonly>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="lot-details">Lot Number:</label>
                          <input type="text" class="form-control" id="lot-details" name="lot-details" onkeyup="this.value = this.value.toUpperCase();" readonly>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="supp-details">Supplier:</label>
                          <input type="text" class="form-control" id="supp-details" name="supp-details" readonly>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="exp-details">Expiration Date:</label>
                          <input type="text" class="form-control" id="exp-details" name="exp-details" readonly>
                        </div>
                      </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                          <label for="entry-details">Entry Date:</label>
                          <input type="text" class="form-control" id="entry-details" name="entry-details" readonly>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-success font-weight-bold mt-2 d-none" id="update_success_text">
                        Product updated successfully!
                    </h6>
                    <h6 class="text-danger font-weight-bold mt-2 d-none" id="update_error_text">
                        Product update failed. Try again.
                    </h6>
                    <div class="modal-footer justify-content-between col-sm-12 mx-0 px-0">
                      <button type="button" class="btn btn-outline-danger" id="delete-product-btn" data-toggle="modal" data-target="#delete-modal">Delete</button>
                      <button type="button" class="btn btn-primary" id="update-btn">
                          <i class="fas fa-pencil-alt mr-2"></i>Update Details
                      </button>
                      <div class="justify-content-around d-none" id="save-cancel-btns">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                          <button type="submit" class="btn btn-success">Save changes</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>

          <div class="modal fade" tabindex="-1" id="delete-modal" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title font-weight-bold text-danger">Delete Product</h5>
                  <button type="button" class="close close-modal-delete1" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p class="text-danger">Are you sure you want to delete this product in the
                      inventory?</p>
                </div>
                <div class="modal-footer justify-content-end">
                  <button type="button" class="btn btn-outline-secondary close-modal-delete2">Cancel</button>
                  <button type="button" class="btn btn-danger" onclick="deleteProduct();">Yes,
                      Delete it</button>
                </div>
              </div>
            </div>
          </div>

          <div class="modal fade" id="addnew">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl ">
              <div class="modal-content ">
                <div class="modal-header">
                  <h4 class="modal-title">RECEIVING ITEMS</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                
                <div class="modal-body">
                  <div class="row">        
                    <div class="col-sm-12">
                      <div class="form-group">
                        <div class="card-body table-responsive p-0" style="height: 300px;">
                          <table class="table table-head-fixed text-center">
                            <thead>
                              <tr>
                                <th>Barcode</th>
                                <th>Product Description</th>
                                <th>Quantity</th>
                                <th>Lot No.</th>
                                <th>Exp. Date</th>
                              </tr>
                            </thead>
                            <tbody id="modal-tbody">
                              <!-- HERE GOES THE TABLE BODY -->
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  <form name="receive-prod-form" id="receive-prod-form">
                    <input type="hidden" name="action" value="receive_prod">
                    <div class="row">
                      <div class="col-sm-3">
                        <div class="form-group">
                          <label for="barcode">Barcode:</label>
                          <input type="text" class="form-control" id="barcode" name="barcode" onmouseover="this.focus();" required>
                        </div>
                      </div>
                      <div class="col-sm-5">
                        <div class="form-group">
                          <label for="prod">Product Description:</label>
                          <input type="text" class="form-control" id="description" name="description" readonly required>
                        </div>
                      </div>
                      <div class="col-sm-1">
                        <div class="form-group">
                          <label for="quan">Quantity:</label>
                          <input type="number" class="form-control" id="quantity" name="quantity" onmouseover="this.focus();" min="0" required>
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="form-group">
                          <label for="lot">Lot Number:</label>
                          <input type="text" class="form-control" id="lot" name="lot" onkeyup="this.value=this.value.toUpperCase();" onmouseover="this.focus();" required>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="supp">Supplier</label>
                          <input type="text" class="form-control" id="supp" name="supp" onmouseover="this.focus();" readonly required>
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="form-group">
                          <label for="exp">Expiration Date:</label>
                          <input type="text" class="form-control" id="exp" name="exp" placeholder="mm-dd-yyyy or mm-yyyy" onmouseover="this.focus();" required>
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <?php
                          $month = date('m');
                          $day = date('d');
                          $year = date('Y');
                          
                          $today = $month . '-' . $day . '-' . $year;
                          ?>
                        <div class="form-group">
                          <label for="entry_date">Date Added:</label>
                          <input type="text" class="form-control" id="entry_date" name="entry_date" value="<?php echo $today;?>" readonly required>
                        </div>
                      </div>
                      <div class="col-sm-2">
                        <div class="form-group">
                          <label for="label">Add Product</label>
                          <button type="submit" class="btn btn-info form-control">
                            <i class="fas fa-plus"></i>
                            Add
                          </button>
                        </div>
                      </div>
                      <div class="d-none ml-2" id="not-enrolled-text">
                          <h6 class="font-weight-bold text-danger">
                            This product was not enrolled.
                          </h6>
                      </div>
                    </div>
                    <div class="modal-footer justify-content-between mx-0 px-0">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                      <button type="button" class="btn btn-primary" onclick="location.reload();">Add Stocks</button>
                    </div>    
                  </form>
                </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->
        </section>
      </div>
      <!-- /.content-header -->
    </div>
    <!-- /.content-wrapper -->
<?php }?>