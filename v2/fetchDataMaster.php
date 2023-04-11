<?php 
 
// Database connection info 
$dbDetails = array( 
    'host' => 'localhost', 
    'user' => 'root', 
    'pass' => '', 
    'db'   => 'bfc_inventory' 
); 
 
// DB table to use 
$table = 'product_masterlist'; 
 
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
    array( 'db' => 'generic_name',      'dt' => 2 ), 
    array( 'db' => 'category',     'dt' => 3 ), 
    array( 
        'db'        => 'id', 
        'dt'        => 4, 
        'formatter' => function( $d, $row ) { 
            return '
            <button class="btn btn-info btn-sm" data-id="'.$d.'" data-toggle="modal" data-target="#edit" onclick="viewModal(this);">
                                                            <i class="fas fa-pencil-alt"></i>
                                                            Edit
                                                        </button>
            '; 
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