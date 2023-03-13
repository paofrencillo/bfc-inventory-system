<?php 
include('connection.php');
date_default_timezone_set('Asia/Manila');

#LOGIN
if (isset($_POST['signin'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $login="SELECT * FROM admin WHERE username='$username'";
    $prompt = mysqli_query($conn, $login);
    $getData = mysqli_fetch_array($prompt);

    $sql = "SELECT * FROM superuser_acc WHERE username='$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);
    $check = mysqli_num_rows($result);

    if (password_verify($password, $getData['password'])){
        if ($getData['acc_status'] == 'VERIFIED'){
            if ($getData['status'] == 'Enabled'){
                $_SESSION['get_data'] = $getData;
                header('location:_dashboard.php');
            }else{
                header('location:disabled.php');
            }
        }else{
            header('location:unverified.php');
        }
    }elseif($check == 1){
        $_SESSION['get_data'] = $getData;
        header('location:super_user/index.php');
    }else{
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
                    window.location.href = "starter.php";
                    }else{
                        window.location.href = "LoginBFC.php";
                    }
                })
                
            })
    
        </script>
        <?php
    }

}



?>