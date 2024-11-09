<div class="container-fluid px-4">
    <h1 class="mt-4">Data Backup Barang</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
        <li class="breadcrumb-item active">Data Backup Barang</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Data Barang
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <?php
                        if (is_array($db->getDeletedItems()) && count($db->getDeletedItems()) > 0) {
                    ?>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Kategori</th>
                        <th>Stok</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 1;

                        foreach ($db->getDeletedItems() as $row) {
                    ?>
                    <tr>
                        <td><?=$no++?></td>
                        <td><?=$row['name_items']?></td>
                        <td><?=$row['category_items']?></td>
                        <td><?=$row['stock_items']?></td>
                        <td>Rp. <?=$row['harga_items']?></td>
                        <td>
                            <a class="btn btn-success mx-2" href="?items_id=<?=$row['items_id']?>&page=restore">Pulihkan</a>
                            <!-- <a class="btn btn-warning" href="?hapus&items_id=<?=$row['items_id']?>" onclick="return confirm('Anda yakin ingin menghapus barang ini? Semua data terkait transaksi dan aliran barang akan dihapus.');">Hapus</a></td> -->
                        </td>
                    </tr>
                    <?php 
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>