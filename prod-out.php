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

<body class="hold-transition sidebar-mini layout-fixed" >
  <div class="wrapper">

    <!-- Preloader -->
    <!-- <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="dist/img/normal_BFC_logo_latest.png" alt="AdminLTELogo" height="500" width="500">
    </div> -->

    <?php
    // ------ Navbar
    include("templates/navbar.php");
    // ------ Main Sidebar Container
    include("templates/sidebar.php");
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
        "columnDefs": [{
          "className": "dt-center",
          "targets": "_all"
        }],
        "responsive": true,
        "lengthChange": true,
        "scrollY": '500px',
        "scrollCollapse": true,
        "autoWidth": false,
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
        
        // Get the values from the form inputs
        var formData = $(this).serialize();
        
        // Use AJAX to send the form data to your PHP script to insert it into the database
        $.ajax({
            url: "post_prod-out.php",
            type: "POST",
            data: formData,
            success: function() {
                
              // Reload the table with the updated data
              reloadTable();
              // Reset the values of specific input fields
              $('#barcode').val('');
              $('#description').val('');
              $('#quantity').val('');
              $('#lot').val('');
              $('#exp_date').val('');
              $('#remarks').val('');
            }
        });
    });

    // Add a click event listener to the reload button
    $("#endorse").click(function(event) {
      // Prevent the form from submitting normally
      event.preventDefault();

      // Get the values from the form
      var endorsed_by = $('#endorsed_by').val();
      var myTable = $('#myTable tbody tr').val();
      var mrf = $('#mrf').val();
      var order_num = $('#order_num').val();

      if (mrf.length == 0 || order_num.length == 0){
        $(document).ready(function() {
          swal.fire({
            title: "error!",
            title: 'Something went wrong!',
            text: "Make sure the table is not empty",
            icon: "error",
            confirmButtonText: "OK"
          });
        });
      } else {
        $.ajax({
          url: "get_prod-out.php",
          type: "GET",
          data: {"endorsed_by": $("#endorsed_by").val(), action: "endorse_product"},
          dataType: "JSON",
          success: $(document).ready(function(data) {
            // // handle the response
            console.log(data)
            swal.fire({
              title: "Success!",
              text: "Product successfully endorsed",
              icon: "success",
              confirmButtonText: "OK"
            });
              // Reload the table with the updated data
              reloadTable();
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
            }
        )});
      }
    });
  });

  </script>

</body>

</html>