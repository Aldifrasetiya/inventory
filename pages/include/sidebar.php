<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <a class="nav-link" href="index.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#barang" aria-expanded="false" aria-controls="barang">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-boxes-stacked"></i></div>
                    Barang
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="barang" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="index.php?page=databarang">Data Barang</a>
                        <a class="nav-link" href="index.php?page=barangbaru">Tambah Barang</a>
                    </nav>
                </div>
                <a class="nav-link" href="index.php?page=barangmasuk" aria-expanded="false" aria-controls="barangMasuk">
                    <div class="sb-nav-link-icon"><i class="fa-regular fa-circle-right"></i></div>
                    Barang Masuk
                    <!-- <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div> -->
                </a>
                <div class="collapse" id="barangMasuk" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <!-- <a class="nav-link" href="index.php?page=barangmasuk">Data Barang Masuk</a> -->
                        <!-- <a class="nav-link" href="index.php?page=addBarangMasuk">Tambah Barang Masuk</a> -->
                    </nav>
                </div>
                <a class="nav-link" href="index.php?page=barangkeluar">
                    <div class="sb-nav-link-icon"><i class="fa-regular fa-circle-left"></i></div>
                    Barang Keluar
                </a>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#transaksi" aria-expanded="false" aria-controls="formTransaksi">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-wallet"></i></div>
                    Transaksi
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="transaksi" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="index.php?page=datatransaksi">Data Transaksi</a>
                        <a class="nav-link" href="index.php?page=formTransaksi">Form Transaksi</a>
                    </nav>
                </div>
                <!-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#peminjaman" aria-expanded="false" aria-controls="peminjaman">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-bars-staggered"></i></div>
                    Peminjaman
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="peminjaman" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="layout-static.html">Data Peminjaman</a>
                        <a class="nav-link" href="layout-sidenav-light.html">Form Barang</a>
                    </nav>
                </div> -->
                <!-- <a class="nav-link" href="index.php">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-truck-ramp-box"></i></div>
                    Stok
                </a> -->
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#supplier" aria-expanded="false" aria-controls="supplier">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-users"></i></div>
                    Supplier
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="supplier" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="index.php?page=datasupplier">Data Supplier</a>
                        <a class="nav-link" href="index.php?page=addsupplier">Tambah Supplier</a>
                    </nav>
                </div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pengaturan" aria-expanded="false" aria-controls="pengaturan">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-gears"></i></div>
                    Pengaturan
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="pengaturan" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <!-- <a class="nav-link" href="index.php?page=datasupplier">Backup Data</a> -->
                        <a class="nav-link" href="index.php?page=dataBackup">Backup Data</a>
                    </nav>
                </div>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            Start Bootstrap
        </div>
    </nav>
</div>