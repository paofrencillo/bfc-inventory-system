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
                  <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#addnew"><i class="fas fa-plus-circle"></i> ADD STOCKS</button>
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
                          <td>
                            <?php echo $row["barcode"]; ?>
                          </td>
                          <td>
                            <?php echo $row["description"]; ?>
                          </td>
                          <td>
                            <?php echo $row["in_quantity"];?>
                          </td>
                          <td>
                            
                          </td>
                        <?php }?>
                        <tr>

                          <td>80</td>
                          <td>200</td>
                          <td>40%</td>
                          <td>
                            <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#update">
                              <i class="fas fa-pencil-alt"></i>
                              Edit
                            </button>
                            <button class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#view">
                              <i class="fas fa-eye"></i>
                              Details
                            </button>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
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
                <form>
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label for="supp">Supplier:</label>
                          <select class="form-control select2bs4" style="width: 100%;">
                            <option selected="selected" disabled>Please Select Supplier</option>
                            <?php
                              $query2 = "SELECT * FROM suppliers";
                              $result = mysqli_query($conn, $query2);
                              $check_row = mysqli_num_rows($result);
                              while ($row2 = mysqli_fetch_array($result)) {
                            ?>
                            <option value="<?php echo $row2['supplier']?>"><?php echo $row2['supplier']?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                      
                      <div class="col-sm-12">
                        <div class="form-group">
                          <!-- <table id="example4" class="table table-bordered table-hover dt-center">
                            <thead>
                              <tr>
                                <th>Barcode</th>
                                <th>Product Description</th>
                                <th>Quantity</th>
                                <th>Lot No.</th>
                                <th>Exp. Date</th>
                                <th>MRF</th>

                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>asd</td>
                                <td>asd</td>
                                <td>asd</td>
                                <td>asd</td>
                                <td>asd</td>
                              </tr>
                              
                              
                            </tbody>
                          </table> -->
                          <div class="card-body table-responsive p-0" style="height: 200px;">
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
                            <tbody>
                              <!-- <tr>
                                <td>42428</td>
                                <td>Mefenamic</td>
                                <td>42</td>
                                <td>2828</td>
                                <td>03-25-2023</td>
                              </tr> -->
                            </tbody>
                          </table>
                        </div>
                        </div>
                      </div>
                      
                      <div class="col-sm-3">
                        <div class="form-group">
                          <label for="barcode">Barcode:</label>
                          <input type="text" class="form-control " id="barcode" onmouseover="this.focus();">
                        </div>
                      </div>
                      <div class="col-sm-5">
                        <div class="form-group">
                          <label for="prod">Product Description:</label>
                          <input type="text" class="form-control " id="prod" readonly>
                        </div>
                      </div>
                      <div class="col-sm-1">
                        <div class="form-group">
                          <label for="quan">Quantity:</label>
                          <input type="number" class="form-control " id="quan" value="0">
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="form-group">
                          <label for="lot">Lot Number:</label>
                          <input type="text" class="form-control" id="lot" onkeyup="this.value = this.value.toUpperCase();">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="exp">Expiration Date:</label>
                          <input type="date" class="form-control " id="exp">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <?php
                          $month = date('m');
                          $day = date('d');
                          $year = date('Y');
                          
                          $today = $year . '-' . $month . '-' . $day;
                          ?>
                        <div class="form-group">
                          <label for="supp">Date Added:</label>
                          <input type="date" class="form-control" id="supp" value="<?php echo $today;?>" readonly>
                        </div>
                      </div>
                      <div class="col-sm-2">
                        <div class="form-group">
                          <label for="barcode">Add Product</label>
                          <a type="submit" class="btn btn-info form-control">
                            <i class="fas fa-plus"></i>
                            ADD
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Add Stocks</button>
                  </div>    

                </form>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->

          <div class="modal fade" id="update">
            <div class="modal-dialog modal-dialog-centered modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">UPDATE PRODUCT DETAILS</h4>
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
                          <input type="text" class="form-control " id="barcode" readonly>
                        </div>
                      </div>
                      <div class="col-sm-8">
                        <div class="form-group">
                          <label for="prod">Product Description:</label>
                          <input type="text" class="form-control " id="prod">
                        </div>
                      </div>
                      <div class="col-sm-2">
                        <div class="form-group">
                          <label for="stock">Stock:</label>
                          <input type="number" class="form-control " id="stock">
                        </div>
                      </div>
                      <div class="col-sm-2">
                        <div class="form-group">
                          <label for="allo">Allocation:</label>
                          <input type="number" class="form-control " id="allo">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="lot">Lot Number:</label>
                          <input type="text" class="form-control" id="lot" onkeyup="this.value = this.value.toUpperCase();">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="supp">Supplier:</label>
                          <select class="form-control select2bs4" style="width: 100%;">
                            <option selected="selected" disabled>Please Select Supplier</option>
                            <?php
                              $query = "SELECT * FROM suppliers";
                              $result = mysqli_query($conn, $query);
                              $check_row = mysqli_num_rows($result);
                              while ($row = mysqli_fetch_array($result)) {
                            ?>
                            <option value="<?php echo $row['supplier']?>"><?php echo $row['supplier']?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="exp">Expiration Date:</label>
                          <input type="date" class="form-control " id="exp">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="supp">Entry Date:</label>
                          <input type="date" class="form-control " id="supp">
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                  <button type="button" class="btn btn-primary">Update</button>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->

          <div class="modal fade" id="view">
            <div class="modal-dialog modal-dialog-centered modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">VIEW PRODUCT DETAILS</h4>
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
                          <input type="text" class="form-control " id="barcode" readonly>
                        </div>
                      </div>
                      <div class="col-sm-8">
                        <div class="form-group">
                          <label for="prod">Product Description:</label>
                          <input type="text" class="form-control " id="prod" readonly>
                        </div>
                      </div>
                      <div class="col-sm-2">
                        <div class="form-group">
                          <label for="stock">Stock:</label>
                          <input type="number" class="form-control " id="stock" readonly>
                        </div>
                      </div>
                      <div class="col-sm-2">
                        <div class="form-group">
                          <label for="allo">Allocation:</label>
                          <input type="number" class="form-control " id="allo" readonly>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="lot">Lot Number:</label>
                          <input type="text" class="form-control" id="lot" onkeyup="this.value = this.value.toUpperCase();" readonly>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="supp">Supplier:</label>
                          <select class="form-control select2bs4" style="width: 100%;" disabled>
                            <option selected="selected" disabled>Please Select Supplier</option>
                            <option>Supplier A</option>
                            <option>Supplier B</option>
                            <option>Supplier C</option>
                            <option>Supplier D</option>
                            <option>Supplier E</option>
                            <option>Supplier F</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="exp">Expiration Date:</label>
                          <input type="date" class="form-control " id="exp" readonly>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="supp">Entry Date:</label>
                          <input type="date" class="form-control " id="supp" readonly>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
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