<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="row">
        <div class="col">
            <div class="row">
                <div class="col-sm-4">
                </div>
                <div class="col my-auto">
                    <a class="float-right btn btn btn-primary mb-3" type="button" href="<?= base_url('admin/tambahMobil') ?>">
                    <i class="fas fa-fw fa-plus"></i> Tambah
                    </a>                        
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header py-3">
                    <h3 class="m-0 text-primary">Manajemen Mobil</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tipe</th>
                                    <th>Nopol</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach($data as $row){
                                ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $row['jenis'] ?></td>
                                    <td><?= $row['nopol'] ?></td>
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
                                <?php
                                $no = $no + 1;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->