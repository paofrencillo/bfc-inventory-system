<?php
include('templates/connection.php');
session_start();
date_default_timezone_set('Asia/Manila');

#LOGIN
if (isset($_POST['signin'])) {
    // username and password sent from form 

    $myusername = $_POST['username'];
    $mypassword = $_POST['password'];

    $login = "SELECT * FROM users WHERE user='$myusername'";
    $prompt = mysqli_query($conn, $login);
    $getData = mysqli_fetch_array($prompt);

    $sql = "SELECT * FROM users WHERE user = '$myusername'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    $count = mysqli_num_rows($result);

    if ($count == 1) {
        // If result matched $myusername and $mypassword, table row must be 1 row
        if (password_verify($mypassword, $getData['pass'])) {
            if ($getData['is_superuser'] == '1') {
                $_SESSION['login_user'] = $getData;
                header('location:dashboard.php');
            } else if ($row['is_superuser'] == '0') {
                $_SESSION['login_user2'] = $row;
                header('location:z-dashboard.php');
            } else {
            ?>
                <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                <script>
                    $(document).ready(function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Username and/or Password is incorrect',
                            text: 'Something went wrong!',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Okay'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "index.php";
                            } else {
                                window.location.href = "index.php";
                            }
                        })

                    })
                </script>
            <?php
            }
        } else {
            ?>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script>
                $(document).ready(function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Username and/or Password is incorrect',
                        text: 'Something went wrong!',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Okay'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "index.php";
                        } else {
                            window.location.href = "index.php";
                        }
                    })

                })
            </script>
        <?php
        }
    } else {
        ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Username and/or Password is incorrect',
                    text: 'Something went wrong!',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "index.php";
                    } else {
                        window.location.href = "index.php";
                    }
                })

            })
        </script>
    <?php
    }
}

#ADD EMPLOYEE ACCOUNT
if (isset($_POST['signup'])) {
    $user = $_POST['username'];
    $name = $_POST['name'];
    $pass = $_POST['password'];

    $sql = "SELECT * FROM users WHERE (user='$user') OR (employee_name='$name');";
    $result = mysqli_query($conn, $sql);


    if (!$result->num_rows > 0) {
        $conn->query("INSERT INTO users (employee_name, user, pass, is_superuser)
        VALUES('$name', '$user','" . password_hash($pass, PASSWORD_BCRYPT) . "', 0)") or die($conn->error);
    ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Successfully Registered',
                    text: 'Employee account successfully added',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "employee.php";
                    } else {
                        window.location.href = "employee.php";
                    }
                })

            })
        </script>
    <?php
    } else {
    ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                Swal.fire({
                    icon: 'error',
                    title: 'User is already registered',
                    text: 'Employee account is already exist',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "employee.php";
                    } else {
                        window.location.href = "employee.php";
                    }
                })

            })
        </script>
    <?php
    }
}

#MODIFY EMPLOYEE
if (isset($_POST['modify_employee'])) {
    $employee_modify = $_POST['employee_modify'];
    $employee_name = $_POST['employee_name'];
    $user = $_POST['user'];


    if ($employee_modify != null) {
        $conn->query("UPDATE users SET employee_name='$employee_name', user='$user' WHERE user_id='$employee_modify';") or die($conn->error);
    ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Successfully Updated',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "employee.php";
                    } else {
                        window.location.href = "employee.php";
                    }
                })
            })
        </script>
    <?php
    } else {
    ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                Swal.fire({
                    icon: 'error',
                    title: 'An Error Occured',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "employee.php";
                    } else {
                        window.location.href = "employee.php";
                    }
                })
            })
        </script>
    <?php
    }
}

#DELETE FRANCHISEE 
if (isset($_POST['delete_employee'])) {
    $employee_modify = $_POST['employee_modify'];

    if ($employee_modify != null) {
        $conn->query("DELETE FROM users WHERE user_id='$employee_modify';") or die($conn->error);
    ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Successfully Deleted',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "employee.php";
                    } else {
                        window.location.href = "employee.php";
                    }
                })
            })
        </script>
    <?php
    } else {
    ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                Swal.fire({
                    icon: 'error',
                    title: 'An Error Occured',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "employee.php";
                    } else {
                        window.location.href = "employee.php";
                    }
                })
            })
        </script>
    <?php
    }
}

