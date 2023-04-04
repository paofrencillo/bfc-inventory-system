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
    $id_lastuser = $_SESSION["login_user"]["employee_name"];
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
                    text: 'Please login your new created password',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                }).then((result) => {
                    if (result.isConfirmed) {
                        session_destroy();
                        window.location.href = "index.php";
                    } else {
                        session_destroy();
                        window.location.href = "index.php";
                    }
                })

            })
        </script>
    <?php
    }
}

#RESET PASSWORD ADMIN
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
    $_SESSION["authenticated"] = false;
    $user_id = $_SESSION["login_user"]["user_id"];
    $conn->query("UPDATE users SET is_logged_in=0 WHERE user_id='$user_id';") or die("Error Could Not Query");
    session_destroy();
    header('location:index.php');
}

#VERIFY OTP FOR RESET PASS
if (isset($_POST['send_otp'])) {
    $otp = $_POST['otp'];
    $otp_input = $_POST['otp_input'];

    if ($otp != $otp_input){
        ?>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                Swal.fire({
                icon: 'error',
                title: 'An error occured!',
                text: 'Default OTP does not match',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Okay'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "resetpass.php";
                    }else{
                        window.location.href = "resetpass.php";
                    }
                })      
            })
        </script>
        <?php
    }else{
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

#MODIFY ENDORSE
if (isset($_POST['updateprodout'])) {

    // Get the values from the AJAX request
    $barcode = $_POST['barcode'];
    $description = htmlspecialchars($_POST['description']);
    $quantity = $_POST['quantity'];
    $current_quantity = $_POST['current_quantity'];
    $lot = $_POST['lot'];
    $mrf = $_POST['mrf'];
    $order_num = $_POST['order_num'];
    $exp_date = $_POST['exp_date'];
    $remarks = $_POST['remarks'];
    $id_update = $_POST['id_update'];
    $is_superuser = $_POST['is_superuser'];

    // Check if the user input is to increase or decrease the quantity
    if ($current_quantity < $quantity) {
        $newvalue = $quantity - $current_quantity;
        // If the quantity is negative, decrease the existing quantity in the database
        $sql = "UPDATE inventory SET rack_in = rack_in - " . abs($newvalue) . " WHERE barcode = $barcode";
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
        $sql2 = "UPDATE inventory SET rack_in = rack_in + '$newvalue2' WHERE barcode = $barcode";
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
    $id_update = $_POST['id_update'];
    $barcode = $_POST['barcode'];
    $current_quantity = $_POST['current_quantity'];
    $is_superuser = $_POST['is_superuser'];

    if ($id_update != null) {
        $conn->query("UPDATE inventory SET rack_in = rack_in + '$current_quantity' WHERE barcode = $barcode") or die($conn->error);
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
    $is_superuser = $_POST['is_superuser'];

    if ($allocation != 0) {
        if ($id != null) {
            // Insert the values into the database
            $conn->query("UPDATE inventory 
                SET  
                rack = '$rack', 
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

#GET THE PRODUCT DETAILS FOR THE RACK VALUE TO CHANGE
if (isset($_GET["action"]) && $_GET["action"] === 'get_product_transfer') {
    header("Content-Type: text/json; charset=utf8");
    $barcode = $_GET["barcode"];
    $table = "inventory";
    $query_get = "SELECT * FROM $table WHERE barcode='$barcode';";
    $result = mysqli_query($conn, $query_get);

    if ($result->num_rows == 0) {
        $data = "Not found";
        echo json_encode($data);
    } else {
        while ($row = mysqli_fetch_array($result)) {
            $data = array(
                "barcode" => $row["barcode"],
                "description" => $row["description"],
                "rack" => $row["rack"],
                "rack_in" => $row["rack_in"],
                "rack_out" => $row["rack_out"],
            );
            echo json_encode($data);
        }
    }
}

#TRANSFER QUANTITY TO RACK OUT
if (isset($_POST["to_rack_out"])) {
    $barcode = $_POST["barcode-transfer"];
    $quantity = $_POST["qty-transfer"];
    $is_superuser = $_SESSION["login_user"]["is_superuser"];

    if ($barcode != null) {
        $conn->query("UPDATE inventory SET
                    rack_out = rack_out + '$quantity',
                    rack_in = rack_in - '$quantity'
                    WHERE barcode='$barcode';")
            or die("Error Could Not Query.");

        if ($is_superuser === '1') {
            ?>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script>
                $(document).ready(function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'Transfer Success',
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
        <?php } else if ($is_superuser === '0') {
        ?>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script>
                $(document).ready(function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'Transfer Success',
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
        <?php }
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
                        <?php
                        if ($is_superuser === '1') {
                            die(header('location: inventory.php'));
                        } else if ($is_superuser === '0') {
                            die(header('location: z-inventory.php'));
                        }
                        ?>
                    } else {
                        <?php
                        if ($is_superuser === '1') {
                            die(header('location: inventory.php'));
                        } else if ($is_superuser === '0') {
                            die(header('location: z-inventory.php'));
                        }
                        ?>
                    }
                })
            })
        </script>
    <?php
    }
    ?>
    <?php }


#TRANSFER QUANTITY TO RACK IN
if (isset($_POST["to_rack_in"])) {
    $barcode = $_POST["barcode-transfer"];
    $quantity = $_POST["qty-transfer"];
    $is_superuser = $_SESSION["login_user"]["is_superuser"];

    if ($barcode != null) {
        $conn->query("UPDATE inventory SET
                    rack_in = rack_in + '$quantity',
                    rack_out = rack_out - '$quantity'
                    WHERE barcode='$barcode';")
            or die("Error Could Not Query.");

        if ($is_superuser === '1') {
    ?>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script>
                $(document).ready(function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'Transfer Success',
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
        <?php } else if ($is_superuser === '0') {
        ?>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script>
                $(document).ready(function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'Transfer Success',
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
        <?php }
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
                        <?php
                        if ($is_superuser === '1') {
                            die(header('location: inventory.php'));
                        } else if ($is_superuser === '0') {
                            die(header('location: z-inventory.php'));
                        }
                        ?>
                    } else {
                        <?php
                        if ($is_superuser === '1') {
                            die(header('location: inventory.php'));
                        } else if ($is_superuser === '0') {
                            die(header('location: z-inventory.php'));
                        }
                        ?>
                    }
                })
            })
        </script>
    <?php
    }
    ?>
<?php }

?>