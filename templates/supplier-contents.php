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
} else {?>
   
   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Supplier List</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <div class="col-12">
          <div class="card card-outline card-primary">
            <div class="card-header text-center">
              <a href="#" class="h1"><b>Add</b> Supplier</a>
              <div class="card-tools">
                <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body text-right">
              <p class="login-box-msg">Enroll New Supplier</p>
              <?php
              $check_name =  $_SESSION['login_user']['user'];
              $query = "SELECT * FROM users WHERE user='$check_name'";
              $result = mysqli_query($conn, $query);
              while ($row = mysqli_fetch_array($result)) {
              ?>
              <form action="functions.php" method="post">
                <div class="input-group mb-3">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-truck"></span>
                    </div>
                  </div>
                  <input type="text" class="form-control" name="supplier_name" placeholder="Enter name of Supplier" autocomplete="off" required>
                </div>
                <!-- /.col -->
                <div class="col-12">
                  <input type="hidden" name="id_lastuser" value="<?php echo $row['user_id'] ?>">
                  <button type="submit" class="btn btn-primary" name="supplier">Add Supplier</button>
                </div>
              </form>
              <?php } ?>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.row -->
        </div>

        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table id="example1" class="table table-bordered table-hover dt-center">
                      <thead>
                        <tr>
                          <th>ID #</th>
                          <th>Supplier Name</th>
                          <th>Last Edited By</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $check_user =  $_SESSION['login_user']['user_id'];
                        $query = "SELECT * FROM suppliers";
                        $result = mysqli_query($conn, $query);
                        $check_row = mysqli_num_rows($result);
                        while ($row = mysqli_fetch_array($result)) {
                          $last_user = $row['last_edited_by'];
                        ?>
                          <tr>
                            <td><?php echo $row['supplier_id'] ?></td>
                            <td><?php echo $row['supplier_name'] ?></td>
                            <?php
                            $query2 = "SELECT * FROM users WHERE user_id ='$last_user'";
                            $result2 = mysqli_query($conn, $query2);
                            while ($row2 = mysqli_fetch_array($result2)) {
                            ?>

                              <td><?php echo $row2['employee_name'] ?></td>
                              <td>
                                <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#update<?php echo $row['supplier_id'] ?>">
                                  <i class="fas fa-pencil-alt"></i>
                                  Edit
                                </button>
                                <!-- /.modal -->
                                <div class="modal fade" id="update<?php echo $row['supplier_id'] ?>">
                                  <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h4 class="modal-title">UPDATE PRODUCT DETAILS</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <form action="functions.php" method="POST">
                                          <div class="row">
                                            <div class="col-md-12">
                                              <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" class="form-control " id="name" name="supplier_name" value="<?php echo $row['supplier_name'] ?>" required>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="modal-footer">
                                            <input type="hidden" name="supplier_modify" value="<?php echo $row['supplier_id'] ?>">
                                            <input type="hidden" name="last_user" value="<?php echo $check_user ?>">
                                            <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button> -->
                                            <button type="submit" class="btn btn-outline-danger" name="delete_supplier">Delete</button>
                                            <button type="submit" class="btn btn-primary" name="modify_supplier">Save Changes</button>
                                          </div>
                                        </form>
                                      </div>
                                    </div>
                                    <!-- /.modal-content -->
                                  </div>
                                  <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->
                              </td>
                          </tr>
                        <?php } ?>
                      <?php } ?>
                      </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      <!-- /.content-header -->
    </div>
    <!-- /.content-wrapper -->
<?php }?>