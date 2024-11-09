<?php
include_once("../config/Class_Items.php");
include_once("../config/Class_Transaction.php");
include_once("../config/Class_Supplier.php");
include_once("../config/Database.php");

$db = new Items();
$trs = new Transaksi();
$spl = new Supplier();

$action = $_GET["aksi"];

// New Items
if ($action == "tambah") {

    $name_items = $_POST["name_items"];
    $category_items = $_POST["category_items"];
    $stock_items = $_POST["stock_items"];
    $harga_items = $_POST["harga_items"];
    $jumlah = $_POST["jmlh_masuk"];

    $db->createItems($name_items, $category_items, $stock_items, $harga_items);

    echo "<script>alert('Data barang tersimpan'); window.location.href='../index.php?page=databarang';</script>";
}

// Update Items
elseif ($action == "edit") {
    // Tangkap data dari form
    $items_id = $_POST["items_id"];
    $name_items = $_POST["name_items"];
    $category_items = $_POST["category_items"];
    $stock_items = $_POST["stock_items"];
    $harga_items = $_POST["harga_items"];

    // Panggil fungsi updateItems() untuk update data barang
    if ($db->updateItems($items_id, $name_items, $category_items, $stock_items, $harga_items)) {
        echo "<script>alert('Data barang berhasil diupdate'); window.location.href='../index.php?page=databarang';</script>";
    } else {
        echo "<script>alert('Gagal mengupdate data barang'); window.location.href='../index.php?page=databarang';</script>";
    }
}


//  Input Transaction
elseif ($action == "formTransaksi") {
    
    $items_id = $_POST["items_id"];
    $supplier_id = $_POST["supplier_id"];
    $quantity = $_POST["quantity"];
    $transaction_type = $_POST["transaction_type"];
    $transaction_date = $_POST["transaction_date"];

    // Proses input Transaksi
    if ($trs->createTransaction($items_id, $supplier_id, $quantity, $transaction_type, $transaction_date)) {
        echo "<script>alert('Data transaksi tersimpan'); window.location.href='../index.php?page=datatransaksi';</script>";
    } else {
        echo "<script>alert('Gagal menyimpan data transaksi'); window.location.href='../index.php?page=datatransaksi';</script>";
    }
}

//  Update Transaction
elseif ($action == "editTransaksi") {
    
    $trans_id = $_POST["trans_id"];
    $items_id = $_POST["items_id"];
    $supplier_id = $_POST["supplier_id"];
    $quantity = $_POST["quantity"];
    $transaction_type = $_POST["transaction_type"];
    $transaction_date = $_POST["transaction_date"];

    // Proses input Transaksi
    if ($trs->updateTransaction($trans_id, $items_id, $supplier_id, $quantity, $transaction_type, $transaction_date)) {
        echo "<script>alert('Data transaksi tersimpan'); window.location.href='../index.php?page=datatransaksi';</script>";
    } else {
        echo "<script>alert('Gagal menyimpan data transaksi'); window.location.href='../index.php?page=datatransaksi';</script>";
    }
}

// Count data untuk dashboard
elseif ($action == "count") {
    $data = [
        'total_items' => $db->countItems(),
        'total_items_entries' => $db->countItemsEntries(),
        'total_items_outflows' => $db->countItemsOutflows(),
        'total_supplier' => $spl->countSupplier()
    ];

    // mengembalikan data dalam format JSON untuk frontend
    echo json_encode($data);
}

// Delete items
elseif ($action == "delete") {
    // Tangkap items__id dari form atau URL
    $items_id = $_POST['items_id'] ?? $_GET['items_id'];

    // Cek apakah ada data transaksi terkait
    if (!$db->checkFK($items_id)) {
        // Jika ada data transaksi terkait, tampilkan alert
        // echo "<script>alert('Data tidak bisa dihapus, karena ada data di transaksi.'); window.location.href='../index.php?page=databarang';</script>";
        echo json_encode(array('status' => 'error', 'message' => 'Data tidak bisa dihapus, karena ada data di transaksi.'));
    } else {
        // Jika tidak ada data transaksi, lakukan soft delete
        if ($db->softDeleteItems($items_id)) {
            // echo "<script>alert('Data berhasil dihapus dan masuk ke backup.'); window.location.href='../index.php?page=databarang';</script>";
            echo json_encode(array('status' => 'success', 'message' => 'Data berhasil dihapus.'));
        } else {
            // echo "<script>alert('Gagal menghapus data.'); window.location.href='../index.php?page=databarang';</script>";
            echo json_encode(array('status' => 'error', 'message' => 'Gagal menghapus data'));
        }
    }
}