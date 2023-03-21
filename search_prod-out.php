<?php
include('templates/connection.php');

header("Content-Type: text/json; charset=utf8");
// Get the values from the AJAX request
$mrf_search = $_POST['mrf_search'];


// Insert the values into the database
$sql = "SELECT * FROM endorse_final WHERE mrf='$mrf_search';";

$result = mysqli_query($conn, $sql);

echo json_encode($data);



mysqli_close($conn);

 
?>
