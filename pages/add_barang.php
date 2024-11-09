<?php

// session_start();

// require_once './app/models/Items.php';
// require_once './app/controllers/ItemController.php';

// $controller = new ItemController();

// if (isset($_GET['aksi']) && $_GET['aksi'] == 'tambah') {
//     $controller->add_barang_baru();
// }

?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Tambah Barang</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
        <li class="breadcrumb-item active">Tambah Barang</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Input Barang Baru
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                    <div class="col-lg-6">
                                <form action="pages/action.php?aksi=tambah" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Nama Barang</label>
                                            <input type="text" placeholder="Masukan Nama Barang" name="name_items" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Kategori</label>
                                            <select name="category_items" class="form-control" required>
                                                <option value="" disabled selected>Pilih Kategori</option>
                                                <option value="atk">Alat Tulis Kantor</option>
                                                <option value="Elektronics">Elektronics</option>
                                                <option value="Buku">Buku</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Stok</label>
                                            <input type="text" placeholder="Masukkan Stok" name="stock_items" class="form-control" required >
                                        </div>
                                        <div class="form-group">
                                            <label>Harga</label>
                                            <input type="text" placeholder="Masukkan Harga" name="harga_items" class="form-control" required >
                                        </div>
                                        <div class="form-group mt-2">
                                            <button type="submit" name="submit" value="Simpan" class="btn btn-default" style="background-color: #333; color: #fff;">Submit</button>
                                            <a href='?page=databarang' class="btn btn-default" >Batal</a>
                                        </div>
                                    </div>
                                </form>
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