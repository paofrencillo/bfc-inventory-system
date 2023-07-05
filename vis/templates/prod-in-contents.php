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
            <div class="card-body row g-2">
              <div class="col-md-2">
                <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#addnew">
                  <i class="fas fa-plus-circle mr-1"></i> ADD STOCKS
                </button>
              </div>
              <div class="col-md-2">
                <button type="button" class="btn btn-danger btn-block" id="delete-items" disabled>
                  <i class="fas fa-trash mr-1"></i> DELETE ITEMS
                </button>
              </div>
            </div>
          </div>
          
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <div class="card-tools mx-0">
                    <ul class="pagination pagination-sm">
                        <div class="mr-2" id="card_toolss">
                        </div>
                    </ul>
                  </div>
                  <table id="example1" class="table table-striped table-hover text-center" style="font-size: 15px;">
                    <thead class="thead-dark" id="tablebody">
                      <tr style="font-size:15px;">
                        <th><input id="selectAll" type="checkbox" style="width: 16px; height: 16px;" /></th>
                        <th>BARCODE</th>
                        <th>PRODUCT DESCRIPTION</th>
                        <th>PRF</th>
                        <th>QTY</th>
                        <th>LOT NO.</th>
                        <th>EXP. DATE</th>
                        <th>ENTRY DATE</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody id="tablebody2" style=" vertical-align: middle; font-size:15px;">
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- product in  -->
        <div class="modal fade" id="details">
          <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content ">
              <div class="modal-header bg-secondary">
                <h4 class="modal-title font-weight-bold">PRODUCT DETAILS</h4>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
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
                        <input type="text" class="form-control" id="barcode-details" name="barcode-details" autocomplete="off" readonly>
                      </div>
                    </div>
                    <div class="col-sm-8">
                      <div class="form-group">
                        <label for="desc-details">Product Description:</label>
                        <input type="text" class="form-control" id="desc-details" name="desc-details" autocomplete="off" readonly>
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label for="quantity-details">Quantity</label>
                        <input type="number" class="form-control" id="quantity-details" name="quantity-details" onkeyup="this.value = this.value.toUpperCase();" min="0" readonly>
                      </div>
                    </div>
                    <div class="col-sm-5">
                      <div class="form-group">
                        <label for="supp-details">Supplier:</label>
                        <input type="text" class="form-control" id="supp-details" name="supp-details" autocomplete="off" readonly>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="lot-details">Lot Number:</label>
                        <input type="text" class="form-control" id="lot-details" name="lot-details" onkeyup="this.value = this.value.toUpperCase();" autocomplete="off" readonly>
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label for="exp-details">Expiration Date:</label>
                        <input type="text" class="form-control" id="exp-details" name="exp-details" autocomplete="off" readonly>
                      </div>
                    </div>
                    <div class="col-sm-5">
                      <div class="form-group">
                        <label for="added-by-details">Added By:</label>
                        <input type="text" class="form-control" id="added-by-details" name="added-by-details" autocomplete="off" readonly>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="entry-details">Entry Date:</label>
                        <input type="text" class="form-control" id="entry-details" name="entry-details" autocomplete="off" readonly>
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label for="last_edit-details">Last Edit:</label>
                        <input type="text" class="form-control" id="last-edit-details" name="last-edit-details" autocomplete="off" readonly>
                      </div>
                    </div>
                  </div>
                  <h6 class="text-success font-weight-bold mt-2 d-none" id="update_success_text">
                    Product updated successfully!
                  </h6>
                  <h6 class="text-danger font-weight-bold mt-2 d-none" id="update_error_text">
                    Product update failed. Try again.
                  </h6>
                  <div class="modal-footer justify-content-end col-sm-12 mx-0 px-0">
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
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <!-- product in  -->
        <div class="modal fade" id="addnew">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl ">
            <div class="modal-content">
              <div class="modal-header bg-primary">
                <h4 class="modal-title font-weight-bold">RECEIVING ITEMS</h4>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form name="receive-prod-form" id="receive-prod-form">
                  <div class="row">
                    <div class="col-sm-5 mb-2">
                      <label for="prf">PRF:</label>
                      <input type="text" class="form-control" id="prf" name="prf" autocomplete="off" required>
                    </div>
                    <div class="col-sm-5 mb-2">
                      <?php
                      $month = date('m');
                      $day = date('d');
                      $year = date('Y');

                      $today = $month . '-' . $day . '-' . $year;
                      ?>
                      <label for="added-by">Added By:</label>
                      <input type="text" class="form-control" id="added-by" name="added-by" value="<?php echo $_SESSION["login_user"]["employee_name"]; ?>" required readonly>
                    </div>
                    <div class="col-sm-2 mb-2">
                      <label for="added-on">Added On:</label>
                      <input type="text" class="form-control" id="added-on" name="added-on" value="<?php echo $today; ?>" required readonly>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-group">
                        <div class="card-body table-responsive p-0" style="height: 300px;">
                          <table class="table table-hover text-center" style="font-size: 15px;">
                            <thead class="thead-dark">
                              <tr>
                                <th>BARCODE</th>
                                <th>PRODUCT DESCRIPTION</th>
                                <th>RACK</th>
                                <th>QTY</th>
                                <th>LOT NO.</th>
                                <th>EXP. DATE </th>
                                <th></th>
                              </tr>
                            </thead>
                            <tbody id="modal-tbody">
                              <!-- HERE GOES THE TABLE BODY -->
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                    <input type="hidden" name="action" value="receive_prod">
                    <div class="row">
                      <div class="col-sm-3">
                        <div class="form-group">
                          <label for="barcode">Barcode:</label>
                          <input type="text" class="form-control" id="barcode" name="barcode" autocomplete="off" required>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="prod">Product Description:</label>
                          <input type="text" class="form-control" id="description" name="description" autocomplete="off" readonly required>
                        </div>
                      </div>
                      <div class="col-sm-2">
                        <div class="form-group">
                          <label for="quan">Quantity:</label>
                          <input type="number" class="form-control" id="quantity" name="quantity" min="0" required>
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="form-group">
                          <label for="lot">Lot Number:</label>
                          <input type="text" class="form-control" id="lot" name="lot" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" required>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="supp">Supplier</label>
                          <input type="text" class="form-control" id="supp" name="supp" autocomplete="off" readonly required>
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="form-group">
                          <label for="rack">Rack:</label>
                          <input type="text" class="form-control" id="rack" name="rack" onkeyup="this.value=this.value.toUpperCase();" value="N/A" required>
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="form-group">
                          <label for="exp">Expiration Date:</label>
                          <input type="text" class="form-control" id="exp" name="exp" placeholder="mm-dd-yyyy or mm-yyyy" autocomplete="off" required>
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
                    <div class="modal-footer justify-content-between col-sm-12 mx-0 px-0">
                      <button type="button" class="btn btn-outline-danger" id="delete-all-btn" data-toggle="modal" data-target="#delete-modal" disabled>Delete All</button>
                      <button type="button" class="btn btn-primary" id="add-stocks-btn" disabled>Add Stocks</button>
                    </div>
                </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

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
                <p class="text-danger">This will delete all products you have entered here. Do you want to continue?</p>
              </div>
              <div class="modal-footer justify-content-end">
                <button type="button" class="btn btn-secondary close-modal-delete2">No, Go back</button>
                <button type="button" class="btn btn-outline-danger" onclick="deleteProducts();">Yes</button>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    <!-- /.content-header -->
  </div>
  <!-- /.content-wrapper -->
<?php } ?>