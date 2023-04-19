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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.min.css">

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

            <li class="nav-item menu-open ">
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
                  <a href="inventory.php" class="nav-link">
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

  <!-- bs-custom-file-input -->
  <script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.min.js"></script>

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>

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
    function viewModal(el) {
      $.ajax({
        type: "GET",
        url: "masterlist-functions.php",
        data: {
          id: el.getAttribute("data-id"),
          action: "get_product_view"
        },
        dataType: "JSON",
        success: function(data) {
          $("#id-hidden").val(data.id);
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

        field.removeAttribute("readonly");
        if (field.id == "imageFile2") {
          $("#img-update-field").removeClass("d-none");
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
      let id = $("#id-hidden").val();
      let formData = new FormData();
      formData.append('action', 'delete');
      formData.append('id', id);

      $.ajax({
        type: "POST",
        url: "masterlist-functions.php",
        data: formData,
        contentType: false,
        processData: false,
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
    $('#edit').on('hidden.bs.modal', function(e) {
      $("#save-cancel-btns").addClass("d-none");
      $("#update-btn").removeClass("d-none");

      document.getElementsByClassName("dropdown-toggle")[2].setAttribute("disabled", true);
      document.getElementsByClassName("dropdown-toggle")[3].setAttribute("disabled", true);

      modal_fields = document.getElementById("edit").querySelectorAll("input");
      modal_fields.forEach(field => {

        field.setAttribute("readonly", "");
        if (field.id == "imageFile2") {
          $("#img-update-field").addClass("d-none")
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
    $(".close-modal-delete1").on("click", () => {
      $("#delete-modal").modal("hide");
    });

    $(".close-modal-delete2").on("click", () => {
      $("#delete-modal").modal("hide");
    });

    // ------ Updating product image
    $("#imageFile2").on("change", (e) => {
      let file = e.target.files[0];
      let url = URL.createObjectURL(file);
      $("#img-modal").attr("src", url);
    });

    $(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });

    // ------ Check if product is already enrolled
    $("#barcode").on("change", () => {
      $("#enroll_form").on("submit", (e) => {
        e.preventDefault();
      });
      $.ajax({
        type: "GET",
        url: "masterlist-functions.php",
        data: {
          barcode: $("#barcode").val(),
          action: "get_product"
        },
        dataType: "JSON",
        success: function(data) {
          if (data != "Not found") {
            $("#enroll-submit-btn").attr("disabled", true);
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
          } else {
            $("#enroll-submit-btn").attr("disabled", false);
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

    // ------ Check if product is already enrolled
    $("#barcode-modal").on("change", () => {
      $("update_masterlist_form").on("submit", (e) => {
        e.preventDefault();
      });
      $.ajax({
        type: "GET",
        url: "masterlist-functions.php",
        data: {
          "barcode": $("#barcode").val(),
          action: "get_product"
        },
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
          } else {
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
        processData: false,
        cache: false,
        success: function() {
          $('#enroll_success_text').removeClass('d-none');
          setInterval(() => {
            location.reload();
          }, 1000)
        },
        error: function(error) {
          console.error(error);
          $('#enroll_error_text').removeClass('d-none');
          setTimeout(() => {
            $('#enroll_error_text').addClass('d-none');
          }, 5000)
          $('#barcode').val('');
          $('#description').val('');
          $("#category").reset();
          $("#supp").reset();
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
        processData: false,
        cache: false,
        success: function() {
          $('#update_success_text').removeClass('d-none');
          setInterval(() => {
            location.reload();
          }, 750)
        },
        error: function(error) {
          console.error(error);
          $('#update_error_text').removeClass('d-none');
          setTimeout(() => {
            $('#update_error_text').addClass('d-none');
          }, 5000)
        }
      });
    });

    $(document).ready(function() {
      $("#example1").DataTable({
        "dom": "B<'row'<'col-6'l><'col-6 text-right'f>><'row'<'col-sm-12'tr>><'row'<'col-sm-12'ip>>",
        "processing": true,
        "serverSide": true,
        "ajax": "fetchDataMaster.php",
        "order": [
          [2, 'asc']
        ],
        "columnDefs": [{
          "targets": [0, 6],
          "orderable": false,
        }],
        "responsive": true,
        "lengthChange": true,
        "autoWidth": false,
        lengthMenu: [10, 50, 100, 500, 1000],
        "buttons": [{
            extend: 'copy',
            title: function() {
              var printTitle = 'MASTERLIST';
              return printTitle
            },
            exportOptions: {
              columns: [1, 2, 3, 4, 5]
            }
          },
          {
            extend: 'excel',
            title: function() {
              var printTitle = 'MASTERLIST';
              return printTitle
            },
            exportOptions: {
              columns: [1, 2, 3, 4, 5]
            }
          },
          {
            extend: 'print',
            exportOptions: {
              columns: [1, 2, 3, 4, 5]
            },
            title: function() {
              var printTitle = 'MASTERLIST';
              return printTitle
            },
            customize: function(win) {
              $(win.document.body).find('table').addClass('display').css('font-size', '11px');
              $(win.document.body).find('tr:nth-child(odd) td').each(function(index) {
                $(this).css('background-color', '#D0D0D0');
              });
              $(win.document.body).find('h1').css('text-align', 'center');
            }
          },
        ]
        // "buttons": ["copy", "csv", "excel", "pdf", "print"]
      }).buttons().container().appendTo($('#card_toolss'));
    });

    $("#tablebody2").on("change", () => {
      const selectRows = document.querySelectorAll('.selectRow');
      for (i = 0; i < selectRows.length; i++) {
        if (selectRows[i].checked) {
          $('#delete-items').prop("disabled", false)
          $('#selectAll').prop("checked", false)
          break
        } else if (!selectRows[i].checked) {
          $('#delete-items').prop("disabled", true)
        }
      }
    })

    $("#selectAll").on("click", () => {
      const selectAll = document.getElementById('selectAll');
      const selectRows = document.querySelectorAll('.selectRow');
      selectAll.addEventListener('change', function() {
        if (selectAll.checked) {
          selectRows.forEach(function(row) {
            row.checked = selectAll.checked;
          });
          $('#delete-items').prop("disabled", false)
        } else if (!selectAll.checked) {
          selectRows.forEach(function(row) {
            row.checked = selectAll.checked;
          });
          $('#delete-items').prop("disabled", true)
        }
      });
    })

    $("#delete-items").on("click", () => {
      const selectRows = document.querySelectorAll('.selectRow');
      let prod_ids = []
      let data = new FormData()
      selectRows.forEach(function(row) {
        if (row.checked) {
          prod_ids.push(parseInt(row.value));
        }
      });
      console.log(prod_ids)
      data.append("prod_ids", prod_ids)
      data.append("action", "delete_items")
      $.ajax({
        type: "POST",
        url: "masterlist-functions.php",
        data: data,
        contentType: false,
        processData: false,
        cache: false,
        success: function(data) {
          console.log(data)
          location.reload();
        },
        error: function(error, status) {
          console.error(error, status);
        }
      });
    });

    $("#sample_form").on("submit", function(e) {
      e.preventDefault();

      var x = document.getElementById("myAudio");
      x.play();

      $('#save_excel_data').attr('disabled', true);
      $('#name_upload').attr('hidden', false);
      $('#file_group').attr('hidden', true);

      let up_name = document.getElementById("excel").files[0].name

      $('#upload_name').val(up_name);
      $('#import_file_button').attr('disabled', true);
      $('#save_excel_data').html('<i class="fas fa-spinner fa-pulse"></i> Importing...');
      $('#gif').css('display', 'block');

      $.ajax({
        type: "POST",
        url: "functions.php",
        data: new FormData(this),
        contentType: false,
        processData: false,
        cache: false,
        success: function(data) {
          $(document).ready(function() {
            Swal.fire({
              title: 'Successfully Uploaded File',
              text: 'File has been successfully imported',
              confirmButtonColor: '#3085d6',
              confirmButtonText: 'Okay',
              imageUrl: 'dist/img/mr-bean-yes.gif',
              imageWidth: 400,
              imageHeight: 300,
              imageAlt: 'Custom image',
            }).then((result) => {
              if (result.isConfirmed) {
                x.pause();
                window.location.href = "masterlist.php";
              } else {
                x.pause();
                window.location.href = "masterlist.php";
              }
            })
          })
        },
        error: function(error) {
          console.error(error);
        }

      });
    });
  </script>


  <script type="text/javascript">
    function DownloadFile(fileName) {
      //Set the File URL.
      var url = "Databases/" + fileName;

      //Create XMLHTTP Request.
      var req = new XMLHttpRequest();
      req.open("GET", url, true);
      req.responseType = "blob";
      req.onload = function() {
        //Convert the Byte Data to BLOB object.
        var blob = new Blob([req.response], {
          type: "application/octetstream"
        });

        //Check the Browser type and download the File.
        var isIE = false || !!document.documentMode;
        if (isIE) {
          window.navigator.msSaveBlob(blob, fileName);
        } else {
          var url = window.URL || window.webkitURL;
          link = url.createObjectURL(blob);
          var a = document.createElement("a");
          a.setAttribute("download", fileName);
          a.setAttribute("href", link);
          document.body.appendChild(a);
          a.click();
          document.body.removeChild(a);
        }
      };
      req.send();
    };

    $("#excel").on("change", () => {
      // web-system-masterlist-template.xlsx
      let file = document.getElementById("excel")
      if (file.files.length === 0) {
        return
      } else if (file.files.length != 0) {
        let fileUploaded = file.files[0].name
        if (fileUploaded === 'web-system-masterlist-template.xlsx') {
          $("#save_excel_data").removeAttr("disabled");
        } else {
          file.value = ''
          $("#excel-label").html('Choose File')
          $("#save_excel_data").attr("disabled", true);
          Swal.fire({
            icon: 'error',
            title: 'Please use the template provided',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Okay',
          });
        }
      }
    });

    $(function() {
      bsCustomFileInput.init();
    });
  </script>


</body>

</html>