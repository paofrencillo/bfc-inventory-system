<?php
include('templates/connection.php');
   header("Content-Type: text/json; charset=utf8");
   $barcode2 = $_GET["barcode2"];
   $table9 = "inventory";
   $query_get = "SELECT * FROM $table9 WHERE barcode='$barcode2';";
   $result9 = mysqli_query($conn, $query_get);

   if ($result9->num_rows == 0) {
       $data = "Not found";
       echo json_encode($data);
   } else {
       while ($row9 = mysqli_fetch_array($result9)) {
           $data = array(
               "description" => $row9["description"],
               "rack_in" => $row9["rack_in"]
           );
           echo json_encode($data);
       }
   }
