<?php
    header("Content-Type: text/json; charset=utf8");
    include('connection.php');
    session_start();
    date_default_timezone_set('Asia/Manila');

    if(isset($_GET["barcode"])) {
        $table = "product_masterlist";
        $barcode = $_GET["barcode"];
    
        $query_get = "SELECT * FROM `$table` WHERE barcode='$barcode';";
        $result = mysqli_query($conn, $query_get);
        
        while ($row = mysqli_fetch_array($result)) {
            $data = array(
                "barcode"=>$row["barcode"],
                "description"=>$row["description"],
                "generic_name"=>$row["generic_name"],
                "category"=>$row["category"],
                "image"=>$row["image"]
            );
            echo json_encode($data);
        }
    } else if(isset($_GET["refresh_table"])) {

    }
?>