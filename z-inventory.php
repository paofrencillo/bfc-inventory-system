<?php
include('templates/connection.php');
include('templates/session.php');

if ($_SESSION['login_user']['is_superuser'] == '1') {
  header('HTTP/1.0 403 Forbidden', TRUE, 403);
  die(header('location: 403.html'));  
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Inventory | Products</title>
  <link rel="icon" type="image/png" href="dist/img/valuemed-logo1.png">

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
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Select2 -->
   <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
   <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <?php
  // ------ Navbar
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
          <li class="nav-item ">
            <a href="z-dashboard.php" class="nav-link">
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
                <a href="z-inventory.php" class="nav-link active">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Inventory</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="z-masterlist.php" class="nav-link">
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
                <a href="z-prod-in.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product In</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="z-prod-out.php" class="nav-link">
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
                <!-- <span class="badge badge-info right">6</span> -->
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="z-franchisee.php" class="nav-link">
                  <i class="far fa-circle nav-icon "></i>
                  <p>Franchisee List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="z-supplier.php" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Supplier</p>
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

  '<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Inventory</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    
      <section class="content">
        <div class="container-fluid">
          <!-- <div class="card">
              <div class="card-header">
                  <h3 class="card-title">Enroll New Products</h3>
              </div>
              <div class="card-body">
                  <div class="col-md-2">
                      <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#addnew"><i class="fas fa-plus-circle"></i> ADD NEW PRODUCT</button>
                  </div>
              </div>
          </div> -->
            
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
                                    <input type="date" class="form-control " id="exp" >
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
                <h4 class="modal-title">VIEW DETAILS</h4>
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
  <!-- /.content-wrapper -->'

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
<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>
<script>
    $(function () {
      $("#example1").DataTable({
        "columnDefs": [{"className": "dt-center", "targets": "_all"}],
        "responsive": true, 
        "lengthChange": true, 
        "autoWidth": false,
        // "buttons": ["copy", "csv", "excel", "pdf", "print"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });

    $(function () {
      $("#example2").DataTable({
        "columnDefs": [{"className": "dt-center", "targets": "_all"}],
        "responsive": true, 
        "lengthChange": true, 
        "autoWidth": false,
        // "buttons": ["copy", "csv", "excel", "pdf", "print"]
      }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
    });

    $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
      })
    })
  </script>
</body>
</html>
