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

  <style>
    td {
      vertical-align: middle !important;
    }
  </style>
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
      <a href="dashboard.php" class="brand-link text-center">
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
              <a href="dashboard.php" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>

            <li class="nav-item menu-open">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                  Manage Inventory
                  <i class="fas fa-angle-left right"></i>
                  <!-- <span class="badge badge-info right">6</span> -->
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="inventory.php" class="nav-link active">
                    <i class="far fa-dot-circle nav-icon"></i>
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

    <?php
    // ------ Contents
    include("templates/inventory-contents.php");
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
  <!-- Select2 -->
  <script src="plugins/select2/js/select2.full.min.js"></script>
  <script>
    function editInv(button) {
      let id = $(button).attr('data-id');
      console.log(id);

      $.ajax({
        type: "GET",
        url: "functions.php",
        data: {
          id: id,
          action: "get_product_inv"
        },
        dataType: "JSON",
        success: function(data) {
          if (data == "Not found") {
            alert("Product Not Found!");
          } else {
            console.log(data)
            $("#product_id").val(data.id);
            $("#barcode").val(data.barcode);
            $("#prod").val(data.description);
            $("#stock").val(data.stock);
            $("#allo").val(data.allocation);
            $("#Category").val(data.category);
            $("#rack").val(data.rack);
            $("#rack_in").val(data.rack_in);
            $("#rack_out").val(data.rack_out);
            $('#editInvModal').modal('show');
            if (data.sa_percentage === null){
              $("#sa_percentage").val('0%');
            } else {
              $("#sa_percentage").val(data.sa_percentage + '%');
            }
            
          }
        },
        error: function(error) {
          console.error(error);
        }
      });
    }

    $("#barcode-transfer").on("change", () => {
      $("#qty-transfer").val('');
      $("#transfer-form").on("submit", (e) => {
        e.preventDefault();
      });
      $.ajax({
        type: "GET",
        url: "functions.php",
        data: {
          "barcode": $("#barcode-transfer").val(),
          action: "get_product_transfer"
        },
        dataType: "JSON",
        success: function(data) {
          if (data == "Not found") {
            $("#warning-transfer-text").removeClass("d-none");
            $("#barcode-transfer").val('');
            $("#desc-transfer").val('');
            $("#rack-transfer").val('');
            $("#qty-transfer").val('');
            $("#rack-in").val('');
            $("#rack-out").val('');
          } else {
            $("#warning-transfer-text").addClass("d-none");
            $("#barcode-transfer").val(data.barcode);
            $("#desc-transfer").val(data.description);
            $("#rack-transfer").val(data.rack);
            $("#qty-transfer").val('');
            $("#rack-in").val(data.rack_in);
            $("#rack-out").val(data.rack_out);
          }
        },
        error: function(error) {
          console.error(error);
        }
      });
      $("#transfer-form").unbind("submit");
    });

    $(function() {
      $("#Generic").DataTable({
        "order": [],
        "columnDefs": [{
          "targets": 8,
          "orderable": false
        }],
        "responsive": true,
        "lengthChange": true,
        "autoWidth": false,
        "processing": true,
        "serverSide": true,
        lengthMenu: [10, 50, 100, 500, 1000],
        "ajax": "fetchDataInventory.php",
        "order": [
          [1, 'asc']
        ],
        // "buttons": ["copy", "csv", "excel", "pdf", "print"]
      }).buttons().container().appendTo('#Generic_wrapper .col-md-6:eq(0)');
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
</body>

</html>