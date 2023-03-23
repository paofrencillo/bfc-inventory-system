<?php
include('templates/connection.php');
include('templates/session.php');
header("Content-Type: text/json; charset=utf8");
date_default_timezone_set('Asia/Manila');

if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
    if (isset($_GET["action"]) && $_GET['action'] === 'get_product') {
        $barcode = $_GET["barcode"];
        $table = "product_masterlist";
        $query_get = "SELECT * FROM $table WHERE barcode='$barcode';";
        $result = mysqli_query($conn, $query_get);
    
        if ($result->num_rows == 0) {
            $data = "Not found";
            echo json_encode($data);
        } else {
            while ($row = mysqli_fetch_array($result)) {
                $data = array(
                    "description" => $row["description"],
                    "supplier" => $row["supplier"],
                );
                echo json_encode($data);
            }
        }
    }  else {
        /* 
        Up to you which header to send, some prefer 404 even if 
        the files does exist for security
        */
        header('HTTP/1.0 500 Internal Server Error', TRUE, 500);
    
        /* choose the appropriate page to redirect users */
        die(header('location: ../500.html'));
     
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['action'] === 'receive_prod'){
        $last_edited_by = $_SESSION['login_user']['employee_name'];
        $last_edited_on = date("Y-m-d H:i:s");
        $entry_date = $_POST["entry_date"]
        $barcode = $_POST["barcode"];
        $description = $_POST["description"];
        $quantity = $_POST["quantity"];
        $lot = $_POST["lot"];
        $expiration = $_POST["expiration"];
        $table = "product_in";
        
        #Insert new products in the database 
        $conn->query("INSERT INTO $table (barcode, description, in_quantity, lot_no, entry_date, exp_date, last_edited_by, last_edited_on)
        VALUES ('$barcode', '$description', '$quantity', '$lot', '$entry_date', '$expiration', '$last_edited_by', '$last_edited_on');") or die('Error Could Not Query');
        
        $data = array(
            "barcode" => $barcode,
            "description" => $description,
            "quantity" => $quantity,
            "lot" => $lot,
            "expiration" => $expiration,
        );
        echo json_encode($data);
    }
}




