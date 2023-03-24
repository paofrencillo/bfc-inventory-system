<?php
include('templates/connection.php');
date_default_timezone_set('Asia/Manila');

// Restrict user fron accessing the php file directly
if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
    /* 
    Up to you which header to send, some prefer 404 even if 
    the files does exist for security
    */
    header('HTTP/1.0 500 Internal Server Error', TRUE, 500);

    /* choose the appropriate page to redirect users */
    die(header('location: ../500.html'));
}
#PRODUCT ENROLLMENT
if (!empty($_POST) && $_SERVER["REQUEST_METHOD"] === 'POST' && !empty($_POST['action']) && $_POST['action'] === 'enroll') {
    $barcode = $_POST["barcode"];
    $description = $_POST["description"];
    $generic_name = $_POST["generic_name"];
    $category = $_POST["category"];
    $supplier = $_POST["supplier"];
    $image = $_FILES["imageFile"];
    $last_edited_by = $_POST["employee_id"];
    $last_edited_on = date("Y-m-d H:i:s");
    $table = "product_masterlist";

    # Check if product is already existed
    $query = "SELECT barcode FROM $table WHERE barcode='$barcode';";
    $result = $conn->query($query);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $data = "success";
            echo json_encode($data);
        } else {
            echo 'not found';
        }
    } else {
        echo 'Error: ' . mysqli_error($conn);
    }
    // // close connection
    // mysqli_close($conn);

    if ($_FILES["imageFile"]["name"] != '') { //check if there is uploaded file
        $allowed_ext = array("png", "jpeg", "jpg"); //allowed image extensions
        $tmp = explode(".", $_FILES["imageFile"]["name"]); //get uploaded file ext
        $ext = end($tmp);

        if (in_array($ext, $allowed_ext)) { // check if extension is valid
            // check if size of image is limited
            $name = "$description" . '.' . $ext; // rename image file
            $path = "product-imgs/" . $name; // image upload path
            move_uploaded_file($_FILES["imageFile"]["tmp_name"], $path);
        }
    } else if ($_FILES["imageFile"]["name"] == '') {
        $path = "dist/img/valuemed-logo.png";
    }

    #Insert new products in the database 
    $conn->query("INSERT INTO $table (barcode, description,  generic_name, category, supplier, image, last_edited_by, last_edited_on)
                    VALUES ('$barcode', '$description', '$generic_name', '$category', '$supplier', '$path', $last_edited_by, '$last_edited_on');") or die('Error Could Not Query');

    if (!mysqli_error($conn)) {
        // raise error
        echo json_encode("error");
    }
}

#PRODUCT UPDATE DETAILS
if (!empty($_POST) && $_SERVER["REQUEST_METHOD"] === 'POST' && !empty($_POST['action']) && $_POST['action'] === 'update') {
    $barcode = $_POST["barcode-modal"];
    $description = $_POST["desc-modal"];
    $generic_name = $_POST["gen-modal"];
    $category = $_POST["cat-modal"];
    $supplier = $_POST["supp-modal"];
    $image = $_FILES["imageFile2"];
    $last_edited_by = $_POST["employee_id"];
    $last_edited_on = date("Y-m-d H:i:s");
    $table = "product_masterlist";

    if ($_FILES["imageFile2"]["name"] != '') { //check if there is uploaded file
        $allowed_ext = array("png", "jpeg", "jpg"); //allowed image extensions
        $tmp = explode(".", $_FILES["imageFile2"]["name"]); //get uploaded file ext
        $ext = end($tmp);

        if (in_array($ext, $allowed_ext)) { // check if extension is valid
            // check if size of image is limited
            $name = "$description" . '.' . $ext; // rename image file
            $path = "product-imgs/" . $name; // image upload path
            move_uploaded_file($_FILES["imageFile2"]["tmp_name"], $path);

            $conn->query("UPDATE $table SET description='$description', generic_name='$generic_name',
                            category='$category', supplier='$supplier', image='$path', last_edited_by=$last_edited_by,
                            last_edited_on='$last_edited_on' WHERE barcode='$barcode';");
        }
    } else if ($_FILES["imageFile2"]["name"] == '') { // if image was not updated
        $conn->query("UPDATE $table SET description='$description', generic_name='$generic_name',
                        category='$category', supplier='$supplier', last_edited_by=$last_edited_by,
                        last_edited_on='$last_edited_on' WHERE barcode='$barcode';");
    }

    if(!mysqli_error($conn)) {
        // raise error
        echo json_encode("success");
    }
}

# DELETE PRODUCT
if (!empty($_POST) && $_SERVER["REQUEST_METHOD"] === 'POST' && !empty($_POST['action']) && $_POST['action'] === 'delete') {
    $barcode = $_POST["barcode"];
    $table = "product_masterlist";
    $sql = "DELETE FROM $table WHERE barcode='$barcode';";
    $data["barcode"] = $barcode;
    $data["action"] = $_POST["action"];
    echo json_encode($data);

    if ($conn->query($sql) === TRUE) {
        $data["barcode"] = $barcode;
        $data["action"] = $_POST["action"];
        echo json_encode($data);
    } else {
        echo "Error deleting record";
    }
}