<?php 
include('connection.php');
session_start();
date_default_timezone_set('Asia/Manila');

#LOGIN
if(isset($_POST['signin'])) {
    // username and password sent from form 
    
    $myusername = $_POST['username'];
    $mypassword = $_POST['password'];

    $login="SELECT * FROM users WHERE user='$myusername'";
    $prompt = mysqli_query($conn, $login);
    $getData = mysqli_fetch_array($prompt);
    
    $sql = "SELECT * FROM users WHERE user = '$myusername'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    // $active = $row['active'];
    
    $count = mysqli_num_rows($result);
    

    // If result matched $myusername and $mypassword, table row must be 1 row
    if (password_verify($mypassword, $getData['pass'])){
        if ($getData['is_superuser'] == '1'){
            $_SESSION['login_user'] = $getData;
            header('location:starter.php');
        }else if ($row['is_superuser'] == '0'){
            $_SESSION['login_user'] = $row;
            header('location:z-dashboard.html');
        }
    }  
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


#REGISTER ACCOUNT
if (isset($_POST['signup'])) {
    $user = $_POST['username'];
    $name = $_POST['name'];
    $pass = $_POST['password'];

    $sql = "SELECT * FROM users WHERE (user='$user') OR (employee_name='$name');";
    $result = mysqli_query($conn, $sql);


    if(!$result->num_rows > 0){
        $conn->query("INSERT INTO users (employee_name, user, pass)
        VALUES('$name', '$user','".password_hash($pass, PASSWORD_BCRYPT)."')") or die($conn->error);
        ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                Swal.fire({
                icon: 'success',
                title: 'Successfully Registered',
                text: 'Employee account successfully added',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Okay'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "employee.php";
                    }else{
                        window.location.href = "employee.php";
                    }
                })
                
            })
    
        </script>
        <?php
    }else{
        ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                Swal.fire({
                icon: 'error',
                title: 'User is already registered',
                text: 'Employee account is already exist',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Okay'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "employee.php";
                    }else{
                        window.location.href = "employee.php";
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