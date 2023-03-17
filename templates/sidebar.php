<?php
// Restrict user fron accessing the php file directly
if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
    /* 
    Up to you which header to send, some prefer 404 even if 
    the files does exist for security
    */
    header('HTTP/1.0 500 Internal Server Error', TRUE, 500);

    /* choose the appropriate page to redirect users */
    die(header('location: ../500.html'));
} else { ?>
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-light-blue elevation-4">
        <!-- Brand Logo -->
        <a href="starter.php" class="brand-link">
            <img src="dist/img/normal_BFC_logo_latest.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                style="opacity: .8">
            <span class="brand-text font-weight-light">AdminBFC</span>
        </a>
        <!-- Sidebar -->
        <div class="sidebar">

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                        with font-awesome or any other icon font library -->
                    <li class="nav-item ">
                        <a href="starter.php" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item menu-open ">
                        <a href="#" class="nav-link active">
                            <i class="nav-icon fas fa-edit"></i>
                            <p>
                                Manage Inventory
                                <i class="fas fa-angle-left right active"></i>
                                <!-- <span class="badge badge-info right">6</span> -->
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="inventory.php" class="nav-link ">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Inventory</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="masterlist.php" class="nav-link active">
                                    <i class="far fa-dot-circle nav-icon"></i>
                                    <p>Masterlist</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-truck"></i>
                            <p>
                                Product In/Out
                                <i class="fas fa-angle-left right"></i>
                                <!-- <span class="badge badge-info right">6</span> -->
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="prod-in.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Product In</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="prod-out.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Product Out</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-cog"></i>
                            <p>
                                Settings
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="employee.php" class="nav-link ">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Employee Accounts</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="franchisee.php" class="nav-link">
                                    <i class="far fa-circle nav-icon "></i>
                                    <p>Franchisee List</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="supplier.php" class="nav-link ">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Supplier</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="admin.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Change Password </p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="functions.php?logout" class="nav-link">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>
                                Logout
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
<?php } ?>