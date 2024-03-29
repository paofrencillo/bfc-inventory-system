<?php
/* at the top of 'check.php' */
if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
  /* 
           Up to you which header to send, some prefer 404 even if 
           the files does exist for security
        */
  header('HTTP/1.0 500 Internal Server Error', TRUE, 500);

  /* choose the appropriate page to redirect users */
  die(header('location: ../500.html'));
} else { ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dispatch Items</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->

      <section class="content">
        <div class="container-fluid">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">DISPATCH STOCKS</h3>
            </div>
            <div class="card-body">
              <div class="col-md-2">
                <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#addnew"><i class="fas fa-minus-circle"></i> ENDORSE</button>
              </div>
            </div>
            <!-- /.card-body -->
          </div>

          <div class="row">
            <div class="col-12">
              <div class="card card-primary card-tabs">
                <div class="card-header p-0 pt-1">
                  <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#example11" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Pre-Order</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#example22" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Dispatch History</a>
                    </li>

                  </ul>
                </div>
                <!-- /.card-header table 1 -->
                <div class="card-body">
                  <div class="tab-content" id="custom-tabs-one-tabContent">
                    <div class="tab-pane fade show active" id="example11" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                      <div class="card-tools mx-0">
                        <ul class="pagination pagination-sm">
                          <div class="mr-2" id="card-tools">
                          </div>
                          <button class="btn btn-success btn-md" data-toggle="modal" data-target="#dispatch">
                            <i class="fas fa-truck"></i>
                            Dispatch Items
                          </button>
                        </ul>
                      </div>
                      <table id="example1" class="table table-striped table-hover text-center">
                        <thead class="bg-dark">
                          <tr style="font-size:15px;">
                            <th>BARCODE</th>
                            <th>DESCRIPTION</th>
                            <th>LN</th>
                            <th>EXPIRATION</th>
                            <th>QTY</th>
                            <th>BRANCH</th>
                            <th>MRF</th>
                            <th>INV/ORDER</th>
                            <th>REMARKS</th>
                            <th>ENDORSED DATE</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody style="font-size:14px;">
                          
                        </tbody>
                        
                      </table>

                    </div>
                    <div class="tab-pane fade" id="example22" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                      <div class="card-tools mx-0">
                        <ul class="pagination pagination-sm">
                          <div class="mr-2" id="card-tools2">
                          </div>
                          <button class="btn btn-danger btn-md" data-toggle="modal" data-target="#delete_history">
                            <i class="fas fa-trash"></i>
                            Delete Items
                          </button>
                        </ul>
                      </div>
                      <table id="example2" class="table table-hover text-center">
                        <thead class="bg-dark">
                          <tr style="font-size:15px;">
                            <th>BARCODE</th>
                            <th>DESCRIPTION</th>
                            <th>QTY</th>
                            <th>LOT</th>
                            <th>BRANCH</th>
                            <th>MRF</th>
                            <th>INV/ORDER</th>
                            <th>REMARKS</th>
                            <th>ENDORSED DATE</th>
                            <th>ENDORSED BY</th>
                          </tr>
                        </thead>
                        <tbody style="font-size:14px;">
                          <?php
                          $check_user =  $_SESSION['login_user']['user_id'];
                          $query = "SELECT * FROM endorse_history ORDER BY endorsed_date";
                          $result = mysqli_query($conn, $query);
                          $check_row = mysqli_num_rows($result);
                          while ($row = mysqli_fetch_array($result)) {
                          ?>
                            <tr>
                              <td style="text-overflow: ellipsis;" title="<?php echo $row["barcode"] ?>">
                                <?php echo $row["barcode"] ?>
                              </td>
                              <td><?php echo htmlspecialchars_decode($row['description']) ?></td>
                              <td><?php echo $row['quantity'] ?></td>
                              <td><?php echo $row['lot'] ?></td>
                              <td><?php echo $row['branch'] ?></td>
                              <td><?php echo $row['mrf'] ?></td>
                              <td><?php echo $row['order_num'] ?></td>
                              <td><?php echo $row['remarks'] ?></td>
                              <td><?php echo $row['endorsed_date'] ?></td>
                              <td><?php echo $row['endorsed_by'] ?></td>
                            </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade" id="updatee">
          <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
              <div class="modal-header bg-info">
                <h4 class="modal-title font-weight-bold">UPDATE PRODUCT DETAILS</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span class="text-white" aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="functions.php" method="post">
                  
                  <div class="row">
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="barcode-det">Barcode:</label>
                        <input type="text" class="form-control " id="barcode-det" name="barcode-det" readonly>
                      </div>
                    </div>
                    <div class="col-sm-8">
                      <div class="form-group">
                        <label for="description-det">Product Description:</label>
                        <input type="text" class="form-control " id="description-det" name="description-det" autocomplete="off" readonly>
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-group">
                        <label for="quantity-det">Quantity:</label>
                        <input type="number" class="form-control " id="quantity-det" name="quantity-det" min="0" >
                          <small class="text-info" id="stock-det"></small>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="lot-det">Lot Number:</label>
                        <input type="text" class="form-control" id="lot-det" name="lot-det" onkeyup="this.value = this.value.toUpperCase();">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="branch-det">Branch Code:</label>
                        <input type="text" class="form-control" id="branch-det" name="branch-det" onkeyup="this.value = this.value.toUpperCase();" readonly>
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-group">
                        <label for="mrf-det">MRF:</label>
                        <input type="text" class="form-control " id="mrf-det" name="mrf-det" readonly>
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-group">
                        <label for="order_num-det">Inv/Order No:</label>
                        <input type="text" class="form-control " id="order_num-det" name="order_num-det" readonly>
                      </div>
                    </div>
                    <div class="col-sm-5">
                      <div class="form-group">
                        <label for="exp_date-det">Expiration Date:</label>
                        <input type="text" class="form-control " id="exp_date-det" name="exp_date-det" >
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label for="remarks-det">Remarks:</label>
                        <input type="text" class="form-control " id="remarks-det" name="remarks-det" >
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="endorsed_by-det">Endorse By:</label>
                        <input type="text" class="form-control " id="endorsed_by-det" readonly>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="endorsed_date-det">Endorsement Date:</label>
                        <input type="text" class="form-control " id="endorsed_date-det" readonly>
                      </div>
                    </div>
                  </div>


                  <div class="modal-footer justify-content-between flex-row-reverse px-0">
                    <input type="hidden" id="id_update-det" name="id_update-det">
                    <?php
                      $check_user =  $_SESSION['login_user']['employee_name'];
                      $query6 = "SELECT * FROM users WHERE employee_name ='$check_user' ";
                      $result6 = mysqli_query($conn, $query6);
                      $check_row = mysqli_num_rows($result6);
                      while ($row6 = mysqli_fetch_array($result6)) {
                    ?>
                    <input type="hidden" name="is_superuser" value="<?php echo $row6['is_superuser'] ?>">
                    <?php } ?>

                    <input type="hidden" id="current_quantity" name="current_quantity">

                    <button type="submit" class="btn btn-primary" name="updateprodout">Update Details</button>

                    
                    <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#delete_modal">Delete</button>
                  </div>

                  <div class="modal fade" name="delete_modal" id="delete_modal">
                    <div class="modal-dialog modal-sm modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title font-weight-bold text-danger">DELETE PRODUCT</h5>
                          <button type="button" class="close close-modal-delete1" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <p class="text-danger">Are you sure you want to delete ?</p>
                        </div>
                        <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-outline-secondary close-modal-delete2">Cancel</button>
                          <button type="submit" class="btn btn-danger" id="delete_updateprodout" name="delete_updateprodout">Yes,
                            Delete it</button>
                        </div>
                      </div>
                    </div>
                  </div>

                </form>
              </div>
            </div>
          </div>
        </div>


        <div class="modal fade" id="addnew">
          <div class="modal-dialog modal-dialog-centered  modal-xl ">
            <div class="modal-content ">
              <div class="modal-header bg-primary">
                <h4 class="modal-title font-weight-bold">ENDORSE ITEMS</h4>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form id="addprodout">
                <div class="modal-body" style="overflow-y: scroll;">
                  <div class="row">
                    <div class="col-sm-6" id="branch111">
                      <div class="form-group">
                        <label for="branch">Branch Code:</label>
                        <select class="form-control select2bs4" style="width: 100%;" name="branch" id="branch" required>
                          <option selected="selected" value="default" disabled>Please Select Branch Code</option>
                          <?php
                          $check_user =  $_SESSION['login_user']['user_id'];
                          $query = "SELECT * FROM branches";
                          $result = mysqli_query($conn, $query);
                          $check_row = mysqli_num_rows($result);
                          while ($row = mysqli_fetch_array($result)) {
                          ?>
                            <option value="<?php echo $row['code'] ?>/<?php echo $row['name'] ?>"><?php echo $row['code'] ?>/<?php echo $row['name'] ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6" id="branch222" hidden>
                      <div class="form-group">
                        <label for="branch22">Branch Code:</label>
                        <input type="text" class="form-control " id="branch22" name="branch22" autocomplete="off" required readonly>
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label for="mrf">MRF:</label>
                        <input type="text" class="form-control " id="mrf" name="mrff" onkeyup="this.value = this.value.toUpperCase();" autocomplete="off" required readonly>
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label for="order_num">Inv/Order No:</label>
                        <input type="text" class="form-control " id="order_num" name="order_numm" onkeyup="this.value = this.value.toUpperCase();" autocomplete="off" required readonly>
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-group">
                        <div class="card-body table-responsive p-0" style="height: 400px;">
                          <table class="table table-head-fixed table-hover text-center" id="myTable">
                            <thead>
                              <tr>
                                <th>Barcode</th>
                                <th>Product Description</th>
                                <th>Quantity</th>
                                <th>Lot No.</th>
                                <th>Exp. Date</th>
                                <th>Remarks</th>
                                <th></th>
                              </tr>
                            </thead>
                            <tbody>

                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>


                    <div class="col-sm-3">
                      <div class="form-group">
                        <label for="barcode2">Barcode:</label>
                        <input type="text" class="form-control " id="barcode2" name="barcode" autocomplete="off" required disabled>
                      </div>
                    </div>
                    <div class="col-sm-5">
                      <div class="form-group">
                        <label for="description2">Product Description:</label>
                        <input type="text" class="form-control " id="description2" name="description" autocomplete="off" required disabled>
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-group">
                        <label for="quantity2">Quantity:</label>
                        <input type="number" class="form-control " id="quantity2" name="quantity" autocomplete="off" min="0" required disabled>
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-group">
                        <label for="lot2">Lot Number:</label>
                        <input type="text" class="form-control" id="lot2" name="lot" onkeyup="this.value = this.value.toUpperCase();" autocomplete="off" required disabled>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="exp_date2">Expiration Date:</label>-
                        <input type="text" class="form-control " id="exp_date2" autocomplete="off" name="exp_date" placeholder="mm-dd-yyyy or mm-yyyy or -" disabled>
                      </div>
                    </div>
                    <?php
                    date_default_timezone_set('Asia/Manila');
                    $current_date = date('m-d-Y');
                    ?>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="endorsed_date">Endorse Date:</label>
                        <input type="text" class="form-control " id="endorsed_date" name="endorsed_date" value="<?php echo $current_date; ?>" readonly>
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-group">
                        <label for="remarks2">Remarks:</label>
                        <input type="text" class="form-control " id="remarks2" name="remarks" onkeyup="this.value = this.value.toUpperCase();" autocomplete="off" disabled>
                      </div>
                    </div>
                    <?php
                    $current_user =  $_SESSION['login_user']['employee_name'];
                    ?>
                    <div class="col-sm-2">
                      <div class="form-group">
                        <input type="hidden" id="endorsed_by" name="endorsed_by" value="<?php echo $current_user ?>">
                        <label for="reloadBtn">Add Product</label>
                        <button type="submit" class="btn btn-info form-control" name="reloadBtn" id="reloadBtn" disabled>
                          <i class="fas fa-plus"></i>
                          ADD
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer justify-content-between flex-row-reverse">
                  <button type="button" class="btn btn-primary" id="endorse" name="endorse">Endorse Products</button>
                  <button type="button" class="btn btn-outline-danger" id="cancelendorse" name="cancelendorse">Delete All</button>
                </div>

              </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <div class="modal fade" id="dispatch">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
            <div class="modal-content">
              <div class="modal-header bg-primary">
                <h4 class="modal-title font-weight-bold">DISPATCH ITEMS</h4>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form id="search_form">
                  <div class="row">
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="mrf_search">MRF:</label>
                        <input type="text" class="form-control " id="mrf_search" name="mrf_search" onkeyup="this.value = this.value.toUpperCase();" autocomplete="off" required>
                        <input type="hidden" name="endorsed_by" id="endorsed_by" value="<?php echo $endorsed_by ?>">
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-group">
                        <label for="button_mrfsearch">Search MRF</label>
                        <button type="submit" class="btn btn-info form-control" id="button_mrfsearch">
                          <i class="fas fa-search"></i>
                        </button>
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-group">
                        <div class="card-body table-responsive p-0" style="height: 300px;">
                          <table id="example33" class="table table-head-fixed text-center">
                            <thead>
                              <tr>
                                <th>Barcode</th>
                                <th>Product Description</th>
                                <th>Quantity</th>

                                <th>Branch Code</th>
                                <th>MRF</th>

                              </tr>
                            </thead>
                            <tbody>

                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="dispatchall">Dispatch</button>
              </div>
              </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <div class="modal fade" id="delete_history">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
            <div class="modal-content">
              <div class="modal-header bg-secondary">
                <h4 class="modal-title font-weight-bold">DELETE ITEMS</h4>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form id="search_form2">
                  <div class="row">
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="mrf_search2">MRF:</label>
                        <?php
                        $is_superuser =  $_SESSION['login_user']['is_superuser'];
                        ?>
                        <input type="hidden" name="is_superuser" value="<?php echo $is_superuser ?>">
                        <input type="text" class="form-control " id="mrf_search2" name="mrf_search2" onkeyup="this.value = this.value.toUpperCase();" autocomplete="off" required>
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-group">
                        <label for="button_mrfsearch2">Search MRF</label>
                        <button type="submit" class="btn btn-info form-control" id="button_mrfsearch2">
                          <i class="fas fa-search"></i>
                        </button>
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-group">
                        <div class="card-body table-responsive p-0" style="height: 300px;">
                          <table id="example8" class="table table-head-fixed text-center">
                            <thead>
                              <tr>
                                <th>Barcode</th>
                                <th>Product Description</th>
                                <th>Quantity</th>

                                <th>Branch Code</th>
                                <th>MRF</th>

                              </tr>
                            </thead>
                            <tbody>
                              <!-- <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                  </tr> -->
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="deleteall">Delete All</button>
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

<?php } ?>