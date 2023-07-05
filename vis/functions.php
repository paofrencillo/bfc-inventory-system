<?php
include('templates/connection.php');
session_start();
date_default_timezone_set('Asia/Manila');

#LOGIN
if (isset($_POST['signin'])) {
    #username and password sent from form 

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
        # If result matched $myusername and $mypassword, table row must be 1 row
        if (password_verify($mypassword, $getData['pass'])) {
            if ($getData['is_superuser'] == '1') {
                $_SESSION['login_user'] = $getData;
                $_SESSION['authenticated'] = true;
                $user_id = $_SESSION["login_user"]["user_id"];
                $conn->query("UPDATE users SET is_logged_in=1 WHERE user_id='$user_id';") or die("Error Could Not Query");
                header('location:dashboard.php');
            } else if ($row['is_superuser'] == '0') {
                $_SESSION['login_user'] = $row;
                $_SESSION['authenticated'] = true;
                $user_id = $_SESSION["login_user"]["user_id"];
                $conn->query("UPDATE users SET is_logged_in=1 WHERE user_id='$user_id';") or die("Error Could Not Query");
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
    $name = htmlspecialchars($_POST['name']);
    $pass = $_POST['password'];
    $setOTP = rand(0000, 9999);


    $sql = "SELECT * FROM users WHERE (user='$user') OR (employee_name='$name');";
    $result = mysqli_query($conn, $sql);


    if (!$result->num_rows > 0) {
        $conn->query("INSERT INTO users (otp, employee_name, user, pass, is_superuser)
        VALUES('$setOTP', '$name', '$user','" . password_hash($pass, PASSWORD_BCRYPT) . "', 0)") or die($conn->error);
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
    $employee_name = htmlspecialchars($_POST['employee_name']);
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

#DELETE EMPLOYEE 
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
    $name = htmlspecialchars($_POST['name']);
    $company = htmlspecialchars($_POST['company']);
    $address = htmlspecialchars($_POST['address']);
    $id_lastuser = $_SESSION["login_user"]["user_id"];
    $is_superuser = $_POST['is_superuser'];

    $sql = "SELECT * FROM branches WHERE (code='$branchcode');";
    $result = mysqli_query($conn, $sql);


    if (!$result->num_rows > 0) {
        $conn->query("INSERT INTO branches (code, name, company, address, last_edited_by)
        VALUES('$branchcode', '$name', '$company', '$address', '$id_lastuser')") or die($conn->error);
        if ($is_superuser == '1') {
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
        } else if ($is_superuser == '0') {
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
        }
    } else {
        if ($is_superuser == '1') {
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
        } else if ($is_superuser == '0') {
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
}

#MODIFY FRANCHISEE 
if (isset($_POST['modify_franchisee'])) {
    $franchisee_modify = $_POST['franchisee_modify'];
    $branch = $_POST['branch'];
    $name = htmlspecialchars($_POST['name']);
    $company = htmlspecialchars($_POST['company']);
    $add = htmlspecialchars($_POST['add']);
    $last_user = $_SESSION["login_user"]["employee_name"];
    $is_superuser = $_POST['is_superuser'];

    if ($franchisee_modify != null) {
        $conn->query("UPDATE branches SET code='$branch', name='$name', company='$company', address='$add', last_edited_by='$last_user' WHERE code='$franchisee_modify';") or die($conn->error);
        if ($is_superuser == '1') {
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
        } else if ($is_superuser == '0') {
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
        }
    } else {
        if ($is_superuser == '1') {
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
        } else if ($is_superuser == '0') {
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
        }
    }
}

#DELETE FRANCHISEE 
if (isset($_POST['delete_franchisee'])) {
    $franchisee_modify = $_POST['franchisee_modify'];
    $is_superuser = $_POST['is_superuser'];

    if ($franchisee_modify != null) {
        $conn->query("DELETE FROM branches WHERE code='$franchisee_modify';") or die($conn->error);
        if ($is_superuser == '1') {
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
        } else if ($is_superuser == '0') {
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
        }
    } else {
        if ($is_superuser == '1') {
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
        } else if ($is_superuser == '0') {
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
}

#ADD SUPPLIER
if (isset($_POST['supplier'])) {
    $last_edited_by = $_SESSION["login_user"]["employee_name"];
    $last_edited_on = date("Y-m-d H:i:s");
    $sku = $_POST['sku_code'];
    $supplier = htmlspecialchars($_POST['supplier_name']);
    $is_superuser = $_POST['is_superuser'];

    $sql = "SELECT * FROM suppliers WHERE supplier_name='$supplier';";
    $result = mysqli_query($conn, $sql);

    if (!$result->num_rows > 0) {
        $conn->query("INSERT INTO suppliers (sku_code, supplier_name, last_edited_by, last_edited_on)
        VALUES('$sku', '$supplier', '$last_edited_by', '$last_edited_on')") or die($conn->error);
        if ($is_superuser == '1') {
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
        } else if ($is_superuser == '0') {
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
        }
    } else {
        if ($is_superuser == '1') {
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
        } else if ($is_superuser == '0') {
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
}

#MODIFY SUPPLIER
if (isset($_POST['modify_supplier'])) {
    $supplier_modify = $_POST['sku_code'];
    $supplier_name = htmlspecialchars($_POST['supplier_name']);
    $last_user = $_SESSION["login_user"]["employee_name"];
    $is_superuser = $_POST['is_superuser'];
    $last_edited_on = date("Y-m-d H:i:s");


    if ($supplier_modify != null) {
        $conn->query("UPDATE suppliers SET supplier_name='$supplier_name', last_edited_by='$last_user',
                    last_edited_on='$last_edited_on' WHERE sku_code='$supplier_modify';") or die($conn->error);
        if ($is_superuser == '1') {
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
        } else if ($is_superuser == '0') {
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
        }
    } else {
        if ($is_superuser == '1') {
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
        } else if ($is_superuser == '0') {
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
}

#DELETE SUPPLIER
if (isset($_POST['delete_supplier'])) {
    $sku = $_POST['sku_code'];
    $is_superuser = $_POST['is_superuser'];

    if ($sku != null) {
        $conn->query("DELETE FROM suppliers WHERE sku_code='$sku';") or die($conn->error);
        if ($is_superuser == '1') {
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
        } else if ($is_superuser == '0') {
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
        }
    } else {
        if ($is_superuser == '1') {
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
        } else if ($is_superuser == '0') {
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

    ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Successfully Updated your Password',
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
    }
}

#CHANGE PASSWORD EMPLOYEE
if (isset($_POST['pass_emp'])) {
    // print_r($_SESSION);
    $id_pass_emp = $_POST['id_password_emp'];
    $pass_emp = $_POST['password_emp'];
    $pass2_emp = $_POST['confirmpass_emp'];
    if ($pass_emp != $pass2_emp) {
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
                        window.location.href = "z-admin.php";
                    } else {
                        window.location.href = "z-admin.php";
                    }
                })

            })
        </script>
    <?php
    } else {
        $conn->query("UPDATE users SET pass='" . password_hash($pass_emp, PASSWORD_BCRYPT) . "' WHERE user_id='$id_pass_emp'") or die($conn->error);

    ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Successfully Updated your Password',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "z-admin.php"
                    } else {
                        window.location.href = "z-admin.php";
                    }
                })

            })
        </script>
    <?php
    }
}


#LOGOUT
if (isset($_GET['logout'])) {
    $_SESSION["authenticated"] = false;
    $user_id = $_SESSION["login_user"]["user_id"];
    $conn->query("UPDATE users SET is_logged_in=0 WHERE user_id='$user_id';") or die("Error Could Not Query");
    session_destroy();
    header('location:index.php');
}

#VERIFY OTP FOR RESET PASS
if (isset($_POST['send_otp'])) {
    $user_input = $_POST['user_input'];
    $otp_input = $_POST['otp_input'];

    $sql = "SELECT * FROM users WHERE user='$user_input'";
    $result = mysqli_query($conn, $sql);
    if (!$result->num_rows > 0) {
    ?>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                Swal.fire({
                    icon: 'error',
                    title: 'An error occured!',
                    text: 'Username does not exist',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "resetpass.php";
                    } else {
                        window.location.href = "resetpass.php";
                    }
                })
            })
        </script>
        <?php
    } else {
        $check_row = mysqli_num_rows($result);
        while ($row = mysqli_fetch_array($result)) {
            $otp = $row['otp'];
            $user_db = $row['user'];
        }

        if ($user_db === 'admin') {
            if ($otp != $otp_input) {
        ?>
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
                <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                <script>
                    $(document).ready(function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'An error occured!',
                            text: 'Default OTP does not match',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Okay'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "resetpass.php";
                            } else {
                                window.location.href = "resetpass.php";
                            }
                        })
                    })
                </script>
            <?php
            } else {
                $default_pass = 'admin';
                $def_pass = password_hash($default_pass, PASSWORD_BCRYPT);

                $conn->query("UPDATE users SET pass='$def_pass' WHERE user='admin'") or die($conn->error);
            ?>
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
                <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                <script>
                    $(document).ready(function() {
                        Swal.fire({
                            icon: 'success',
                            title: 'Password reset to default',
                            text: 'Password set to "admin"',
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
            if ($otp != $otp_input) {
            ?>
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
                <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                <script>
                    $(document).ready(function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'An error occured!',
                            text: 'Default OTP does not match',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Okay'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "resetpass.php";
                            } else {
                                window.location.href = "resetpass.php";
                            }
                        })
                    })
                </script>
            <?php
            } else {
                $default_pass = 'employee';
                $def_pass = password_hash($default_pass, PASSWORD_BCRYPT);

                $conn->query("UPDATE users SET pass='$def_pass' WHERE user='$user_db'") or die($conn->error);
            ?>
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
                <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                <script>
                    $(document).ready(function() {
                        Swal.fire({
                            icon: 'success',
                            title: 'Password reset to default',
                            text: 'Password set to "employee"',
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
    }
}

#MODIFY ENDORSE
if (isset($_POST['updateprodout'])) {

    // Get the values from the AJAX request
    $barcode = $_POST['barcode-det'];
    $description = htmlspecialchars($_POST['description-det']);
    $quantity = intval($_POST['quantity-det']);
    $current_quantity = intval($_POST['current_quantity']);
    $lot = $_POST['lot-det'];
    $mrf = $_POST['mrf-det'];
    $order_num = $_POST['order_num-det'];
    $exp_date = $_POST['exp_date-det'];
    $remarks = $_POST['remarks-det'];
    $id_update = $_POST['id_update-det'];
    $is_superuser = $_POST['is_superuser'];

    // echo($quantity);
    // echo("----------");
    // echo($current_quantity);
    // Check if the user input is to increase or decrease the quantity
    if ($current_quantity < $quantity) {
        $newvalue = $quantity - $current_quantity;
        // If the quantity is negative, decrease the existing quantity in the database
        $sql = "UPDATE inventory SET rack_in = rack_in - " . $newvalue . " WHERE barcode = '$barcode'";
        // Execute the SQL query
        $result = mysqli_query($conn, $sql);

        if ($id_update != null) {
            // Insert the values into the database
            $conn->query("UPDATE endorse_final 
                SET barcode = '$barcode', 
                description = '$description', 
                quantity = '$quantity', 
                lot = '$lot',
                mrf = '$mrf',
                order_num = '$order_num', 
                exp_date = '$exp_date',
                remarks = '$remarks' WHERE id = '$id_update'") or die($conn->error);

            if ($is_superuser == '1') {
            ?>
                <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                <script>
                    $(document).ready(function() {
                        Swal.fire({
                            icon: 'success',
                            title: 'Product Successfully Updated',
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
            } else if ($is_superuser == '0') {
            ?>
                <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                <script>
                    $(document).ready(function() {
                        Swal.fire({
                            icon: 'success',
                            title: 'Product Successfully Updated',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Okay'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "z-prod-out.php";
                            } else {
                                window.location.href = "z-prod-out.php";
                            }
                        })
                    })
                </script>
            <?php
            }
        } else {
            if ($is_superuser == '1') {
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
                                window.location.href = "prod-out.php";
                            } else {
                                window.location.href = "prod-out.php";
                            }
                        })
                    })
                </script>
            <?php
            } else if ($is_superuser == '0') {
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
                                window.location.href = "z-prod-out.php";
                            } else {
                                window.location.href = "z-prod-out.php";
                            }
                        })
                    })
                </script>
            <?php
            }
        }
    } else if ($current_quantity > $quantity) {
        $newvalue2 = $current_quantity - $quantity;
        // If the quantity is negative, decrease the existing quantity in the database
        $sql2 = "UPDATE inventory SET rack_in = rack_in + '$newvalue2' WHERE barcode = '$barcode'";
        // Execute the SQL query
        $result = mysqli_query($conn, $sql2);

        if ($id_update != null) {
            // Insert the values into the database
            $conn->query("UPDATE endorse_final 
                SET barcode = '$barcode', 
                description = '$description', 
                quantity = '$quantity', 
                lot = '$lot',
                mrf = '$mrf',
                order_num = '$order_num', 
                exp_date = '$exp_date',
                remarks = '$remarks' WHERE id = '$id_update'") or die($conn->error);

            if ($is_superuser == '1') {
            ?>
                <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                <script>
                    $(document).ready(function() {
                        Swal.fire({
                            icon: 'success',
                            title: 'Product Successfully Updated',
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
            } else if ($is_superuser == '0') {
            ?>
                <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                <script>
                    $(document).ready(function() {
                        Swal.fire({
                            icon: 'success',
                            title: 'Product Successfully Updated',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Okay'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "z-prod-out.php";
                            } else {
                                window.location.href = "z-prod-out.php";
                            }
                        })
                    })
                </script>
            <?php
            }
        } else {
            if ($is_superuser == '1') {
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
                                window.location.href = "prod-out.php";
                            } else {
                                window.location.href = "prod-out.php";
                            }
                        })
                    })
                </script>
            <?php
            } else if ($is_superuser == '0') {
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
                                window.location.href = "z-prod-out.php";
                            } else {
                                window.location.href = "z-prod-out.php";
                            }
                        })
                    })
                </script>
            <?php
            }
        }
    } else {
        // If the quantity is zero, do nothing
        if ($id_update != null) {
            // Insert the values into the database
            $conn->query("UPDATE endorse_final 
                SET barcode = '$barcode', 
                description = '$description', 
                quantity = '$quantity', 
                lot = '$lot',
                mrf = '$mrf',
                order_num = '$order_num', 
                exp_date = '$exp_date',
                remarks = '$remarks' WHERE id = '$id_update'") or die($conn->error);

            if ($is_superuser == '1') {
            ?>
                <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                <script>
                    $(document).ready(function() {
                        Swal.fire({
                            icon: 'success',
                            title: 'Product Successfully Updated',
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
            } else if ($is_superuser == '0') {
            ?>
                <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                <script>
                    $(document).ready(function() {
                        Swal.fire({
                            icon: 'success',
                            title: 'Product Successfully Updated',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Okay'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "z-prod-out.php";
                            } else {
                                window.location.href = "z-prod-out.php";
                            }
                        })
                    })
                </script>
            <?php
            }
        } else {
            if ($is_superuser == '1') {
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
                                window.location.href = "prod-out.php";
                            } else {
                                window.location.href = "prod-out.php";
                            }
                        })
                    })
                </script>
            <?php
            } else if ($is_superuser == '0') {
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
                                window.location.href = "z-prod-out.php";
                            } else {
                                window.location.href = "z-prod-out.php";
                            }
                        })
                    })
                </script>
            <?php
            }
        }
    }
}

