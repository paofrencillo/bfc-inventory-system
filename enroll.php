<?php 
include('connection.php');
session_start();
date_default_timezone_set('Asia/Manila');

#PRODUCT ENROLLMENT
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add_product"])) {
    $barcode = $_POST["barcode"];
    $description = $_POST["description"];
    $image = $_FILES["imageFile"];
    $last_edited_by = $_POST["employee_id"];
    $last_edited_on = date("Y-m-d");

    if($_FILES["imageFile"]["name"] != '') { //check if there is uploaded file
        $allowed_ext = array("png", "jpeg", "jpg"); //allowed image extensions
        $tmp = explode(".", $_FILES["imageFile"]["name"]); //get uploaded file ext
        $ext = end($tmp);

        if(in_array($ext, $allowed_ext)) { // check if extension is valid
            // check if size of image is limited
            $name = "$description" . '.' . $ext; // rename image file
            $path = "../dist/img/product-imgs/"; // image upload path
            $pathname = $pathname . $name; // image upload path
            move_uploaded_file($_FILES["imageFile"]["tmp_name"], $path);
        }
    }

    #Insert new products in the database
    $table = "product_masterlist";
    $conn->query("INSERT INTO `$table` (`barcode`, `description`, `image`, `last_edited_by`, `last_edited_on`)
                VALUES ('$barcode', '$description', '$pathname', $last_edited_by,  '$last_edited_on');");

    if(!mysqli_error($conn)) {
        echo json_encode('success');
        exit;
    }
}
?>