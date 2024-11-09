<?php
include_once("config/Class_Items.php");
$db = new Items();

// Ambil semua barang dan supplier untuk dropdown
$items = $db->getItems();
$suppliers = $db->getSupplier();
?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Transaksi</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
        <li class="breadcrumb-item active">Tambah Transaksi</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Form Transaksi
        </div>
            <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form action="pages/action.php?aksi=formTransaksi" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="items_id">Pilih Barang</label>
                                            <select name="items_id" class="form-control" id="" required>
                                                <option value="" disabled selected>Pilih Barang</option>
                                                <?php foreach ($items as $item): ?>
                                                    <option value="<?= $item['items_id'] ?>"><?= $item['name_items'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="supplier_id">Pilih Supplier</label>
                                            <select name="supplier_id" class="form-control" id="" required>
                                                <option value="" disabled selected>Pilih Supplier</option>
                                                <?php foreach ($suppliers as $spl): ?>
                                                    <option value="<?= $spl['supplier_id'] ?>"><?= $spl['nama_supplier'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Quantity</label>
                                            <input  type="number" placeholder="Quantity" name="quantity" class="form-control" required>
                                        </div>
                                </div>
                                    <div class="col-lg-6">
                                    <div class="form-group">
                                            <label for="transaction_type">Keterangan Transaksi</label>
                                            <select name="transaction_type" class="form-control" id="transaction_type" required>
                                                <option value="" disabled selected>Pilih Keterangan</option>
                                                <option value="masuk">Barang Masuk</option>
                                                <option value="keluar">Barang Keluar</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Transaksi</label>
                                            <input type="date" name="transaction_date" class="form-control" required>
                                        </div>
                                        <div class="form-group mt-2">
                                            <button type="submit" name="submit" value="Simpan" class="btn btn-default" style="background-color: #333; color: #fff;">Submit</button>
                                            <a href='?page=databarang' class="btn btn-default" >Batal</a>
                                        </div>
                                    </div>
                                </form>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
        <!-- /.col-lg-12 -->
            </div>
        </div>
    </div>
</div>