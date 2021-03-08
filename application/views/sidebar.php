<body id="page-top" onload="asd()">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <?php
                if($_SESSION["user"]){
                    $link = base_url("index.php/home");
                }else{
                    $link = redirect(base_url());
                }
            ?>
            <a class="sidebar-brand d-flex align-items-center justify-content-center my-2" href="<?= $link?>">
                <div class="sidebar-brand-icon fa-flip-horizontal">
                    <i class="fa fa-truck"></i>
                </div>
                <div class="sidebar-brand-text mx-3 ">TLEMU SKB</div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider ">
            <!-- Heading -->
            <div class="sidebar-heading">
                Perintah Kerja  
            </div>
            <!-- Nav Item -->
            <li  class="nav-item mr-2 " id="JO_page">
                <a id="coba" class="nav-link" href="<?=base_url("index.php/home")?>">
                    <i class="fas fa-envelope-open-text "></i>
                    <span id="coba">Job Order</span></a>
            </li>
            <!-- Nav Item -->
            <li class="nav-item " id="Invoice_page">
                <a class="nav-link" href="<?=base_url("index.php/home/invoice")?>">   
                    <i class="fas fa-receipt mr-2"></i>
                    <span>Invoice</span>
                </a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
                Penggajian
            </div>
            <!-- Nav Item -->
            <li class="nav-item" id="Bon_page">
                <a class="nav-link" href="<?=base_url("index.php/home/bon")?>">
                    <i class="fas fa-funnel-dollar"></i>
                    <span>Transaksi BON Supir</span>
                </a>
            </li>
             <!-- Divider -->
             <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
                Master Data
            </div>
            <!-- Nav Item -->
            <li class="nav-item" id="Kendaraan_page">
                <a class="nav-link" href="<?=base_url("index.php/home/truck")?>">
                    <i class="fas fa-truck"></i>
                    <span>Data Kendaraan</span>
                </a>
            </li>
            <!-- Nav Item -->
            <li class="nav-item" id="Supir_page">
                <a class="nav-link" href="<?=base_url("index.php/home/penggajian")?>">
                    <i class="fas fa-money-check-alt"></i>
                    <span>Supir</span>
                </a>
            </li>
            <!-- Nav Item -->
            <li class="nav-item" id="Customer_page">
                <a class="nav-link"  href="<?=base_url("index.php/home/customer")?>">
                    <i class="fas fa-users"></i>
                    <span>Customer</span>
                </a>
            </li>
            <!-- Nav Item -->
            <li class="nav-item" id="Satuan_page">
                <a class="nav-link" href="<?=base_url("index.php/home/satuan")?>">  
                    <i class="fas fa-weight"></i>
                    <span>Satuan Muatan</span>
                </a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
                Laporan
            </div>
            <!-- Nav Item -->
            <li class="nav-item" id="Laporan_page">
                <a class="nav-link" href="<?=base_url("index.php/home/report")?>">
                    <i class="fas fa-mail-bulk"></i>
                    <span>Laporan Job Order</span>
                </a>
            </li>
            <?php if($_SESSION["role"] == "Super User"){?>
                <!-- Divider -->
                <hr class="sidebar-divider">
                <!-- Heading -->
                <div class="sidebar-heading">
                    Sistem dan Konfigurasi
                </div>
                <!-- Nav Item -->
                <li class="nav-item" id="Akun_page">
                    <a class="nav-link" href="<?=base_url("index.php/home/akun")?>">
                        <i class="fas fa-database"></i>
                        <span>Data Akun </span>
                    </a>
                </li>
            <?php }?>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block my-1">
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline my-1">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION["user"]?></span>
                                <i class="fas fa-user-friends"></i>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Keluar
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->

<script>
    function asd(){
        var page = '<?= $page?>';
        // alert(page);
        $("#"+page).addClass("active");
    }
</script>
