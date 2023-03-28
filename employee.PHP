<?php
include('templates/connection.php');
include('templates/session.php');

if ($_SESSION['login_user']['is_superuser'] == '0') {
  header('HTTP/1.0 403 Forbidden', TRUE, 403);
  die(header('location: 403.html'));  
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

    <!-- Navbar -->
    <?php
    include("templates/navbar.php");
    ?>

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-light-blue elevation-4">
   <!-- Brand Logo -->
   <a href="z-dashboard.php" class="brand-link text-center">
      <img src="dist/img/valuemed-logo.png" alt="valuemedlogo" style="width: 70%">
    </a>

      <!-- Sidebar -->
      <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="dashboard.php" class="nav-link">
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
            <li class="nav-item menu-open">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-cog"></i>
                <p>
                  Settings
                  <i class="fas fa-angle-left right"></i>
                  <!-- <span class="badge badge-info right">6</span> -->
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="employee.php" class="nav-link active">
                    <i class="far fa-dot-circle nav-icon"></i>
                    <p>Employee Accounts</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="franchisee.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Franchisee List</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="supplier.php" class="nav-link">
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
              <h1 class="m-0">Employee Accounts</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <div class="col-12">
          <div class="card card-outline card-primary">
            <div class="card-header text-center">
              <a href="#" class="h1"><b>Add</b> Account</a>
              <div class="card-tools">
                <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body text-right">
              <p class="login-box-msg">Enroll New Employee Account</p>
              <form action="functions.php" method="post">
                <div class="input-group mb-3">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-user"></span>
                    </div>
                  </div>
                  <input type="text" class="form-control" placeholder="Name" name="name" autocomplete="off" required>
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-address-card"></span>
                    </div>
                  </div>
                  <input type="text" class="form-control" placeholder="Username" name="username" autocomplete="off" required>
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-lock"></span>
                    </div>
                  </div>
                  <input type="password" class="form-control" placeholder="Default Password" name="password" autocomplete="off" required>
                </div>
                <div class="col-12">
                  <button type="submit" class="btn btn-primary" name="signup">Add Account</button>
                </div>
              </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.row -->
        </div>

        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table id="example1" class="table table-bordered table-hover dt-center">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Username</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $check_user =  $_SESSION['login_user']['user_id'];
                        $query = "SELECT * FROM users WHERE is_superuser='0'";
                        $result = mysqli_query($conn, $query);
                        $check_row = mysqli_num_rows($result);
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                          <tr>
                            <td><?php echo $row['employee_name'] ?></td>
                            <td><?php echo $row['user'] ?></td>
                            <td>
                              <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#update<?php echo $row['user_id'] ?>">
                                <i class="fas fa-pencil-alt"></i>
                                Edit Details
                              </button>
                              <!-- /.modal -->
                              <div class="modal fade" id="update<?php echo $row['user_id'] ?>">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                  <div class="modal-content">
                                    <div class="modal-header bg-info">
                                      <h4 class="modal-title font-weight-bold">UPDATE ACCOUNT DETAILS</h4>
                                      <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <form action="functions.php" method="POST">
                                        <div class="row">
                                          <div class="col-sm-6">
                                            <div class="form-group">
                                              <label for="name">Name</label>
                                              <input type="text" class="form-control " id="employee_name" name="employee_name" autocomplete="off" value="<?php echo $row['employee_name'] ?>">
                                            </div>
                                          </div>
                                          <div class="col-sm-6">
                                            <div class="form-group">
                                              <label for="name">Username</label>
                                              <input type="text" class="form-control " id="user" name="user" autocomplete="off" value="<?php echo $row['user'] ?>">
                                            </div>
                                          </div>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                          <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button> -->
                                          <input type="hidden" name="employee_modify" value="<?php echo $row['user_id'] ?>">
                                          <button type="submit" class="btn btn-outline-danger" name="delete_employee">Delete</button>
                                          <button type="submit" class="btn btn-primary" name="modify_employee">Update Details</button>
                                        </div>
                                      </form>
                                    </div>
                                    <!-- /.modal-content -->
                                  </div>
                                  <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->

                            </td>
                          </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      <!-- /.content-header -->
    </div>
    <!-- /.content-wrapper -->

    <?php
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
  <script>
    $(function() {
      $("#example1").DataTable({
        "columnDefs": [{
          "className": "dt-center",
          "targets": "_all"
        }],
        "responsive": true,
        "lengthChange": true,
        "autoWidth": false,
        // "buttons": ["copy", "csv", "excel", "pdf", "print"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    });
  </script>

</body>

</html>