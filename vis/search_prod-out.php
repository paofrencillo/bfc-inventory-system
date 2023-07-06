<?php
date_default_timezone_set('Asia/Manila');

$server = "localhost";
$user = "root";
$pass = "";
$db = "bfc_inventory";

$conn = mysqli_connect($server, $user, $pass, $db);

if (!$conn) {
  die("<script>alert('Connection Failed.')</script>");
}

header("Content-Type: text/json; charset=utf8");

$mrf_search = $_POST['mrf_search'];
$endorsed_by = $_POST['endorsed_by'];

// Query your MySQL database and retrieve the data
$query = "SELECT * FROM endorse_final WHERE mrf = '$mrf_search' ORDER BY description";
$result = $conn->query($query);
// Convert result set to JSON format
$rows = array();
while ($row = $result->fetch_assoc()) {
  $rows[] = $row;
}
echo json_encode($rows);
?>