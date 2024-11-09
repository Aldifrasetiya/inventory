<div class="container-fluid px-4">
    <h1 class="mt-4">Data Barang Keluar</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        <li class="breadcrumb-item active">Data Barang Keluar</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Data Barang Keluar
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <?php
                        if (is_array($db->allDataItemsOutflows()) && count($db->allDataItemsOutflows()) > 0) {
                    ?>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Quantity</th>
                        <th>Tgl Keluar</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                        $no = 1;

                        foreach ($db->allDataItemsOutflows() as $row) {
                    ?>
                    <tr>
                        <td><?=$no++?></td>
                        <td><?=$row['name_items']?></td>
                        <td><?=$row['quantity']?></td>
                        <td><?=$row['tgl_keluar']?></td>
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