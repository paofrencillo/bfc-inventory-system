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


if(isset($_GET["action"]) && $_GET["action"] === "endorse_product") { 
   header("Content-Type: text/json; charset=utf8");
   include('connection.php');
   $endorsed_by = $_GET["endorsed_by"];
   $table = "endorse";

   $sql = "SELECT * FROM `$table` WHERE endorsed_by='$endorsed_by';";
   $result = mysqli_query($conn, $sql);
   
   while ($row = mysqli_fetch_array($result)) {
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
}

?>