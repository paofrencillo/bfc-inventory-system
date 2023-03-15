<?php
    include('connection.php');
    session_start();
    date_default_timezone_set('Asia/Manila');

    #PRODUCT UPDATE DETAILS
    if(isset($_POST["update_masterlist"])) {
        $barcode = $_POST["barcode-modal"];
        $description = $_POST["desc-modal"];
        $generic_name = $_POST["gen-modal"];
        $category = $_POST["cat-modal"];
        $image = $_FILES["imageFile2"];
        $last_edited_by = $_POST["employee_id"];
        $last_edited_on = date("Y-m-d H:i:s");
        $table = "product_masterlist";
    
        if($_FILES["imageFile2"]["name"] != '') { //check if there is uploaded file
            $allowed_ext = array("png", "jpeg", "jpg"); //allowed image extensions
            $tmp = explode(".", $_FILES["imageFile2"]["name"]); //get uploaded file ext
            $ext = end($tmp);
    
            if(in_array($ext, $allowed_ext)) { // check if extension is valid
                // check if size of image is limited
                $name = "$description" . '.' . $ext; // rename image file
                $path = "product-imgs/" . $name; // image upload path
                move_uploaded_file($_FILES["imageFile2"]["tmp_name"], $path);
            }
        }   
        // Check if barcode is changed
        // If not then proceed to code below
        // Update product in the database 
        $conn->query("UPDATE `$table` SET `description`='$description', `generic_name`='$generic_name',
                    `category`='$category', `image`='$path', `last_edited_by`=$last_edited_by,
                    `last_edited_on`='$last_edited_on' WHERE barcode=`$barcode`;");
    
        if(!mysqli_error($conn)) {
            // raise error
            echo json_encode("success");
        }
    }
?>
