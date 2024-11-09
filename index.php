<?php

include_once("config/Class_Items.php");
$db = new Items();

include_once("config/Class_Supplier.php");
$spl = new Supplier();

include_once("config/Class_Transaction.php");
$trs = new Transaksi();

if (isset($_GET['hapus'])) {

    $db->deleteItems($_GET['items_id']);
    echo "<script>alert('barang berhasil dihapus'); window.location.href='index.php?page=databarang';</script>";
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />

        <title>Sistem Manajemen Inventaris</title>

        <?php
            include_once("pages/include/header.php");
        ?>

    </head>
    <body class="sb-nav-fixed">
        <div id="layoutSidenav">
            <div id="layoutSidenav_content">
                <main>
                    <!-- Navbar -->
                    <?php include_once("pages/include/navbar.php"); ?>

                    <div class="container-fluid px-4">
                    <?php 
                        if (isset($_GET['page']) && $_GET['page'] == "databarang") {

                            include_once("pages/data_barang.php");
                        }
                        else if (isset($_GET['page']) && $_GET['page'] == "barangbaru") {

                            include_once("pages/add_barang.php");
                        }
                        else if (isset($_GET['page']) && $_GET['page'] == "update") {

                            include_once("pages/edit_barang.php");
                        }
                        else if (isset($_GET['page']) && $_GET['page'] == "barangmasuk") {

                            include_once("pages/data_barang_masuk.php");
                        }
                        else if (isset($_GET['page']) && $_GET['page'] == "barangkeluar") {

                            include_once("pages/data_barang_keluar.php");
                        }
                        else if (isset($_GET['page']) && $_GET['page'] == "addBarangMasuk") {

                            include_once("pages/add_barang_masuk.php");
                        }
                        else if (isset($_GET['page']) && $_GET['page'] == "datasupplier") {

                            include_once("supplier/data_supplier.php");
                        }
                        else if (isset($_GET['page']) && $_GET['page'] == "addsupplier") {

                            include_once("supplier/add_supplier.php");
                        }
                        else if (isset($_GET['page']) && $_GET['page'] == "datatransaksi") {

                            include_once("pages/data_transaksi.php");
                        }  
                        else if (isset($_GET['page']) && $_GET['page'] == "formTransaksi") {

                            include_once("pages/form_transaksi.php");
                        }  
                        else if (isset($_GET['page']) && $_GET['page'] == "editTransaksi") {

                            include_once("pages/edit_form_transaksi.php");
                        }  
                        else if (isset($_GET['page']) && $_GET['page'] == "dataBackup") {

                            include_once("pages/data_backup.php");
                        }  
                        else{
                            include_once("pages/dashboard.php");
                        }

                    ?>
                    </div>
                    <?php include_once("pages/include/footer.php"); ?>
                </main>
            </div>
        </div>
    </body>
</html>
