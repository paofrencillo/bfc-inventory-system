<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>How to Import Excel Data into database in PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">

                <?php
                if (isset($_SESSION['message'])) {
                    echo "<h4>" . $_SESSION['message'] . "</h4>";
                    unset($_SESSION['message']);
                }
                ?>

                <div class="card">
                    <div class="card-header">
                        <h4>Import Excel Data into MYSQL database in PHP</h4>
                    </div>
                    <div class="card-body">

                        <form action="index.php" method="POST" enctype="multipart/form-data">

                            <input type="file" name="import_file" class="form-control" />
                            <button type="submit" name="save_excel_data" class="btn btn-primary mt-3">Import</button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <?php
        $server = "localhost";
        $user = "root";
        $pass = "";
        $db = "bfc_inventory";

        $conn = mysqli_connect($server, $user, $pass, $db);

        if (!$conn) {
        die("<script>alert('Connection Failed.')</script>");
        }

        require 'vendor/autoload.php';

        use PhpOffice\PhpSpreadsheet\Spreadsheet;
        use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

        if(isset($_POST['save_excel_data']))
        {
            $fileName = $_FILES['import_file']['name'];
            $file_ext = pathinfo($fileName, PATHINFO_EXTENSION);

            $allowed_ext = ['xls','csv','xlsx'];

            if(in_array($file_ext, $allowed_ext))
            {
                $inputFileNamePath = $_FILES['import_file']['tmp_name'];
                $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileNamePath);
                $data = $spreadsheet->getActiveSheet()->toArray();

                $count = "0";
                foreach($data as $row)
                    {
                    if($count > 0)
                        {
                            $sku = $row['0'];
                            $desc = htmlspecialchars($row['1']);
                            $cat = $row['2'];
                            $supp = $row['9'];
                            $barcode = $row['10'];

                            $last = 'admin';
                            $last_time = '2023-04-04 09:50:00';
                            $img = 'product-imgs/valuemed-logo1.png';

                            $masterQuery = "INSERT INTO product_masterlist (barcode, description, category, supplier, image, last_edited_by, last_edited_on) 
                                VALUES ('$barcode','$desc','$cat','$supp','$img','$last','$last_time')";                             
                            $result = mysqli_query($conn, $masterQuery);

                            $invQuery = "INSERT INTO inventory (barcode, description, category) 
                                VALUES ('$barcode','$desc','$cat')";
                            $result2 = mysqli_query($conn, $invQuery);

                            print_r('success');

                            $msg = true;
                        }
                    else
                    {
                        $count = "1";
                    }
                }

                if(isset($msg))
                {
                    $_SESSION['message'] = "Successfully Imported";
                    header('Location: index.php');
                    exit(0);
                }
                else
                {
                    $_SESSION['message'] = "Not Imported";
                    header('Location: index.php');
                    exit(0);
                }
            }
            else
            {
                $_SESSION['message'] = "Invalid File";
                header('Location: index.php');
                exit(0);
            }
        }
    ?>
</body>

</html>