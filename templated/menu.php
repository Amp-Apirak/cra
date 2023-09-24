<aside class="main-sidebar elevation-4 sidebar-light-primary">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link bg-dark bg-primary bg-danger">
        <img src="../its/img/cra.png" alt="CRA Managemant" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">CRA Management</span>
    </a>


    <?php if (isset($_SESSION['member_id'])) { ?>
    <!-- Sidebar -->
    <div
        class="sidebar os-host os-host-resize-disabled os-host-transition os-host-scrollbar-horizontal-hidden os-theme-dark os-host-foreign os-theme-light os-host-scrollbar-vertical-hidden">
        <div class="os-resize-observer-host observed">
            <div class="os-resize-observer" style="left: 0px; right: auto;"></div>
            <div class="os-resize-observer"></div>
        </div>
        <div class="os-size-auto-observer observed" style="height: calc(100% + 1px); float: left;">
            <div class="os-resize-observer"></div>
        </div>
        <div class="os-padding">
            <div class="os-viewport os-viewport-native-scrollbars-invisible">
                <div class="os-content">
                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="../its/img/ad.jpg" class="img-circle elevation-2" alt="User Image">
                        </div>
                        <div class="info">
                            <a href="#" class=""><?php echo ($_SESSION['member_name']);?></a><br>
                            <a href="#" class=""><?php echo ($_SESSION['member_role']);?></a><br>
                            <a href="logout.php" class=""><i class="nav-icon fa fa-sign-in"> Logout</i></a>
                        </div>
                    </div>
                    <?php } ?>


                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview"
                            role="menu" data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                            <li class="nav-item">
                                <a href="index.php" class="nav-link <?php if($menu=="index"){echo "active";} ?>">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="ticket.php" class="nav-link <?php if($menu=="ticket"){echo "active";} ?>">
                                    <i class="nav-icon fa fa-book"></i>
                                    <p>
                                        Ticket
                                        <span class="right badge badge-danger">New</span>
                                    </p>
                                </a>
                            </li> 
                            <li class="nav-item <?php if($menu=="employee"){echo "menu-open";} elseif ($menu=="user"){echo "menu-open";} ?>" >
                                <a href="#"
                                    class="nav-link <?php if($menu=="employee"){echo "active";} elseif ($menu=="user"){echo "active";}?>">
                                    <i class="nav-icon fa fa-address-book"></i>
                                    <p>
                                        Contact
                                        <i class="fas fa-angle-left right"></i>
                                        <span class="badge badge-info right">2</span>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview" >
                                    <li class="nav-item ">
                                        <a href="employee.php" class="nav-link <?php if($menu=="employee"){echo "active";} ?> ">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Employee</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="user.php" class="nav-link  <?php if($menu=="user"){echo "active";} ?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Users</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="km.php" class="nav-link <?php if($menu=="km"){echo "active";} ?>">
                                    <i class="nav-icon fa fa-book"></i>
                                    <p>
                                        Knowledge
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="service.php" class="nav-link <?php if($menu=="service"){echo "active";} ?>">
                                    <i class="nav-icon fa fa-star"></i>
                                    <p>
                                        Service
                                        
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="report.php" class="nav-link <?php if($menu=="report"){echo "active";} ?>">
                                    <i class="nav-icon fa fa-folder-open"></i>
                                    <p>
                                        Report
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
            </div>
        </div>
        <div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable os-scrollbar-auto-hidden">
            <div class="os-scrollbar-track">
                <div class="os-scrollbar-handle" style="width: 100%; transform: translate(0px, 0px);"></div>
            </div>
        </div>
        <div class="os-scrollbar os-scrollbar-vertical os-scrollbar-unusable os-scrollbar-auto-hidden">
            <div class="os-scrollbar-track">
                <div class="os-scrollbar-handle" style="height: 100%; transform: translate(0px, 0px);"></div>
            </div>
        </div>
        <div class="os-scrollbar-corner"></div>
    </div>
    <!-- /.sidebar -->
</aside>