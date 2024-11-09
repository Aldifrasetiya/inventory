<?php

class Transaksi {

    function countTransaction() {
            include ("Database.php");
    
            // Query untuk menghitung jumlah transaksi
            $sql = "SELECT COUNT(*) as total FROM tbl_transactions";
    
            $data = mysqli_query($conn, $sql);
    
            if ($data) {
                $row = mysqli_fetch_assoc($data);
                return $row['total']; // mengembalikan total jumlah transaksi
            } else {
                return 0; // Jika query gagal, kembalikan ke 0
            }
    }

    function allDataTransaction() {
        include("Database.php");

        $sql = "SELECT b.trans_id, a.name_items, c.nama_supplier, b.quantity, b.transaction_type, b.transaction_date FROM tbl_transactions b
        INNER JOIN tbl_items a ON b.items_id = a.items_id
        INNER JOIN tbl_supplier c ON b.supplier_id = c.supplier_id
        ORDER BY b.transaction_type, b.transaction_date DESC";

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

    // mengambil nama dan supplier_id
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
    
    // mengambil nama dan items_id
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
    function getTransactionById($trans_id){
        include("Database.php");

        $sql = "SELECT * FROM tbl_transactions WHERE trans_id = '$trans_id'";
        $result = mysqli_query($conn, $sql);
        return mysqli_fetch_assoc($result);
    }

    // Fungsi untuk input data transaksi
    function createTransaction($items_id, $supplier_id, $quantity, $transaction_type, $transaction_date) {
        include("Database.php");

        $sql_transaction = "INSERT INTO tbl_transactions (items_id, supplier_id, quantity, transaction_type, transaction_date)
                            VALUES('$items_id', '$supplier_id', '$quantity', '$transaction_type', '$transaction_date')";

        if (mysqli_query($conn, $sql_transaction)) {
            $trans_id = mysqli_insert_id($conn);
            
            if ($transaction_type == 'masuk') {
                // Jika barang masuk, insert ke tbl_items_entries
                $sql_entries = "INSERT INTO tbl_items_entries (items_id, supplier_id, quantity, tgl_masuk) VALUES ('$items_id', '$supplier_id', '$quantity', '$transaction_date')";

                mysqli_query($conn, $sql_entries);

                // Tambahkan stok barang di tbl_items
                $sql_update_items = "UPDATE tbl_items SET stock_items = stock_items + $quantity WHERE items_id = '$items_id'";
                mysqli_query($conn, $sql_update_items);

            } elseif ($transaction_type == 'keluar') {
                // Jika barang keluar, insert ke tbl_items_outflows
                $sql_outflows = "INSERT INTO tbl_items_outflows (items_id, quantity, tgl_keluar) VALUES ('$items_id', '$quantity', '$transaction_date')";
                mysqli_query($conn, $sql_outflows);

                // Kurangi stok barang di tbl_items
                $sql_update_items = "UPDATE tbl_items SET stock_items = stock_items - $quantity WHERE items_id = '$items_id'";
                mysqli_query($conn, $sql_update_items);
            }
            return true;
        } else {
            return false;
        }
    }

    // Fungsi untuk update data transaksi
    function updateTransaction($trans_id, $items_id, $supplier_id, $quantity, $transaction_type, $transaction_date) {
        include ("Database.php");

        // Query update data transaksi berdasarkan trans_id
        $sql = "UPDATE tbl_transactions SET
                items_id = '$items_id',
                supplier_id = '$supplier_id',
                quantity = '$quantity',
                transaction_type = '$transaction_type',
                transaction_date = '$transaction_date'
                WHERE trans_id = '$trans_id'";

        // Eksekusi query
        $result = mysqli_query($conn, $sql);

        // Cek apakah query berhasil di jalankan
        if ($result) {
            return true;
        } else {
            return false;
        }
        
    }
}