#ADD Franchisee
if (isset($_POST['franchise'])) {
    $branchcode = $_POST['branchcode'];
    $name = $_POST['name'];
    $company = $_POST['company'];
    $address = $_POST['address'];
    $id_lastuser = $_POST['id_lastuser'];

    $sql = "SELECT * FROM branches WHERE (code='$branchcode');";
    $result = mysqli_query($conn, $sql);


    if (!$result->num_rows > 0) {
        $conn->query("INSERT INTO branches (code, name, company, address, last_edited_by)
        VALUES('$branchcode', '$name', '$company', '$address', '$id_lastuser')") or die($conn->error);
    ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Successfully Registered',
                    text: 'Franchisee successfully added',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "franchisee.php";
                    } else {
                        window.location.href = "franchisee.php";
                    }
                })

            })
        </script>
    <?php
    } else {
    ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Ooops...',
                    text: 'Franchisee is already exist',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "franchisee.php";
                    } else {
                        window.location.href = "franchisee.php";
                    }
                })

            })
        </script>
    <?php
    }
}

#ADD Franchisee (Employee)
if (isset($_POST['franchise2'])) {
    $branchcode = $_POST['branchcode'];
    $name = $_POST['name'];
    $company = $_POST['company'];
    $address = $_POST['address'];
    $id_lastuser = $_POST['id_lastuser'];

    $sql = "SELECT * FROM branches WHERE (code='$branchcode');";
    $result = mysqli_query($conn, $sql);


    if (!$result->num_rows > 0) {
        $conn->query("INSERT INTO branches (code, name, company, address, last_edited_by)
        VALUES('$branchcode', '$name', '$company', '$address', '$id_lastuser')") or die($conn->error);
    ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Successfully Registered',
                    text: 'Franchisee successfully added',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "z-franchisee.php";
                    } else {
                        window.location.href = "z-franchisee.php";
                    }
                })

            })
        </script>
    <?php
    } else {
    ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Ooops...',
                    text: 'Franchisee is already exist',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "z-franchisee.php";
                    } else {
                        window.location.href = "z-franchisee.php";
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

    if ($franchisee_modify != null) {
        $conn->query("UPDATE branches SET code='$branch', name='$name', company='$company', address='$add', last_edited_by='$last_user' WHERE id='$franchisee_modify';") or die($conn->error);
    ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Successfully Updated',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "franchisee.php";
                    } else {
                        window.location.href = "franchisee.php";
                    }
                })
            })
        </script>
    <?php
    } else {
    ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                Swal.fire({
                    icon: 'error',
                    title: 'An Error Occured',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "franchisee.php";
                    } else {
                        window.location.href = "franchisee.php";
                    }
                })
            })
        </script>
    <?php
    }
}

#MODIFY FRANCHISEE (Employee)
if (isset($_POST['modify_franchisee2'])) {
    $franchisee_modify = $_POST['franchisee_modify'];
    $branch = $_POST['branch'];
    $name = $_POST['name'];
    $company = $_POST['company'];
    $add = $_POST['add'];
    $last_user = $_POST['last_user'];

    if ($franchisee_modify != null) {
        $conn->query("UPDATE branches SET code='$branch', name='$name', company='$company', address='$add', last_edited_by='$last_user' WHERE id='$franchisee_modify';") or die($conn->error);
    ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Successfully Updated',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "z-franchisee.php";
                    } else {
                        window.location.href = "z-franchisee.php";
                    }
                })
            })
        </script>
    <?php
    } else {
    ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                Swal.fire({
                    icon: 'error',
                    title: 'An Error Occured',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "z-franchisee.php";
                    } else {
                        window.location.href = "z-franchisee.php";
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

    if ($franchisee_modify != null) {
        $conn->query("DELETE FROM branches WHERE id='$franchisee_modify';") or die($conn->error);
    ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Successfully Deleted',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "franchisee.php";
                    } else {
                        window.location.href = "franchisee.php";
                    }
                })
            })
        </script>
    <?php
    } else {
    ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                Swal.fire({
                    icon: 'error',
                    title: 'An Error Occured',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "franchisee.php";
                    } else {
                        window.location.href = "franchisee.php";
                    }
                })
            })
        </script>
    <?php
    }
}

