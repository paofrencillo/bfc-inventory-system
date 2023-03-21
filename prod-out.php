<?php
include('templates/connection.php');
include('templates/session.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminBFC | Dashboard</title>


  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="icon" type="image/png" href="/dist/img/normal_BFC_logo_latest.png">
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <!-- <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="dist/img/normal_BFC_logo_latest.png" alt="AdminLTELogo" height="500" width="500">
    </div> -->

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light justify-content-between">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="starter.php" class="nav-link">Home</a>
        </li>
      </ul>
      <h6 class="mb-0 mr-2">
        <?php
        date_default_timezone_set("Asia/Manila");
        $h = date('G');
        $user = $_SESSION['login_user']['user'];

        if ($h >= 0 && $h <= 11) {
          echo "Good morning, $user";
        } else if ($h >= 12 && $h <= 17) {
          echo "Good afternoon, $user";
        } else {
          echo "Good evening, $user";
        }
        ?>
      </h6>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-light-blue elevation-4">
      <!-- Brand Logo -->
      <a href="starter.php" class="brand-link">
        <img src="dist/img/normal_BFC_logo_latest.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminBFC</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="starter.php" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                  Manage Inventory
                  <i class="fas fa-angle-left right "></i>
                  <!-- <span class="badge badge-info right">6</span> -->
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="inventory.php" class="nav-link ">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Inventory</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="masterlist.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Masterlist</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item menu-open">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-truck"></i>
                <p>
                  Product In/Out
                  <i class="fas fa-angle-left right"></i>
                  <!-- <span class="badge badge-info right">6</span> -->
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="prod-in.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Product In</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link  active">
                    <i class="far fa-dot-circle nav-icon"></i>
                    <p>Product Out</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-cog"></i>
                <p>
                  Settings
                  <i class="fas fa-angle-left right"></i>
                  <!-- <span class="badge badge-info right">6</span> -->
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="employee.php" class="nav-link ">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Employee Accounts</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="franchisee.php" class="nav-link">
                    <i class="far fa-circle nav-icon "></i>
                    <p>Franchisee List</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="supplier.php" class="nav-link ">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Supplier</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="admin.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Change Password </p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="functions.php?logout" class="nav-link">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>
                  Logout
                </p>
              </a>
            </li>

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

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
                            <?php
                            $check_user =  $_SESSION['login_user']['user_id'];
                            $query = "SELECT * FROM endorse_final ORDER BY endorsed_date";
                            $result = mysqli_query($conn, $query);
                            $check_row = mysqli_num_rows($result);
                            while ($row = mysqli_fetch_array($result)) {
                            ?>
                              <tr>
                                <td><?php echo $row['barcode'] ?></td>
                                <td><?php echo $row['description'] ?></td>
                                <td><?php echo $row['quantity'] ?></td>
                                <td><?php echo $row['lot'] ?></td>
                                <td><?php echo $row['branch'] ?></td>
                                <td><?php echo $row['mrf'] ?></td>
                                <td><?php echo $row['order_num'] ?></td>
                                <td><?php echo $row['remarks'] ?></td>
                                <td>
                                  <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#updatee<?php echo $row['id'] ?>">
                                    <i class="fas fa-pencil-alt"></i>
                                    Edit
                                  </button>
                                  <button class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#view<?php echo $row['id'] ?>">
                                    <i class="fas fa-eye"></i>
                                    Details
                                  </button>
                                </td>
                              </tr>

                              <div class="modal fade" id="updatee<?php echo $row['id'] ?>">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h4 class="modal-title">UPDATE PRODUCT DETAILS</h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <form action="functions.php" method="post">
                                        <div class="row">
                                          <div class="col-sm-4">
                                            <div class="form-group">
                                              <label for="barcode">Barcode:</label>
                                              <input type="text" class="form-control " id="barcode" name="barcode" value="<?php echo $row['barcode'] ?>">
                                            </div>
                                          </div>
                                          <div class="col-sm-8">
                                            <div class="form-group">
                                              <label for="description">Product Description:</label>
                                              <input type="text" class="form-control " id="description" name="description" value="<?php echo $row['description'] ?>">
                                            </div>
                                          </div>
                                          <div class="col-sm-2">
                                            <div class="form-group">
                                              <label for="quantity">Quantity:</label>
                                              <input type="number" class="form-control " id="quantity" name="quantity" value="<?php echo $row['quantity'] ?>">
                                            </div>
                                          </div>
                                          <div class="col-sm-4">
                                            <div class="form-group">
                                              <label for="lot">Lot Number:</label>
                                              <input type="text" class="form-control" id="lot" name="lot" onkeyup="this.value = this.value.toUpperCase();" value="<?php echo $row['lot'] ?>">
                                            </div>
                                          </div>
                                          <div class="col-sm-6">
                                            <div class="form-group">
                                              <label for="supp">Branch Code:</label>
                                              <select class="form-control select2bs4" style="width: 100%;" disabled>
                                                <option selected="selected" value="<?php echo $row['branch'] ?>"><?php echo $row['branch'] ?></option>
                                                <option value=""><?php echo $row2['supplier_name'] ?></option>
                                              </select>
                                            </div>
                                          </div>
                                          <div class="col-sm-2">
                                            <div class="form-group">
                                              <label for="mrf">MRF:</label>
                                              <input type="text" class="form-control " id="mrf" name="mrf" value="<?php echo $row['mrf'] ?>">
                                            </div>
                                          </div>
                                          <div class="col-sm-2">
                                            <div class="form-group">
                                              <label for="order_num">Inv/Order No:</label>
                                              <input type="text" class="form-control " id="order_num" name="order_num" value="<?php echo $row['order_num'] ?>">
                                            </div>
                                          </div>
                                          <div class="col-sm-5">
                                            <div class="form-group">
                                              <label for="exp_date">Expiration Date:</label>
                                              <input type="text" class="form-control " id="exp_date" name="exp_date" value="<?php echo $row['exp_date'] ?>">
                                            </div>
                                          </div>
                                          <div class="col-sm-3">
                                            <div class="form-group">
                                              <label for="remarks">Remarks:</label>
                                              <input type="text" class="form-control " id="remarks" name="remarks" value="<?php echo $row['remarks'] ?>">
                                            </div>
                                          </div>
                                        </div>
                                        <div class="modal-footer">
                                          <input type="hidden" name="id_update" value="<?php echo $row['id'] ?>">
                                          <button type="submit" class="btn btn-outline-danger" name="delete_updateprodout">Delete</button>
                                          <button type="submit" class="btn btn-primary" name="updateprodout">Update</button>
                                        </div>
                                      </form>
                                    </div>
                                  </div>
                                  <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                              </div>

                              <div class="modal fade" id="view<?php echo $row['id'] ?>">
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
                                              <input type="text" class="form-control " id="barcode" readonly value="<?php echo $row['barcode'] ?>">
                                            </div>
                                          </div>
                                          <div class="col-sm-8">
                                            <div class="form-group">
                                              <label for="prod">Product Description:</label>
                                              <input type="text" class="form-control " id="prod" readonly value="<?php echo $row['description'] ?>">
                                            </div>
                                          </div>
                                          <div class="col-sm-2">
                                            <div class="form-group">
                                              <label for="stock">Quantity:</label>
                                              <input type="number" class="form-control " id="stock" readonly value="<?php echo $row['quantity'] ?>">
                                            </div>
                                          </div>
                                          <div class="col-sm-4">
                                            <div class="form-group">
                                              <label for="lot">Lot Number:</label>
                                              <input type="text" class="form-control" id="lot" onkeyup="this.value = this.value.toUpperCase();" readonly value="<?php echo $row['lot'] ?>">
                                            </div>
                                          </div>
                                          <div class="col-sm-6">
                                            <div class="form-group">
                                              <label for="supp">Branch Code:</label>
                                              <select class="form-control select2bs4" style="width: 100%;" disabled>
                                                <option selected="selected" readonly value="<?php echo $row['branch'] ?>"><?php echo $row['branch'] ?></option>
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
                                              <label for="mrf">MRF:</label>
                                              <input type="text" class="form-control " id="mrf" readonly value="<?php echo $row['mrf'] ?>">
                                            </div>
                                          </div>
                                          <div class="col-sm-2">
                                            <div class="form-group">
                                              <label for="order_num">Inv/Order No:</label>
                                              <input type="text" class="form-control " id="order_num" readonly value="<?php echo $row['order_num'] ?>">
                                            </div>
                                          </div>
                                          <div class="col-sm-5">
                                            <div class="form-group">
                                              <label for="exp">Expiration Date:</label>
                                              <input type="text" class="form-control " id="exp" readonly value="<?php echo $row['exp_date'] ?>">
                                            </div>
                                          </div>
                                          <div class="col-sm-3">
                                            <div class="form-group">
                                              <label for="remarks">Remarks:</label>
                                              <input type="text" class="form-control " id="remarks" readonly value="<?php echo $row['remarks'] ?>">
                                            </div>
                                          </div>
                                          <div class="col-sm-6">
                                            <div class="form-group">
                                              <label for="endorsed_by">Endorse By:</label>
                                              <input type="text" class="form-control " id="endorsed_by" readonly value="<?php echo $row['endorsed_by'] ?>">
                                            </div>
                                          </div>
                                          <div class="col-sm-6">
                                            <div class="form-group">
                                              <label for="endorsed_date">Endorsement Date:</label>
                                              <input type="date" class="form-control " id="endorsed_date" readonly value="<?php echo $row['endorsed_date'] ?>">
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

                            <?php } ?>
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
                          <label for="barcode2">Barcode:</label>
                          <input type="text" class="form-control " id="barcode2" onmouseover="this.focus();" name="barcode" required>
                        </div>
                      </div>
                      <div class="col-sm-5">
                        <div class="form-group">
                          <label for="description2">Product Description:</label>
                          <input type="text" class="form-control " id="description2" name="description" required>
                        </div>
                      </div>
                      <div class="col-sm-1">
                        <div class="form-group">
                          <label for="quantity2">Quantity:</label>
                          <input type="number" class="form-control " id="quantity2" name="quantity" required>
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="form-group">
                          <label for="lot2">Lot Number:</label>
                          <input type="text" class="form-control" id="lot2" name="lot" onkeyup="this.value = this.value.toUpperCase();" required>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="exp_date2">Expiration Date:</label>
                          <input type="text" class="form-control " id="exp_date2" name="exp_date">
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
                          <label for="remarks2">Remarks:</label>
                          <input type="text" class="form-control " id="remarks2" name="remarks">
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
                    <button type="button" class="btn btn-primary" id="endorse" name="endorse">Endorse Products</button>
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
                <div class="modal-header">
                  <h4 class="modal-title">DISPATCH ITEMS</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form id="search_form">
                    <div class="row">
                      <!-- <div class="col-sm-7">
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
                      </div> -->
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="mrf_search">MRF:</label>
                          <input type="number" class="form-control " id="mrf_search" name="mrf_search" required>
                        </div>
                      </div>
                      <div class="col-sm-2">
                        <div class="form-group">
                          <label for="barcode">Search MRF</label>
                          <button type="submit" class="btn btn-info form-control">
                            <i class="fas fa-search"></i>
                          </button>
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="form-group ">
                          <table id="example3" class="table table-bordered table-hover dt-center" id="searchtable">
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
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-primary">Dispatch</button>
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


    <?php
    // ------ Footer
    include("templates/footer.php");
    ?>

  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="plugins/moment/moment.min.js"></script>
  <script src="plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.js"></script>
  <!-- DataTables  & Plugins -->
  <script src="plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="plugins/jszip/jszip.min.js"></script>
  <script src="plugins/pdfmake/pdfmake.min.js"></script>
  <script src="plugins/pdfmake/vfs_fonts.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="dist/js/pages/dashboard.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.min.js"></script>
  <!-- Select2 -->
  <script src="plugins/select2/js/select2.full.min.js"></script>

  <script>
    $(function() {
      $("#example1").DataTable({
        "columnDefs": [{
          "className": "dt-center",
          "targets": "_all"
        }],
        "responsive": true,
        "lengthChange": true,
        // "scrollY": '500px',
        // "scrollCollapse": true,
        "autoWidth": false,
        "order": [
          [5, 'desc']
        ],
        // "buttons": ["copy", "csv", "excel", "pdf", "print"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });

    $(function() {
      $("#example2").DataTable({
        "columnDefs": [{
          "className": "dt-center",
          "targets": "_all"
        }],
        "responsive": true,
        "lengthChange": true,
        // "scrollY": '500px',
        // "scrollCollapse": false,
        "autoWidth": false,
        // "buttons": ["copy", "csv", "excel", "pdf", "print"]
      }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
    });

    $(function() {
      $("#example3").DataTable({
        "columnDefs": [{
          "className": "dt-center",
          "targets": "_all"
        }],
        "responsive": true,
        "lengthChange": true,
        "paging": false,
        // "scrollY": '500px',
        // "scrollCollapse": true,
        "autoWidth": false,
        // "buttons": ["copy", "csv", "excel", "pdf", "print"]
      }).buttons().container().appendTo('#example3_wrapper .col-md-6:eq(0)');
    });

    $(function() {
      $("#example4").DataTable({
        "columnDefs": [{
          "className": "dt-center",
          "targets": "_all"
        }],
        "responsive": true,
        "lengthChange": true,
        "paging": true,
        // "pageLength": 5,
        // "scrollY": 200,
        // "scrollX": true,
        "scrollCollapse": false,
        "autoWidth": false,
        // "buttons": ["copy", "csv", "excel", "pdf", "print"]
      }).buttons().container().appendTo('#example4_wrapper .col-md-6:eq(0)');
    });

    $(function() {
      //Initialize Select2 Elements
      $('.select2').select2()

      //Initialize Select2 Elements
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      })
    })
  </script>

  <!-- JavaScript code -->
  <!-- <script>
    // When the button is clicked, reload the data
    document.getElementById('reloadBtn').addEventListener('click', function() {
      // Create an AJAX request
      var xhr = new XMLHttpRequest();
      xhr.open('GET', 'get_prod-out.php');
      xhr.onload = function() {
        if (xhr.status === 200) {
          // Parse the JSON response
          var data = JSON.parse(xhr.responseText);
          // Clear the table
          var tableBody = document.querySelector('#myTable tbody');
          tableBody.innerHTML = '';
          // Populate the table with the new data
          data.forEach(function(row) {
            var tr = document.createElement('tr');
            tr.innerHTML = '<td>' + row.barcode + '</td><td>' +
              row.description + '</td><td>' +
              row.quantity + '</td><td>' +
              row.lot + '</td><td>' +
              row.exp_date + '</td><td>' +
              row.remarks + '</td>'
            tableBody.appendChild(tr);
          });
        } else {
          alert('Error: ' + xhr.status);
        }
      };
      xhr.send();
    });
  </script> -->


  <script>
    $(document).ready(function() {
      // Function to reload the table
      function reloadTable() {
        // Get the values from the form
        var endorsed_by = document.getElementById('endorsed_by').value;
        // Create an AJAX request
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'get_prod-out.php?endorsed_by=' + endorsed_by);
        xhr.onload = function() {
          if (xhr.status === 200) {
            // Parse the JSON response
            var data = JSON.parse(xhr.responseText);
            console.log(data)
            // Clear the table
            var tableBody = document.querySelector('#myTable tbody');
            tableBody.innerHTML = '';
            // Populate the table with the new data
            data.forEach(function(row) {
              console.log(row)
              var tr = document.createElement('tr');
              tr.innerHTML = '<td>' + row.barcode + '</td><td>' +
                row.description + '</td><td>' +
                row.quantity + '</td><td>' +
                row.lot + '</td><td>' +
                row.exp_date + '</td><td>' +
                row.remarks + '</td>'
              tableBody.appendChild(tr);
            });
          } else {
            alert('Error: ' + xhr.status);
          }
        };
        xhr.send();
      }

      // Initial load of the table
      reloadTable();

      // Add a click event listener to the reload button
      $("#reloadBtn").click(function() {
        reloadTable();
      });

      // Add a submit event listener to the add form
      $("#addprodout").submit(function(event) {
        // Prevent the form from submitting normally
        event.preventDefault();


        // Use AJAX to send the form data to your PHP script to insert it into the database
        $.ajax({
          url: "post_prod-out.php",
          type: "POST",
          data: $(this).serialize(),
          success: function() {
            $('#barcode2').val('');
            $('#description2').val('');
            $('#quantity2').val('');
            $('#lot2').val('');
            $('#exp_date2').val('');
            $('#remarks2').val('');
            // Reload the table with the updated data
            reloadTable();
            // Reset the values of specific input fields

          }
        });
      });

      // Add a click event listener to the reload button
      $("#endorse").click(function(event) {
        // Prevent the form from submitting normally
        event.preventDefault();

        // Get the values from the form
        var endorsed_by = $('#endorsed_by').val();
        // var myTable = $('#myTable tbody tr').val();
        var mrf = $('#mrf').val();
        var order_num = $('#order_num').val();

        $.ajax({
          url: "get_prod-out.php",
          type: "GET",
          data: {
            "endorsed_by": $("#endorsed_by").val(),
            action: "endorse_product"
          },
          dataType: "JSON",
          success: $(document).ready(function(data) {
            // // handle the response
            // Reload the table with the updated data
            // reloadTable();
            // Reset the values of specific input fields
            $('#branch').val('');
            $('#mrf').val('');
            $('#order_num').val('');
            $('#barcode').val('');
            $('#description').val('');
            $('#quantity').val('');
            $('#lot').val('');
            $('#exp_date').val('');
            $('#remarks').val('');
            console.log(data)
            swal.fire({
              title: "Success!",
              text: "Product successfully endorsed",
              icon: "success",
              confirmButtonText: "OK"
            }).then((result) => {
              if (result.isConfirmed) {
                location.reload();
              } else {
                location.reload();
              }
            });
          })
        });
        // if (mrf.length == 0 || order_num.length == 0){
        //   $(document).ready(function() {
        //     swal.fire({
        //       title: "error!",
        //       title: 'Something went wrong!',
        //       text: "Make sure the table is not empty",
        //       icon: "error",
        //       confirmButtonText: "OK"
        //     });
        //   });
        // } else {

        // }
      });


    });
  </script>

  <script>
    $(document).ready(function() {

      $('#search-form').submit(function(event) {
        event.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
          type: 'POST',
          url: 'search_prod-out.php',
          data: formData,
          success: function(data) {
            var data = JSON.parse(responseText);
          }
        });
      });
    });
  </script>

</body>

</html>