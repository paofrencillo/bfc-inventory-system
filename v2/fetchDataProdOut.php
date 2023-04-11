<?php 
 
// Database connection info 
$dbDetails = array( 
    'host' => 'localhost', 
    'user' => 'root', 
    'pass' => '', 
    'db'   => 'bfc_inventory' 
); 
 
// DB table to use 
$table = 'endorse_final'; 
 
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
    array( 'db' => 'description',  'dt' => 1 ), 
    array( 'db' => 'lot',      'dt' => 2 ), 
    array( 'db' => 'exp_date',     'dt' => 3 ),
    array( 'db' => 'quantity',     'dt' => 4 ),
    array( 'db' => 'branch',     'dt' => 5 ),
    array( 'db' => 'mrf',     'dt' => 6 ),
    array( 'db' => 'order_num',     'dt' => 7 ),
    array( 'db' => 'remarks',     'dt' => 8 ),
    array( 'db' => 'endorsed_date',     'dt' => 9 ),
    array( 
        'db'        => 'id', 
        'dt'        => 10, 
        'formatter' => function( $d, $row ) { 
            return '
            <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#updatee'.$d.'">
                <i class="fas fa-pencil-alt"></i>
                Edit
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