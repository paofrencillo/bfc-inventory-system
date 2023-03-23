<?php
include('templates/connection.php');
date_default_timezone_set('Asia/Manila');

if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
    if (isset($_GET["action"]) && $_GET['action'] === 'get_product') {
        $barcode = $_GET["barcode"];
        $table = "product_masterlist";
        $query_get = "SELECT description FROM $table WHERE barcode='$barcode';";
        $result = mysqli_query($conn, $query_get);
    
        if ($result->num_rows == 0) {
            $data = "Not found";
            echo json_encode($data);
        } else {
            while ($row = mysqli_fetch_array($result)) {
                $data = array(
                    "description" => $row["description"],
                );
                echo json_encode($data);
            }
        }
    } 
} else {
    /* 
    Up to you which header to send, some prefer 404 even if 
    the files does exist for security
    */
    header('HTTP/1.0 500 Internal Server Error', TRUE, 500);

    /* choose the appropriate page to redirect users */
    die(header('location: ../500.html'));
 
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
}