#DELETE ENDORSE
if (isset($_POST['delete_updateprodout'])) {    
    $id_update = $_POST['id_update-det'];
    $barcode = $_POST['barcode-det'];
    $current_quantity = intval($_POST['current_quantity']);
    $is_superuser = $_POST['is_superuser'];
    
    echo($current_quantity);

    if ($id_update != null) {
        $conn->query("UPDATE inventory SET rack_in = rack_in + '$current_quantity' WHERE barcode = '$barcode'") or die($conn->error);

        $conn->query("DELETE FROM endorse_final WHERE id='$id_update';") or die($conn->error);

        if ($is_superuser == '1') {
            ?>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script>
                $(document).ready(function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'Product Successfully Deleted',
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
        } else if ($is_superuser == '0') {
        ?>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script>
                $(document).ready(function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'Product Successfully Deleted',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Okay'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "z-prod-out.php";
                        } else {
                            window.location.href = "z-prod-out.php";
                        }
                    })
                })
            </script>
        <?php
        }
    } else {
        if ($is_superuser == '1') {
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
                            window.location.href = "prod-out.php";
                        } else {
                            window.location.href = "prod-out.php";
                        }
                    })
                })
            </script>
        <?php
        } else if ($is_superuser == '0') {
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
                            window.location.href = "z-prod-out.php";
                        } else {
                            window.location.href = "z-prod-out.php";
                        }
                    })
                })
            </script>
            <?php
        }
    }
}


