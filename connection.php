<?php

//$server = "localhost";
//$user = "root";
//$pass = "";
//$database = "bfc_inventory";

//$mysqli = new MySQLi($server, $user, $pass, $database);



//$conn = mysqli_connect($server, $user, $pass, $database);

//if (!$conn) {
 //   die("<script>alert('Connection Failed.')</script>");

//}
//?>

<?php
$server = "localhost";
$user = "root";
$pass = "";
$database = "bfc_inventory";

$mysqli = new mysqli($server, $user, $pass, $database);

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
?>