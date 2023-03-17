<?php
header("Content-Type: text/json; charset=utf8");
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
if (isset($_GET["action"]) && $_GET["action"] === "get_product") {
    include('templates/connection.php');
    $barcode = $_GET["barcode"];
    $table = "product_masterlist";
    $query_get = "SELECT * FROM `$table` WHERE barcode='$barcode';";
    $result = mysqli_query($conn, $query_get);

    if ($result->num_rows == 0) {
        $data = "Not found";
        echo json_encode($data);
    } else {
        while ($row = mysqli_fetch_array($result)) {
            $data = array(
                "barcode" => $row["barcode"],
                "description" => $row["description"],
                "generic_name" => $row["generic_name"],
                "category" => $row["category"],
                "image" => $row["image"]
            );
            echo json_encode($data);
        }
    }
}
?>