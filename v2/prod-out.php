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
  <title>Inventory | Product Out</title>
  <link rel="icon" type="image/png" href="dist/img/valuemed-logo1.png">

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

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light justify-content-between">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="dashboard.php" class="nav-link">Home</a>
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


    <?php
    // ------ Contents
    include("templates/prod-out-contents.php");
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
        // "columnDefs": [{
        //   "className": "text-center",
        //   "visible": true,
        //   "searchable": false,
        //   "targets": [7],
        // }],
        "columnDefs": [{
          "className": "text-center",
          "visible": false,
          "searchable": true,
          "targets": [9],
        }, {
          "className": "text-center",
          "visible": true,
          "searchable": false,
          "targets": [7],
        },{ "width": "15%", "targets": 0, "data":"description",
          render: function(data, type, row, meta) {
           if (type === 'display') {
             data = typeof data === 'string' && data.length > 15 ? data.substring(0, 15) + '...' : data;
           }
            return data;
        } }
      ],
        "responsive": true,
        "lengthChange": true,
        // "scrollY": '500px',
        // "scrollCollapse": true,
        "autoWidth": false,
        "order": [
          [6, 'desc']
        ],
        "buttons": [{
            extend: 'copy',
            title: function() {
              var printTitle = 'ENDORSEMENT FORM ';
              return printTitle
            },
            exportOptions: {
              columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9]
            }
          },
          {
            extend: 'excel',
            title: function() {
              var printTitle = 'ENDORSEMENT FORM ';
              return printTitle
            },
            exportOptions: {
              columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9]
            }
          },
          {
            extend: 'print',
            exportOptions: {
              columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9]
            },
            title: function() {
              var printTitle = 'ENDORSEMENT FORM ';
              return printTitle
            },
            customize: function(win) {
              $(win.document.body).find('table').addClass('display').css('font-size', '10px');
              $(win.document.body).find('tr:nth-child(odd) td').each(function(index) {
                $(this).css('background-color', '#D0D0D0');
              });
              $(win.document.body).find('h1').css('text-align', 'center');
            }
          },
        ]
        // "buttons": ["copy", "excel", "print"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });

    $(function() {
      $("#example2").DataTable({
        "columnDefs": [{
          "className": "dt-center",
          "targets": "_all"
        },{ "width": "15%", "targets": 0, "data":"description",
          render: function(data, type, row, meta) {
           if (type === 'display') {
             data = typeof data === 'string' && data.length > 15 ? data.substring(0, 15) + '...' : data;
           }
            return data;
        } }
      ],
        "responsive": true,
        "lengthChange": true,
        // "scrollY": '500px',
        // "scrollCollapse": false,
        "autoWidth": false,
        "order": [
          [5, 'desc']
        ],
        "buttons": [{
            extend: 'copy',
            title: function() {
              var printTitle = 'ENDORSEMENT FORM ';
              return printTitle
            },
            exportOptions: {
              columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9]
            }
          },
          {
            extend: 'excel',
            title: function() {
              var printTitle = 'ENDORSEMENT FORM ';
              return printTitle
            },
            exportOptions: {
              columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9]
            }
          },
          {
            extend: 'print',
            exportOptions: {
              columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9]
            },
            title: function() {
              var printTitle = 'ENDORSEMENT FORM ';
              return printTitle
            },
            customize: function(win) {
              $(win.document.body).find('table').addClass('display').css('font-size', '10px');
              $(win.document.body).find('tr:nth-child(odd) td').each(function(index) {
                $(this).css('background-color', '#D0D0D0');
              });
              $(win.document.body).find('h1').css('text-align', 'center');
            }
          },
        ]
        // "buttons": ["copy", "excel", "pdf", "print"]
      }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
    });

    $(function() {
      $("#example3").DataTable({
        "columnDefs": [{
          "className": "dt-center",
          "targets": "_all",
          "orderable": false
        },{ "width": "15%", "targets": 0, "data":"description",
          render: function(data, type, row, meta) {
           if (type === 'display') {
             data = typeof data === 'string' && data.length > 15 ? data.substring(0, 15) + '...' : data;
           }
            return data;
        } }
      ],
        "searching": false,
        "info": false,
        "responsive": true,
        "lengthChange": true,
        "paging": false,
        // "scrollY": '500px',
        // "scrollCollapse": true,
        "autoWidth": false,
        "order": [],
        // "buttons": ["copy", "csv", "excel", "pdf", "print"]
      }).buttons().container().appendTo('#example3_wrapper .col-md-6:eq(0)');
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
            console.log(data.length)
            if (data.length >= 1) {
              console.log('norems')
              data.forEach(function(row) {
                $("#branch111").attr('hidden', true);
                $("#branch222").attr('hidden', false);
                $("#branch22").val(row.branch);
                $("#branch").val(row.branch);
                $("#branch22").prop('readonly', true);

                $("input[name='mrff']").val(row.mrf);
                $("input[name='mrff']").prop('readonly', true);
                $("input[name='order_numm']").val(row.order_num);
                $("input[name='order_numm']").prop('readonly', true);

                $("button[name='reloadBtn']").prop("disabled", false);
                $("#barcode2").prop("disabled", false);
                $("#description2").prop("disabled", false);
                $("#quantity2").prop("disabled", false);
                $("#lot2").prop("disabled", false);
                $("#exp_date2").prop("disabled", false);
                $("#remarks2").prop("disabled", false);
              });
            } else {
              console.log('alaws')
              data.forEach(function(row) {
                $("#branch111").attr('hidden', false)
                $("#branch222").attr('hidden', true)
                $("#branch22").val('')
                $("input[name='mrff']").val('');
                $("input[name='order_numm']").val('');
              });
            }

            // Clear the table
            var tableBody = document.querySelector('#myTable tbody');
            tableBody.innerHTML = '';
            // Populate the table with the new data
            data.forEach(function(row) {
              console.log(row)
              var tr = document.createElement('tr');
              tr.innerHTML = `<td style="overflow: hidden;
                  text-overflow: ellipsis;
                  display: -webkit-box;
                  -webkit-line-clamp: 1;
                          line-clamp: 0;
                  -webkit-box-orient: vertical;" title=${row.barcode}>` + row.barcode + '</td><td>' +
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

        // Get the values from the form
        var quantity2 = $('#quantity2').val();

        if (quantity2 === '0') {
          swal.fire({
            title: "Ooops!",
            text: "Quantity is zero, Can't endorse product",
            icon: "error",
            confirmButtonText: "OK"
          })
        } else {
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
        }
      });

      // Add a click event
      $("#endorse").click(function(event) {
        // Prevent the form from submitting normally
        event.preventDefault();

        // Get the values from the form
        var endorsed_by = $('#endorsed_by').val();
        var mrf = $('#mrf').val();
        var order_num = $('#order_num').val();

        var tableBody = document.getElementById('myTable');
        console.log(tableBody.rows.length)

        if (tableBody.rows.length <= 1) {
          console.log("The DataTable is empty");
          swal.fire({
            title: "Ooops!",
            text: "Table is empty. Please add items before endorse",
            icon: "error",
            confirmButtonText: "OK"
          })
        } else {
          $.ajax({
            url: "get_prod-out.php",
            type: "GET",
            data: {
              "endorsed_by": $("#endorsed_by").val(),
              action: "endorse_product"
            },
            dataType: "JSON",
            success: $(document).ready(function(data) {
              $('#branch').val('');
              $('#mrf').val('');
              $('#order_num').val('');
              $('#barcode').val('');
              $('#description').val('');
              $('#quantity').val('');
              $('#lot').val('');
              $('#exp_date').val('');
              $('#remarks').val('');
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
        }
      });

      // Add a click event
      $("#cancelendorse").click(function(event) {
        // Prevent the form from submitting normally
        event.preventDefault();

        // Get the values from the form
        var endorsed_by = $('#endorsed_by').val();

        $.ajax({
          url: "get_prod-out.php",
          type: "GET",
          data: {
            "endorsed_by": $("#endorsed_by").val(),
            action: "cancelendorse"
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

            $("#branch111").attr('hidden', false);
            $("#branch222").attr('hidden', true);
            $("#branch22").val('')

            console.log(data)
            swal.fire({
              title: "Success!",
              text: "Product successfully deleted",
              icon: "success",
              confirmButtonText: "OK"
            }).then((result) => {
              if (result.isConfirmed) {
                reloadTable();
              } else {
                reloadTable();
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

      $("#barcode2").on("change", function() {
        var barcode2 = $(this).val();
        console.log(barcode2)

        $.ajax({
          type: "GET",
          url: "find_masterlist.php",
          data: {
            "barcode2": barcode2,
            action: "get_barcode"
          },
          dataType: "JSON",
          success: function(data) {
            console.log(data)
            if (data != "Not found") {
              $("#description2").prop("readonly", false);
              $("#description2").val(data.description);
              $("#quantity2").attr('placeholder', 'Stock: ' + data.stock);
              $("#quantity2").attr('max', data.stock);
            } else {
              $("#description2").prop("readonly", true);
              $("#description2").val("Product Not Found or Out of stock");
              $("#quantity2").attr('placeholder', '');
              $("#barcode2").val("");
              $("#barcode2").focus();
              swal.fire({
                title: "Ooops!",
                text: "Scanned product not found or out of stock",
                icon: "error",
                // showConfirmButton: false,
                timer: 1000,
                confirmButtonText: "OK"
              })
              // .then((result) => {
              //   if (result.isConfirmed) {

              //   }
              // });
            }
          }
        })
      });

    });
  </script>

  <script>
    $(document).ready(function() {
      // Submit form using AJAX
      $('#search_form').submit(function(event) {
        event.preventDefault(); // Prevent page from reloading
        $.ajax({
          url: 'search_prod-out.php',
          type: 'post',
          dataType: 'json',
          data: $('#search_form').serialize(),
          success: function(data) {
            console.log(data)
            // Clear old data from the table
            // $('#example3 tbody').empty();
            var mrf = $('#mrf_search');
            var tableBody = document.querySelector('#example33 tbody');
            tableBody.innerHTML = '';

            if (data.length == "0") {
              swal.fire({
                title: "Ooops!",
                text: "MRF not found",
                icon: "error",
                confirmButtonText: "OK"
              }).then((result) => {
                if (result.isConfirmed) {
                  mrf.val('');
                  console.log(tableBody)
                } else {
                  mrf.val('');
                }
              });
            } else {
              // Append new data to the table
              data.forEach(function(row) {
                var tr = document.createElement('tr');
                tr.innerHTML = '<td>' + row.barcode + '</td><td>' +
                  row.description + '</td><td>' +
                  row.quantity + '</td><td>' +
                  row.branch + '</td><td>' +
                  row.mrf + '</td>'
                tableBody.appendChild(tr);
              });
              console.log(tableBody)
            }
          }
        });
      });

      $("#dispatchall").click(function(event) {
        // Prevent the form from submitting normally
        event.preventDefault();

        // Get the values from the form
        var mrf_search = $('#mrf_search').val();
        console.log(mrf_search)

        var tableBody = document.getElementById('example33');
        console.log(tableBody.rows.length)


        $.ajax({
          url: "get_prod-out.php",
          type: "GET",
          data: {
            "mrf_search": $("#mrf_search").val(),
            action: "mrfsearch"
          },
          dataType: "JSON",
          success: $(document).ready(function(data) {
            console.log('data')
            console.log(data)

            if (tableBody.rows.length <= 1) {
              console.log("The DataTable is empty");
              swal.fire({
                title: "Ooops!",
                text: "Table is empty. Please search valid MRF",
                icon: "error",
                confirmButtonText: "OK"
              })
            } else {
              swal.fire({
                title: "Success!",
                text: "Product successfully dispatch",
                icon: "success",
                confirmButtonText: "OK"
              }).then((result) => {
                if (result.isConfirmed) {
                  location.reload();
                } else {
                  location.reload();
                }
              });
            }
          })
        });
      });
    });
  </script>

  <script>
    $(document).ready(function() {
      // Submit form using AJAX

      $('#search_form2').submit(function(event) {
        event.preventDefault(); // Prevent page from reloading
        $.ajax({
          url: 'search_prod-out_2.php',
          type: 'post',
          dataType: 'json',
          data: $('#search_form2').serialize(),
          success: function(data) {
            console.log(data)
            // Clear old data from the table
            // $('#example3 tbody').empty();
            var mrf = $('#mrf_search2');
            var tableBody = document.querySelector('#example8 tbody');
            tableBody.innerHTML = '';

            if (data.length == "0") {
              swal.fire({
                title: "Ooops!",
                text: "MRF not found",
                icon: "error",
                confirmButtonText: "OK"
              }).then((result) => {
                if (result.isConfirmed) {
                  mrf.val('');
                } else {
                  mrf.val('');
                }
              });
            } else {
              // Append new data to the table
              data.forEach(function(row) {
                var tr = document.createElement('tr');
                tr.innerHTML = '<td>' + row.barcode + '</td><td>' +
                  row.description + '</td><td>' +
                  row.quantity + '</td><td>' +
                  row.branch + '</td><td>' +
                  row.mrf + '</td>'
                tableBody.appendChild(tr);
              });
            }
          }
        });
      });

      $("#deleteall").click(function(event) {
        // Prevent the form from submitting normally
        event.preventDefault();

        var tableBody = document.getElementById('example8');
        console.log(tableBody.rows.length)

        // Get the values from the form
        var mrf_search2 = $('#mrf_search2').val();
        console.log(mrf_search2)
        $.ajax({
          url: "get_prod-out.php",
          type: "GET",
          data: {
            "mrf_search2": $("#mrf_search2").val(),
            action: "mrfsearch2"
          },
          dataType: "JSON",
          success: $(document).ready(function(data) {
            if (tableBody.rows.length <= 1) {
              console.log("The DataTable is empty");
              swal.fire({
                title: "Ooops!",
                text: "Table is empty. Please search valid MRF",
                icon: "error",
                confirmButtonText: "OK"
              })
            } else {
              swal.fire({
                title: "Success!",
                text: "Product successfully deleted",
                icon: "success",
                confirmButtonText: "OK"
              }).then((result) => {
                if (result.isConfirmed) {
                  location.reload();
                } else {
                  location.reload();
                }
              });
            }
          })
        });
      });
    });
  </script>

  <script>
    // For Error Handling
    $(document).ready(function() {
      $("#branch").on("change", function() {
        $("input[name='mrff']").prop("readonly", false);
      });

      $("input[name='mrff']").on("input", function() {
        $("input[name='order_numm']").prop("readonly", false);
      });

      $("input[name='order_numm']").on("input", function() {
        $("button[name='reloadBtn']").prop("disabled", false);
        $("#barcode2").prop("disabled", false);
        $("#description2").prop("disabled", false);
        $("#quantity2").prop("disabled", false);
        $("#lot2").prop("disabled", false);
        $("#exp_date2").prop("disabled", false);
        $("#remarks2").prop("disabled", false);
      });

      $("input[name='mrff']").on("blur", function() {
        var value = $(this).val();
        if (value === "") {
          $("input[name='order_numm']").val('');
          $("input[name='order_numm']").prop("readonly", true);
          $("button[name='reloadBtn']").prop("disabled", true);
          $("#barcode2").prop("disabled", true);
          $("#description2").prop("disabled", true);
          $("#quantity2").prop("disabled", true);
          $("#lot2").prop("disabled", true);
          $("#exp_date2").prop("disabled", true);
          $("#remarks2").prop("disabled", true);
        }
      });

      $("input[name='order_numm']").on("blur", function() {
        var value = $(this).val();
        if (value === "") {
          $("button[name='reloadBtn']").prop("disabled", true);
          $("#barcode2").prop("disabled", true);
          $("#description2").prop("disabled", true);
          $("#quantity2").prop("disabled", true);
          $("#lot2").prop("disabled", true);
          $("#exp_date2").prop("disabled", true);
          $("#remarks2").prop("disabled", true);
        }
      });

      $("button[name='cancelendorse']").on("click", function() {
        $("#branch").val('');
        $("input[name='mrff']").prop("readonly", true);
        $("input[name='order_numm']").prop("readonly", true);
        $("input[name='mrff']").val('');
        $("input[name='order_numm']").val('');
        $("#quantity2").attr('placeholder', '');

        $("#barcode2").prop("disabled", true);
        $("#description2").prop("disabled", true);
        $("#quantity2").prop("disabled", true);
        $("#lot2").prop("disabled", true);
        $("#exp_date2").prop("disabled", true);
        $("#remarks2").prop("disabled", true);

        $("#barcode2").val('');
        $("#description2").val('');
        $("#quantity2").val('');
        $("#lot2").val('');
        $("#exp_date2").val('');
        $("#remarks2").val('');


        $("button[name='reloadBtn']").prop("disabled", true);
      });

      $("button[name='reloadBtn']").on("click", function() {
        // $("button[name='endorse']").prop("disabled", false);
        // $("button[name='cancelendorse']").prop("disabled", false);
        $("#quantity2").attr('placeholder', '');
      });

      // Get the input field
      var quantityInput = $("#quantity2");

      // Listen for the "keyup" event on the input field
      quantityInput.keyup(function() {
        // Get the maximum allowed value
        var max = parseInt(quantityInput.attr("max"));

        // Get the current value of the input field
        var currentValue = parseInt(quantityInput.val());

        // If the current value is greater than the maximum allowed value
        if (currentValue > max) {
          // Set the value of the input field to the maximum allowed value
          quantityInput.val(max);
        }
      });


    });
  </script>

  <script>
    // ------ Close Delete Modal
    $(".close-modal-delete1").on("click", () => {
      $("div[name='delete_modal']").modal("hide");
    });

    $(".close-modal-delete2").on("click", () => {
      $("div[name='delete_modal']").modal("hide");
    });
  </script>

</body>

</html>