<?php 
 
// Database connection info 
$dbDetails = array( 
    'host' => 'localhost', 
    'user' => 'root', 
    'pass' => '', 
    'db'   => 'bfc_inventory' 
); 
 
// DB table to use 
$table = 'inventory'; 
 
// Table's primary key 
$primaryKey = 'id'; 
 
// Array of database columns which should be read and sent back to DataTables. 
// The `db` parameter represents the column name in the database.  
// The `dt` parameter represents the DataTables column identifier. 
$columns = array( 
    array( 'db' => 'description',  'dt' => 0 ), 
    array( 'db' => 'category',      'dt' => 1 ), 
    array( 'db' => 'stock',     'dt' => 2,
        'formatter' => function( $d, $row ) { 
            return 
            "<div class='sparkbar text-danger font-weight-bold' data-color='#00a65a' data-height='20'>".$d."</div>"; 
        }  
    )
); 
 
// Include SQL query processing class 
require 'ssp.class.php'; 
 
// Output data as json format 
echo json_encode( 
    SSP::complex( $_GET, $dbDetails, $table, $primaryKey, $columns, null, "sa_percentage <= 40" ) 
); 
 
?>