<?php 
 
// Database connection info 
$dbDetails = array( 
    'host' => 'localhost', 
    'user' => 'root', 
    'pass' => '', 
    'db'   => 'bfc_inventory' 
); 
 
// DB table to use 
$table = 'endorse_history'; 
 
// Table's primary key 
$primaryKey = 'id'; 
 
// Array of database columns which should be read and sent back to DataTables. 
// The `db` parameter represents the column name in the database.  
// The `dt` parameter represents the DataTables column identifier. 
$columns = array( 
    array(
        'db' => 'barcode',
        'dt' => 0,
        'formatter' => function( $d, $row ) {
            $data = strlen($d) > 15 ? substr($d, 0, 15)."..." : $d;
            return '
                <p title="'.$d.'">'.$data.'</p>
            ';
    }), 
    array( 'db' => 'description', 'dt' => 1 ),
    array( 'db' => 'quantity', 'dt' => 2 ),
    array( 'db' => 'lot', 'dt' => 3 ),
    array( 'db' => 'branch', 'dt' => 4 ),
    array( 'db' => 'mrf', 'dt' => 5 ),
    array( 'db' => 'order_num', 'dt' => 6 ),
    array( 'db' => 'remarks', 'dt' => 7 ), 
    array( 'db' => 'endorsed_date', 'dt' => 8 ),
    array( 'db' => 'endorsed_by', 'dt' => 9 ), 
); 
 
// Include SQL query processing class 
require 'ssp.class.php'; 
 
// Output data as json format 
echo json_encode( 
    SSP::simple( $_GET, $dbDetails, $table, $primaryKey, $columns ) 
); 
 
?>