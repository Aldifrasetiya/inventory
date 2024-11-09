<?php

class Supplier {

    // Tampil Data

    function countSupplier() {
        include ("Database.php");

        // Query untuk menghitung jumlah supplier
        $sql = "SELECT COUNT(*) as total FROM tbl_supplier";

        $data = mysqli_query($conn, $sql);

        if ($data) {
            $row = mysqli_fetch_assoc($data);
            return $row['total']; // mengembalikan total jumlah supplier
        } else {
            return 0; // Jika query gagal, kembalikan ke 0
        }
    }

    function allDataSupplier() {
        include("Database.php");

        $sql = "SELECT * FROM tbl_supplier";

        $data = mysqli_query($conn, $sql);

        $data1 = mysqli_num_rows($data);

        if ($data1 == 0) {
            // echo "<div class='alert alert-danger'>Tidak ada data</div>";
        } else {
            while ($d=mysqli_fetch_assoc($data)) {
                $hasil[] = $d;
            }
            return $hasil;
        }
    }

    function createAddSupplier($nama_supplier, $alamat_supplier, $telp_supplier) {
        include("Database.php");

        // Menyimpan Data Supplier
        $sql = "INSERT INTO tbl_supplier(nama_supplier, alamat_supplier, telp_supplier)
                VALUES ('$nama_supplier', '$alamat_supplier', '$telp_supplier')";

        $data = mysqli_query($conn, $sql);

        if ($data) {
            return true;
        } else {
            return false;
        }
    }
}