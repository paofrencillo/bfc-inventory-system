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
    array( 'db' => 'id',  'dt' => 0,
        'formatter' => function ($d, $row) {
            return '<input type="checkbox" class="selectRow" name="'.$d.'" value="'.$d.'" style="width: 16px; height: 16px;">';
        }),
    array(
        'db' => 'barcode',
        'dt' => 1,
        'formatter' => function( $d, $row ) {
            $data = strlen($d) > 15 ? substr($d, 0, 15)."..." : $d;
            return '
                <p title="'.$d.'" style="margin-bottom: 0;">'.$data.'</p>
            ';
    }), 
    array( 'db' => 'description',  'dt' => 2 ), 
    array( 'db' => 'generic_name',      'dt' => 3 ), 
    array( 'db' => 'category',     'dt' => 4 ),
    array( 'db' => 'supplier',     'dt' => 5 ), 
    array( 
        'db'        => 'id', 
        'dt'        => 6, 
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