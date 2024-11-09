<div class="container-fluid px-4">
    <h1 class="mt-4">Edit Barang</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
        <li class="breadcrumb-item active">Edit Barang</li>
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
                            <?php 
                                // Pastikan items_id ada di URL
                                if (isset($_GET['items_id'])) {
                                    // Ambil data barang yang akan diupdate berdasarkan items_id
                                    $item = $db->getItemsById($_GET['items_id']);
                                } else {
                                    // Jika items_id tidak ada, redirect atau tampilkan pesan error
                                    echo "Data Barang tidak ditemukan.";
                                    exit;
                                }
                            ?>
                            <div class="row">
                                <div class="col-lg-6">
                                    <!-- Form untuk mengirim data ke action.php dengan method POST -->
                                    <form action="pages/action.php?aksi=edit" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <!-- Hidden input untuk ID barang -->
                                            <input type="hidden" name="items_id" value="<?= $item['items_id']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Barang</label>
                                            <input type="text" placeholder="Masukkan Nama Barang" name="name_items" value="<?= $item['name_items']; ?>" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Kategori</label>
                                            <select name="category_items" class="form-control" required>
                                                <option value="" disabled selected>Pilih Kategori</option>
                                                <option value="atk" <?= $item['category_items'] == 'atk' ? 'selected' : ''; ?>>Alat Tulis Kantor</option>
                                                <option value="Elektronics" <?= $item['category_items'] == 'Elektronics' ? 'selected' : ''; ?>>Elektronics</option>
                                                <option value="Buku" <?= $item['category_items'] == 'Buku' ? 'selected' : ''; ?>>Buku</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Stok</label>
                                            <input type="text" placeholder="Masukkan Stok" name="stock_items" value="<?= $item['stock_items']; ?>" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Harga</label>
                                            <input type="text" placeholder="Masukkan Harga" name="harga_items" value="<?= $item['harga_items']; ?>" class="form-control" required>
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