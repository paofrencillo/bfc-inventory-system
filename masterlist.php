<?php
    include('connection.php');
    session_start();
    if (!isset($_SESSION['login_user']['user'])) {
      header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminBFC | Dashboard</title>

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
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/normal_BFC_logo_latest.png" alt="AdminLTELogo" height="500" width="500">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="starter.php" class="nav-link">Home</a>
      </li>
    </ul>

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
          <li class="nav-item ">
            <a href="starter.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item menu-open ">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Manage Inventory
                <i class="fas fa-angle-left right active"></i>
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
                <a href="masterlist.php" class="nav-link active">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Masterlist</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
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
                <a href="prod-out.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
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
            <h1 class="m-0">Masterlist</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    
      <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Enroll New Products</h3>
                </div>
                <div class="card-body">
                    <div class="col-md-2">
                        <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#addnew"><i class="fas fa-plus-circle"></i> ADD NEW PRODUCT</button>
                    </div>
                </div>
            </div>
            
          <div class="row">
            <div class="col-12">
              <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-hover projects">
                    <thead>
                    <tr class=text-center>
                        <th>Barcode</th>
                        <th>Product Description</th>
                        <th>Generic Name</th>
                        <th>Category</th>
                        <th>Last Edited</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                      <tbody>
                      <?php 
                        $query = "SELECT * FROM product_masterlist ORDER BY last_edited_on DESC;";
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_array($result)) {
                          $last_user = $row['last_edited_by'];
                          $date = date_create($row["last_edited_on"]);
                          $date = date_format($date, "d/m/Y H:i");
                    ?>
                    <tr class="text-center">
                      <td><?php echo $row["barcode"] ?></td>
                      <td><?php echo $row["description"] ?></td>
                      <td><?php echo $row["generic_name"] ?></td>
                      <td><?php echo $row["category"] ?></td>
                      <td class="font-italic">
                        <small>
                          <?php
                            $query2 = "SELECT * FROM users WHERE user_id ='$last_user'";
                            $result2 = mysqli_query($conn, $query2);
                            while ($row2 = mysqli_fetch_array($result2)) {
                              echo $row2['employee_name'] . ' | ' . $date;
                            }
                          ?>
                        </small>
                      </td>
                      <td>
                        <button class="btn btn-secondary btn-sm" data-id="<?php echo $row["barcode"];?>" data-toggle="modal" data-target="#view" onclick="viewModal(this);">
                          <i class="fas fa-eye"></i>
                          Details
                        </button>
                        <button class="btn btn-info btn-sm" data-id="<?php echo $row["barcode"];?>"  data-toggle="modal" data-target="#update" onclick="viewModal(this);">
                          <i class="fas fa-pencil-alt"></i>
                          Edit
                        </button>
                      </td>
                    </tr>
                    <?php } ?>
                    </tbody> 
                    </table>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade" id="addnew">
          <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">ENROLL NEW PRODUCT</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="enroll.php" name="enroll_form" id="enroll_form" method="post" enctype="multipart/form-data">
                  <div class="row">     
                    <div class="col-sm-5">
                      <div class="form-group">
                        <label for="barcode">Barcode</label>
                        <input type="text" class="form-control" name="barcode" id="barcode" required>
                      </div>
                    </div>
                    <div class="col-sm-7">
                      <div class="form-group">
                        <label for="description">Product Description</label>
                        <input type="text" class="form-control" name="description" id="description" required>
                      </div>
                    </div>
                    <div class="col-sm-5">
                      <div class="form-group">
                        <label for="generic_name">Generic Name</label>
                        <input type="text" class="form-control" name="generic_name" id="generic_name" required>
                      </div>
                    </div>
                    <div class="col-sm-7">
                      <div class="form-group mb-3">
                        <label for="category">Select Category</label>
                        <select class="custom-select" id="inputGroupSelect01" name="category" id="category" required>
                          <option id="default-selected" selected disabled>--category--</option>
                          <option value="1">One</option>
                          <option value="2">Two</option>
                          <option value="3">Three</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <label>Image</label>
                      <div class="custom-file form-group">
                        <input type="file" class="custom-file-input" id="imageFile" accept=".png,.jpeg,.jpeg" name="imageFile"> 
                        <label class="custom-file-label" for="imageFile" id="file-label">Choose Image</label>
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <h6 class="text-success font-weight-bold mt-2 d-none" id="enroll_success_text">
                        Product enrolled successfully!
                      </h6>
                      <h6 class="text-danger font-weight-bold mt-2 d-none" id="enroll_error_text">
                        Product enrollment failed. Try again.
                      </h6>
                    </div>
                  </div>                                  
                  <div class="modal-footer justify-content-between px-0 mx-0">
                    <input type="hidden" name="employee_id" id="employee_id" value="<?php echo $_SESSION['login_user']['user_id'];?>">
                    <button type="button" class="btn btn-default mx-0" data-dismiss="modal">Cancel</button>
                    <input type="submit" name="add_product" class="btn btn-primary mx-0" value="Add Product">
                  </div>
                </form>
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
                    <div class="col-sm-5">
                      <div class="form-group">
                        <label for="barcode-modal">Barcode:</label>
                        <input type="text" class="form-control modal-field" id="barcode-modal" readonly>
                      </div>
                    </div>
                    <div class="col-sm-7">
                      <div class="form-group">
                        <label for="desc-modal">Product Description:</label>
                        <input type="text" class="form-control modal-field" id="desc-modal" readonly>
                      </div>
                    </div>
                    <div class="col-sm-5">
                      <div class="form-group">
                        <label for="gen-modal">Generic Name:</label>
                        <input type="text" class="form-control modal-field" id="gen-modal" readonly>
                      </div>
                      <div class="form-group">
                        <label for="cat-modal">Category:</label>
                        <input type="text" class="form-control modal-field" id="cat-modal" readonly>
                      </div>
                    </div>
                    <div class="col-sm-7">
                      <div class="position-relative">
                        <div class="w-100">
                          <label for="img-modal">Image:</label>
                        </div>
                        <div class="custom-file form-group mb-2">
                          <input type="file" class="custom-file-input modal-field" id="imageFile2" accept=".png,.jpeg,.jpeg" name="imageFile2"> 
                          <label class="custom-file-label" for="imageFile2" id="file-label2">Choose Image</label>
                        </div>
                        <img alt="Product photo" class="img-fluid img-modal" style="height: 100%; width: 100%;">           
                      </div>
                    </div>
                    <div class="modal-footer justify-content-between col-sm-12">
                      <button type="button" class="btn btn-outline-default">Delete</button>
                      <button type="button" class="btn btn-primary" onclick="editDetails();">Update Details</button>
                      <div class="justify-content-around d-none">
                        <button type="reset" class="btn btn-default">Cancel</button>
                        <button type="submit" name="update_masterlist" class="btn btn-success">Save changes</button>
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
      </section>
    </div>
    <!-- /.content-header -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <strong>Made by <a href="#">TUP-C Interns</a>.</strong>
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
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
<!-- bs-custom-file-input -->
<script src="../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script type="text/javascript" src="js/masterlist/masterlist.js"></script>
</body>
</html>
