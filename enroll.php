<?php 
include('connection.php');
session_start();
date_default_timezone_set('Asia/Manila');

#PRODUCT ENROLLMENT
header("Content-Type: text/json; charset=utf8");

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $barcode = $_POST["barcode"];
    $description = $_POST["description"];
    $generic_name = $_POST["generic_name"];
    $category = $_POST["category"];
    $image = $_FILES["imageFile"];
    $last_edited_by = $_POST["employee_id"];
    $last_edited_on = date("Y-m-d h:i:s");
    $table = "product_masterlist";

    if($_FILES["imageFile"]["name"] != '') { //check if there is uploaded file
        $allowed_ext = array("png", "jpeg", "jpg"); //allowed image extensions
        $tmp = explode(".", $_FILES["imageFile"]["name"]); //get uploaded file ext
        $ext = end($tmp);

        if(in_array($ext, $allowed_ext)) { // check if extension is valid
            // check if size of image is limited
            $name = "$description" . '.' . $ext; // rename image file
            $path = "product-imgs/" . $name; // image upload path
            move_uploaded_file($_FILES["imageFile"]["tmp_name"], $path);
        }
    }

    #Insert new products in the database 
    $conn->query("INSERT INTO `$table` (`barcode`, `description`, `category`, `image`, `last_edited_by`, `last_edited_on`)
                VALUES ('$barcode', '$description', '$category', '$path', $last_edited_by,  '$last_edited_on');") or die ('Error Could Not Query');

    if(!mysqli_error($conn)) {
        // raise error
        echo json_encode("success");
    }
}
?>