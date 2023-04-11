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
    array( 'db' => 'stock',      'dt' => 2 ), 
    array( 'db' => 'allocation',     'dt' => 3 ),
    array(
        'db' => 'sa_percentage',
        'dt' => 4,
        'formatter' => function($d, $row) {
            if ($d == NULL) {
                return '
                <div class="project_progress">
                    <div class="progress progress-sm progress-bar-secondary bg-secondary" style = "width:100%"></div>
                    <span class="badge bg-secondary font-weight-bold">0%</span>
                </div>
                ';
            } else if ($d >= 100) {
                return '
                <div class="project_progress">
                    <div class="progress progress-sm progress-bar-primary bg-primary" style = "width:100%"></div>
                    <span class="badge bg-primary font-weight-bold"> '. $d .'%</span>
                </div>
                ';
            } else if ($d <= 20) {
                return '
                <div class="project_progress">
                    <div class="progress progress-sm progress-bar-danger bg-danger" style = "width:' . $d . '%"></div>
                    <span class="badge bg-danger font-weight-bold"> '. $d .'%</span>
                </div>
                ';
            } else if ($d <= 30) {
                return '
                <div class="project_progress">
                    <div class="progress progress-sm progress-bar-warning bg-warning" style = "width:' . $d . '%"></div>
                    <span class="badge bg-warning font-weight-bold"> '. $d .'%</span>
                </div>
                ';
            } else if ($d >= 70) {
                return '
                <div class="project_progress">
                    <div class="progress progress-sm progress-bar-success bg-success" style = "width:' . $d. '%"></div>
                    <span class="badge bg-success font-weight-bold"> '. $d .'%</span>
                </div>
                ';
            } else {
                return '
                <div class="project_progress">
                    <div class="progress progress-sm progress-bar-success bg-success" style = "width:' . $d . '%"></div>
                    <span class="badge bg-success font-weight-bold"> '. $d .'%</span>
                </div>
                ';
            }
        }),
    array( 'db' => 'rack_in',     'dt' => 5 ),
    array( 'db' => 'rack_out',     'dt' => 6 ),
    array( 'db' => 'rack',     'dt' => 7 ), 
    array( 
        'db'        => 'id', 
        'dt'        => 8, 
        'formatter' => function( $d, $row ) { 
            return '
            <button class="btn btn-info btn-sm" onclick="editInv(this);" data-id="'.$d.'">
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