#GET PRODUCT FOR MODAL IN INVENTORY
if (isset($_GET["action"]) && $_GET["action"] === 'get_product_inv') {
    header("Content-Type: text/json; charset=utf8");
    $id = $_GET["id"];
    $table = "inventory";
    $query_get = "SELECT * FROM $table WHERE id='$id';";
    $result = mysqli_query($conn, $query_get);

    if ($result->num_rows == 0) {
        $data = "Not found";
        echo json_encode($data);
    } else {
        while ($row = mysqli_fetch_array($result)) {
            $data = array(
                "id" => $row['id'],
                "barcode" => $row["barcode"],
                "description" => htmlspecialchars_decode($row["description"]),
                "category" => $row['category'],
                "rack" => $row["rack"],
                "rack_in" => $row["rack_in"],
                "rack_out" => $row["rack_out"],
                "stock" => $row['stock'],
                "allocation" => $row["allocation"],
                "sa_percentage" => $row["sa_percentage"],
            );
            echo json_encode($data);
        }
    }
}

#MODIFY INVENTORY
if (isset($_POST['modify_invent'])) {

    $id = $_POST['product_id'];
    $allocation = $_POST['allo'];
    $rack = htmlspecialchars($_POST['rack']);
    $rack_in = $_POST['rack_in'];
    $rack_out = $_POST['rack_out'];
    $is_superuser = $_POST['is_superuser'];

    if ($allocation != 0) {
        if ($id != null) {
            // Insert the values into the database
            $conn->query("UPDATE inventory 
                SET  
                rack = '$rack', 
                rack_in = '$rack_in', 
                rack_out = '$rack_out', 
                allocation = '$allocation' WHERE id = $id") or die($conn->error);
            if ($is_superuser == '1') {
            ?>
                <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                <script>
                    $(document).ready(function() {
                        Swal.fire({
                            icon: 'success',
                            title: 'Product Successfully Updated',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Okay'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "inventory.php";
                            } else {
                                window.location.href = "inventory.php";
                            }
                        })
                    })
                </script>
            <?php
            } else if ($is_superuser == '0') {
            ?>
                <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                <script>
                    $(document).ready(function() {
                        Swal.fire({
                            icon: 'success',
                            title: 'Product Successfully Updated',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Okay'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "z-inventory.php";
                            } else {
                                window.location.href = "z-inventory.php";
                            }
                        })
                    })
                </script>
            <?php
            }
        } else {
            if ($is_superuser == '1') {
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
                                window.location.href = "inventory.php";
                            } else {
                                window.location.href = "inventory.php";
                            }
                        })
                    })
                </script>
            <?php
            } else if ($is_superuser == '0') {
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
                                window.location.href = "z-inventory.php";
                            } else {
                                window.location.href = "z-inventory.php";
                            }
                        })
                    })
                </script>
            <?php
            }
        }
    } else {

        if ($id != null) {
            // Insert the values into the database
            $conn->query("UPDATE inventory 
                SET rack = '$rack', 
                rack_in = '$rack_in', 
                rack_out = '$rack_out', 
                allocation = '$allocation' WHERE id = $id") or die($conn->error);
            if ($is_superuser == '1') {
            ?>
                <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                <script>
                    $(document).ready(function() {
                        Swal.fire({
                            icon: 'success',
                            title: 'Product Successfully Updated',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Okay'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "inventory.php";
                            } else {
                                window.location.href = "inventory.php";
                            }
                        })
                    })
                </script>
            <?php
            } else if ($is_superuser == '0') {
            ?>
                <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                <script>
                    $(document).ready(function() {
                        Swal.fire({
                            icon: 'success',
                            title: 'Product Successfully Updated',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Okay'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "z-inventory.php";
                            } else {
                                window.location.href = "z-inventory.php";
                            }
                        })
                    })
                </script>
            <?php
            }
        } else {
            if ($is_superuser == '1') {
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
                                window.location.href = "inventory.php";
                            } else {
                                window.location.href = "inventory.php";
                            }
                        })
                    })
                </script>
            <?php
            } else if ($is_superuser == '0') {
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
                                window.location.href = "z-inventory.php";
                            } else {
                                window.location.href = "z-inventory.php";
                            }
                        })
                    })
                </script>
            <?php
            }
        }
    }
}

