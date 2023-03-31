<?php
include('templates/connection.php');



// Get the values from the AJAX request
$barcode = $_POST['barcode'];
$description = htmlspecialchars($_POST['description']);
$quantity = $_POST['quantity'];
$lot = $_POST['lot'];
$exp_date = $_POST['exp_date'];
$endorsed_date = $_POST['endorsed_date'];
$remarks = $_POST['remarks'];
$endorsed_by = $_POST['endorsed_by'];
$mrf = $_POST['mrff'];
$order_num = $_POST['order_numm'];
$branch = $_POST['branch'];
$branch22 = $_POST['branch22'];

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


mysqli_close($conn);
