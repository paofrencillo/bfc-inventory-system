<?php

$server = "localhost";
$user = "root";
$pass = "";
$db = "bfc_inventory";

$conn = mysqli_connect($server, $user, $pass, $db);

if (!$conn) {
   die("<script>alert('Connection Failed.')</script>");
}
?>
