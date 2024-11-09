<?php 
include_once("../config/Class_Supplier.php");
$spl = new Supplier();
include_once("../config/Database.php");

$action = $_GET["aksi"];

// ===========================================================================================
// SUPPLIER BARU
// ===========================================================================================

if ($action == "tambah") {

    $nama_supplier = $_POST["nama_supplier"];
    $alamat_supplier = $_POST["alamat_supplier"];
    $telp_supplier = $_POST["telp_supplier"];

    $spl->createAddSupplier($nama_supplier,$alamat_supplier,$telp_supplier);

    echo "<script>alert('Data Supplier berhasil ditambahkan'); window.location.href='../index.php?page=datasupplier';</script>";

}


// if ($action == "update") {

//     $nama_supplier = $_POST['nama_supplier'];
//     $alamat_supplier = $_POST['alamat_supplier'];
//     $telp_supplier = $_POST['telp_supplier'];
//     $kota_supplier = $_POST['kota_supplier'];

//     $db->update($nama_supplier,$alamat_supplier,$telp_supplier,$kota_supplier,$kode_supplier);

//     echo "<script>alert('Data Supplier berhasil diubah'); window.location.href='../supplier.php';</script>";

// }