#DELETE FRANCHISEE (Employee)
if (isset($_POST['delete_franchisee2'])) {
    $franchisee_modify = $_POST['franchisee_modify'];

    if ($franchisee_modify != null) {
        $conn->query("DELETE FROM branches WHERE id='$franchisee_modify';") or die($conn->error);
    ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Successfully Deleted',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "z-franchisee.php";
                    } else {
                        window.location.href = "z-franchisee.php";
                    }
                })
            })
        </script>
    <?php
    } else {
    ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                Swal.fire({
                    icon: 'error',
                    title: 'An Error Occured',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "z-franchisee.php";
                    } else {
                        window.location.href = "z-franchisee.php";
                    }
                })
            })
        </script>
    <?php
    }
}

#ADD SUPPLIER
if (isset($_POST['supplier'])) {
    $id_lastuser = $_POST['id_lastuser'];
    $supplier = $_POST['supplier_name'];

    $sql = "SELECT * FROM suppliers WHERE supplier_name='$supplier';";
    $result = mysqli_query($conn, $sql);

    if (!$result->num_rows > 0) {
        $conn->query("INSERT INTO suppliers (supplier_name, last_edited_by)
        VALUES('$supplier', '$id_lastuser')") or die($conn->error);
    ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Successfully Registered',
                    text: 'Supplier successfully added',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "supplier.php";
                    } else {
                        window.location.href = "supplier.php";
                    }
                })

            })
        </script>
    <?php
    } else {
    ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Ooops...',
                    text: 'Supplier is already exist',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "supplier.php";
                    } else {
                        window.location.href = "supplier.php";
                    }
                })

            })
        </script>
    <?php
    }
}

#ADD SUPPLIER (EMPLOYEE)
if (isset($_POST['supplier2'])) {
    $id_lastuser = $_POST['id_lastuser'];
    $supplier = $_POST['supplier_name'];

    $sql = "SELECT * FROM suppliers WHERE supplier_name='$supplier';";
    $result = mysqli_query($conn, $sql);

    if (!$result->num_rows > 0) {
        $conn->query("INSERT INTO suppliers (supplier_name, last_edited_by)
        VALUES('$supplier', '$id_lastuser')") or die($conn->error);
    ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Successfully Registered',
                    text: 'Supplier successfully added',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "z-supplier.php";
                    } else {
                        window.location.href = "z-supplier.php";
                    }
                })

            })
        </script>
    <?php
    } else {
    ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Ooops...',
                    text: 'Supplier is already exist',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "z-supplier.php";
                    } else {
                        window.location.href = "z-supplier.php";
                    }
                })

            })
        </script>
    <?php
    }
}

#MODIFY SUPPLIER
if (isset($_POST['modify_supplier'])) {
    $supplier_modify = $_POST['supplier_modify'];
    $supplier_name = $_POST['supplier_name'];
    $last_user = $_POST['last_user'];


    if ($supplier_modify != null) {
        $conn->query("UPDATE suppliers SET supplier_name='$supplier_name', last_edited_by='$last_user' WHERE supplier_id='$supplier_modify';") or die($conn->error);
    ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Successfully Updated',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "supplier.php";
                    } else {
                        window.location.href = "supplier.php";
                    }
                })
            })
        </script>
    <?php
    } else {
    ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                Swal.fire({
                    icon: 'error',
                    title: 'An Error Occured',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "supplier.php";
                    } else {
                        window.location.href = "supplier.php";
                    }
                })
            })
        </script>
    <?php
    }
}

