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
                        <div class="card-body row g-2">
                            <div class="col-md-2">
                                <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#addnew">
                                    <i class="fas fa-plus-circle mr-1"></i> ADD NEW PRODUCT
                                </button>
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-danger btn-block" id="delete-items" disabled>
                                    <i class="fas fa-trash mr-1"></i> DELETE ITEMS
                                </button>
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-secondary btn-block" data-toggle="modal" data-target="#upload">
                                    <i class="fas fa-file-import mr-1"></i> UPLOAD DATA
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-striped table-hover text-center" style="font-size: 15px;">
                                        <thead class="thead-dark">
                                            <tr class=text-center>
                                                <th><input id="selectAll" type="checkbox" style="width: 16px; height: 16px;" /></th>
                                                <th>BARCODE</th>
                                                <th>PRODUCT DESCRIPTION</th>
                                                <th>GENERIC NAME</th>
                                                <th>CATEGORY</th>
                                                <th>SUPPLIER</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody id="tablebody2"></tbody>
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
                                                <select class="form-control selectpicker1" data-size='5' data-live-search="true" style="width: 100%;" name="category" id="category" required>
                                                    <option selected value="" disabled>Please Select Category</option>
                                                    <option value="GENERIC CAT 1">GENERIC CAT 1</option>
                                                    <option value="GENERIC CAT 2">GENERIC CAT 2</option>
                                                    <option value="BRANDED">BRANDED</option>
                                                    <option value="VAL RECOMMEND 1">VAL RECOMMEND 1</option>
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
                                                <select class="form-control selectpicker2" data-container="body" data-size='5' data-live-search="true" style="width: 100%;" name="supplier" id="supp" required>
                                                    <option selected value="" disabled>Please Select Supplier</option>
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
                                        <small class="text-info font-weight-bold mx-2">Note: Some products has no barcode. Please check the product description to avoid duplication.</small>
                                    </div>
                                    <div class="modal-footer justify-content-between px-0 mx-0">
                                        <button type="button" class="btn btn-default mx-0" data-dismiss="modal">Cancel</button>
                                        <button type="submit" id="enroll-submit-btn" class="btn btn-primary mx-0" disabled>Add Product</button>
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
                                    <input type="hidden" name="id-hidden" id="id-hidden">
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
                                                <select class="form-control selectpicker3" data-live-search="true" style="width: 100%;" name="cat-modal" id="cat-modal">
                                                    <option value="GENERIC CAT 1">GENERIC CAT 1</option>
                                                    <option value="GENERIC CAT 2">GENERIC CAT 2</option>
                                                    <option value="BRANDED">BRANDED</option>
                                                    <option value="VAL RECOMMEND 1">VAL RECOMMEND 1</option>
                                                    <option value="MEDICAL DEVICE">MEDICAL DEVICE</option>
                                                    <option value="NON-PHARMA">NON-PHARMA</option>
                                                    <option value="SPECIAL ORDER">SPECIAL ORDER</option>
                                                    <option value="HOUSE BRANDS">HOUSE BRANDS</option>
                                                    <option value="HEALTHY FIX">HEALTHY FIX</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="supp-modal">Supplier:</label>
                                                <select class="form-control selectpicker4" data-container="body" data-size='5' data-live-search="true" style="width: 100%;" name="supp-modal" id="supp-modal">
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
                                                <img alt="Product photo" class="img-fluid modal-field" id="img-modal" style="height: 75%; width: 100%;">
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
                                                <p class="text-danger">Deleting this product will also delete its data on the inventory. Do you want to continue?</p>
                                            </div>
                                            <div class="modal-footer justify-content-end">
                                                <button type="button" class="btn btn-secondary close-modal-delete2">No, Go Back</button>
                                                <button type="button" class="btn btn-outline-danger" onclick="deleteProduct();">Yes</button>
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

                <div class="modal fade" id="upload">
                    <div class="modal-dialog modal-dialog-centered modal-md">
                        <div class="modal-content">
                            <div class="modal-header bg-secondary">
                                <h4 class="modal-title font-weight-bold">Upload New Product</h4>
                                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <span id="message"></span>
                                <form id="sample_form"  enctype="multipart/form-data">
                                    <input type="hidden" name="action" value="upload">
                                    <div class="row px-3">
                                        <div class="custom-file form-group" id="file_group">
                                            <input type="file" class="custom-file-input" id="excel" accept=".csv,.xlsx,.xls" name="import_file">
                                            <label class="custom-file-label" for="excel" id="excel-label">Choose
                                                File</label>
                                        </div>
                                        <small class="text-info font-weight-bold mx-0 my-2"> Note: Please use the template provided. Click 'Download Template'</small>
                                        <div class="form-group w-100" id="name_upload" hidden>
                                            <input type="text" class="form-control w-100" name="upload_name" id="upload_name" autocomplete="off" readonly>
                                        </div> 
                                    </div>
                                    
                                    <div class="form-group mt-3" id="gif" style="display:none;">
                                        <img src="dist\img\waiting.gif" style="width:100%; height:250px; object-fit:cover;" alt="waiting">
                                    </div>
                                                                 
                                    <div class="modal-footer justify-content-between w-100">
                                        <input type="button" value="Download Template" name="import_file_button" id="import_file_button" onclick="DownloadFile('web-system-masterlist-template.xlsx')" class="btn btn-secondary mx-0" />
                                        <button type="submit" name="save_excel_data" id="save_excel_data" class="btn btn-primary mx-0"  disabled>Import</button>
                                    </div>
                                </form>
                                <audio id="myAudio">
                                    <source src="dist\mp3\waiting_sound.mp3" type="audio/mpeg">
                                </audio>
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