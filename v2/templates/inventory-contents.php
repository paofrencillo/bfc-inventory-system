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
            <h1 class="m-0">Inventory Tables</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
      <section class="content">
        <div class="container-fluid">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">RACK IN/OUT</h3>
            </div>
            <div class="card-body">
              <div class="col-md-2">
                <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#transfer"><i class="fas fa-exchange-alt"></i> TRANSFER</button>
              </div>
            </div>
            <!-- /.card-body -->
          </div>

          <div class="row">
            <div class="col-12">
              <div class="card card-primary card-tabs">
                <div class="card-header p-0 pt-1">
                  <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#gen" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">ALL STOCKS</a>
                    </li>
                    <!-- <li class="nav-item">
                      <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#bran" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Branded</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#val" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Val Reccomend</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#meddev" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Medical Device</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#non" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Non-Pharma</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#spec" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Special Order</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#hou" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">House Brands</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#heal" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Healthy Fix</a>
                    </li> -->
                  </ul>
                </div>
                <!-- /.card-header table 1 -->
                <div class="card-body">
                  <div class="tab-content" id="custom-tabs-one-tabContent">
                    <div class="tab-pane fade show active" id="gen" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                      <table id="Generic" class="table table-bordered table-hover display dt-center">
                        <thead class="bg-dark">
                          <tr>
                            <th>BARCODE</th>
                            <th>DESCRIPTION</th>
                            <th>STOCK</th>
                            <th>ALLOC.</th>
                            <th>S/A %</th>
                            <th>RACK-IN</th>
                            <th>RACK-OUT</th>
                            <th>RACK</th>
                            <th>ACTION</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $check_user =  $_SESSION['login_user']['user_id'];
                          $user =  $_SESSION['login_user']['employee_name'];

                          $query = "SELECT * FROM inventory ORDER BY description";
                          $result = mysqli_query($conn, $query);
                          $check_row = mysqli_num_rows($result);
                          while ($row = mysqli_fetch_array($result)) {
                          ?>
                            <tr>
                              <td style="text-overflow: ellipsis;" title="<?php echo $row["barcode"] ?>">
                                  <?php echo $row["barcode"] ?>
                              </td>
                              <td><?php echo $row['description'] ?></td>
                              <td><?php echo $row['stock'] ?></td>
                              <td><?php echo $row['allocation'] ?></td>
                              <td>
                                <div class="project_progress">
                                  <?php
                                  if ($row['sa_percentage'] == NULL) {
                                    echo '<div class="progress progress-sm progress-bar-secondary bg-secondary" style = "width:100%"></div>';
                                  } else if ($row['sa_percentage'] >= 100) {
                                    echo '<div class="progress progress-sm progress-bar-primary bg-primary" style = "width:100%"></div>';
                                  } else if ($row['sa_percentage'] <= 20) {
                                    echo '<div class="progress progress-sm progress-bar-danger bg-danger" style = "width:' . $row['sa_percentage'] . '%"></div>';
                                  } else if ($row['sa_percentage'] <= 30) {
                                    echo '<div class="progress progress-sm progress-bar-warning bg-warning" style = "width:' . $row['sa_percentage'] . '%"></div>';
                                  } else if ($row['sa_percentage'] >= 70) {
                                    echo '<div class="progress progress-sm progress-bar-success bg-success" style = "width:' . $row['sa_percentage'] . '%"></div>';
                                  } else {
                                    echo '<div class="progress progress-sm progress-bar-success bg-success" style = "width:' . $row['sa_percentage'] . '%"></div>';
                                  }
                                  ?>
                                </div>
                                <div>
                                  <?php
                                  if ($row['sa_percentage'] == NULL) {
                                    echo "<span class='badge bg-secondary font-weight-bold'>0%</span>";
                                  } else if ($row['sa_percentage'] >= 100) {
                                    echo "<span class='badge bg-primary font-weight-bold'>" . $row["sa_percentage"] . '%</span>';
                                  } else if ($row['sa_percentage'] <= 20) {
                                    echo "<span class='badge bg-danger font-weight-bold'>" . $row["sa_percentage"] . '%</span>';
                                  } else if ($row['sa_percentage'] <= 30) {
                                    echo "<span class='badge bg-warning font-weight-bold'>" . $row["sa_percentage"] . '%</span>';
                                  } else if ($row['sa_percentage'] >= 70) {
                                    echo "<span class='badge bg-success font-weight-bold'>" . $row["sa_percentage"] . '%</span>';
                                  } else {
                                    echo "<span class='badge bg-success font-weight-bold'>" . $row["sa_percentage"] . '%</span>';
                                  }
                                  ?>
                                </div>
                              </td>
                              <td><?php echo $row['rack_in'] ?></td>
                              <td><?php echo $row['rack_out'] ?></td>
                              <td><?php echo $row['rack'] ?></td>
                              <td>
                                <button class="btn btn-info btn-sm" onclick="editInv(this);" data-id="<?php echo $row['id'] ?>">
                                  <i class="fas fa-pencil-alt"></i>
                                  Edit
                                </button>
                              </td>
                            </tr>
                            <?php } ?>
                            <div class="modal fade" id="editInvModal" role="dialog">
                              <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                  <div class="modal-header bg-info">
                                    <h4 class="modal-title font-weight-bold">UPDATE PRODUCT DETAILS</h4>
                                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <form action="functions.php" method="POST" id="invModalForm">
                                      <div class="row">
                                        <div class="col-sm-5">
                                          <div class="form-group">
                                            <label for="barcode">Barcode</label>
                                            <input type="text" class="form-control " id="barcode" name="barcode" value="<?php echo $row['barcode'] ?>" readonly>
                                          </div>
                                        </div>
                                        <div class="col-sm-7">
                                          <div class="form-group">
                                            <label for="prod">Product Description</label>
                                            <input type="text" class="form-control " id="prod" name="prod" value="<?php echo $row['description'] ?>" readonly>
                                          </div>
                                        </div>
                                        <div class="col-sm-2">
                                          <div class="form-group">
                                            <label for="stock">Stock</label>
                                            <input type="number" class="form-control " id="stock" name="stock" value="<?php echo $row['stock'] ?>" readonly>
                                          </div>
                                        </div>
                                        <div class="col-sm-2">
                                          <div class="form-group">
                                            <label for="allo">Allocation</label>
                                            <input type="number" class="form-control " id="allo" name="allo" value="<?php echo $row['allocation'] ?>">
                                          </div>
                                        </div>
                                        <div class="col-sm-2">
                                          <div class="form-group">
                                            <label for="sa_percentage">S/A%</label>
                                            <input type="text" class="form-control" id="sa_percentage" name="sa_percentage" onkeyup="this.value = this.value.toUpperCase();" value="<?php echo $row['sa_percentage'] ?>%" readonly>
                                          </div>
                                        </div>
                                        <div class="col-sm-3">
                                          <div class="form-group">
                                            <label for="Category">Category</label>
                                            <input type="text" class="form-control " id="Category" name="Category" onkeyup="this.value = this.value.toUpperCase();" autocomplete="off" value="<?php echo $row['category'] ?>" readonly>
                                          </div>
                                        </div>
                                        <div class="col-sm-3">
                                          <div class="form-group">
                                            <label for="rack">Rack</label>
                                            <input type="text" class="form-control " id="rack" name="rack" onkeyup="this.value = this.value.toUpperCase();" autocomplete="off" value="<?php echo $row['rack'] ?>">
                                          </div>
                                        </div>
                                      </div>

                                      <div class="modal-footer ">
                                        <?php
                                        $is_superuser =  $_SESSION['login_user']['is_superuser'];
                                        ?>
                                        <input type="hidden" name="product_id" id="product_id">
                                        <input type="hidden" name="is_superuser" value="<?php echo $is_superuser ?>">
                                        <button type="submit" class="btn btn-primary" name="modify_invent">Update Details</button>
                                      </div>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>

                          
                        </tbody>
                      </table>
                    </div>

                    <!-- <div class="tab-pane fade show" id="bran" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                      <table id="branded" class="table table-bordered table-hover dt-center">
                        <thead class="bg-dark">
                          <tr>
                            <th>BARCODE</th>
                            <th>DESCRIPTION</th>
                            <th>STOCK</th>
                            <th>ALLOC.</th>
                            <th>S/A %</th>
                            <th>RACK-IN</th>
                            <th>RACK-OUT</th>
                            <th>RACK</th>
                            <th>ACTION</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $check_user =  $_SESSION['login_user']['user_id'];
                          $user =  $_SESSION['login_user']['employee_name'];
                          $query2 = "SELECT * FROM inventory WHERE category = 'BRANDED' ";
                          $result2 = mysqli_query($conn, $query2);
                          $check_row = mysqli_num_rows($result2);
                          while ($row = mysqli_fetch_array($result2)) {

                          ?>
                            <tr>
                              <td style="text-overflow: ellipsis;" title="<?php echo $row["barcode"] ?>">
                                  <?php echo $row["barcode"] ?>
                              </td>
                              <td><?php echo $row['description'] ?></td>
                              <td><?php echo $row['stock'] ?></td>
                              <td><?php echo $row['allocation'] ?></td>
                              <td>
                                <div class="project_progress">
                                  <?php
                                  if ($row['sa_percentage'] == NULL) {
                                    echo '<div class="progress progress-sm progress-bar-secondary bg-secondary" style = "width:100%"></div>';
                                  } else if ($row['sa_percentage'] >= 100) {
                                    echo '<div class="progress progress-sm progress-bar-primary bg-primary" style = "width:100%"></div>';
                                  } else if ($row['sa_percentage'] <= 20) {
                                    echo '<div class="progress progress-sm progress-bar-danger bg-danger" style = "width:' . $row['sa_percentage'] . '%"></div>';
                                  } else if ($row['sa_percentage'] <= 30) {
                                    echo '<div class="progress progress-sm progress-bar-warning bg-warning" style = "width:' . $row['sa_percentage'] . '%"></div>';
                                  } else if ($row['sa_percentage'] >= 70) {
                                    echo '<div class="progress progress-sm progress-bar-success bg-success" style = "width:' . $row['sa_percentage'] . '%"></div>';
                                  } else {
                                    echo '<div class="progress progress-sm progress-bar-success bg-success" style = "width:' . $row['sa_percentage'] . '%"></div>';
                                  }
                                  ?>
                                </div>
                                <div>
                                  <?php
                                  if ($row['sa_percentage'] == NULL) {
                                    echo "<span class='badge bg-secondary font-weight-bold'>0%</span>";
                                  } else if ($row['sa_percentage'] >= 100) {
                                    echo "<span class='badge bg-primary font-weight-bold'>" . $row["sa_percentage"] . '%</span>';
                                  } else if ($row['sa_percentage'] <= 20) {
                                    echo "<span class='badge bg-danger font-weight-bold'>" . $row["sa_percentage"] . '%</span>';
                                  } else if ($row['sa_percentage'] <= 30) {
                                    echo "<span class='badge bg-warning font-weight-bold'>" . $row["sa_percentage"] . '%</span>';
                                  } else if ($row['sa_percentage'] >= 70) {
                                    echo "<span class='badge bg-success font-weight-bold'>" . $row["sa_percentage"] . '%</span>';
                                  } else {
                                    echo "<span class='badge bg-success font-weight-bold'>" . $row["sa_percentage"] . '%</span>';
                                  }
                                  ?>
                                </div>
                              </td>
                              <td><?php echo $row['rack_in'] ?></td>
                              <td><?php echo $row['rack_out'] ?></td>
                              <td><?php echo $row['rack'] ?></td>
                              <td>
                                <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#update<?php echo $row['id'] ?>">
                                  <i class="fas fa-pencil-alt"></i>
                                  Edit
                                </button>
                              </td>
                            </tr>
                            <div class="modal fade" id="update<?php echo $row['id'] ?>">
                              <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                  <div class="modal-header bg-info">
                                    <h4 class="modal-title font-weight-bold">UPDATE PRODUCT DETAILS</h4>
                                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <form action="functions.php" method="POST">
                                      <div class="row">
                                        <div class="col-sm-5">
                                          <div class="form-group">
                                            <label for="barcode">Barcode</label>
                                            <input type="text" class="form-control " id="barcode" name="barcode" value="<?php echo $row['barcode'] ?>" readonly>
                                          </div>
                                        </div>
                                        <div class="col-sm-7">
                                          <div class="form-group">
                                            <label for="prod">Product Description</label>
                                            <input type="text" class="form-control " id="prod" name="description" value="<?php echo $row['description'] ?>" readonly>
                                          </div>
                                        </div>
                                        <div class="col-sm-2">
                                          <div class="form-group">
                                            <label for="stock">Stock</label>
                                            <input type="number" class="form-control " id="stock" name="stock" value="<?php echo $row['stock'] ?>" readonly>
                                          </div>
                                        </div>
                                        <div class="col-sm-2">
                                          <div class="form-group">
                                            <label for="allo">Allocation</label>
                                            <input type="number" class="form-control " id="allo" name="allocation" value="<?php echo $row['allocation'] ?>">
                                          </div>
                                        </div>
                                        <div class="col-sm-2">
                                          <div class="form-group">
                                            <label for="sa_percentage">S/A%</label>
                                            <input type="text" class="form-control" id="sa_percentage" name="sa_percentage" onkeyup="this.value = this.value.toUpperCase();" value="<?php echo $row['sa_percentage'] ?>%" readonly>
                                          </div>
                                        </div>
                                        <div class="col-sm-3">
                                          <div class="form-group">
                                            <label for="Category">Category</label>
                                            <input type="text" class="form-control " id="Category" name="Category" onkeyup="this.value = this.value.toUpperCase();" autocomplete="off" value="<?php echo $row['category'] ?>" readonly>
                                          </div>
                                        </div>
                                        <div class="col-sm-3">
                                          <div class="form-group">
                                            <label for="rack">Rack</label>
                                            <input type="text" class="form-control " id="rack" name="rack" onkeyup="this.value = this.value.toUpperCase();" autocomplete="off" value="<?php echo $row['rack'] ?>">
                                          </div>
                                        </div>
                                      </div>

                                      <div class="modal-footer justify-content-between">
                                        <?php
                                        $is_superuser =  $_SESSION['login_user']['is_superuser'];
                                        ?>
                                        <input type="hidden" name="is_superuser" value="<?php echo $is_superuser ?>">
                                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Delete</button>
                                        <button type="submit" class="btn btn-primary" name="modify_invent">Update</button>
                                      </div>

                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>

                          <?php } ?>
                        </tbody>
                      </table>
                    </div>

                    <div class="tab-pane fade show" id="val" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                      <table id="val_rec" class="table table-bordered table-hover dt-center">
                        <thead class="bg-dark">
                          <tr>
                            <th>BARCODE</th>
                            <th>DESCRIPTION</th>
                            <th>STOCK</th>
                            <th>ALLOC.</th>
                            <th>S/A %</th>
                            <th>RACK-IN</th>
                            <th>RACK-OUT</th>
                            <th>RACK</th>
                            <th>ACTION</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $check_user =  $_SESSION['login_user']['user_id'];
                          $user =  $_SESSION['login_user']['employee_name'];
                          $query3 = "SELECT * FROM inventory WHERE category = 'VAL RECOMMEND 1' ";
                          $result3 = mysqli_query($conn, $query3);
                          $check_row = mysqli_num_rows($result3);
                          while ($row = mysqli_fetch_array($result3)) {

                          ?>
                            <tr>
                              <td style="text-overflow: ellipsis;" title="<?php echo $row["barcode"] ?>">
                                  <?php echo $row["barcode"] ?>
                              </td>
                              <td><?php echo $row['description'] ?></td>
                              <td><?php echo $row['stock'] ?></td>
                              <td><?php echo $row['allocation'] ?></td>
                              <td>
                                <div class="project_progress">
                                  <?php
                                  if ($row['sa_percentage'] == NULL) {
                                    echo '<div class="progress progress-sm progress-bar-secondary bg-secondary" style = "width:100%"></div>';
                                  } else if ($row['sa_percentage'] >= 100) {
                                    echo '<div class="progress progress-sm progress-bar-primary bg-primary" style = "width:100%"></div>';
                                  } else if ($row['sa_percentage'] <= 20) {
                                    echo '<div class="progress progress-sm progress-bar-danger bg-danger" style = "width:' . $row['sa_percentage'] . '%"></div>';
                                  } else if ($row['sa_percentage'] <= 30) {
                                    echo '<div class="progress progress-sm progress-bar-warning bg-warning" style = "width:' . $row['sa_percentage'] . '%"></div>';
                                  } else if ($row['sa_percentage'] >= 70) {
                                    echo '<div class="progress progress-sm progress-bar-success bg-success" style = "width:' . $row['sa_percentage'] . '%"></div>';
                                  } else {
                                    echo '<div class="progress progress-sm progress-bar-success bg-success" style = "width:' . $row['sa_percentage'] . '%"></div>';
                                  }
                                  ?>
                                </div>
                                <div>
                                  <?php
                                  if ($row['sa_percentage'] == NULL) {
                                    echo "<span class='badge bg-secondary font-weight-bold'>0%</span>";
                                  } else if ($row['sa_percentage'] >= 100) {
                                    echo "<span class='badge bg-primary font-weight-bold'>" . $row["sa_percentage"] . '%</span>';
                                  } else if ($row['sa_percentage'] <= 20) {
                                    echo "<span class='badge bg-danger font-weight-bold'>" . $row["sa_percentage"] . '%</span>';
                                  } else if ($row['sa_percentage'] <= 30) {
                                    echo "<span class='badge bg-warning font-weight-bold'>" . $row["sa_percentage"] . '%</span>';
                                  } else if ($row['sa_percentage'] >= 70) {
                                    echo "<span class='badge bg-success font-weight-bold'>" . $row["sa_percentage"] . '%</span>';
                                  } else {
                                    echo "<span class='badge bg-success font-weight-bold'>" . $row["sa_percentage"] . '%</span>';
                                  }
                                  ?>
                                </div>
                              </td>
                              <td><?php echo $row['rack_in'] ?></td>
                              <td><?php echo $row['rack_out'] ?></td>
                              <td><?php echo $row['rack'] ?></td>
                              <td>
                                <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#update<?php echo $row['id'] ?>">
                                  <i class="fas fa-pencil-alt"></i>
                                  Edit
                                </button>
                              </td>
                            </tr>
                            <div class="modal fade" id="update<?php echo $row['id'] ?>">
                              <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                  <div class="modal-header bg-info">
                                    <h4 class="modal-title font-weight-bold">UPDATE PRODUCT DETAILS</h4>
                                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <form action="functions.php" method="POST">
                                      <div class="row">
                                        <div class="col-sm-5">
                                          <div class="form-group">
                                            <label for="barcode">Barcode</label>
                                            <input type="text" class="form-control " id="barcode" name="barcode" value="<?php echo $row['barcode'] ?>" readonly>
                                          </div>
                                        </div>
                                        <div class="col-sm-7">
                                          <div class="form-group">
                                            <label for="prod">Product Description</label>
                                            <input type="text" class="form-control " id="prod" name="description" value="<?php echo $row['description'] ?>" readonly>
                                          </div>
                                        </div>
                                        <div class="col-sm-2">
                                          <div class="form-group">
                                            <label for="stock">Stock</label>
                                            <input type="number" class="form-control " id="stock" name="stock" value="<?php echo $row['stock'] ?>" readonly>
                                          </div>
                                        </div>
                                        <div class="col-sm-2">
                                          <div class="form-group">
                                            <label for="allo">Allocation</label>
                                            <input type="number" class="form-control " id="allo" name="allocation" value="<?php echo $row['allocation'] ?>">
                                          </div>
                                        </div>
                                        <div class="col-sm-2">
                                          <div class="form-group">
                                            <label for="sa_percentage">S/A%</label>
                                            <input type="text" class="form-control" id="sa_percentage" name="sa_percentage" onkeyup="this.value = this.value.toUpperCase();" value="<?php echo $row['sa_percentage'] ?>%" readonly>
                                          </div>
                                        </div>
                                        <div class="col-sm-3">
                                          <div class="form-group">
                                            <label for="Category">Category</label>
                                            <input type="text" class="form-control " id="Category" name="Category" onkeyup="this.value = this.value.toUpperCase();" autocomplete="off" value="<?php echo $row['category'] ?>" readonly>
                                          </div>
                                        </div>
                                        <div class="col-sm-3">
                                          <div class="form-group">
                                            <label for="rack">Rack</label>
                                            <input type="text" class="form-control " id="rack" name="rack" onkeyup="this.value = this.value.toUpperCase();" autocomplete="off" value="<?php echo $row['rack'] ?>">
                                          </div>
                                        </div>
                                      </div>

                                      <div class="modal-footer justify-content-between">
                                        <?php
                                        $is_superuser =  $_SESSION['login_user']['is_superuser'];
                                        ?>
                                        <input type="hidden" name="is_superuser" value="<?php echo $is_superuser ?>">
                                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Delete</button>
                                        <button type="submit" class="btn btn-primary" name="modify_invent">Update</button>
                                      </div>

                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>

                          <?php } ?>
                        </tbody>
                      </table>
                    </div>

                    <div class="tab-pane fade show" id="meddev" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                      <table id="medical" class="table table-bordered table-hover dt-center">
                        <thead class="bg-dark">
                          <tr>
                            <th>BARCODE</th>
                            <th>DESCRIPTION</th>
                            <th>STOCK</th>
                            <th>ALLOC.</th>
                            <th>S/A %</th>
                            <th>RACK-IN</th>
                            <th>RACK-OUT</th>
                            <th>RACK</th>
                            <th>ACTION</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $check_user =  $_SESSION['login_user']['user_id'];
                          $user =  $_SESSION['login_user']['employee_name'];
                          $query4 = "SELECT * FROM inventory WHERE category = 'MEDICAL DEVICE' ";
                          $result4 = mysqli_query($conn, $query4);
                          $check_row = mysqli_num_rows($result4);
                          while ($row = mysqli_fetch_array($result4)) {
                          ?>
                            <tr>
                              <td style="text-overflow: ellipsis;" title="<?php echo $row["barcode"] ?>">
                                  <?php echo $row["barcode"] ?>
                              </td>
                              <td><?php echo $row['description'] ?></td>
                              <td><?php echo $row['stock'] ?></td>
                              <td><?php echo $row['allocation'] ?></td>
                              <td>
                                <div class="project_progress">
                                  <?php
                                  if ($row['sa_percentage'] == NULL) {
                                    echo '<div class="progress progress-sm progress-bar-secondary bg-secondary" style = "width:100%"></div>';
                                  } else if ($row['sa_percentage'] >= 100) {
                                    echo '<div class="progress progress-sm progress-bar-primary bg-primary" style = "width:100%"></div>';
                                  } else if ($row['sa_percentage'] <= 20) {
                                    echo '<div class="progress progress-sm progress-bar-danger bg-danger" style = "width:' . $row['sa_percentage'] . '%"></div>';
                                  } else if ($row['sa_percentage'] <= 30) {
                                    echo '<div class="progress progress-sm progress-bar-warning bg-warning" style = "width:' . $row['sa_percentage'] . '%"></div>';
                                  } else if ($row['sa_percentage'] >= 70) {
                                    echo '<div class="progress progress-sm progress-bar-success bg-success" style = "width:' . $row['sa_percentage'] . '%"></div>';
                                  } else {
                                    echo '<div class="progress progress-sm progress-bar-success bg-success" style = "width:' . $row['sa_percentage'] . '%"></div>';
                                  }
                                  ?>
                                </div>
                                <div>
                                  <?php
                                  if ($row['sa_percentage'] == NULL) {
                                    echo "<span class='badge bg-secondary font-weight-bold'>0%</span>";
                                  } else if ($row['sa_percentage'] >= 100) {
                                    echo "<span class='badge bg-primary font-weight-bold'>" . $row["sa_percentage"] . '%</span>';
                                  } else if ($row['sa_percentage'] <= 20) {
                                    echo "<span class='badge bg-danger font-weight-bold'>" . $row["sa_percentage"] . '%</span>';
                                  } else if ($row['sa_percentage'] <= 30) {
                                    echo "<span class='badge bg-warning font-weight-bold'>" . $row["sa_percentage"] . '%</span>';
                                  } else if ($row['sa_percentage'] >= 70) {
                                    echo "<span class='badge bg-success font-weight-bold'>" . $row["sa_percentage"] . '%</span>';
                                  } else {
                                    echo "<span class='badge bg-success font-weight-bold'>" . $row["sa_percentage"] . '%</span>';
                                  }
                                  ?>
                                </div>
                              </td>
                              <td><?php echo $row['rack_in'] ?></td>
                              <td><?php echo $row['rack_out'] ?></td>
                              <td><?php echo $row['rack'] ?></td>
                              <td>
                                <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#update<?php echo $row['id'] ?>">
                                  <i class="fas fa-pencil-alt"></i>
                                  Edit
                                </button>
                              </td>
                            </tr>
                            <div class="modal fade" id="update<?php echo $row['id'] ?>">
                              <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                  <div class="modal-header bg-info">
                                    <h4 class="modal-title font-weight-bold">UPDATE PRODUCT DETAILS</h4>
                                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <form action="functions.php" method="POST">
                                      <div class="row">
                                        <div class="col-sm-5">
                                          <div class="form-group">
                                            <label for="barcode">Barcode</label>
                                            <input type="text" class="form-control " id="barcode" name="barcode" value="<?php echo $row['barcode'] ?>" readonly>
                                          </div>
                                        </div>
                                        <div class="col-sm-7">
                                          <div class="form-group">
                                            <label for="prod">Product Description</label>
                                            <input type="text" class="form-control " id="prod" name="description" value="<?php echo $row['description'] ?>" readonly>
                                          </div>
                                        </div>
                                        <div class="col-sm-2">
                                          <div class="form-group">
                                            <label for="stock">Stock</label>
                                            <input type="number" class="form-control " id="stock" name="stock" value="<?php echo $row['stock'] ?>" readonly>
                                          </div>
                                        </div>
                                        <div class="col-sm-2">
                                          <div class="form-group">
                                            <label for="allo">Allocation</label>
                                            <input type="number" class="form-control " id="allo" name="allocation" value="<?php echo $row['allocation'] ?>">
                                          </div>
                                        </div>
                                        <div class="col-sm-2">
                                          <div class="form-group">
                                            <label for="sa_percentage">S/A%</label>
                                            <input type="text" class="form-control" id="sa_percentage" name="sa_percentage" onkeyup="this.value = this.value.toUpperCase();" value="<?php echo $row['sa_percentage'] ?>%" readonly>
                                          </div>
                                        </div>
                                        <div class="col-sm-3">
                                          <div class="form-group">
                                            <label for="Category">Category</label>
                                            <input type="text" class="form-control " id="Category" name="Category" onkeyup="this.value = this.value.toUpperCase();" autocomplete="off" value="<?php echo $row['category'] ?>" readonly>
                                          </div>
                                        </div>
                                        <div class="col-sm-3">
                                          <div class="form-group">
                                            <label for="rack">Rack</label>
                                            <input type="text" class="form-control " id="rack" name="rack" onkeyup="this.value = this.value.toUpperCase();" autocomplete="off" value="<?php echo $row['rack'] ?>">
                                          </div>
                                        </div>
                                      </div>

                                      <div class="modal-footer justify-content-between">
                                        <?php
                                        $is_superuser =  $_SESSION['login_user']['is_superuser'];
                                        ?>
                                        <input type="hidden" name="is_superuser" value="<?php echo $is_superuser ?>">
                                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Delete</button>
                                        <button type="submit" class="btn btn-primary" name="modify_invent">Update</button>
                                      </div>

                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>

                          <?php } ?>
                        </tbody>
                      </table>
                    </div>

                    <div class="tab-pane fade show" id="non" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                      <table id="non-pharma" class="table table-bordered table-hover dt-center">
                        <thead class="bg-dark">
                          <tr>
                            <th>BARCODE</th>
                            <th>DESCRIPTION</th>
                            <th>STOCK</th>
                            <th>ALLOC.</th>
                            <th>S/A %</th>
                            <th>RACK-IN</th>
                            <th>RACK-OUT</th>
                            <th>RACK</th>
                            <th>ACTION</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $check_user =  $_SESSION['login_user']['user_id'];
                          $user =  $_SESSION['login_user']['employee_name'];
                          $query5 = "SELECT * FROM inventory WHERE category = 'NON-PHARMA' ";
                          $result5 = mysqli_query($conn, $query5);
                          $check_row = mysqli_num_rows($result5);
                          while ($row = mysqli_fetch_array($result5)) {
                          ?>
                            <tr>
                              <td style="text-overflow: ellipsis;" title="<?php echo $row["barcode"] ?>">
                                  <?php echo $row["barcode"] ?>
                              </td>
                              <td><?php echo $row['description'] ?></td>
                              <td><?php echo $row['stock'] ?></td>
                              <td><?php echo $row['allocation'] ?></td>
                              <td>
                                <div class="project_progress">
                                  <?php
                                  if ($row['sa_percentage'] == NULL) {
                                    echo '<div class="progress progress-sm progress-bar-secondary bg-secondary" style = "width:100%"></div>';
                                  } else if ($row['sa_percentage'] >= 100) {
                                    echo '<div class="progress progress-sm progress-bar-primary bg-primary" style = "width:100%"></div>';
                                  } else if ($row['sa_percentage'] <= 20) {
                                    echo '<div class="progress progress-sm progress-bar-danger bg-danger" style = "width:' . $row['sa_percentage'] . '%"></div>';
                                  } else if ($row['sa_percentage'] <= 30) {
                                    echo '<div class="progress progress-sm progress-bar-warning bg-warning" style = "width:' . $row['sa_percentage'] . '%"></div>';
                                  } else if ($row['sa_percentage'] >= 70) {
                                    echo '<div class="progress progress-sm progress-bar-success bg-success" style = "width:' . $row['sa_percentage'] . '%"></div>';
                                  } else {
                                    echo '<div class="progress progress-sm progress-bar-success bg-success" style = "width:' . $row['sa_percentage'] . '%"></div>';
                                  }
                                  ?>
                                </div>
                                <div>
                                  <?php
                                  if ($row['sa_percentage'] == NULL) {
                                    echo "<span class='badge bg-secondary font-weight-bold'>0%</span>";
                                  } else if ($row['sa_percentage'] >= 100) {
                                    echo "<span class='badge bg-primary font-weight-bold'>" . $row["sa_percentage"] . '%</span>';
                                  } else if ($row['sa_percentage'] <= 20) {
                                    echo "<span class='badge bg-danger font-weight-bold'>" . $row["sa_percentage"] . '%</span>';
                                  } else if ($row['sa_percentage'] <= 30) {
                                    echo "<span class='badge bg-warning font-weight-bold'>" . $row["sa_percentage"] . '%</span>';
                                  } else if ($row['sa_percentage'] >= 70) {
                                    echo "<span class='badge bg-success font-weight-bold'>" . $row["sa_percentage"] . '%</span>';
                                  } else {
                                    echo "<span class='badge bg-success font-weight-bold'>" . $row["sa_percentage"] . '%</span>';
                                  }
                                  ?>
                                </div>
                              </td>
                              <td><?php echo $row['rack_in'] ?></td>
                              <td><?php echo $row['rack_out'] ?></td>
                              <td><?php echo $row['rack'] ?></td>
                              <td>
                                <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#update<?php echo $row['id'] ?>">
                                  <i class="fas fa-pencil-alt"></i>
                                  Edit
                                </button>
                              </td>
                            </tr>
                            <div class="modal fade" id="update<?php echo $row['id'] ?>">
                              <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                  <div class="modal-header bg-info">
                                    <h4 class="modal-title font-weight-bold">UPDATE PRODUCT DETAILS</h4>
                                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <form action="functions.php" method="POST">
                                      <div class="row">
                                        <div class="col-sm-5">
                                          <div class="form-group">
                                            <label for="barcode">Barcode</label>
                                            <input type="text" class="form-control " id="barcode" name="barcode" value="<?php echo $row['barcode'] ?>" readonly>
                                          </div>
                                        </div>
                                        <div class="col-sm-7">
                                          <div class="form-group">
                                            <label for="prod">Product Description</label>
                                            <input type="text" class="form-control " id="prod" name="description" value="<?php echo $row['description'] ?>" readonly>
                                          </div>
                                        </div>
                                        <div class="col-sm-2">
                                          <div class="form-group">
                                            <label for="stock">Stock</label>
                                            <input type="number" class="form-control " id="stock" name="stock" value="<?php echo $row['stock'] ?>" readonly>
                                          </div>
                                        </div>
                                        <div class="col-sm-2">
                                          <div class="form-group">
                                            <label for="allo">Allocation</label>
                                            <input type="number" class="form-control " id="allo" name="allocation" value="<?php echo $row['allocation'] ?>">
                                          </div>
                                        </div>
                                        <div class="col-sm-2">
                                          <div class="form-group">
                                            <label for="sa_percentage">S/A%</label>
                                            <input type="text" class="form-control" id="sa_percentage" name="sa_percentage" onkeyup="this.value = this.value.toUpperCase();" value="<?php echo $row['sa_percentage'] ?>%" readonly>
                                          </div>
                                        </div>
                                        <div class="col-sm-3">
                                          <div class="form-group">
                                            <label for="Category">Category</label>
                                            <input type="text" class="form-control " id="Category" name="Category" onkeyup="this.value = this.value.toUpperCase();" autocomplete="off" value="<?php echo $row['category'] ?>" readonly>
                                          </div>
                                        </div>
                                        <div class="col-sm-3">
                                          <div class="form-group">
                                            <label for="rack">Rack</label>
                                            <input type="text" class="form-control " id="rack" name="rack" onkeyup="this.value = this.value.toUpperCase();" autocomplete="off" value="<?php echo $row['rack'] ?>">
                                          </div>
                                        </div>
                                      </div>

                                      <div class="modal-footer justify-content-between">
                                        <?php
                                        $is_superuser =  $_SESSION['login_user']['is_superuser'];
                                        ?>
                                        <input type="hidden" name="is_superuser" value="<?php echo $is_superuser ?>">
                                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Delete</button>
                                        <button type="submit" class="btn btn-primary" name="modify_invent">Update</button>
                                      </div>

                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>

                          <?php } ?>
                        </tbody>
                      </table>
                    </div>

                    <div class="tab-pane fade show" id="spec" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                      <table id="special" class="table table-bordered table-hover dt-center">
                        <thead class="bg-dark">
                          <tr>
                            <th>BARCODE</th>
                            <th>DESCRIPTION</th>
                            <th>STOCK</th>
                            <th>ALLOC.</th>
                            <th>S/A %</th>
                            <th>RACK-IN</th>
                            <th>RACK-OUT</th>
                            <th>RACK</th>
                            <th>ACTION</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $check_user =  $_SESSION['login_user']['user_id'];
                          $user =  $_SESSION['login_user']['employee_name'];
                          $query6 = "SELECT * FROM inventory WHERE category = 'SPECIAL ORDER' ";
                          $result6 = mysqli_query($conn, $query6);
                          $check_row = mysqli_num_rows($result6);
                          while ($row = mysqli_fetch_array($result6)) {
                          ?>
                            <tr>
                              <td style="text-overflow: ellipsis;" title="<?php echo $row["barcode"] ?>">
                                  <?php echo $row["barcode"] ?>
                              </td>
                              <td><?php echo $row['description'] ?></td>
                              <td><?php echo $row['stock'] ?></td>
                              <td><?php echo $row['allocation'] ?></td>
                              <td>
                                <div class="project_progress">
                                  <?php
                                  if ($row['sa_percentage'] == NULL) {
                                    echo '<div class="progress progress-sm progress-bar-secondary bg-secondary" style = "width:100%"></div>';
                                  } else if ($row['sa_percentage'] >= 100) {
                                    echo '<div class="progress progress-sm progress-bar-primary bg-primary" style = "width:100%"></div>';
                                  } else if ($row['sa_percentage'] <= 20) {
                                    echo '<div class="progress progress-sm progress-bar-danger bg-danger" style = "width:' . $row['sa_percentage'] . '%"></div>';
                                  } else if ($row['sa_percentage'] <= 30) {
                                    echo '<div class="progress progress-sm progress-bar-warning bg-warning" style = "width:' . $row['sa_percentage'] . '%"></div>';
                                  } else if ($row['sa_percentage'] >= 70) {
                                    echo '<div class="progress progress-sm progress-bar-success bg-success" style = "width:' . $row['sa_percentage'] . '%"></div>';
                                  } else {
                                    echo '<div class="progress progress-sm progress-bar-success bg-success" style = "width:' . $row['sa_percentage'] . '%"></div>';
                                  }
                                  ?>
                                </div>
                                <div>
                                  <?php
                                  if ($row['sa_percentage'] == NULL) {
                                    echo "<span class='badge bg-secondary font-weight-bold'>0%</span>";
                                  } else if ($row['sa_percentage'] >= 100) {
                                    echo "<span class='badge bg-primary font-weight-bold'>" . $row["sa_percentage"] . '%</span>';
                                  } else if ($row['sa_percentage'] <= 20) {
                                    echo "<span class='badge bg-danger font-weight-bold'>" . $row["sa_percentage"] . '%</span>';
                                  } else if ($row['sa_percentage'] <= 30) {
                                    echo "<span class='badge bg-warning font-weight-bold'>" . $row["sa_percentage"] . '%</span>';
                                  } else if ($row['sa_percentage'] >= 70) {
                                    echo "<span class='badge bg-success font-weight-bold'>" . $row["sa_percentage"] . '%</span>';
                                  } else {
                                    echo "<span class='badge bg-success font-weight-bold'>" . $row["sa_percentage"] . '%</span>';
                                  }
                                  ?>
                                </div>
                              </td>
                              <td><?php echo $row['rack_in'] ?></td>
                              <td><?php echo $row['rack_out'] ?></td>
                              <td><?php echo $row['rack'] ?></td>
                              <td>
                                <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#update<?php echo $row['id'] ?>">
                                  <i class="fas fa-pencil-alt"></i>
                                  Edit
                                </button>
                              </td>
                            </tr>
                            <div class="modal fade" id="update<?php echo $row['id'] ?>">
                              <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                  <div class="modal-header bg-info">
                                    <h4 class="modal-title font-weight-bold">UPDATE PRODUCT DETAILS</h4>
                                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <form action="functions.php" method="POST">
                                      <div class="row">
                                        <div class="col-sm-5">
                                          <div class="form-group">
                                            <label for="barcode">Barcode</label>
                                            <input type="text" class="form-control " id="barcode" name="barcode" value="<?php echo $row['barcode'] ?>" readonly>
                                          </div>
                                        </div>
                                        <div class="col-sm-7">
                                          <div class="form-group">
                                            <label for="prod">Product Description</label>
                                            <input type="text" class="form-control " id="prod" name="description" value="<?php echo $row['description'] ?>" readonly>
                                          </div>
                                        </div>
                                        <div class="col-sm-2">
                                          <div class="form-group">
                                            <label for="stock">Stock</label>
                                            <input type="number" class="form-control " id="stock" name="stock" value="<?php echo $row['stock'] ?>" readonly>
                                          </div>
                                        </div>
                                        <div class="col-sm-2">
                                          <div class="form-group">
                                            <label for="allo">Allocation</label>
                                            <input type="number" class="form-control " id="allo" name="allocation" value="<?php echo $row['allocation'] ?>">
                                          </div>
                                        </div>
                                        <div class="col-sm-2">
                                          <div class="form-group">
                                            <label for="sa_percentage">S/A%</label>
                                            <input type="text" class="form-control" id="sa_percentage" name="sa_percentage" onkeyup="this.value = this.value.toUpperCase();" value="<?php echo $row['sa_percentage'] ?>%" readonly>
                                          </div>
                                        </div>
                                        <div class="col-sm-3">
                                          <div class="form-group">
                                            <label for="Category">Category</label>
                                            <input type="text" class="form-control " id="Category" name="Category" onkeyup="this.value = this.value.toUpperCase();" autocomplete="off" value="<?php echo $row['category'] ?>" readonly>
                                          </div>
                                        </div>
                                        <div class="col-sm-3">
                                          <div class="form-group">
                                            <label for="rack">Rack</label>
                                            <input type="text" class="form-control " id="rack" name="rack" onkeyup="this.value = this.value.toUpperCase();" autocomplete="off" value="<?php echo $row['rack'] ?>">
                                          </div>
                                        </div>
                                      </div>

                                      <div class="modal-footer justify-content-between">
                                        <?php
                                        $is_superuser =  $_SESSION['login_user']['is_superuser'];
                                        ?>
                                        <input type="hidden" name="is_superuser" value="<?php echo $is_superuser ?>">
                                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Delete</button>
                                        <button type="submit" class="btn btn-primary" name="modify_invent">Update</button>
                                      </div>

                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>

                          <?php } ?>
                        </tbody>
                      </table>
                    </div>

                    <div class="tab-pane fade show" id="hou" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                      <table id="house" class="table table-bordered table-hover dt-center">
                        <thead class="bg-dark">
                          <tr>
                            <th>BARCODE</th>
                            <th>DESCRIPTION</th>
                            <th>STOCK</th>
                            <th>ALLOC.</th>
                            <th>S/A %</th>
                            <th>RACK-IN</th>
                            <th>RACK-OUT</th>
                            <th>RACK</th>
                            <th>ACTION</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $check_user =  $_SESSION['login_user']['user_id'];
                          $user =  $_SESSION['login_user']['employee_name'];
                          $query7 = "SELECT * FROM inventory WHERE category = 'HOUSE BRANDS' ";
                          $result7 = mysqli_query($conn, $query7);
                          $check_row = mysqli_num_rows($result7);
                          while ($row = mysqli_fetch_array($result7)) {
                          ?>
                            <tr>
                              <td style="text-overflow: ellipsis;" title="<?php echo $row["barcode"] ?>">
                                  <?php echo $row["barcode"] ?>
                              </td>
                              <td><?php echo $row['description'] ?></td>
                              <td><?php echo $row['stock'] ?></td>
                              <td><?php echo $row['allocation'] ?></td>
                              <td>
                                <div class="project_progress">
                                  <?php
                                  if ($row['sa_percentage'] == NULL) {
                                    echo '<div class="progress progress-sm progress-bar-secondary bg-secondary" style = "width:100%"></div>';
                                  } else if ($row['sa_percentage'] >= 100) {
                                    echo '<div class="progress progress-sm progress-bar-primary bg-primary" style = "width:100%"></div>';
                                  } else if ($row['sa_percentage'] <= 20) {
                                    echo '<div class="progress progress-sm progress-bar-danger bg-danger" style = "width:' . $row['sa_percentage'] . '%"></div>';
                                  } else if ($row['sa_percentage'] <= 30) {
                                    echo '<div class="progress progress-sm progress-bar-warning bg-warning" style = "width:' . $row['sa_percentage'] . '%"></div>';
                                  } else if ($row['sa_percentage'] >= 70) {
                                    echo '<div class="progress progress-sm progress-bar-success bg-success" style = "width:' . $row['sa_percentage'] . '%"></div>';
                                  } else {
                                    echo '<div class="progress progress-sm progress-bar-success bg-success" style = "width:' . $row['sa_percentage'] . '%"></div>';
                                  }
                                  ?>
                                </div>
                                <div>
                                  <?php
                                  if ($row['sa_percentage'] == NULL) {
                                    echo "<span class='badge bg-secondary font-weight-bold'>0%</span>";
                                  } else if ($row['sa_percentage'] >= 100) {
                                    echo "<span class='badge bg-primary font-weight-bold'>" . $row["sa_percentage"] . '%</span>';
                                  } else if ($row['sa_percentage'] <= 20) {
                                    echo "<span class='badge bg-danger font-weight-bold'>" . $row["sa_percentage"] . '%</span>';
                                  } else if ($row['sa_percentage'] <= 30) {
                                    echo "<span class='badge bg-warning font-weight-bold'>" . $row["sa_percentage"] . '%</span>';
                                  } else if ($row['sa_percentage'] >= 70) {
                                    echo "<span class='badge bg-success font-weight-bold'>" . $row["sa_percentage"] . '%</span>';
                                  } else {
                                    echo "<span class='badge bg-success font-weight-bold'>" . $row["sa_percentage"] . '%</span>';
                                  }
                                  ?>
                                </div>
                              </td>
                              <td><?php echo $row['rack_in'] ?></td>
                              <td><?php echo $row['rack_out'] ?></td>
                              <td><?php echo $row['rack'] ?></td>
                              <td>
                                <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#update<?php echo $row['id'] ?>">
                                  <i class="fas fa-pencil-alt"></i>
                                  Edit
                                </button>
                              </td>
                            </tr>
                            <div class="modal fade" id="update<?php echo $row['id'] ?>">
                              <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                  <div class="modal-header bg-info">
                                    <h4 class="modal-title font-weight-bold">UPDATE PRODUCT DETAILS</h4>
                                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <form action="functions.php" method="POST">
                                      <div class="row">
                                        <div class="col-sm-5">
                                          <div class="form-group">
                                            <label for="barcode">Barcode</label>
                                            <input type="text" class="form-control " id="barcode" name="barcode" value="<?php echo $row['barcode'] ?>" readonly>
                                          </div>
                                        </div>
                                        <div class="col-sm-7">
                                          <div class="form-group">
                                            <label for="prod">Product Description</label>
                                            <input type="text" class="form-control " id="prod" name="description" value="<?php echo $row['description'] ?>" readonly>
                                          </div>
                                        </div>
                                        <div class="col-sm-2">
                                          <div class="form-group">
                                            <label for="stock">Stock</label>
                                            <input type="number" class="form-control " id="stock" name="stock" value="<?php echo $row['stock'] ?>" readonly>
                                          </div>
                                        </div>
                                        <div class="col-sm-2">
                                          <div class="form-group">
                                            <label for="allo">Allocation</label>
                                            <input type="number" class="form-control " id="allo" name="allocation" value="<?php echo $row['allocation'] ?>">
                                          </div>
                                        </div>
                                        <div class="col-sm-2">
                                          <div class="form-group">
                                            <label for="sa_percentage">S/A%</label>
                                            <input type="text" class="form-control" id="sa_percentage" name="sa_percentage" onkeyup="this.value = this.value.toUpperCase();" value="<?php echo $row['sa_percentage'] ?>%" readonly>
                                          </div>
                                        </div>
                                        <div class="col-sm-3">
                                          <div class="form-group">
                                            <label for="Category">Category</label>
                                            <input type="text" class="form-control " id="Category" name="Category" onkeyup="this.value = this.value.toUpperCase();" autocomplete="off" value="<?php echo $row['category'] ?>" readonly>
                                          </div>
                                        </div>
                                        <div class="col-sm-3">
                                          <div class="form-group">
                                            <label for="rack">Rack</label>
                                            <input type="text" class="form-control " id="rack" name="rack" onkeyup="this.value = this.value.toUpperCase();" autocomplete="off" value="<?php echo $row['rack'] ?>">
                                          </div>
                                        </div>
                                      </div>

                                      <div class="modal-footer justify-content-between">
                                        <?php
                                        $is_superuser =  $_SESSION['login_user']['is_superuser'];
                                        ?>
                                        <input type="hidden" name="is_superuser" value="<?php echo $is_superuser ?>">
                                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Delete</button>
                                        <button type="submit" class="btn btn-primary" name="modify_invent">Update</button>
                                      </div>

                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>

                          <?php } ?>
                        </tbody>
                      </table>
                    </div>

                    <div class="tab-pane fade show" id="heal" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                      <table id="health" class="table table-bordered table-hover dt-center">
                        <thead class="bg-dark">
                          <tr>
                            <th>BARCODE</th>
                            <th>DESCRIPTION</th>
                            <th>STOCK</th>
                            <th>ALLOC.</th>
                            <th>S/A %</th>
                            <th>RACK-IN</th>
                            <th>RACK-OUT</th>
                            <th>RACK</th>
                            <th>ACTION</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $check_user =  $_SESSION['login_user']['user_id'];
                          $user =  $_SESSION['login_user']['employee_name'];
                          $query8 = "SELECT * FROM inventory WHERE category = 'HEALTHY FIX' ";
                          $result8 = mysqli_query($conn, $query8);
                          $check_row = mysqli_num_rows($result8);
                          while ($row = mysqli_fetch_array($result8)) {
                          ?>
                            <tr>
                              <td style="text-overflow: ellipsis;" title="<?php echo $row["barcode"] ?>">
                                  <?php echo $row["barcode"] ?>
                              </td>
                              <td><?php echo $row['description'] ?></td>
                              <td><?php echo $row['stock'] ?></td>
                              <td><?php echo $row['allocation'] ?></td>
                              <td>
                                <div class="project_progress">
                                  <?php
                                  if ($row['sa_percentage'] == NULL) {
                                    echo '<div class="progress progress-sm progress-bar-secondary bg-secondary" style = "width:100%"></div>';
                                  } else if ($row['sa_percentage'] >= 100) {
                                    echo '<div class="progress progress-sm progress-bar-primary bg-primary" style = "width:100%"></div>';
                                  } else if ($row['sa_percentage'] <= 20) {
                                    echo '<div class="progress progress-sm progress-bar-danger bg-danger" style = "width:' . $row['sa_percentage'] . '%"></div>';
                                  } else if ($row['sa_percentage'] <= 30) {
                                    echo '<div class="progress progress-sm progress-bar-warning bg-warning" style = "width:' . $row['sa_percentage'] . '%"></div>';
                                  } else if ($row['sa_percentage'] >= 70) {
                                    echo '<div class="progress progress-sm progress-bar-success bg-success" style = "width:' . $row['sa_percentage'] . '%"></div>';
                                  } else {
                                    echo '<div class="progress progress-sm progress-bar-success bg-success" style = "width:' . $row['sa_percentage'] . '%"></div>';
                                  }
                                  ?>
                                </div>
                                <div>
                                  <?php
                                  if ($row['sa_percentage'] == NULL) {
                                    echo "<span class='badge bg-secondary font-weight-bold'>0%</span>";
                                  } else if ($row['sa_percentage'] >= 100) {
                                    echo "<span class='badge bg-primary font-weight-bold'>" . $row["sa_percentage"] . '%</span>';
                                  } else if ($row['sa_percentage'] <= 20) {
                                    echo "<span class='badge bg-danger font-weight-bold'>" . $row["sa_percentage"] . '%</span>';
                                  } else if ($row['sa_percentage'] <= 30) {
                                    echo "<span class='badge bg-warning font-weight-bold'>" . $row["sa_percentage"] . '%</span>';
                                  } else if ($row['sa_percentage'] >= 70) {
                                    echo "<span class='badge bg-success font-weight-bold'>" . $row["sa_percentage"] . '%</span>';
                                  } else {
                                    echo "<span class='badge bg-success font-weight-bold'>" . $row["sa_percentage"] . '%</span>';
                                  }
                                  ?>
                                </div>
                              </td>
                              <td><?php echo $row['rack_in'] ?></td>
                              <td><?php echo $row['rack_out'] ?></td>
                              <td><?php echo $row['rack'] ?></td>
                              <td>
                                <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#update<?php echo $row['id'] ?>">
                                  <i class="fas fa-pencil-alt"></i>
                                  Edit
                                </button>
                              </td>
                            </tr>
                            <div class="modal fade" id="update<?php echo $row['id'] ?>">
                              <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                  <div class="modal-header bg-info">
                                    <h4 class="modal-title font-weight-bold">UPDATE PRODUCT DETAILS</h4>
                                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <form action="functions.php" method="POST">
                                      <div class="row">
                                        <div class="col-sm-5">
                                          <div class="form-group">
                                            <label for="barcode">Barcode</label>
                                            <input type="text" class="form-control " id="barcode" name="barcode" value="<?php echo $row['barcode'] ?>" readonly>
                                          </div>
                                        </div>
                                        <div class="col-sm-7">
                                          <div class="form-group">
                                            <label for="prod">Product Description</label>
                                            <input type="text" class="form-control " id="prod" name="description" value="<?php echo $row['description'] ?>" readonly>
                                          </div>
                                        </div>
                                        <div class="col-sm-2">
                                          <div class="form-group">
                                            <label for="stock">Stock</label>
                                            <input type="number" class="form-control " id="stock" name="stock" value="<?php echo $row['stock'] ?>" readonly>
                                          </div>
                                        </div>
                                        <div class="col-sm-2">
                                          <div class="form-group">
                                            <label for="allo">Allocation</label>
                                            <input type="number" class="form-control " id="allo" name="allocation" value="<?php echo $row['allocation'] ?>">
                                          </div>
                                        </div>
                                        <div class="col-sm-2">
                                          <div class="form-group">
                                            <label for="sa_percentage">S/A%</label>
                                            <input type="text" class="form-control" id="sa_percentage" name="sa_percentage" onkeyup="this.value = this.value.toUpperCase();" value="<?php echo $row['sa_percentage'] ?>%" readonly>
                                          </div>
                                        </div>
                                        <div class="col-sm-3">
                                          <div class="form-group">
                                            <label for="Category">Category</label>
                                            <input type="text" class="form-control " id="Category" name="Category" onkeyup="this.value = this.value.toUpperCase();" autocomplete="off" value="<?php echo $row['category'] ?>" readonly>
                                          </div>
                                        </div>
                                        <div class="col-sm-3">
                                          <div class="form-group">
                                            <label for="rack">Rack</label>
                                            <input type="text" class="form-control " id="rack" name="rack" onkeyup="this.value = this.value.toUpperCase();" autocomplete="off" value="<?php echo $row['rack'] ?>">
                                          </div>
                                        </div>
                                      </div>

                                      <div class="modal-footer justify-content-between">
                                        <?php
                                        $is_superuser =  $_SESSION['login_user']['is_superuser'];
                                        ?>
                                        <input type="hidden" name="is_superuser" value="<?php echo $is_superuser ?>">
                                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Delete</button>
                                        <button type="submit" class="btn btn-primary" name="modify_invent">Update</button>
                                      </div>

                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>

                          <?php } ?>
                        </tbody>
                      </table>
                    </div> -->

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Modal for transfer rack in and out -->
        <div class="modal fade" id="transfer">
          <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
              <div class="modal-header bg-info">
                <h4 class="modal-title font-weight-bold">TRANSFER RACK IN/OUT</h4>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form name="transfer-form" id="transfer-form" method="POST" action="functions.php">
                  <div class="row align-items-center">
                    <div class="col-sm-5">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-info" id="basic-addon1">Rack In</span>
                        </div>
                        <input type="number" class="form-control" aria-describedby="basic-addon1" id="rack-in" value="0" readonly>
                      </div>                
                    </div>
                    <div class="col-sm-2 text-center">
                      <button type="submit" class="btn btn-danger btn-md w-75 mb-1" name="to_rack_out"><i class="fas fa-arrow-right"></i></button>
                      <button type="submit" class="btn btn-primary btn-md w-75 mt-1" name="to_rack_in"><i class="fas fa-arrow-left"></i></button>
                    </div>
                    <div class="col-sm-5">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-info" id="basic-addon2">Rack Out</span>
                        </div>
                        <input type="number" class="form-control" aria-describedby="basic-addon2" id="rack-out" value="0" readonly>
                      </div>                
                    </div>
                  </div>
                  <div class="row mt-3">
                    <div class="col-sm-3">
                      <label for="barcode-transfer">Barcode:</label>
                      <input type="text" class="form-control" name="barcode-transfer" id="barcode-transfer">
                    </div>
                    <div class="col-sm-4">
                      <label for="desc-transfer">Description:</label>
                      <input type="text" class="form-control" id="desc-transfer" readonly>
                    </div>
                    <div class="col-sm-3">
                      <label for="rack-transfer">Rack Position:</label>
                      <input type="text" class="form-control" id="rack-transfer" readonly>
                    </div>
                    <div class="col-sm-2">
                      <label for="qty-transfer">Quantity:</label>
                      <input type="number" class="form-control" name="qty-transfer" id="qty-transfer" min="0" required>
                    </div>
                    <h6 class="d-none text-warning font-weight-bold ml-2" id="warning-transfer-text">This product was not enrolled.</h6>
                    <h6 class="d-none text-warning font-weight-bold ml-2" id="warning-ro-text">Quantity exceeds the rack-out quantity.</h6>
                    <h6 class="d-none text-warning font-weight-bold ml-2" id="warning-ri-text">Quantity exceeds the rack-in quantity.</h6>
                  </div>
                </form>
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
  <!-- /.content-wrapper -->

<?php } ?>