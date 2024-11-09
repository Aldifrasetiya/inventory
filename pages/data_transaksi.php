<div class="container-fluid px-4">
    <h1 class="mt-4">Transaksi</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
        <li class="breadcrumb-item active">Transaksi</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Transaksi
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                <?php
                        if (is_array($trs->allDataTransaction()) && count($trs->allDataTransaction()) > 0) {
                    ?>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Nama Supplier</th>
                        <th>Quantity</th>
                        <th>Keterangan Transaksi</th>
                        <th>Tanggal Transaksi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                        $no = 1;

                        foreach ($trs->allDataTransaction() as $row) {
                    ?>
                    <tr>
                        <td><?=$no++?></td>
                        <td><?=$row['name_items']?></td>
                        <td><?=$row['nama_supplier']?></td>
                        <td><?=$row['quantity']?></td>
                        <td><?=$row['transaction_type']?></td>
                        <td><?=$row['transaction_date']?></td>
                        <td>
                            <a class="btn btn-success mx-2" href="?trans_id=<?=$row['trans_id']?>&page=editTransaksi">Edit</a>
                            <a class="btn btn-warning" href="?id&page=hapus" onclick="return confirm('Yakin Mau Dihapus?');">Hapus</a>
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

<!-- <table id="datatablesSimple">
                <thead>
                    <?php
                        if (is_array($db->allData()) && count($db->allData()) > 0) {
                    ?>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Nama Pembeli</th>
                        <th>Quantity</th>
                        <th>Keterangan</th>
                        <th>Tanggal Transaksi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 1;

                        foreach ($db->allData() as $row) {
                    ?>
                    <tr>
                        <td><?=$no++?></td>
                        <td><?=$row['name_items']?></td>
                        <td><?=$row['category_items']?></td>
                        <td><?=$row['stock_items']?></td>
                        <td><?=$row['harga_items']?></td>
                        <td>
                            <a href="?id&page=update">Edit</a> -
                            <a href="?id&page=hapus" onclick="return confirm('Yakin Mau Dihapus?');">Hapus</a>
                        </td>
                    </tr>
                    <?php 
                        }
                    }
                    ?>
                </tbody>
            </table> -->