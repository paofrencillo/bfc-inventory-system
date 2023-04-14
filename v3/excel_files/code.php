<?php
session_start();
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
                $desc = $row['1'];
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