<?php
/* at the top of 'check.php' */
if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
    /* 
           Up to you which header to send, some prefer 404 even if 
           the files does exist for security
        */
    header('HTTP/1.0 500 Internal Server Error', TRUE, 500);

    /* choose the appropriate page to redirect users */
    die(header('location: ../500.html'));
} else { ?>
    <nav class="main-header navbar navbar-expand navbar-light justify-content-between">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <?php
                    $is_superuser =  $_SESSION['login_user']['is_superuser'];
                    if ($is_superuser == '1'){
                        $link = "dashboard.php";
                    } else if ($is_superuser == '0'){
                        $link = "z-dashboard.php";
                    } 
                ?>
                <a href="<?php echo $link ?>" class="nav-link">Home</a>
            </li>
        </ul>
        <h6 class="mb-0 mr-2">
            <?php
            date_default_timezone_set("Asia/Manila");
            $h = date('G');
            $user = $_SESSION['login_user']['user'];

            if ($h >= 0 && $h <= 11) {
                echo "Good morning, $user";
            } else if ($h >= 12 && $h <= 17) {
                echo "Good afternoon, $user";
            } else {
                echo "Good evening, $user";
            }
            ?>
        </h6>
    </nav>
    <!-- /.navbar -->
<?php } ?>