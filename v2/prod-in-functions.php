<?php
include('templates/connection.php');
include('templates/session.php');
header("Content-Type: text/json; charset=utf8");
date_default_timezone_set('Asia/Manila');

if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
    if (isset($_GET["action"]) && $_GET['action'] === 'reloadTable') {
        $table = "product_in";
        $added_by = $_SESSION["login_user"]["employee_name"];
        $query_get = "SELECT * FROM $table WHERE added_by='$added_by';";
        $result = mysqli_query($conn, $query_get);
    
        if ($result->num_rows == 0) {   
            $data = "Not found";
            echo json_encode($data);
        } else {
            $data = array();
            while ($row = mysqli_fetch_array($result)) {
                array_unshift($data, $row);
            }
            echo json_encode($data);
        }
    }
    else if (isset($_GET["action"]) && $_GET['action'] === 'get_product') {
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
                    "description" => htmlspecialchars_decode($row["description"]),
                    "supplier" => $row["supplier"],
                );
                echo json_encode($data);
            }
        }
    }
   
    else if (isset($_GET["action"]) && $_GET['action'] === 'get_product_in') {
        $id = $_GET["id"];
        $table = "product_in_final";
        $query_get = "SELECT * FROM $table WHERE id=$id;";
        $result = mysqli_query($conn, $query_get);
    
        if ($result->num_rows == 0) {   
            $data = "Not found";
            echo json_encode($data);
        } else {
            while ($row = mysqli_fetch_array($result)) {
                if ($row["last_edited_on"] != '0000-00-00 00:00:00') {
                    $date = date_create($row["last_edited_on"]);
                    $date = date_format($date, "m-d-Y h:i");
                } else {
                    $date = '';
                }
                $data = array(
                    "id" => $row["id"],
                    "barcode" => $row["barcode"],
                    "description" => htmlspecialchars_decode($row["description"]),
                    "in_quantity" => $row["in_quantity"],
                    "lot_no" => $row["lot_no"],
                    "exp_date" => $row["exp_date"],
                    "supplier" => $row["supplier"],
                    "entry_date" => $row["entry_date"],
                    "added_by" => $row["added_by"],
                    "last_edited" => $row["last_edited_by"] . ' | ' . $date,
                );
                echo json_encode($data);
            }
        }
    } 
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Receive Product In
    if (isset($_POST["action"]) && $_POST['action'] === 'receive_prod'){
        $added_by = $_SESSION['login_user']['employee_name'];
        $last_edited_on = date("Y-m-d H:i:s");
        $entry_date = $_POST["added-on"];
        $barcode = $_POST["barcode"];
        $description = htmlspecialchars($_POST["description"]);
        $prf = $_POST["prf"];
        $supplier = $_POST["supp"];
        $rack = $_POST["rack"];
        $rack = trim($rack);
        $quantity = $_POST["quantity"];
        $lot = $_POST["lot"];
        $exp = $_POST["exp"];
        $table1 = "product_in";
        
        // Insert new products in the database 
        $conn->query("INSERT INTO $table1 (barcode, description, supplier, rack, prf, in_quantity, lot_no, entry_date,
                    exp_date, added_by) VALUES ('$barcode', '$description', '$supplier', '$rack', '$prf', '$quantity', '$lot',
                    '$entry_date', '$exp', '$added_by');") or die('Error Could Not Query');


        $data = array(  
            "barcode" => $barcode,
            "description" => $description,
            "rack" => $rack,
            "quantity" => $quantity,
            "lot" => $lot,
            "exp" => $exp,
        );
        echo json_encode($data);
    }
    // Finalize Product In
    if (isset($_POST["action"]) && $_POST['action'] === 'add_stocks') {
        $added_by = $_SESSION['login_user']['employee_name'];
        $table1 = "product_in_final";
        $table2 = "product_in";
        $table3 = "inventory";

        // Update the product quantity in the inventory
        $query_get = "SELECT barcode, in_quantity, rack FROM $table2 WHERE added_by='$added_by';";
        $result = mysqli_query($conn, $query_get);

        if ($result->num_rows == 0) {   
            $data = "Not found";
            echo json_encode($data);
            exit();
        } else {
            while ($row = mysqli_fetch_array($result)) {
                $barcode = $row["barcode"];
                $quantity = $row["in_quantity"];
                $rack = $row["rack"];

                if ($rack === 'N/A') {
                    $conn->query("UPDATE $table3 SET rack_out=rack_out+$quantity WHERE barcode='$barcode';") or die('Error Could Not Query');
                } else {
                    $conn->query("UPDATE $table3 SET rack_in=rack_in+$quantity WHERE barcode='$barcode';") or die('Error Could Not Query');
                }
            }
        }

        // Insert new products in the database 
        $conn->query("INSERT INTO $table1 SELECT * FROM $table2 WHERE added_by='$added_by';") or die('Error Could Not Query');

        // Delete the temporary products from the temporary table
        $conn->query("DELETE FROM $table2 WHERE added_by='$added_by';") or die('Error Could Not Query');

        $data = "success";
        echo json_encode($data);
    }
    
    // Update Product In
    else if (isset($_POST["action"]) && $_POST['action'] === 'update_prod_in'){
        $last_edited_by = $_SESSION['login_user']['employee_name'];
        $last_edited_on = date("Y-m-d H:i:s");
        $id = $_POST["id-details"];
        $barcode = $_POST["barcode-details"];
        $quantity = $_POST["quantity-details"];
        $lot = $_POST["lot-details"];
        $expiration = $_POST["exp-details"];
        $table1 = "product_in_final";
        $table2 = "inventory";  

        // Get first the current quantity of the product
        $query_get = "SELECT in_quantity FROM $table1 WHERE id='$id';";
        $result = mysqli_query($conn, $query_get);

        if ($result->num_rows == 0) {   
            $data = "Not found";
            echo json_encode($data);
        } else {
            while ($row = mysqli_fetch_array($result)) {
                $current_quantity = $row["in_quantity"];
                $new_quantity = $quantity;
                // Update product in the database 
                $conn->query("UPDATE $table1 SET in_quantity=$quantity, lot_no='$lot', exp_date='$expiration', last_edited_by='$last_edited_by',
                            last_edited_on='$last_edited_on' WHERE id='$id';") or die('Error Could Not Query');

                if ($current_quantity > $new_quantity) {
                    $actual_quantity = $current_quantity - $new_quantity;
                    $conn->query("UPDATE $table2 SET stock = stock - $actual_quantity WHERE barcode='$barcode';") or die('Error Could Not Query');
                } else if ($current_quantity < $new_quantity) {
                    $actual_quantity = $new_quantity - $current_quantity;
                    $conn->query("UPDATE $table2 SET stock = stock + $actual_quantity WHERE barcode='$barcode';") or die('Error Could Not Query');
                }
            }
        }

        if(!mysqli_error($conn)) {
            echo json_encode("success");
        }
    }
    // Delete Product In
    else if (isset($_POST['action']) && $_POST['action'] === 'delete_all') {
        $added_by = $_SESSION['login_user']['employee_name'];
        $table = "product_in";

        // Delete product_in in the database 
        $conn->query("DELETE FROM $table WHERE added_by='$added_by';") or die('Error Could Not Query');

        if(!mysqli_error($conn)) {
            echo json_encode("success");
        }
    }
}