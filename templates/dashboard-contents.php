<?php
// Restrict user fron accessing the php file directly
if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
  /* 
    Up to you which header to send, some prefer 404 even if 
    the files does exist for security
    */
  header('HTTP/1.0 500 Internal Server Error', TRUE, 500);

  /* choose the appropriate page to redirect users */
  die(header('location: ../500.html'));
} else { ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-4 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <?php
                  // $sql = "SELECT SUM(quantity) as sum FROM endorse_history";
                  // Execute query and get result
                  // $result = $conn->query($sql);

                  // Fetch result and get count value
                  // if ($result->num_rows > 0) {
                  //   $row = $result->fetch_assoc();
                  //   $sum = $row["sum"];
                  // } else {
                  //   $sum = 0;
                  // }

                  ?>
                  <h3>150<sup style="font-size: 20px"> Items</sup></h3>

                  <p>Total Product In</p>
                </div>
                <div class="icon">
                  <i class="ion ion-ios-download-outline"></i>
                </div>
                <a href="prod-in.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <?php
                  $sql = "SELECT SUM(quantity) as sum FROM endorse_history";
                  // Execute query and get result
                  $result = $conn->query($sql);

                  // Fetch result and get count value
                  if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $sum = $row["sum"];
                    // Split integer data with comma
                    $formatted_data = number_format($sum);
                  } else {
                    $sum = 0;
                  }

                  ?>
                  <h3><?php echo $formatted_data ?><sup style="font-size: 20px"> Items</sup></h3>
                  <?php ?>
                  <p>Total Product Out</p>
                </div>
                <div class="icon">
                  <i class="ion ion-ios-upload-outline"></i>
                </div>
                <a href="prod-out.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <div class="col-lg-4 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <?php
                  $sql = "SELECT COUNT(*) as count FROM product_masterlist";
                  // Execute query and get result
                  $result = $conn->query($sql);

                  // Fetch result and get count value
                  if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $count  = $row["count"];
                    // Split integer data with comma
                    $formatted_data_count = number_format($count);
                  } else {
                    $count  = 0;
                  }

                  ?>
                  <h3><?php echo $formatted_data_count ?><sup style="font-size: 20px"> Items</sup></h3>
                  <?php ?>
                  <p>Total Product Registered</p>
                </div>
                <div class="icon">
                  <i class="fas fa-barcode"></i>
                </div>
                <a href="masterlist.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
          </div>

          <div class="card">
            <div class="card-header border-transparent">
              <h3 class="card-title font-weight-bold">Running out of stock items</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="table-responsive text-center">
                <table class="table m-0">
                  <thead>
                  <tr>
                    <th>Barcode</th>
                    <th>Description</th>
                    <th>Quantity</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    // Define low quantity threshold
                    $low_quantity_threshold = 10;

                    // Query to get low quantity data
                    $sql = "SELECT * FROM product_in WHERE in_quantity <= $low_quantity_threshold";

                    // Execute query and get result
                    $result = $conn->query($sql);

                    // Check if there is any data
                    if ($result->num_rows > 0) {
                        // Display low quantity data
                        while ($row = mysqli_fetch_assoc($result)) {
                            // echo "ID: " . $row["id"] . " - Quantity: " . $row["yourcolumn"] . "<br>";
                  ?>
                  <tr>
                    <td><?php echo $row["barcode"]?></td>
                    <td><?php echo $row["description"]?></td>
                    <td>
                      <div class="sparkbar" data-color="#00a65a" data-height="20"><?php echo $row["in_quantity"]?>  </div>
                    </td>
                  </tr>
                  <?php                      
                    }
                      } else {
                          echo "No data found.";
                      }
                  ?>  
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
              <a href="inventory.php" class="btn btn-sm btn-secondary float-right">View All</a>
            </div>
            <!-- /.card-footer -->
          </div>
          <!-- /.row -->
        </div>
                  
    </div>
    <!-- /.content-header -->
  </div>
  <!-- /.content-wrapper -->
<?php } ?>