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
              <div class="small-box bg-success">
                <div class="inner">
                  <?php
                  $date = date_create();
                  $date = date_format($date, 'm-d-Y');
                  $sql7 = "SELECT SUM(in_quantity) as sum FROM product_in_final WHERE entry_date='$date'";
                  // Execute query and get result
                  $result7 = $conn->query($sql7);

                  // Fetch result and get count value
                  if ($result7->num_rows > 0) {
                    $row7 = $result7->fetch_assoc();
                    $sum = $row7["sum"];
                    // Split integer data with comma
                    $formatted_data = number_format($sum);
                  } else {
                    $sum = 0;
                  }

                  ?>
                  <h3><?php echo $formatted_data ?><sup style="font-size: 20px"> Items</sup></h3>

                  <p>Total Product In Today</p>
                </div>
                <div class="icon">
                  <i class="ion ion-ios-download-outline" style="color: #ffffff;"></i>
                </div>
                <a href=<?php
                              if ($_SESSION["login_user"]["is_superuser"] == '1') {
                                echo 'prod-in.php';
                              } else if ($_SESSION["login_user"]["is_superuser"] == '0') {
                                echo 'z-prod-in.php';
                              }
                          ?> class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <?php
                  $date2 = date_create();
                  $date2 = date_format($date2, 'm-d-Y');
                  $sql2 = "SELECT SUM(quantity) as sum FROM endorse_history WHERE endorsed_date='$date2';";
                  // Execute query and get result
                  $result2 = $conn->query($sql2);

                  // Fetch result and get count value
                  if ($result2->num_rows > 0) {
                    $row2 = $result2->fetch_assoc();
                    $sum2 = $row2["sum"];
                    // Split integer data with comma
                    $formatted_data2 = number_format($sum2);
                  } else {
                    $sum2 = 0;
                  }

                  ?>
                  <h3><?php echo $formatted_data2 ?><sup style="font-size: 20px"> Items</sup></h3>
                  <?php ?>
                  <p>Total Product Out Today</p>
                </div>
                <div class="icon">
                  <i class="ion ion-ios-upload-outline" style="color: #ffffff;"></i>
                </div>
                <a href=<?php
                              if ($_SESSION["login_user"]["is_superuser"] == '1') {
                                echo 'prod-out.php';
                              } else if ($_SESSION["login_user"]["is_superuser"] == '0') {
                                echo 'z-prod-out.php';
                              }
                          ?> class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <div class="col-lg-4 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
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
                  <i class="fas fa-barcode" style="color: #ffffff;"></i>
                </div>
                <a href=<?php
                              if ($_SESSION["login_user"]["is_superuser"] == '1') {
                                echo 'masterlist.php';
                              } else if ($_SESSION["login_user"]["is_superuser"] == '0') {
                                echo 'z-masterlist.php';
                              }
                          ?> class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
          </div>

          <div class="row">
            <div class="col-md-8">
              <div class="card ">
                <div class="card-header border-transparent bg-secondary">
                  <h3 class="card-title font-weight-bold">Running out of stock items</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus" style="color: #ffffff;"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive table-hover table-sm table-borderless table-md text-center">
                    <table class="table m-0">
                      <thead class="thead-light ">
                        <tr>
                          <th>Description</th>
                          <th>Category</th>
                          <th>Quantity</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php

                        // Query to get maximum value of the column
                        // $sql_max = "SELECT MAX(allocation) as max_value FROM inventory";

                        // // Execute query and get result
                        // $result_max = $conn->query($sql_max);

                        // // Define low quantity threshold
                        // $low_quantity_threshold = 100;

                        // Check if there is any data
                        // if ($result_max->num_rows > 0) {
                        //   // Get the maximum value
                        //   $row_max = mysqli_fetch_assoc($result_max);
                        //   $max_value = $row_max["max_value"];

                        //   // Calculate 20% of the maximum value
                        //   $low_quantity_threshold = $max_value * 0.3;

                        // Query to get low quantity data
                        $sql = "SELECT * FROM inventory WHERE sa_percentage <= 40 ORDER BY stock ASC LIMIT 15";

                        // Execute query and get result
                        $result = $conn->query($sql);

                        // Check if there is any data
                        if ($result->num_rows > 0) {
                          // Display low quantity data
                          while ($row = mysqli_fetch_assoc($result)) {
                            // echo "ID: " . $row["id"] . " - Quantity: " . $row["yourcolumn"] . "<br>";                       
                        ?>
                            <tr>
                              <td><?php echo $row["description"] ?></td>
                              <td><?php echo $row["category"] ?></td>
                              <td>
                                <div class="sparkbar text-danger font-weight-bold" data-color="#00a65a" data-height="20"><?php echo $row["stock"] ?> </div>
                              </td>
                            </tr>
                        <?php
                          }
                        } else {
                          echo "No data found.";
                        }
                        // } else {
                        //   echo "No data found.";
                        // }
                        ?>
                      </tbody>
                    </table>

                  </div>
                </div>
                <div class="card-footer clearfix bg-secondary">
                  <a href=<?php
                              if ($_SESSION["login_user"]["is_superuser"] == '1') {
                                echo 'inventory.php';
                              } else if ($_SESSION["login_user"]["is_superuser"] == '0') {
                                echo 'z-inventory.php';
                              }
                          ?> class="btn btn-sm btn-info float-right">View All Product</a>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <!-- PRODUCT LIST -->
              <div class="card">
                <div class="card-header bg-success">
                  <h3 class="card-title font-weight-bold">Top Sales</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool " data-card-widget="collapse">
                      <i class="fas fa-minus" style="color: #ffffff;"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body p-0">
                  <ul class="products-list product-list-in-card pl-2 pr-2">
                    <?php
                    $date = date_create();
                    $date = date_format($date, 'm-d-Y');
                    // Query to get recent data
                    $sql = "SELECT * FROM endorse_history ORDER BY quantity AND endorsed_date ASC LIMIT 3";

                    // Execute query and get result
                    $result = $conn->query($sql);

                    // Check if there is any data
                    if ($result->num_rows > 0) {
                      // Display data
                      while ($row = mysqli_fetch_assoc($result)) {
                        // echo "ID: " . $row["id"] . " - Name: " . $row["name"] . " - Date: " .
                        $barcode =  $row["barcode"];
                        $barcode2 =  $row["barcode"];
                    ?>
                        <li class="item">
                          <div class="product-img">
                            <?php
                            $query2 = "SELECT image FROM product_masterlist WHERE barcode = '$barcode'";
                            $result2 = mysqli_query($conn, $query2);
                            $check_row = mysqli_num_rows($result2);
                            while ($row2 = mysqli_fetch_array($result2)) {
                            ?>
                              <img src="<?php echo $row2["image"] ?>" alt="Product Image" class="img-size-50">
                            <?php } ?>
                          </div>
                          <div class="product-info">
                            <a href=<?php
                                        if ($_SESSION["login_user"]["is_superuser"] == '1') {
                                          echo 'masterlist.php';
                                        } else if ($_SESSION["login_user"]["is_superuser"] == '0') {
                                          echo 'z-masterlist.php';
                                        }
                                    ?> class="product-title"><?php echo $row["description"] ?></a>
                            <span class="badge badge-success float-right"><?php echo $row["barcode"] ?></span>
                            <?php
                            $query3 = "SELECT generic_name FROM product_masterlist WHERE barcode = '$barcode2'";
                            $result3 = mysqli_query($conn, $query3);
                            $check_row = mysqli_num_rows($result3);
                            while ($row3 = mysqli_fetch_array($result3)) {
                            ?>
                              <span class="product-description">
                                <?php echo $row3["generic_name"] ?>
                              </span>
                            <?php } ?>
                          </div>
                        </li>
                    <?php
                      }
                    } else {
                      echo "No data found.";
                    }
                    ?>
                  </ul>
                </div>
                <div class="card-footer text-center bg-success">
                  <a href=<?php
                              if ($_SESSION["login_user"]["is_superuser"] == '1') {
                                echo 'prod-out.php';
                              } else if ($_SESSION["login_user"]["is_superuser"] == '0') {
                                echo 'z-prod-out.php';
                              }
                          ?> class="uppercase text-light">View All Products</a>
                </div>
              </div>

              <div class="card">
                <div class="card-header bg-info">
                  <h3 class="card-title font-weight-bold">Recently Added Items</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus" style="color: #ffffff;"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body p-0">
                  <ul class="products-list product-list-in-card pl-2 pr-2">
                    <?php
                    // Query to get recent data
                    $sql = "SELECT * FROM product_in_final ORDER BY last_edited_on DESC LIMIT 3";

                    // Execute query and get result
                    $result = $conn->query($sql);

                    // Check if there is any data
                    if ($result->num_rows > 0) {
                      // Display data
                      while ($row = mysqli_fetch_assoc($result)) {
                        $barcode = $row["barcode"];
                        // echo "ID: " . $row["id"] . " - Name: " . $row["name"] . " - Date: " . $row["date_column"] . "<br>";
                    ?>
                        <li class="item">
                          <div class="product-img">
                            <?php
                            // Query to get recent data
                            $sql2 = "SELECT * FROM product_masterlist WHERE barcode = '$barcode' ";

                            // Execute query and get result
                            $result2 = $conn->query($sql2);

                            // Check if there is any data
                            if ($result2->num_rows > 0) {
                              // Display data
                              while ($row2 = mysqli_fetch_assoc($result2)) {
                            ?>
                                <img src="<?php echo $row2["image"] ?>" alt="Product Image" class="img-size-50">
                              <?php } ?>
                          </div>
                          <div class="product-info">
                            <a href=<?php
                                        if ($_SESSION["login_user"]["is_superuser"] == '1') {
                                          echo 'prod-in.php';
                                        } else if ($_SESSION["login_user"]["is_superuser"] == '0') {
                                          echo 'z-prod-in.php';
                                        }
                                    ?>  class="product-title"><?php echo $row["description"] ?></a>
                            <span class="badge badge-info float-right"><?php echo $row["added_by"] ?></span>
                            <span class="product-description">Entry Date:
                              <?php echo $row["entry_date"] ?>
                            </span>
                          </div>
                        </li>
                  <?php  }
                          }
                        }
                  ?>
                  </ul>
                </div>
                <div class="card-footer text-center bg-info">
                  <a href=<?php
                                    if ($_SESSION["login_user"]["is_superuser"] == '1') {
                                      echo 'prod-in.php';
                                    } else if ($_SESSION["login_user"]["is_superuser"] == '0') {
                                      echo 'z-prod-in.php';
                                    }
                                ?> class="uppercase text-light">View All Products</a>
                </div>
              </div>
            </div>

          </div>
        </div>
      </section>
    </div>
  </div>
<?php } ?>