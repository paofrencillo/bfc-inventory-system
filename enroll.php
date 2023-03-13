<?php 
include('connection.php');
session_start();
date_default_timezone_set('Asia/Manila');

#PRODUCT ENROLLMENT
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["enroll"])) {
    $barcode = $_data["barcode"];
    $decription = $_data["description"];
    # variable for product image
    $last_edited_by = $_data["employee_id"];
    $last_edited_on = date("Y-m-d");
    echo $last_edited_on;

    #Insert new products in the database
    $table = "product_masterlist";
    $conn->query("INSERT INTO `$table` (`barcode`, `description`, `image`, `last_edited_by`, `last_edited_on`)
                VALUES ('$barcode', '$decription', NULL, $last_edited_by,  '$last_edited_on');" or die($conn->error));

    if(!mysqli_error($conn)) {
        echo json_encode('success');
        exit;
    }
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