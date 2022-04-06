<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-sm-4">
        </div>
        <div class="col my-auto">
            <a class="float-right btn btn btn-primary mb-3" type="button" href="<?= base_url('admin/eTambah') ?>">
                <i class="fas fa-fw fa-plus"></i> Tambah Permintaan
            </a>
        </div>
    </div>


    <!-- DataTales Example -->
    <div class="card mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 text-primary">Ekspedisi</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>No. Permintaan</th>
                            <th>Nama</th>
                            <th>No. Surat</th>
                            <th>Sifat Dokumen</th>
                            <th>Persetujuan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($data as $row) {
                            $tanggal = date_create($row['tgl_surat']);
                        ?>
                            <tr>
                                <td><?= date_format($tanggal, "d-m-Y") ?></td>
                                <td><?= $row['id'] ?>/FE/RNI/<?= date_format($tanggal, "m/Y") ?></td>
                                <td><?= $row['nama'] ?></td>
                                <td><?= $row['no_surat'] ?></td>
                                <td><?= $row['sifat'] ?></td>
                                <td>1. AVP Pelayanan Strategis SDM & Umum :<b>(Belum Disetujui)</b>
                                    <br>
                                    2. AVP Pengadaan : <b>(Belum Disetujui)</b>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="aksi" data-toggle="dropdown" aria-expanded="false">
                                            <i class="fas fa-fw fa-list"></i>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="aksi">
                                            <li><a class="dropdown-item" href="<?= base_url('admin/eDetail') ?>"><i class="fas fa-fw fa-eye mr-2"></i> Detail</a></li>
                                            <li><a class="dropdown-item" href=""><i class="fas fa-fw fa-print mr-2"></i> Print</a></li>
                                            <li><a class="dropdown-item" href="<?= base_url('admin/eEdit') ?>"><i class="fas fa-fw fa-edit mr-2"></i> Edit</a></li>
                                            <li><a class="dropdown-item tombol-hapus" href=""><i class="fas fa-fw fa-trash mr-2"></i> Hapus</a></li>
                                            <li><a class="dropdown-item text-success tombol-setuju" href=""><i class="fas fa-fw fa-check mr-2"></i> Setujui</a></li>
                                            <li><a class="dropdown-item text-danger tombol-tolak" href=""><i class="fas fa-fw fa-times mr-2"></i> Tidak Setujui</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->