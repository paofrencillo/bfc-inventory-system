<?php 
include('connection.php');
session_start();
date_default_timezone_set('Asia/Manila');

#LOGIN
if(isset($_POST['signin'])) {
    // username and password sent from form 
    
    $myusername = $_POST['username'];
    $mypassword = $_POST['password'];
    
    $sql = "SELECT * FROM users WHERE user = '$myusername' and pass = '$mypassword'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    // $active = $row['active'];
    
    $count = mysqli_num_rows($result);
    
    // If result matched $myusername and $mypassword, table row must be 1 row
      
    if($count == 1) {
       $_SESSION['login_user'] = $row;
       
       header("location: starter.php");
    }else {
       $error = "Your Login Name or Password is invalid";
    }
}

#LOGOUT
if (isset($_GET['logout'])) {
    session_destroy();
    header('location:index.php');
}   
?>