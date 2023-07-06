<?php
include('templates/connection.php');
include('templates/session.php');
header("Content-Type: text/json; charset=utf8");
date_default_timezone_set('Asia/Manila');

if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
    if (isset($_GET["action"]) && $_GET['action'] === 'get_product_out') {
        $id = $_GET["id"];
        $table = "endorse_final";
        $table2 = "inventory";
        $query_get = "SELECT * FROM $table WHERE id=$id;";
        $result = mysqli_query($conn, $query_get); 
  
        if ($result->num_rows == 0) {
            $data = "Not found";
            echo json_encode($data);
        } else {
            while ($row = mysqli_fetch_array($result)) {
                
                $data = array(
                    "id" => $row["id"],
                    "barcode" => $row["barcode"],
                    "description2" => htmlspecialchars_decode($row["description"]),
                    "quantity" => $row["quantity"],
                    "lot" => $row["lot"],
                    "branch" => $row["branch"], 
                    "mrf" => $row["mrf"],
                    "order_num" => $row["order_num"],
                    "exp_date" => $row["exp_date"],
                    "remarks" => $row["remarks"],
                    "endorsed_by" => $row["endorsed_by"],  
                    "endorsed_date" => $row["endorsed_date"],                         
                );
                $barcodesearch = $row["barcode"];
            }
            $query_get2 = "SELECT * FROM $table2 WHERE barcode = '$barcodesearch';";
            $barcodesearch = null; 
            $result2 = mysqli_query($conn, $query_get2);
            while ($row2 = mysqli_fetch_array($result2)) {
                $data["stock"] = $row2["stock"];

            }
            echo json_encode($data);
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'delete') {
        $id = $_POST["id"];
        $added_by = $_SESSION['login_user']['employee_name'];
        $table = "endorse";

        // Delete product_in in the database 
        $conn->query("DELETE FROM $table WHERE id=$id;") or die('Error Could Not Query');

        if (!mysqli_error($conn)) {
            echo json_encode("Successful delete: $id");
        }
    }
}
