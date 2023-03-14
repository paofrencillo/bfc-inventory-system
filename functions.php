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
    
    $count = mysqli_num_rows($result);
    
    if($count == 1) {
        // If result matched $myusername and $mypassword, table row must be 1 row
        if (password_verify($mypassword, $getData['pass'])){
            if ($getData['is_superuser'] == '1'){
                $_SESSION['login_user'] = $getData;
                header('location:starter.php');
            }else if ($row['is_superuser'] == '0'){
                $_SESSION['login_user'] = $row;
                header('location:z-dashboard.html');
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
                            window.location.href = "index.php";
                            }else{
                                window.location.href = "index.php";
                            }
                        })
                        
                    })
            
                </script>
                <?php
            }
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
                        window.location.href = "index.php";
                        }else{
                            window.location.href = "index.php";
                        }
                    })
                    
                })
        
            </script>
            <?php
        }
    
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

#REGISTER ACCOUNT
if (isset($_POST['signup'])) {
    $user = $_POST['username'];
    $name = $_POST['name'];
    $pass = $_POST['password'];

    $sql = "SELECT * FROM users WHERE (user='$user') OR (employee_name='$name');";
    $result = mysqli_query($conn, $sql);


    if(!$result->num_rows > 0){
        $conn->query("INSERT INTO users (employee_name, user, pass, is_superuser)
        VALUES('$name', '$user','".password_hash($pass, PASSWORD_BCRYPT)."', 0)") or die($conn->error);
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

#CHANGE PASSWORD ADMIN
if (isset($_POST['pass_admin'])) {
    $id_pass = $_POST['id_password'];
    $pass = $_POST['password'];
    $pass2 = $_POST['confirmpass'];
    if ($pass != $pass2){
        ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                Swal.fire({
                icon: 'warning',
                title: 'Your password does not match',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Okay'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "admin.php";
                    }else{
                        window.location.href = "admin.php";
                    }
                })
                
            })
    
        </script>
        <?php
    }else{
        $conn->query("UPDATE users SET pass='".password_hash($pass, PASSWORD_BCRYPT)."' WHERE user_id='$id_pass'") or die($conn->error);
        session_destroy();
        ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                Swal.fire({
                icon: 'success',
                title: 'Successfully Updated your Password',
                text: 'Please login your new created password',
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

#Add Franchisee
if (isset($_POST['franchise'])) {
    $branchcode = $_POST['branchcode'];
    $name = $_POST['name'];
    $company = $_POST['company'];
    $address = $_POST['address'];
    $id_lastuser = $_POST['id_lastuser'];

    $sql = "SELECT * FROM branches WHERE (code='$branchcode');";
    $result = mysqli_query($conn, $sql);


    if(!$result->num_rows > 0){
        $conn->query("INSERT INTO branches (code, name, company, address, last_edited_by)
        VALUES('$branchcode', '$name', '$company', '$address', '$id_lastuser')") or die($conn->error);
        ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                Swal.fire({
                icon: 'success',
                title: 'Successfully Registered',
                text: 'Franchisee successfully added',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Okay'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "franchisee.php";
                    }else{
                        window.location.href = "franchisee.php";
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
                title: 'Ooops...',
                text: 'Franchisee is already exist',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Okay'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "franchisee.php";
                    }else{
                        window.location.href = "franchisee.php";
                    }
                })
                
            })
    
        </script>
        <?php
    }
}

#MODIFY FRANCHISEE 
if (isset($_POST['modify_franchisee'])) {
    $franchisee_modify = $_POST['franchisee_modify'];
    $branch = $_POST['branch'];
    $name = $_POST['name'];
    $company = $_POST['company'];
    $add = $_POST['add'];
    $last_user = $_POST['last_user'];

    if ($franchisee_modify != null){
        $conn->query("UPDATE branches SET code='$branch', name='$name', company='$company', address='$add', last_edited_by='$last_user' WHERE id='$franchisee_modify';") or die($conn->error);
        ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                Swal.fire({
                icon: 'success',
                title: 'Successfully Updated',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Okay'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "franchisee.php";
                    }else{
                        window.location.href = "franchisee.php";
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
                title: 'An Error Occured',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Okay'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "franchisee.php";
                    }else{
                        window.location.href = "franchisee.php";
                    }
                })   
            })
        </script>
        <?php
    }
}

#DELETE FRANCHISEE 
if (isset($_POST['delete_franchisee'])) {
    $franchisee_modify = $_POST['franchisee_modify'];

    if ($franchisee_modify != null){
        $conn->query("DELETE FROM branches WHERE id='$franchisee_modify';") or die($conn->error);
        ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                Swal.fire({
                icon: 'success',
                title: 'Successfully Deleted',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Okay'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "franchisee.php";
                    }else{
                        window.location.href = "franchisee.php";
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
                title: 'An Error Occured',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Okay'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "franchisee.php";
                    }else{
                        window.location.href = "franchisee.php";
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