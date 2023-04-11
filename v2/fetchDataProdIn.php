<?php 
 
// Database connection info 
$dbDetails = array( 
    'host' => 'localhost', 
    'user' => 'root', 
    'pass' => '', 
    'db'   => 'bfc_inventory' 
); 
 
// DB table to use 
$table = 'product_in_final'; 
 
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
            return $data;
    }), 
    array( 'db' => 'description',  'dt' => 1 ), 
    array( 'db' => 'prf',      'dt' => 2 ), 
    array( 'db' => 'in_quantity',     'dt' => 3 ),
    array( 'db' => 'lot_no',     'dt' => 4 ),
    array( 'db' => 'exp_date',     'dt' => 5 ),
    array( 
        'db'        => 'id', 
        'dt'        => 6, 
        'formatter' => function( $d, $row ) { 
            return '
            <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#details" onclick="viewModal(this);" data-id="' .$d. '">
                <i class="fas fa-eye"></i>
                Details
            </button>'; 
        } 
    ) 
); 
 
// Include SQL query processing class 
require 'ssp.class.php'; 
 
// Output data as json format 
echo json_encode( 
    SSP::simple( $_GET, $dbDetails, $table, $primaryKey, $columns ) 
); 
 
?>