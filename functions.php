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
       ?>
       <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
       <script>
       $(document).ready(function(){
               Swal.fire({
               icon: 'error',
               title: 'Username and/or Password is incorrect',
               text: 'Something went wrong!',
               confirmButtonColor: '#3085d6',
               confirmButtonText: 'Okay'
               }).then((result) => {
               if (result.isConfirmed) {
                   window.location.href = "index.php";
                   }else{
                       window.location.href = "index.php";
                   }
               })
               
           })
   
       </script>
       <?php
    }
}

#LOGOUT
if (isset($_GET['logout'])) {
    session_destroy();
    header('location:index.php');
}   
?>