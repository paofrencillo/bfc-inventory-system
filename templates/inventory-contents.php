<?php
// Restrict user fron accessing the php file directly
if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
    /* 
    Up to you which header to send, some prefer 404 even if 
    the files does exist for security
    */
    header('HTTP/1.0 500 Internal Server Error', TRUE, 500);

    /* choose the appropriate page to redirect users */
    die(header('location: ../500.html'));
} else {?>
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Inventory Tables</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-12">
                <div class="card card-primary card-tabs">
                  <div class="card-header p-0 pt-1">
                    <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#example11" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Pharma</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#example22" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Non-Pharma</a>
                      </li>

                    </ul>
                  </div>
                  <!-- /.card-header table 1 -->
                  <div class="card-body">
                    <div class="tab-content" id="custom-tabs-one-tabContent">
                      <div class="tab-pane fade show active" id="example11" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                        <table id="example1" class="table table-bordered table-hover dt-center">
                          <thead>
                            <tr>
                              <th>Barcode</th>
                              <th>Product Description</th>
                              <th>Stock</th>
                              <th>Allocation</th>
                              <th>S/A %</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>1023156MHJHMHM</td>
                              <td>Robust 100Mg 12S</td>
                              <td>50</td>
                              <td>200</td>
                              <td>25%</td>
                              <td>
                                <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#update">
                                  <i class="fas fa-pencil-alt"></i>
                                  Edit Details
                                </button>
                                <button class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#view">
                                  <i class="fas fa-eye"></i>
                                  View Details
                                </button>
                              </td>
                            </tr>
                            <tr>
                              <td>421544256</td>
                              <td>Cetirizine 10Mg 10S</td>
                              <td>80</td>
                              <td>200</td>
                              <td>40%</td>
                              <td>
                                <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#update">
                                  <i class="fas fa-pencil-alt"></i>
                                  Edit Details
                                </button>
                                <button class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#view">
                                  <i class="fas fa-eye"></i>
                                  View Details
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
                              <th>Stock</th>
                              <th>Allocation</th>
                              <th>S/A %</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>1023156MHJHMHM</td>
                              <td>Robust 100Mg 12S</td>
                              <td>50</td>
                              <td>200</td>
                              <td>25%</td>
                              <td>
                                <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#update">
                                  <i class="fas fa-pencil-alt"></i>
                                  Edit Details
                                </button>
                                <button class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#view">
                                  <i class="fas fa-eye"></i>
                                  View Details
                                </button>
                              </td>
                            </tr>
                            <tr>
                              <td>421544256</td>
                              <td>Cetirizine 10Mg 10S</td>
                              <td>80</td>
                              <td>200</td>
                              <td>40%</td>
                              <td>
                                <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#update">
                                  <i class="fas fa-pencil-alt"></i>
                                  Edit Details
                                </button>
                                <button class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#view">
                                  <i class="fas fa-eye"></i>
                                  View Details
                                </button>
                              </td>
                            </tr>
                            <tr>
                              <td>421544256</td>
                              <td>Mefenamic Acid 500mg (Generic)</td>
                              <td>70</td>
                              <td>200</td>
                              <td>35%</td>
                              <td>
                                <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#update">
                                  <i class="fas fa-pencil-alt"></i>
                                  Edit Details
                                </button>
                                <button class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#view">
                                  <i class="fas fa-eye"></i>
                                  View Details
                                </button>
                              </td>
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
            <div class="modal-dialog modal-dialog-centered modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">ENROLL NEW PRODUCTS</h4>
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
                          <input type="text" class="form-control " id="barcode">
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
                          <input type="text" class="form-control " id="supp">
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
                          <input type="date" class="form-control " id="supp" disabled>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                  <button type="button" class="btn btn-primary">Add Product</button>
                </div>
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
                      <div class="col-sm-3">
                        <div class="form-group">
                          <label for="lot">Lot Number:</label>
                          <input type="text" class="form-control" id="lot" onkeyup="this.value = this.value.toUpperCase();">
                        </div>
                      </div>
                      <div class="col-sm-5">
                        <div class="form-group">
                          <label for="supp">Supplier:</label>
                          <select class="form-control select2bs4" style="width: 100%;">
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
          <!-- /.modal for details -->
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
                      <div class="col-sm-3">
                        <div class="form-group">
                          <label for="lot">Lot Number:</label>
                          <input type="text" class="form-control" id="lot" onkeyup="this.value = this.value.toUpperCase();" readonly>
                        </div>
                      </div>
                      <div class="col-sm-5">
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

        </section>
      </div>
      <!-- /.content-header -->
    </div>
    <!-- /.content-wrapper -->

<?php }?>
    