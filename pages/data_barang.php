<div class="container-fluid px-4">
    <h1 class="mt-4">Data Barang</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
        <li class="breadcrumb-item active">Data Barang</li>
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
                        if (is_array($db->allData()) && count($db->allData()) > 0) {
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

                        foreach ($db->allData() as $row) {
                    ?>
                    <tr>
                        <td><?=$no++?></td>
                        <td><?=$row['name_items']?></td>
                        <td><?=$row['category_items']?></td>
                        <td><?=$row['stock_items']?></td>
                        <td>Rp. <?=$row['harga_items']?></td>
                        <td>
                            <a class="btn btn-success mx-2" href="?items_id=<?=$row['items_id']?>&page=update">Edit</a>
                            <a class="btn btn-warning btnDelete" href="?hapus&items_id=<?=$row['items_id']?>">Hapus</a>
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

<script>
    $('.btnDelete').click(function (e) {
        e.preventDefault(); // Mencegah navigasi langsung ke URL href

        const items_id = $(this).data('items_id');
        const url = "?hapus&items_id" + items_id;

        Swal.fire({
                title: "Apakah Anda Yakin Ingin Menghapus?",
                text: "Data terhubung ke Menu lain dan tidak bisa di kembalikan jika terhapus!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, hapus datanya"
            }).then((result) => {
                if (result.value) {
                    windows.location.href = "index.php?page=databarang";
            }
        });
    });
</script>