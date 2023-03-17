<?php
include('connection.php');

// Get the values from the AJAX request
$barcode = $_POST['barcode'];
$description = $_POST['description'];
$quantity = $_POST['quantity'];
$lot = $_POST['lot'];
$exp_date = $_POST['exp_date'];
$endorsed_date = $_POST['endorsed_date'];
$remarks = $_POST['remarks'];
$endorsed_by = $_POST['endorsed_by'];
$mrf = $_POST['mrf'];
$order_num = $_POST['order_num'];
$branch = $_POST['branch'];

// Insert the values into the database
$sql = "INSERT INTO endorse (
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
    '$barcode', 
    '$description',
    '$quantity', 
    '$lot',
    '$branch', 
    '$mrf',
    '$order_num', 
    '$exp_date',
    '$remarks', 
    '$endorsed_by', 
    '$endorsed_date')";
mysqli_query($conn, $sql);


 
?>
