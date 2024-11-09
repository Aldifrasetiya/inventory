<div class="container-fluid px-4">
    <h1 class="mt-4">Supplier</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
        <li class="breadcrumb-item active">Tambah Supplier</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Input Supplier
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                    <div class="col-lg-6">
                                <form action="supplier/action_supplier.php?aksi=tambah" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Nama Supplier</label>
                                            <input type="text" placeholder="Masukan Nama Supplier" name="nama_supplier" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat Supplier</label>
                                            <input type="text" placeholder="Masukan Alamat Supplier" name="alamat_supplier" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>No Telepon Supplier</label>
                                            <input type="text" placeholder="Masukkan No Telepon Supplier" name="telp_supplier" class="form-control" required >
                                        </div>
                                        <div class="form-group mt-2">
                                            <button type="submit" name="submit" value="Simpan" class="btn btn-default" style="background-color: #333; color: #fff;">Submit</button>
                                            <a href='?page=datasupplier' class="btn btn-default" >Batal</a>
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