<div class="container-fluid px-4">
    <h1 class="mt-4">Data Supplier</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
        <li class="breadcrumb-item active">Data Supplier</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Data Supplier
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <?php
                        if (is_array($spl->allDataSupplier()) && count($spl->allDataSupplier()) > 0) {
                    ?>
                    <tr>
                        <th>No</th>
                        <th>Nama Supplier</th>
                        <th>Alamat Supplier</th>
                        <th>No Telepon Supplier</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 1;

                        foreach ($spl->allDataSupplier() as $row) {
                    ?>
                    <tr>
                        <td><?=$no++?></td>
                        <td><?=$row['nama_supplier']?></td>
                        <td><?=$row['alamat_supplier']?></td>
                        <td><?=$row['telp_supplier']?></td>
                        <td>
                            <a class="btn btn-success mx-2" href="?id&page=update">Edit</a>
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