#MODIFY SUPPLIER (Employee)
if (isset($_POST['modify_supplier2'])) {
    $supplier_modify = $_POST['supplier_modify'];
    $supplier_name = $_POST['supplier_name'];
    $last_user = $_POST['last_user'];


    if ($supplier_modify != null) {
        $conn->query("UPDATE suppliers SET supplier_name='$supplier_name', last_edited_by='$last_user' WHERE supplier_id='$supplier_modify';") or die($conn->error);
    ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Successfully Updated',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "z-supplier.php";
                    } else {
                        window.location.href = "z-supplier.php";
                    }
                })
            })
        </script>
    <?php
    } else {
    ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                Swal.fire({
                    icon: 'error',
                    title: 'An Error Occured',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "z-supplier.php";
                    } else {
                        window.location.href = "z-supplier.php";
                    }
                })
            })
        </script>
    <?php
    }
}

#DELETE SUPPLIER
if (isset($_POST['delete_supplier'])) {
    $supplier_modify = $_POST['supplier_modify'];

    if ($supplier_modify != null) {
        $conn->query("DELETE FROM suppliers WHERE supplier_id='$supplier_modify';") or die($conn->error);
    ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Successfully Deleted',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "supplier.php";
                    } else {
                        window.location.href = "supplier.php";
                    }
                })
            })
        </script>
    <?php
    } else {
    ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                Swal.fire({
                    icon: 'error',
                    title: 'An Error Occured',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "supplier.php";
                    } else {
                        window.location.href = "supplier.php";
                    }
                })
            })
        </script>
    <?php
    }
}

#DELETE SUPPLIER (Employee)
if (isset($_POST['delete_supplier2'])) {
    $supplier_modify = $_POST['supplier_modify'];

    if ($supplier_modify != null) {
        $conn->query("DELETE FROM suppliers WHERE supplier_id='$supplier_modify';") or die($conn->error);
    ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Successfully Deleted',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "z-supplier.php";
                    } else {
                        window.location.href = "z-supplier.php";
                    }
                })
            })
        </script>
    <?php
    } else {
    ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                Swal.fire({
                    icon: 'error',
                    title: 'An Error Occured',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "z-supplier.php";
                    } else {
                        window.location.href = "z-supplier.php";
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
    if ($pass != $pass2) {
    ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                Swal.fire({
                    icon: 'warning',
                    title: 'Your password does not match',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "admin.php";
                    } else {
                        window.location.href = "admin.php";
                    }
                })

            })
        </script>
    <?php
    } else {
        $conn->query("UPDATE users SET pass='" . password_hash($pass, PASSWORD_BCRYPT) . "' WHERE user_id='$id_pass'") or die($conn->error);
        session_destroy();
        ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Successfully Updated your Password',
                    text: 'Please login your new created password',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "index.php";
                    } else {
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

#ADD PRODUCT OUT
if (isset($_POST['addprodout'])) {
    $barcode = $_POST['barcode'];
    $description = $_POST['description'];
    $quantity = $_POST['quantity'];
    $lot = $_POST['lot'];
    $branch = $_POST['branch'];
    $mrf = $_POST['mrf'];
    $order_num = $_POST['order_num'];
    $exp_date = $_POST['exp_date'];
    $remarks = $_POST['remarks'];
    $endorsed_by = $_POST['endorsed_by'];
    $endorsed_date = $_POST['endorsed_date'];


    $sql = "SELECT * FROM endorse WHERE barcode='$barcode';";
    $result = mysqli_query($conn, $sql);

    if (!$result->num_rows > 0) {
        $conn->query("INSERT INTO endorse (
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
        VALUES(
            '$barcode', 
            '$description', 
            '$quantity', 
            '$lot', 
            '$branch', 
            '$mrf' , 
            '$order_num',
            '$exp_date',
            '$remarks',
            '$endorsed_by',
            '$endorsed_date')") or die($conn->error);
    ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Successfully Registered',
                    text: 'Supplier successfully added',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "prod-out.php";
                    } else {
                        window.location.href = "prod-out.php";
                    }
                })

            })
        </script>
    <?php
    } else {
    ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Ooops...',
                    text: 'Prod-out is already exist',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "prod-out.php";
                    } else {
                        window.location.href = "prod-out.php";
                    }
                })

            })
        </script>
    <?php
    }
}



?>