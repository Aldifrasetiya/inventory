<?php
include_once("config/Class_Items.php");
$db = new Items();

// Ambil semua barang dan supplier untuk dropdown
$items = $db->getItems();
$suppliers = $db->getSupplier();
?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Barang</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
        <li class="breadcrumb-item active">Tambah Barang</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Tambah Barang Baru
        </div>
            <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form action="pages/action.php?aksi=addBarangMasuk" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="name_items">Pilih Barang</label>
                                            <select name="name_items" class="form-control" id="" required>
                                                <option value="" disabled selected>Pilih Barang</option>
                                                <?php foreach ($items as $item): ?>
                                                    <option value="<?= $item['items_id'] ?>"><?= $item['name_items'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_supplier">Pilih Supplier</label>
                                            <select name="nama_supplier" class="form-control" id="" required>
                                                <option value="" disabled selected>Pilih Supplier</option>
                                                <?php foreach ($suppliers as $spl): ?>
                                                    <option value="<?= $spl['supplier_id'] ?>"><?= $spl['nama_supplier'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <!-- <div class="form-group">
                                            <label>Nama Supplier</label>
                                            <input type="text" placeholder="Masukkaan Nama Supplier" name="supplier_id" class="form-control"  class="form-control">
                                        </div> -->
                                </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Quantity</label>
                                            <input  type="text" placeholder="Quantity" name="quantity" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Masuk</label>
                                            <input type="date" placeholder="Sumber Dana" name="tgl_masuk" class="form-control" required>
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