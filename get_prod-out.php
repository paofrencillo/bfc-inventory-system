<?php
date_default_timezone_set('Asia/Manila');

// Connect to your MySQL database
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'bfc_inventory';
$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

try {
   $pdo = new PDO($dsn, $user, $password);
   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
   echo 'Connection failed: ' . $e->getMessage();
}

$endorsed_by = $_GET['endorsed_by'];

// Query your MySQL database and retrieve the data
$stmt = $pdo->query("SELECT * FROM endorse WHERE endorsed_by = '$endorsed_by'");
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Return the data in JSON format
header('Content-Type: application/json');
echo json_encode($data);

// For endorse product
if (isset($_GET["action"]) && $_GET["action"] === "endorse_product") {

   $server = "localhost";
   $user = "root";
   $pass = "";
   $db = "bfc_inventory";

   $conn = mysqli_connect($server, $user, $pass, $db);

   if (!$conn) {
      die("<script>alert('Connection Failed.')</script>");
   }

   header("Content-Type: text/json; charset=utf8");
   $endorsed_by = $_GET["endorsed_by"];
   $table = "endorse";

   $sql = "SELECT * FROM $table WHERE endorsed_by='$endorsed_by';";
   $result = mysqli_query($conn, $sql);

   while ($row = mysqli_fetch_array($result)) {
      $product_barcode = $row["barcode"];
      $quantity_to_add = $row["quantity"];

      // Create an SQL query to update the quantity field for the specified product
      $sql9 = "UPDATE inventory SET stock = stock - $quantity_to_add WHERE barcode = $product_barcode";

      // Execute the query
      if ($conn->query($sql9) === TRUE) {
         echo "Quantity updated successfully";
      } else {
         echo "Error updating quantity" . $conn->error;
      }

      $sql2 = "INSERT INTO endorse_final (
         barcode, 
         description, 
         quantity, 
         lot,
         branch, 
         mrf,
         order_num, 
         exp_date,
         remarks, 
         endorsed_by,
         endorsed_date) 
         VALUES (
         '" . $row["barcode"] . "', 
         '" . $row["description"] . "', 
         '" . $row["quantity"] . "', 
         '" . $row["lot"] . "',
         '" . $row["branch"] . "', 
         '" . $row["mrf"] . "',
         '" . $row["order_num"] . "', 
         '" . $row["exp_date"] . "',
         '" . $row["remarks"] . "', 
         '" . $row["endorsed_by"] . "',
         '" . $row["endorsed_date"] . "')";

      if (mysqli_query($conn, $sql2)) {
         $data = 'success';
         echo json_encode($data);
      } else {
         echo "Error inserting data: " . mysqli_error($conn);
      }

      $sql3 = "DELETE FROM endorse WHERE endorsed_by='$endorsed_by';";

      if (mysqli_query($conn, $sql3)) {
         echo "Data deleted successfully";
      } else {
         echo "Error deleting data: " . mysqli_error($conn);
      }
   }

   // if (!$result->num_rows > 0){

   // } else {
   //    $data = 'nodata';
   //    echo json_encode($data);
   // }

}

// For cancel endorse product
if (isset($_GET["action"]) && $_GET["action"] === "cancelendorse") {

   $server = "localhost";
   $user = "root";
   $pass = "";
   $db = "bfc_inventory";

   $conn = mysqli_connect($server, $user, $pass, $db);

   if (!$conn) {
      die("<script>alert('Connection Failed.')</script>");
   }

   header("Content-Type: text/json; charset=utf8");
   $endorsed_by = $_GET["endorsed_by"];
   $table = "endorse";

   $del = "DELETE FROM endorse WHERE endorsed_by='$endorsed_by';";
   $resultdel = mysqli_query($conn, $del);
}

// For search dispatch product
if (isset($_GET["action"]) && $_GET["action"] === "mrfsearch") {

   $server = "localhost";
   $user = "root";
   $pass = "";
   $db = "bfc_inventory";

   $conn = mysqli_connect($server, $user, $pass, $db);

   if (!$conn) {
      die("<script>alert('Connection Failed.')</script>");
   }

   header("Content-Type: text/json; charset=utf8");
   $mrf_search = $_GET["mrf_search"];

   $sql2 = "SELECT * FROM endorse_final WHERE mrf ='$mrf_search';";
   $result2 = mysqli_query($conn, $sql2);

   while ($row2 = mysqli_fetch_array($result2)) {
      $sql3 = "INSERT INTO endorse_history (
         barcode, 
         description, 
         quantity, 
         lot,
         branch, 
         mrf,
         order_num, 
         exp_date,
         remarks, 
         endorsed_by,
         endorsed_date) 
         VALUES (
         '" . $row2["barcode"] . "', 
         '" . $row2["description"] . "', 
         '" . $row2["quantity"] . "', 
         '" . $row2["lot"] . "',
         '" . $row2["branch"] . "', 
         '" . $row2["mrf"] . "',
         '" . $row2["order_num"] . "', 
         '" . $row2["exp_date"] . "',
         '" . $row2["remarks"] . "', 
         '" . $row2["endorsed_by"] . "',
         '" . $row2["endorsed_date"] . "')";

      if (mysqli_query($conn, $sql3)) {
         $data = 'success';
         echo json_encode($data);
      } else {
         echo "Error inserting data: " . mysqli_error($conn);
      }

      $sql4 = "DELETE FROM endorse_final WHERE mrf ='$mrf_search';";

      if (mysqli_query($conn, $sql4)) {
         echo "Data deleted successfully";
      } else {
         echo "Error deleting data: " . mysqli_error($conn);
      }
   }
}

// For delete history
if (isset($_GET["action"]) && $_GET["action"] === "mrfsearch2") {

   $server = "localhost";
   $user = "root";
   $pass = "";
   $db = "bfc_inventory";

   $conn = mysqli_connect($server, $user, $pass, $db);

   if (!$conn) {
      die("<script>alert('Connection Failed.')</script>");
   }

   header("Content-Type: text/json; charset=utf8");
   $mrf_search2 = $_GET["mrf_search2"];

   $sql8 = "DELETE FROM endorse_history WHERE mrf ='$mrf_search2';";
   $result8 = mysqli_query($conn, $sql8);

   if (mysqli_query($conn, $sql8)) {
      echo "Data deleted successfully";
   } else {
      echo "Error deleting data: " . mysqli_error($conn);
   }

}

?>