if (isset($_POST['action']) && $_POST['action'] === 'upload') {
    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "bfc_inventory";

    $conn = mysqli_connect($server, $user, $pass, $db);

    if (!$conn) {
        die("<script>alert('Connection Failed.')</script>");
    }

    require 'excel_files/vendor/autoload.php';

    // use PhpOffice\PhpSpreadsheet\Spreadsheet;
    // use PhpOffice\PhpSpreadsheet\Writer\Xlsx; 
    $fileName = $_FILES['import_file']['name'];
    $file_ext = pathinfo($fileName, PATHINFO_EXTENSION);

    $allowed_ext = ['xls', 'csv', 'xlsx'];

    if (in_array($file_ext, $allowed_ext)) {
        $inputFileNamePath = $_FILES['import_file']['tmp_name'];
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileNamePath);
        $data = $spreadsheet->getActiveSheet()->toArray();

        $count = 0;
        foreach ($data as $row) {
            if ($count > 0) {
                $barcode = $row['0'];
                $desc = htmlspecialchars($row['1']);
                $supp = $row['2'];
                $cat = $row['3'];

                $last = 'admin';
                $last_time = date("Y-m-d H:i:s");
                $img = 'product-imgs/valuemed-logo1.png';

                $masterQuery = "INSERT INTO product_masterlist (barcode, description, category, supplier, image, last_edited_by, last_edited_on) 
                        VALUES ('$barcode','$desc','$cat','$supp','$img','$last','$last_time')";
                $result = mysqli_query($conn, $masterQuery);

                $invQuery = "INSERT INTO inventory (barcode, description, category) 
                        VALUES ('$barcode','$desc','$cat')";
                $result2 = mysqli_query($conn, $invQuery);

                $msg = true;
            } else {
                $count = 1;
            }
        }

        // if (isset($msg)) {
        //   $_SESSION['message'] = "Successfully Imported";
        //   header('Location: masterlist.php');

        //   exit(0);
        // } else {
        //     $_SESSION['message'] = "Not Imported";
        //     header('Location: masterlist.php');
        //     exit(0);
        // }
    }
    // else {
    //     $_SESSION['message'] = "Invalid File";
    //     header('Location: masterlist.php');
    //     exit(0);
    // }
}


?>