<?php
include('templates/connection.php');
include('templates/session.php');
header("Content-Type: text/json; charset=utf8");
date_default_timezone_set('Asia/Manila');

if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
    if (isset($_GET["action"]) && $_GET['action'] === 'get_product') {
        $barcode = $_GET["barcode"];
        $table = "product_masterlist";
        $query_get = "SELECT description, supplier FROM $table WHERE barcode='$barcode';";
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
    } else if (isset($_GET["action"]) && $_GET['action'] === 'get_product_in') {
        $id = $_GET["id"];
        $table = "product_in";
        $query_get = "SELECT * FROM $table WHERE id=$id;";
        $result = mysqli_query($conn, $query_get);
    
        if ($result->num_rows == 0) {   
            $data = "Not found";
            echo json_encode($data);
        } else {
            while ($row = mysqli_fetch_array($result)) {
                $date = date_create($row["entry_date"]);
                $date = date_format($date, "m-d-Y");
                $data = array(
                    "id" => $row["id"],
                    "barcode" => $row["barcode"],
                    "description" => $row["description"],
                    "supplier" => $row["supplier"],
                    "lot_no" => $row["lot_no"],
                    "entry_date" => $date,
                    "exp_date" => $row["exp_date"],
                    "in_quantity" => $row["in_quantity"],
                );
                echo json_encode($data);
            }
        }
    } 
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Receive Product In
    if (isset($_POST["action"]) && $_POST['action'] === 'receive_prod'){
        $last_edited_by = $_SESSION['login_user']['employee_name'];
        $last_edited_on = date("Y-m-d H:i:s");
        $entry_date = date("Y-m-d H:i:s");
        $barcode = $_POST["barcode"];
        $description = $_POST["description"];
        $supplier = $_POST["supp"];
        $quantity = $_POST["quantity"];
        $lot = $_POST["lot"];
        $exp = $_POST["exp"];
        $table = "product_in";
        
        #Insert new products in the database 
        $conn->query("INSERT INTO $table (barcode, description, supplier, in_quantity, lot_no, entry_date, exp_date, last_edited_by, last_edited_on)
        VALUES ('$barcode', '$description', '$supplier', '$quantity', '$lot', '$entry_date', '$exp', '$last_edited_by', '$last_edited_on');") or die('Error Could Not Query');
        
        $data = array(
            "barcode" => $barcode,
            "description" => $description,
            "quantity" => $quantity,
            "lot" => $lot,
            "exp" => $exp,
        );
        echo json_encode($data);
    }
    // Update Product In
    else if (isset($_POST["action"]) && $_POST['action'] === 'update_prod_in'){
        $last_edited_by = $_SESSION['login_user']['employee_name'];
        $last_edited_on = date("Y-m-d H:i:s");
        $id = $_POST["id-details"];
        $quantity = $_POST["quantity-details"];
        $lot = $_POST["lot-details"];
        $expiration = $_POST["exp-details"];
        $table = "product_in";  
        
        #Update product in the database 
        $conn->query("UPDATE $table SET in_quantity=$quantity, lot_no='$lot', exp_date='$expiration', last_edited_by='$last_edited_by',
                    last_edited_on='$last_edited_on' WHERE id='$id';") or die('Error Could Not Query');

        if(!mysqli_error($conn)) {
            echo json_encode("success");
        }
    } 
    // Delete Product In
    else if (isset($_POST['action']) && $_POST['action'] === 'delete') {
        $id = $_POST["id"];
        $table = "product_in";

        #Delete product_in in the database 
        $conn->query("DELETE FROM $table WHERE id='$id';") or die('Error Could Not Query');

        if(!mysqli_error($conn)) {
            echo json_encode("success");
        }
    }
}
