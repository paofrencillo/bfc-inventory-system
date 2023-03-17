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
                  <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#addnew"><i class="fas fa-minus-circle"></i> ENDORSE PRODUCTS</button>
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
                        <div class="card-tools">
                          <ul class="pagination pagination-sm">
                            <button class="btn btn-success btn-md" data-toggle="modal" data-target="#dispatch">
                              <i class="fas fa-truck"></i>
                              Dispatch Items
                            </button>
                          </ul>
                        </div>
                        <table id="example1" class="table table-bordered table-hover dt-center">
                          <thead>
                            <tr>
                              <th>Barcode</th>
                              <th>Product Description</th>
                              <th>Quantity</th>
                              <th>Lot No.</th>
                              <th>Branch Code/Name</th>
                              <th>MRF</th>
                              <th>Inv/Order No.</th>
                              <th>Remarks</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>10231562432</td>
                              <td>Robust 100Mg 12S</td>
                              <td>50</td>
                              <td>200</td>
                              <td>23422/Sean</td>
                              <td>3498</td>
                              <td>10351</td>
                              <td>AI</td>
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
                            <tr>
                              <td>10231562322</td>
                              <td>Cetirizine 10Mg 10S</td>
                              <td>34</td>
                              <td>200</td>
                              <td>23422/Sean</td>
                              <td>3498</td>
                              <td>10351</td>
                              <td>AI</td>
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
                            <tr>
                              <td>10231562322</td>
                              <td>Salbutamol 2Mg Tab 100s (Ventomax)</td>
                              <td>56</td>
                              <td>200</td>
                              <td>23422/Sean</td>
                              <td>3498</td>
                              <td>10351</td>
                              <td></td>
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
                      <div class="tab-pane fade" id="example22" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                        <table id="example2" class="table table-bordered table-hover dt-center">
                          <thead>
                            <tr>
                              <th>Barcode</th>
                              <th>Product Description</th>
                              <th>Quantity</th>
                              <th>Lot No.</th>
                              <th>Branch Code/Name</th>
                              <th>MRF</th>
                              <th>Inv/Order No.</th>
                              <th>Endorsed Date</th>
                              <th>Date Released</th>
                              <th>Endorsed By</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>10231562322</td>
                              <td>Cetirizine 10Mg 10S</td>
                              <td>34</td>
                              <td>200</td>
                              <td>23422/Sean</td>
                              <td>3498</td>
                              <td>10351</td>
                              <td>03-12-2023</td>
                              <td>03-16-2023</td>
                              <td>Ako si bnm</td>
                            </tr>
                            <tr>
                              <td>10231562322</td>
                              <td>Salbutamol 2Mg Tab 100s (Ventomax)</td>
                              <td>56</td>
                              <td>200</td>
                              <td>23422/Sean</td>
                              <td>3499</td>
                              <td>10351</td>
                              <td>03-12-2023</td>
                              <td>03-15-2023</td>
                              <td>Ako si bnm</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>


          <div class="modal fade" id="addnew">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl ">
              <div class="modal-content ">
                <div class="modal-header">
                  <h4 class="modal-title">DISPATCH ITEMS</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form id="addprodout">
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="supp">Branch Code:</label>
                          <select class="form-control select2bs4" style="width: 100%;" name="branch" id="branch" required>
                            <option selected="selected" disabled>Please Select Branch Code</option>
                            <?php
                            $check_user =  $_SESSION['login_user']['user_id'];
                            $query = "SELECT * FROM branches";
                            $result = mysqli_query($conn, $query);
                            $check_row = mysqli_num_rows($result);
                            while ($row = mysqli_fetch_array($result)) {
                            ?>
                              <option value="<?php echo $row['code'] ?>"><?php echo $row['code'] ?>/<?php echo $row['name'] ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="form-group">
                          <label for="mrf">MRF:</label>
                          <input type="number" class="form-control " id="mrf" name="mrf" required>
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="form-group">
                          <label for="order_num">Inv/Order No:</label>
                          <input type="number" class="form-control " id="order_num" name="order_num" required>
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="form-group">
                          <div class="card-body table-responsive p-0" style="height: 200px;">
                            <table class="table table-head-fixed text-center" id="myTable">
                              <thead>
                                <tr>
                                  <th>Barcode</th>
                                  <th>Product Description</th>
                                  <th>Quantity</th>
                                  <th>Lot No.</th>
                                  <th>Exp. Date</th>
                                  <th>Remarks</th>
                                </tr>
                              </thead>
                              <tbody>
                                <!-- <tr>
                                <td>42428</td>
                                <td>Mefenamic</td>
                                <td>42</td>
                                <td>2828</td>
                                <td>03-25-2023</td>
                                <td></td>
                              </tr> -->
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>

                      <div class="col-sm-3">
                        <div class="form-group">
                          <label for="barcode">Barcode:</label>
                          <input type="text" class="form-control " id="barcode" onmouseover="this.focus();" name="barcode" required>
                        </div>
                      </div>
                      <div class="col-sm-5">
                        <div class="form-group">
                          <label for="description">Product Description:</label>
                          <input type="text" class="form-control " id="description" name="description" required>
                        </div>
                      </div>
                      <div class="col-sm-1">
                        <div class="form-group">
                          <label for="quantity">Quantity:</label>
                          <input type="number" class="form-control " id="quantity" name="quantity" required>
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="form-group">
                          <label for="lot">Lot Number:</label>
                          <input type="text" class="form-control" id="lot" name="lot" onkeyup="this.value = this.value.toUpperCase();" required>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="exp_date">Expiration Date:</label>
                          <input type="text" class="form-control " id="exp_date" name="exp_date">
                        </div>
                      </div>
                      <?php
                      $month = date('m');
                      $day = date('d');
                      $year = date('Y');

                      $today = $year . '-' . $month . '-' . $day;
                      ?>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="endorsed_date">Endorse Date:</label>
                          <input type="date" class="form-control " id="endorsed_date" name="endorsed_date" value="<?php echo $today; ?>" readonly>
                        </div>
                      </div>
                      <div class="col-sm-2">
                        <div class="form-group">
                          <label for="remarks">Remarks:</label>
                          <input type="text" class="form-control " id="remarks" name="remarks">
                        </div>
                      </div>
                      <?php
                      $current_user =  $_SESSION['login_user']['employee_name'];
                      ?>
                      <div class="col-sm-2">
                        <div class="form-group">
                          <input type="hidden" id="endorsed_by" name="endorsed_by" value="<?php echo $current_user ?>">
                          <label for="reloadBtn">Add Product</label>
                          <button type="submit" class="btn btn-info form-control" id="reloadBtn">
                            <i class="fas fa-plus"></i>
                            ADD
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="endorse" name="endorse" >Endorse Products</button>
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
                          <label for="qty">Quantity:</label>
                          <input type="number" class="form-control " id="qty">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="lot">Lot Number:</label>
                          <input type="text" class="form-control" id="lot" onkeyup="this.value = this.value.toUpperCase();">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="supp">Branch Code:</label>
                          <select class="form-control select2bs4" style="width: 100%;">
                            <option selected="selected" disabled>Please Select Branch Code</option>
                            <?php
                            $check_user =  $_SESSION['login_user']['user_id'];
                            $query = "SELECT * FROM branches";
                            $result = mysqli_query($conn, $query);
                            $check_row = mysqli_num_rows($result);
                            while ($row = mysqli_fetch_array($result)) {
                            ?>
                              <option value="<?php echo $row['code'] ?>"><?php echo $row['code'] ?>/<?php echo $row['name'] ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-sm-2">
                        <div class="form-group">
                          <label for="barcode">MRF:</label>
                          <input type="number" class="form-control " id="barcode">
                        </div>
                      </div>
                      <div class="col-sm-2">
                        <div class="form-group">
                          <label for="barcode">Inv/Order No:</label>
                          <input type="number" class="form-control " id="barcode">
                        </div>
                      </div>
                      <div class="col-sm-5">
                        <div class="form-group">
                          <label for="exp">Expiration Date:</label>
                          <input type="date" class="form-control " id="exp">
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="form-group">
                          <label for="barcode">Remarks:</label>
                          <input type="text" class="form-control " id="barcode">
                        </div>
                      </div>
                      <!-- <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="supp">Entry Date:</label>
                                    <input type="date" class="form-control " id="supp">
                                </div>
                            </div>         -->
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-danger">Delete</button>
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
                          <label for="stock">Quantity:</label>
                          <input type="number" class="form-control " id="stock" readonly>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="lot">Lot Number:</label>
                          <input type="text" class="form-control" id="lot" onkeyup="this.value = this.value.toUpperCase();" readonly>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="supp">Branch Code:</label>
                          <select class="form-control select2bs4" style="width: 100%;" disabled>
                            <option selected="selected" disabled>Please Select Branch</option>
                            <option>Supplier A</option>
                            <option>Supplier B</option>
                            <option>Supplier C</option>
                            <option>Supplier D</option>
                            <option>Supplier E</option>
                            <option>Supplier F</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-sm-2">
                        <div class="form-group">
                          <label for="barcode">MRF:</label>
                          <input type="text" class="form-control " id="barcode" readonly>
                        </div>
                      </div>
                      <div class="col-sm-2">
                        <div class="form-group">
                          <label for="barcode">Inv/Order No:</label>
                          <input type="text" class="form-control " id="barcode" readonly>
                        </div>
                      </div>
                      <div class="col-sm-5">
                        <div class="form-group">
                          <label for="exp">Expiration Date:</label>
                          <input type="date" class="form-control " id="exp" readonly>
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="form-group">
                          <label for="barcode">Remarks:</label>
                          <input type="text" class="form-control " id="barcode" readonly>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="barcode">Endorse By:</label>
                          <input type="text" class="form-control " id="barcode" readonly>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="supp">Endorsement Date:</label>
                          <input type="date" class="form-control " id="supp" readonly>
                        </div>
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

          <div class="modal fade" id="dispatch">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">DISPATCH ITEMS</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form>
                    <div class="row">
                      <div class="col-sm-10">
                        <div class="form-group">
                          <label for="supp">Branch Code:</label>
                          <select class="form-control select2bs4" style="width: 100%;">
                            <option selected="selected" disabled>Please Select Branch Code</option>
                            <?php
                            $check_user =  $_SESSION['login_user']['user_id'];
                            $query = "SELECT * FROM branches";
                            $result = mysqli_query($conn, $query);
                            $check_row = mysqli_num_rows($result);
                            while ($row = mysqli_fetch_array($result)) {
                            ?>
                              <option value="<?php echo $row['code'] ?>"><?php echo $row['code'] ?>/<?php echo $row['name'] ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-sm-2">
                        <div class="form-group">
                          <label for="barcode">Search MRF</label>
                          <a type="submit" class="btn btn-info form-control">
                            <i class="fas fa-search"></i>
                          </a>
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="form-group ">
                          <table id="example3" class="table table-bordered table-hover dt-center">
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
                  </form>
                </div>
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                  <button type="button" class="btn btn-primary">Dispatch</button>
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
<?php } ?>
