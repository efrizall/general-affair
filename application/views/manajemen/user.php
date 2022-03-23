<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-4">
        </div>
        <div class="col my-auto">
            <a class="float-right btn btn btn-primary mb-3" type="button" href="<?= base_url('admin/mTambah') ?>">
            <i class="fas fa-fw fa-plus"></i> Tambah
            </a>                        
        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 text-primary">Manajemen Users</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Level</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>1991101012</td>
                            <td>Achmad Mashuri</td>
                            <td>3</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="aksi" data-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-fw fa-list"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="aksi">
                                        <li><a class="dropdown-item" href="<?= base_url('admin/mEdit') ?>"><i class="fas fa-fw fa-edit mr-2"></i> Edit</a></li>
                                        <li><a class="dropdown-item text-danger tombol-hapus" href="tes"><i class="fas fa-fw fa-trash mr-2"></i> Hapus</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->