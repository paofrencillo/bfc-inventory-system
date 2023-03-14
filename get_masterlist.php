<?php
    header("Content-Type: text/json; charset=utf8");

    include('connection.php');
    session_start();
    date_default_timezone_set('Asia/Manila');

    $table = "product_masterlist";
    $barcode = $_GET["barcode"];

    $query = $conn->query("SELECT * FROM $table WHERE barcode=$barcode");
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_array($result)) {
        $data = array(
            "barcode"=>$row["barcode"],
            "description"=>$row["description"],
            "image"=>$row["image"]
        );
        echo json_encode($data);
    }
?>