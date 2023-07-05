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
    array( 'db' => 'id',  'dt' => 0,
        'formatter' => function ($d, $row) {
            return '<input type="checkbox" class="selectRow" name="'.$d.'" value="'.$d.'" style="width: 16px; height: 16px; vertical-align: middle;">';
        }), 
    array(
        'db' => 'barcode',
        'dt' => 1,
        'formatter' => function( $d, $row ) {
            
            $data = strlen($d) > 15 ? substr($d, 0, 15)."..." : $d;
            return $data;
    }
    ), 
    array( 'db' => 'description',  'dt' => 2 ), 
    array( 'db' => 'prf',      'dt' => 3 ), 
    array( 'db' => 'in_quantity',     'dt' => 4 ),
    array( 'db' => 'lot_no',     'dt' => 5 ),
    array( 'db' => 'exp_date',     'dt' => 6 ),
    array( 'db' => 'entry_date',     'dt' => 7 ),
    array( 
        'db'        => 'id', 
        'dt'        => 8, 
        'formatter' => function( $d, $row ) { 
            return '
            <button type="button" class="btn btn-secondary btn-sm" style="border-radius: 50%;" data-toggle="modal" data-target="#details" onclick="viewModal(this);" data-id="' .$d. '">
                <i class="fas fa-eye"></i>
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