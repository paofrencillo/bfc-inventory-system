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
                        <h1 class="m-0">Masterlist</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->

            <section class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Enroll New Products</h3>
                        </div>
                        <div class="card-body">
                            <div class="col-md-2">
                                <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#addnew"><i class="fas fa-plus-circle"></i> ADD NEW PRODUCT</button>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-hover">
                                        <thead class="thead-dark">
                                            <tr class=text-center>
                                                <th>BARCODE</th>
                                                <th>PRODUCT DESCRIPTION</th>
                                                <th>GENERIC NAME</th>
                                                <th>CATEGORY</th>
                                                <th>ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $query = "SELECT * FROM product_masterlist ORDER BY last_edited_on DESC;";
                                            $result = mysqli_query($conn, $query);
                                            while ($row = mysqli_fetch_array($result)) {
                                                $last_user = $row['last_edited_by'];
                                                $date = date_create($row["last_edited_on"]);
                                                $date = date_format($date, "d/m/Y h:i");
                                            ?>
                                                <tr class="text-center">
                                                    <td>
                                                        <?php echo $row["barcode"] ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row["description"] ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row["generic_name"] ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row["category"] ?>
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-info btn-sm" data-id="<?php echo $row["barcode"]; ?>" data-toggle="modal" data-target="#edit" onclick="viewModal2(this);">
                                                            <i class="fas fa-pencil-alt"></i>
                                                            Edit
                                                        </button>
                                                        <button class="btn btn-secondary btn-sm" data-id="<?php echo $row["barcode"]; ?>" data-toggle="modal" data-target="#details" onclick="viewModal1(this);">
                                                            <i class="fas fa-eye"></i>
                                                            Details
                                                        </button>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="addnew">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <h4 class="modal-title font-weight-bold">ENROLL NEW PRODUCT</h4>
                                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form name="enroll_form" id="enroll_form" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="action" value="enroll">
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <label for="barcode">Barcode:</label>
                                                <input type="text" class="form-control" name="barcode" id="barcode" autocomplete="off" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-7">
                                            <div class="form-group">
                                                <label for="description">Product Description:</label>
                                                <input type="text" class="form-control" name="description" id="description" autocomplete="off" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <label for="generic_name">Generic Name:</label>
                                                <input type="text" class="form-control" name="generic_name" id="generic_name" autocomplete="off" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-7">
                                            <div class="form-group mb-3">
                                                <label for="category">Category:</label>
                                                <select class="form-control selectpicker" data-live-search="true" style="width: 100%;" name="category" id="category" required>
                                                    <option value="GENERIC">GENERIC</option>
                                                    <option value="BRANDED">BRANDED</option>
                                                    <option value="MEDICAL DEVICE">MEDICAL DEVICE</option>
                                                    <option value="NON-PHARMA">NON-PHARMA</option>
                                                    <option value="SPECIAL ORDER">SPECIAL ORDER</option>
                                                    <option value="HOUSE BRANDS">HOUSE BRANDS</option>
                                                    <option value="HEALTHY FIX">HEALTHY FIX</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <label for="supp">Supplier:</label>
                                                <select class="form-control selectpicker" data-container="body" data-size='5' data-live-search="true" style="width: 100%;" name="supplier" id="supp" required>
                                                    <?php
                                                    $query2 = "SELECT * FROM suppliers";
                                                    $result = mysqli_query($conn, $query2);
                                                    $check_row = mysqli_num_rows($result);
                                                    while ($row2 = mysqli_fetch_array($result)) {
                                                    ?>
                                                        <option value="<?php echo $row2['supplier_name'] ?>"><?php echo $row2['supplier_name'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-7">
                                            <label>Image:</label>
                                            <div class="custom-file form-group">
                                                <input type="file" class="custom-file-input" id="imageFile" accept=".png,.jpeg,.jpeg" name="imageFile">
                                                <label class="custom-file-label" for="imageFile" id="file-label">Choose
                                                    Image</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <h6 class="text-success font-weight-bold mt-2 d-none" id="enroll_success_text">
                                                Product enrolled successfully!
                                            </h6>
                                            <h6 class="text-danger font-weight-bold mt-2 d-none" id="enroll_error_text">
                                                Product enrollment failed. Try again.
                                            </h6>
                                            <h6 class="text-warning font-weight-bold mt-2 d-none" id="enroll_warning_text">
                                                This product was already enrolled.
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-between px-0 mx-0">
                                        <button type="button" class="btn btn-default mx-0" data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary mx-0">Add Product</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->

                <div class="modal fade" id="edit">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header bg-info">
                                <h4 class="modal-title font-weight-bold">EDIT PRODUCT</h4>
                                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form name="update_masterlist_form" id="update_masterlist_form" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="barcode-hidden" id="barcode-hidden">
                                    <input type="hidden" name="action" value="update">
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <label for="barcode-modal">Barcode:</label>
                                                <input type="text" class="form-control modal-field" name="barcode-modal" id="barcode-modal" autocomplete="off" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-7">
                                            <div class="form-group">
                                                <label for="desc-modal">Product Description:</label>
                                                <input type="text" class="form-control modal-field" name="desc-modal" id="desc-modal" autocomplete="off" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <label for="gen-modal">Generic Name:</label>
                                                <input type="text" class="form-control modal-field" name="gen-modal" id="gen-modal" autocomplete="off" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="cat-modal">Category:</label>
                                                <select class="form-control selectpicker" data-live-search="true" style="width: 100%;" name="cat-modal" id="cat-modal">
                                                    <option value="GENERIC">GENERIC</option>
                                                    <option value="BRANDED">BRANDED</option>
                                                    <option value="MEDICAL DEVICE">MEDICAL DEVICE</option>
                                                    <option value="NON-PHARMA">NON-PHARMA</option>
                                                    <option value="SPECIAL ORDER">SPECIAL ORDER</option>
                                                    <option value="HOUSE BRANDS">HOUSE BRANDS</option>
                                                    <option value="HEALTHY FIX">HEALTHY FIX</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="supp-modal">Supplier:</label>
                                                <select class="form-control selectpicker" data-container="body" data-size='5' data-live-search="true" style="width: 100%;" name="supp-modal" id="supp-modal">
                                                    <?php
                                                    $query2 = "SELECT * FROM suppliers";
                                                    $result = mysqli_query($conn, $query2);
                                                    $check_row = mysqli_num_rows($result);
                                                    while ($row2 = mysqli_fetch_array($result)) {
                                                    ?>
                                                        <option value="<?php echo $row2['supplier_name'] ?>"><?php echo $row2['supplier_name'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-7">
                                            <div class="position-relative">
                                                <div class="w-100">
                                                    <label for="img-modal">Image:</label>
                                                </div>
                                                <div class="custom-file form-group mb-2 d-none" id="img-update-field">
                                                    <input type="file" class="custom-file-input modal-field" id="imageFile2" accept=".png,.jpeg,.jpeg" name="imageFile2" readonly>
                                                    <label class="custom-file-label" for="imageFile2" id="file-label2">Choose Image</label>
                                                </div>
                                                <img alt="Product photo" class="img-fluid modal-field" id="img-modal" style="height: 100%; width: 100%;">
                                            </div>
                                        </div>
                                        <h6 class="text-success font-weight-bold mt-2 d-none" id="update_success_text">
                                            Product updated successfully!
                                        </h6>
                                        <h6 class="text-danger font-weight-bold mt-2 d-none" id="update_error_text">
                                            Product update failed. Try again.
                                        </h6>
                                        <div class="modal-footer justify-content-between col-sm-12 mx-0 pb-0 px-0">
                                            <button type="button" class="btn btn-outline-danger" id="delete-product-btn" data-toggle="modal" data-target="#delete-modal">Delete</button>
                                            <button type="button" class="btn btn-primary" id="update-btn" onclick="editDetails(this);">
                                                <i class="fas fa-pencil-alt mr-2"></i>Update Details
                                            </button>
                                            <div class="justify-content-around d-none" id="save-cancel-btns">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-success">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="modal fade" tabindex="-1" id="delete-modal" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-sm modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title font-weight-bold text-danger">Delete Product</h5>
                                                <button type="button" class="close close-modal-delete1" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p class="text-danger">Are you sure you want to delete this product in the
                                                    inventory?</p>
                                            </div>
                                            <div class="modal-footer justify-content-end">
                                                <button type="button" class="btn btn-outline-secondary close-modal-delete2">Cancel</button>
                                                <button type="button" class="btn btn-danger" onclick="deleteProduct();">Yes,
                                                    Delete it</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
                <div class="modal fade" id="details">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header bg-secondary">
                                <h4 class="modal-title font-weight-bold">PRODUCT DETAILS</h4>
                                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="barcode-modal-details">Barcode:</label>
                                            <input type="text" class="form-control modal-field-details" id="barcode-modal-details" autocomplete="off" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="cat-modal-details">Category:</label>
                                            <input type="text" class="form-control modal-field-details" id="cat-modal-details" autocomplete="off" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="supp-modal-details">Supplier:</label>
                                            <input type="text" class="form-control modal-field-details" id="supp-modal-details" autocomplete="off" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="edited-modal-details">Last Edited By:</label>
                                            <input type="text" class="form-control modal-field-details" id="edited-modal-details" autocomplete="off" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="desc-modal-details">Product Description:</label>
                                            <input type="text" class="form-control modal-field-details" id="desc-modal-details" autocomplete="off" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="gen-modal-details">Generic Name:</label>
                                            <input type="text" class="form-control modal-field-details" id="gen-modal-details" autocomplete="off" readonly>
                                        </div>
                                        <div class="position-relative">
                                            <div class="w-100">
                                                <label for="img-modal-details">Image:</label>
                                                <img alt="Product photo" class="img-fluid modal-field" id="img-modal-details" style="height: 100%; width: 100%;">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" tabindex="-1" id="delete-modal" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-sm modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title font-weight-bold text-danger">Delete Product</h5>
                                                <button type="button" class="close close-modal-delete1" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p class="text-danger">Are you sure you want to delete this product in the
                                                    inventory?</p>
                                            </div>
                                            <div class="modal-footer justify-content-end">
                                                <button type="button" class="btn btn-outline-secondary close-modal-delete2">Cancel</button>
                                                <button type="button" class="btn btn-danger" onclick="deleteProduct();">Yes,
                                                    Delete it</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
            </section>
        </div>
        <!-- /.content-header -->
    </div>
    <!-- /.content-wrapper -->
<?php } ?>