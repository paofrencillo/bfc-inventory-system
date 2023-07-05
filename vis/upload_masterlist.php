<?php

    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "bfc_inventory";

    $conn = mysqli_connect($server, $user, $pass, $db);

    if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
    }

    require 'excel_files/vendor/autoload.php';  


//   use PhpOffice\PhpSpreadsheet\Spreadsheet;
//   use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

    if(isset($_POST['save_excel_data'])) {
    $fileName = $_FILES['import_file']['name'];
    $file_ext = pathinfo($fileName, PATHINFO_EXTENSION);

    $allowed_ext = ['xls','csv','xlsx'];

    if(in_array($file_ext, $allowed_ext)) {
        $inputFileNamePath = $_FILES['import_file']['tmp_name'];
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileNamePath);
        $data = $spreadsheet->getActiveSheet()->toArray();

        $count = 0;
        foreach($data as $row) {
        
        if($count > 0) {
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
    }
    else {
        $_SESSION['message'] = "Invalid File";
        header('Location: masterlist.php');
        exit(0);
    }
    }
  ?>