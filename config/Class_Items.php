<?php

class Items {

    // fungsi untuk cek apakah ada data terkait di tbl_transaction
    function checkFK($items_id) {
        include("Database.php");

        $sql = "SELECT COUNT(*) as total FROM tbl_transactions WHERE items_id = '$items_id'";

        $result = mysqli_query($conn, $sql);

        $data = mysqli_fetch_assoc($result);

        return $data['total'] > 0; // Return true jika ada foreign key di tbl_transaction

    }

    // Function untuk soft delete barang (mengubah status is_deleted)
    function softDeleteItems($items_id) {
        include("Database.php");

        $sql = "UPDATE tbl_items SET is_deleted = 1 WHERE items_id = '$items_id'";
        $result = mysqli_query($conn, $sql);

        return $result;
    }

    // Fungsi unntuk mengambil barang yang sudah dihapus (backup)
    function getDeletedItems() {
        include("Database.php");

        $sql = "SELECT * FROM tbl_items WHERE is_deleted = 1";
        $result = mysqli_query($conn, $sql);

        $deletedItems = [];
        while($row = mysqli_fetch_assoc($result)) {
            $deletedItems[] = $row;
        }

        return $deletedItems;
    }

    // Fungsi untuk memulihkan data barang yang terhapus
    function restoreItems($items_id) {
        include ("Database.php");

        $sql = "UPDATE tbl_items SET is_deleted = 0 WHERE items_id = '$items_id'";
        $result = mysqli_query($conn, $sql);

        return $result;
    }


    // Fungsi Untuk menghitung data
    function countItems() {
        include ("Database.php");

        // Query untuk menghitung jumlah items/barang
        $sql = "SELECT COUNT(*) as total FROM tbl_items";

        $data = mysqli_query($conn, $sql);

        if ($data) {
            $row = mysqli_fetch_assoc($data);
            return $row['total']; // mengembalikan total jumlah items/barang
        } else {
            return 0; // Jika query gagal, kembalikan ke 0
        }
    }

    function countItemsEntries() {
        include ("Database.php");

        // Query untuk menghitung jumlah items/barang masuk
        $sql = "SELECT COUNT(*) as total FROM tbl_items_entries";

        $data = mysqli_query($conn, $sql);

        if ($data) {
            $row = mysqli_fetch_assoc($data);
            return $row['total']; // mengembalikan total jumlah items/barang masuk
        } else {
            return 0; // Jika query gagal, kembalikan ke 0
        }
    }

    function countItemsOutflows() {
        include ("Database.php");

        // Query untuk menghitung jumlah items/barang keluar
        $sql = "SELECT COUNT(*) as total FROM tbl_items_outflows";

        $data = mysqli_query($conn, $sql);

        if ($data) {
            $row = mysqli_fetch_assoc($data);
            return $row['total']; // mengembalikan total jumlah items/barang keluar
        } else {
            return 0; // Jika query gagal, kembalikan ke 0
        }
    }

    function allData() {
        include("Database.php");

       $sql = "SELECT * FROM tbl_items";

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

    function allDataItemsEntries()
    {
        include("Database.php");

        $sql = "SELECT b.items_ent_id, a.name_items, c.nama_supplier, b.quantity, b.tgl_masuk
        FROM tbl_items_entries b
        INNER JOIN tbl_items a ON b.items_id = a.items_id
        INNER JOIN tbl_supplier c ON b.supplier_id = c.supplier_id
        ORDER BY b.tgl_masuk DESC";
        
        // echo $sql;
        $data = mysqli_query($conn,$sql);
        
        $data1 = mysqli_num_rows($data);
        if ($data1 == 0) {

            // echo "<div class='alert alert-danger'>Tidak ada data</div>";
        }
        else{
            
            while ($d=mysqli_fetch_assoc($data)) {

                $hasil[] = $d;
            }
            return $hasil;
        }
    }

    function allDataItemsOutflows() {
        include("Database.php");

        $sql = "SELECT b.items_out_id, a.name_items, b.quantity, b.tgl_keluar
                FROM tbl_items_outflows b
                INNER JOIN tbl_items a ON b.items_id = a.items_id
                ORDER BY b.tgl_keluar DESC";

        // echo $sql
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

    // Function untuk mengambil nama dan supplier_id
    function getSupplier()
    {
        include("Database.php");

        $sql = "SELECT * FROM tbl_supplier ORDER BY supplier_id";

        $data = mysqli_query($conn,$sql);

        while ($d=mysqli_fetch_assoc($data)) {

            $hasil[] = $d;
        }
        return $hasil;
    }

    // Function untuk mengambil nama dan items_id
    function getItems(){
        include("Database.php");

        $sql = "SELECT * FROM tbl_items ORDER BY items_id";

        $data = mysqli_query($conn, $sql);

        while ($d=mysqli_fetch_assoc($data)) {
            $hasil[] = $d;
        }
        return $hasil;
    }

    // Fungsi Mengambil data barang berdasarkan id
    function getItemsById($items_id){
        include("Database.php");

        $sql = "SELECT * FROM tbl_items WHERE items_id = '$items_id'";
        $result = mysqli_query($conn, $sql);
        return mysqli_fetch_assoc($result);
    }

    // Fungsi Input data barang
    function createItems($name_items, $category_items, $stock_items, $harga_items) {

        include("Database.php");

        $sql = "INSERT INTO tbl_items (name_items, category_items, stock_items, harga_items, created_at, updated_at)
                VALUES('$name_items', '$category_items', '$stock_items', '$harga_items', NOW(), NOW())";

        $data = mysqli_query($conn, $sql);
    }

    // Fungsi untuk update data barang
    function updateItems($items_id, $name_items, $category_items, $stock_items, $harga_items) {
        include ("Database.php");

        // Query update data barang berdasarkan items_id
        $sql = "UPDATE tbl_items SET 
                name_items = '$name_items', 
                category_items = '$category_items', 
                stock_items = '$stock_items', 
                harga_items = '$harga_items' 
                WHERE items_id = '$items_id'";

        // Eksekusi query
        $result = mysqli_query($conn, $sql);

        // Cek apakah query berhasil dijalankan
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    // Fungsi untuk Hapus Barang
    function deleteItems($items_id) {
        include("Database.php");
    
        // Hapus entri terkait di tabel tbl_items_entries
        $stmt1 = $conn->prepare("DELETE FROM tbl_items_entries WHERE items_id = ?");
        $stmt1->bind_param("i", $items_id);
        $stmt1->execute();

        // Hapus entri terkait di tabel tbl_items_outflows
        $stmt1 = $conn->prepare("DELETE FROM tbl_items_outflows WHERE items_id = ?");
        $stmt1->bind_param("i", $items_id);
        $stmt1->execute();

        // Hapus entri terkait di tabel tbl_items_transactions
        $stmt1 = $conn->prepare("DELETE FROM tbl_transactions WHERE items_id = ?");
        $stmt1->bind_param("i", $items_id);
        $stmt1->execute();
    
        // Setelah menghapus entri terkait, hapus data di tbl_items
        $stmt2 = $conn->prepare("DELETE FROM tbl_items WHERE items_id = ?");
        $stmt2->bind_param("i", $items_id);
        $stmt2->execute();
    }    

    
}