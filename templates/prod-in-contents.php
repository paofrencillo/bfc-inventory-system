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
                            <button class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#details">
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
                  <form>
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="barcode">Barcode:</label>
                          <input type="text" class="form-control" id="barcode-details" readonly disabled>
                        </div>
                      </div>
                      <div class="col-sm-8">
                        <div class="form-group">
                          <label for="prod">Product Description:</label>
                          <input type="text" class="form-control" id="desc-details" readonly disabled>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="lot">Quantity</label>
                          <input type="number" class="form-control" id="quantity-details" name="quantity-details" onkeyup="this.value = this.value.toUpperCase();">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="lot">Lot Number:</label>
                          <input type="text" class="form-control" id="lot-details" name="lot-details" onkeyup="this.value = this.value.toUpperCase();">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="supp">Supplier:</label>
                          <input type="text" class="form-control" id="supp-details" readonly disabled>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="exp">Expiration Date:</label>
                          <input type="date" class="form-control" id="exp-details" name="exp-details">
                        </div>
                      </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                          <label for="supp">Entry Date:</label>
                          <input type="text" class="form-control" id="entry-details" readonly disabled>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
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
                          <input type="text" class="form-control" id="expiration" name="expiration" placeholder="mm-dd-yyyy or mm-yyyy" onmouseover="this.focus();" required>
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
                          <button type="submit" class="btn btn-info form-control" name="label">
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
                    <div class="modal-footer justify-content-between">
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