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
  <title>Inventory | Masterlist</title>
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
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css">

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
                <a href="z-inventory.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inventory</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="z-masterlist.php" class="nav-link active">
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
    <?php
    // ------ Contents
    include("templates/masterlist-contents.php");
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
  <!-- bs-custom-file-input -->
  <script src="../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
  <script src="plugins/select-box-search-option/dist/js/jquery-searchbox.js"></script>
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>
  <!-- (Optional) Latest compiled and minified JavaScript translation files -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/i18n/defaults-*.min.js"></script>
  <script>
    $(document).ready(function() {
      $('.selectpicker1').selectpicker();
      $('.selectpicker2').selectpicker();
      $('.selectpicker3').selectpicker();
      $('.selectpicker4').selectpicker();
      document.getElementsByClassName("dropdown-toggle")[2].setAttribute("disabled", true);
      document.getElementsByClassName("dropdown-toggle")[3].setAttribute("disabled", true);
    });

    // View product details
    function viewModal1(el) {
      $.ajax({
        type: "GET",
        url: "masterlist-functions.php",
        data: {"barcode": el.getAttribute("data-id"), action: "get_product"},
        dataType: "JSON",
        success: function(data) {
          $("#barcode-modal-details").val(data.barcode);
          $("#desc-modal-details").val(data.description);
          $("#gen-modal-details").val(data.generic_name);
          $("#cat-modal-details").val(data.category);
          $("#supp-modal-details").val(data.supplier);
          $("#edited-modal-details").val(data.last_edited);
          $("#img-modal-details").attr("src", data.image);
        },
        error: function(error) {
          console.log(error);
        }
      })
    }

    // View product details
    function viewModal2(el) {
      $.ajax({
        type: "GET",
        url: "masterlist-functions.php",
        data: {"barcode": el.getAttribute("data-id"), action: "get_product"},
        dataType: "JSON",
        success: function(data) {
          $("#barcode-hidden").val(data.barcode);
          $("#barcode-modal").val(data.barcode);
          $("#desc-modal").val(data.description);
          $("#gen-modal").val(data.generic_name);
          $("#cat-modal").selectpicker('val', data.category);
          $("#supp-modal").selectpicker('val', data.supplier);
          $("#img-modal").attr("src", data.image);
        },
        error: function(error) {
          console.log(error);
        }
      })
    }

    // Edit product details
    function editDetails(el) {
      // enable save and cancel button
      $("#save-cancel-btns").removeClass("d-none");
      $(el).addClass("d-none");

      modal_fields = document.getElementById("edit").querySelectorAll("input");
      document.getElementsByClassName("dropdown-toggle")[2].removeAttribute("disabled");
      document.getElementsByClassName("dropdown-toggle")[3].removeAttribute("disabled");

      modal_fields.forEach(field => {

        if (field.id != "barcode-modal") {
            field.removeAttribute("readonly");
          if (field.id == "imageFile2") {
            $("#img-update-field").removeClass("d-none");
          }
        }
      });
    }

    // Remove input attributes
    function removeAttrInputs() {
      $("#description").removeAttr("disabled");
      $("#generic_name").removeAttr("disabled");
      $("#category").removeAttr("disabled");
      document.getElementsByClassName("dropdown-toggle")[0].removeAttribute("disabled");
      document.getElementsByClassName("dropdown-toggle")[1].removeAttribute("disabled");
      $("#imageFile").removeAttr("disabled");

      $("#description").val('');
      $("#generic_name").val('');
      $("#category").val('');
      $("#supp").val('');
      $("#file-label").html("Choose Image");
      $("#imageFile").val("");
    }

    // ------ Delete product
    function deleteProduct() {
      let barcode =  $("#barcode-hidden").val();
      let formData = new FormData();
      formData.append('action', 'delete');
      formData.append('barcode', barcode);
      
      $.ajax({
        type: "POST",
        url: "masterlist-functions.php",
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

    // ------ Cancel product update
    $('#edit').on('hidden.bs.modal', function (e) {
      $("#save-cancel-btns").addClass("d-none");
      $("#update-btn").removeClass("d-none");

      document.getElementsByClassName("dropdown-toggle")[2].setAttribute("disabled", true);
      document.getElementsByClassName("dropdown-toggle")[3].setAttribute("disabled", true);

      modal_fields = document.getElementById("edit").querySelectorAll("input");
      modal_fields.forEach(field => {
        if (field.id != "barcode-modal") {
          field.setAttribute("readonly", "");

          if (field.id == "imageFile2") {
            $("#img-update-field").addClass("d-none")
          }    
        } 
      });
    })

    // Cancel product enroll 
    $("#addnew").on('hidden.bs.modal', function(e) {
      $("#barcode").val('');
      $("#enroll_warning_text").addClass("d-none");
      $("#enroll-btn").removeAttr("disabled");
      removeAttrInputs();
    });

    // ------ Close Delete Modal
    $(".close-modal-delete1").on("click", ()=> {
      $("#delete-modal").modal("hide");
    });

    $(".close-modal-delete2").on("click", ()=> {
      $("#delete-modal").modal("hide");
    });

    // ------ Updating product image
    $("#imageFile2").on("change", (e)=> {
      let file = e.target.files[0];
      let url = URL.createObjectURL(file);
      $("#img-modal").attr("src", url);
    });

    $(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });

    // ------ Check if product is already enrolled
    $("#barcode").on("change", ()=> {
      $("enroll_form").on("submit", (e)=> {
        e.preventDefault();
      });
      $.ajax({
        type: "GET",
        url: "masterlist-functions.php",
        data: {"barcode": $("#barcode").val(), action: "get_product"},
        dataType: "JSON",
        success: function(data) {
          if (data != "Not found") {
            $("#description").attr("disabled", "");
            $("#generic_name").attr("disabled", "");
            document.getElementsByClassName("dropdown-toggle")[0].setAttribute("disabled", true);
            document.getElementsByClassName("dropdown-toggle")[1].setAttribute("disabled", true);
            $("#imageFile").attr("disabled", "");
      
            $("#barcode").val(data.barcode);
            $("#description").val(data.description);
            $("#generic_name").val(data.generic_name);
            $("#category").selectpicker('val', data.category);
            $('#supp').selectpicker('val', data.supplier);
            let imgName = data.image;
            let strip_imgName = imgName.replace("product-imgs/", '')
            $("#file-label").html(strip_imgName);
            $("#enroll_warning_text").removeClass("d-none");
            $("#enroll-btn").attr("disabled", "");
          }
          else {
            $("#enroll_warning_text").addClass("d-none");
            $("#enroll-btn").removeAttr("disabled");
            document.getElementById("description").focus();
            removeAttrInputs();
          }
        },
        error: function(error) {
          console.error(error);
        }
      })
    });

    // ------ Enrolling new product
    $("#enroll_form").on("submit", function(e) {
      e.preventDefault();
      $.ajax({
        type: "POST",
        url: "masterlist-functions.php",
        data: new FormData(this),
        contentType: false,
        processData:false,
        cache: false,
        success: function() {
          $('#enroll_success_text').removeClass('d-none');
          setInterval(()=> {
            location.reload();
          }, 1000)
        },
        error: function(error) {
          console.error(error);
          $('#enroll_error_text').removeClass('d-none');
          setTimeout(()=> {
            $('#enroll_error_text').addClass('d-none');
          }, 5000)
          $('#barcode').val('');
          $('#description').val('');
          $("#category").val('');
          $("#supp").val('');
          $('#imageFile').val('');
          $('#file-label').html("Choose Image");
        }
      });
    });

    // ------------ Updating Product
    $("#update_masterlist_form").on("submit", function(e) {
      e.preventDefault();
      $.ajax({
        type: "POST",
        url: "masterlist-functions.php",
        data: new FormData(this),
        contentType: false,
        processData:false,
        cache: false,
        success: function() {
          $('#update_success_text').removeClass('d-none');
          setInterval(()=> {
            location.reload();
          }, 750)       
        },
        error: function(error) {
          console.error(error);
          $('#update_error_text').removeClass('d-none');
          setTimeout(()=> {
            $('#update_error_text').addClass('d-none');
          }, 5000)
        }
      });
    });

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

    $(function () {
      bsCustomFileInput.init();
});

  </script>
</body>

</html>