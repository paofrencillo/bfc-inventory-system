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
  <title>Inventory | Product In</title>
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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.min.css">
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
                  <a href="prod-in.php" class="nav-link active">
                    <i class="far fa-dot-circle nav-icon"></i>
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
                    <i class="far fa-circle nav-icon"></i>
                    <p>Franchisee List</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
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
    include("templates/prod-in-contents.php");
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
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.min.js"></script>
  <script>
    // GET request to check if the current user has a pending product to add
    $(document).ready(()=> {
        $.ajax({
            type: "GET",
            url: "prod-in-functions.php",
            data: {action: "reloadTable"},
            dataType: "JSON",
            success: function(data) {
                let tbody = document.getElementById("modal-tbody");
                if ( data != "Not found" ) {
                    data.forEach((item)=> {
                        let tr = document.createElement("tr");
                        tr.innerHTML = `<tr>
                                            <td>${item.barcode}</td>
                                            <td>${item.description}</td>
                                            <td>${item.in_quantity}</td>
                                            <td>${item.lot_no}</td>
                                            <td>${item.exp_date}</td>
                                        </tr>`;
                        tbody.appendChild(tr);
                        $("#prf").val(`${item.prf}`);
                        $("#prf").attr("readonly", true);
                        $("#added-by").val(`${item.added_by}`);
                    });
                    let fields = document.getElementById("receive-prod-form").querySelectorAll("input");
                    fields.forEach(field => {
                        if (field.name != "entry_date" && field.name != "action" && field.name != "prf" && field.name != "added-by" && field.name != "added-on") {
                            field.value = '';
                        }
                    });
                    
                    $("#add-stocks-btn").removeAttr("disabled");
                    $("#delete-all-btn").removeAttr("disabled");
                }
            },
            error: function(error, status, xhr) {
                console.error(error, status, xhr);
            }
        });
    });

    // GET request to check barcode if exist in db
    $("#barcode").on("change", ()=>{
        $("#receive-prod-form").on("submit", (e)=>{
            e.preventDefault();
        });
        let data = {"barcode": $("#barcode").val(), action: "get_product"};
        $.ajax({
            type: "GET",
            url: "prod-in-functions.php",
            data: data,
            dataType: "JSON",
            success: function(data) {
                if ( data == "Not found" ) {
                    let fields = document.getElementById("receive-prod-form").querySelectorAll("input");
                
                    fields.forEach(field => {
                        if ( field.name != "entry_date" && field.name != "action" && field.name != "prf" && field.name != "added-by" && field.name != "added-on"  ) {
                            field.value = "";
                        }
                    });
                    $("#not-enrolled-text").removeClass("d-none");
                    setInterval(()=>{
                        $("#not-enrolled-text").addClass("d-none");
                    }, 2000); 
                } else {
                    $("#description").val(data.description);
                    $("#supp").val(data.supplier);
                }    
            },
            error: function(status, error) {
                console.error(status, error);

            }   
        })
    });

    // Submit receive products
    $("#receive-prod-form").on("submit", function(e){
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "prod-in-functions.php",
            data: new FormData(this),
            contentType: false,
            processData:false,
            cache: false,
            success: function(data) {
                let tbody = document.getElementById("modal-tbody");
                let tr = document.createElement("tr");
                tr.innerHTML = `<tr>
                                    <td>${data.barcode}</td>
                                    <td>${data.description}</td>
                                    <td>${data.quantity}</td>
                                    <td>${data.lot}</td>
                                    <td>${data.exp}</td>
                                </tr>`
                tbody.appendChild(tr);

                let fields = document.getElementById("receive-prod-form").querySelectorAll("input");
                fields.forEach(field => {
                    if (field.name != "entry_date" && field.name != "action" && field.name != "prf" && field.name != "added-by" && field.name != "added-on") {
                        field.value = '';
                    }
                });
                $("#add-stocks-btn").removeAttr("disabled");
                $("#delete-all-btn").removeAttr("disabled");
            },
            error: function(error, status, xhr) {
                console.error(error, status, xhr);
            }
        });
    });

    // Add stocks to product in table
    $("#add-stocks-btn").on("click", ()=> {
        let data = new FormData();
        data.append("action", "add_stocks");

        $.ajax({
            type: "POST",
            url: "prod-in-functions.php",
            data: data,
            contentType: false,
            processData:false,
            cache: false,
            success: function() {
                swal.fire({
                    title: "Success!",
                    text: "Products were added to stocks!",
                    icon: "success",
                    confirmButtonText: "OK"
                  }).then((result) => {
                    if (result.isConfirmed) {
                        location.reload();
                    } else {
                        location.reload();
                    }
                  });
                // alert("Products were added to stocks!");
              
            },
            error: function(error) {
                console.error(error);
            }
        });
    });

    // View product details
    function viewModal(el) {
        $.ajax({
            type: "GET",
            url: "prod-in-functions.php",
            data: {"id": el.getAttribute("data-id"), action: "get_product_in"},
            dataType: "JSON",
            success: function(data) {        
                $("#id-details").val(data.id);
                $("#barcode-details").val(data.barcode);
                $("#desc-details").val(data.description);
                $("#quantity-details").val(data.in_quantity);
                $("#lot-details").val(data.lot_no);
                $("#exp-details").val(data.exp_date);
                $("#supp-details").val(data.supplier);
                $("#entry-details").val(data.entry_date);
                $("#added-by-details").val(data.added_by);
                $("#last-edit-details").val(data.last_edited); 
            },
            error: function(error) {
                console.log(error);
            }
          })
    }

    // Edit Product Details
    $("#update-btn").on("click", ()=> {
        $("#quantity-details").removeAttr("readonly");
        $("#lot-details").removeAttr("readonly");
        $("#exp-details").removeAttr("readonly");

        $("#update-btn").addClass("d-none");
        $("#save-cancel-btns").removeClass("d-none");
    });

    // edit product in
    $("#update-prod-in-form").on("submit", function(e){
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "prod-in-functions.php",
            data: new FormData(this),
            contentType: false,
            processData:false,
            cache: false,
            success: function(data) {
                if ( data == "success" ) {
                    console.log(data);
                    $('#update_success_text').removeClass('d-none');
                    setInterval(()=> {
                      location.reload();
                    }, 1000)
                  } else {
                    $('#update_error_text').removeClass('d-none');
                    setTimeout(()=> {
                      $('#update_error_text').addClass('d-none');
                    }, 5000)
                  }
                },
            error: function(error, status, xhr) {
                console.error(error, status, xhr);
                $('#update_error_text').removeClass('d-none');
                setTimeout(()=> {
                  $('#update_error_text').addClass('d-none');
                }, 5000)
            }
        });
    });

    // Cancel product update
    $('#details').on('hidden.bs.modal', function () {
        $("#save-cancel-btns").addClass("d-none");
        $("#update-btn").removeClass("d-none");

        $("#quantity-details").attr("readonly", true);
        $("#lot-details").attr("readonly", true);
        $("#exp-details").attr("readonly", true);
    })

    // Close Delete Modal
    $(".close-modal-delete1").on("click", ()=> {
        $("#delete-modal").modal("hide");
    });

    $(".close-modal-delete2").on("click", ()=> {
        $("#delete-modal").modal("hide");
    });

    // Delete product
    function deleteProducts() {
        let formData = new FormData();
        formData.append('action', 'delete_all');

        $.ajax({
          type: "POST",
          url: "prod-in-functions.php",
          data: formData,
          contentType: false,
          processData:false,
          cache: false,
          success: function() {
            location.reload();     
          },
          error: function(error, status) {
            console.error(error, status);
          }
        });
      }

    $(function () {
        $("#example1").DataTable({
          "order": [],
          "columnDefs": [{"className": "dt-center", "targets": "no_sort", "orderable": false}],
          "responsive": true, 
          "lengthChange": true, 
          "autoWidth": false,
          // "buttons": ["copy", "csv", "excel", "pdf", "print"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
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
