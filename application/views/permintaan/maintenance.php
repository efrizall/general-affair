<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-sm-4">
        </div>
        <div class="col my-auto">
            <a class="float-right btn btn btn-primary mb-3" type="button" href="<?= base_url("$role/mTambah") ?>">
                <i class="fas fa-fw fa-plus"></i> Tambah Permintaan
            </a>
        </div>
    </div>

    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
    <?= $this->session->flashdata('message'); ?>

    <!-- DataTales Example -->
    <div class="card mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 text-primary">Maintenance</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="maintenance" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>No. Permintaan</th>
                            <th>Nama</th>
                            <th>Permintaan</th>
                            <th>Status</th>
                            <th>Persetujuan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($data as $row) {
                            $tanggal = date_create($row['tanggal']);
                        ?>
                            <tr>
                                <td><?= date_format($tanggal, "d-m-Y") ?></td>
                                <td><?= $row['id'] ?>/FPL/RNI/<?= date_format($tanggal, "m/Y") ?></td>
                                <td><?= $row['nama'] ?></td>
                                <td><?= $row['permintaan'] ?></td>
                                <td><?= $row['status'] ?></td>
                                <td>
                                    1. AVP Pelayanan Strategis SDM & Umum :<b>(<?= $row['ttd_avp'] ?>)</b>
                                    <br>
                                    2. <?= $row['pemeriksa'] ?> :<b>(<?= $row['ttd_pemeriksa'] ?>)</b>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="aksi" data-toggle="dropdown" aria-expanded="false">
                                            <i class="fas fa-fw fa-list"></i>
                                        </button>
                                        <?php
                                        // admin
                                        if ($role == 'admin') {
                                        ?>
                                            <ul class="dropdown-menu" aria-labelledby="aksi">
                                                <li><a class="dropdown-item" href="<?= base_url("admin/mDetail/") . $row['id'] ?>"><i class="fas fa-fw fa-eye mr-2"></i> Detail</a></li>
                                                <li><a class="dropdown-item" href="" id="hapus"><i class="fas fa-fw fa-print mr-2"></i> Print</a></li>
                                                <li>
                                                    <button type="button" class="dropdown-item" data-toggle="modal" data-target="#proses" data-id="<?= $row['id'] ?>" data-nama="<?= $this->session->userdata('nama') ?>" data-divisi="<?= $this->session->userdata('divisi') ?>"><i class="fas fa-fw fa-cog mr-2"></i> Proses</button>
                                                </li>
                                                <li><a class="dropdown-item" href="<?= base_url('admin/mEdit/') . $row['id'] ?>"><i class="fas fa-fw fa-edit mr-2"></i> Edit</a></li>
                                                <li><a class="dropdown-item tombol-hapus" href="<?= base_url('admin/mHapus/') . $row['id'] ?>"><i class="fas fa-fw fa-trash mr-2"></i> Hapus</a></li>
                                                <li><a class="dropdown-item text-success tombol-setuju" href="<?= base_url('admin/ttdM/') . $row['id'] ?>"><i class="fas fa-fw fa-check mr-2"></i> Setujui</a></li>
                                                <li><a class="dropdown-item text-danger tombol-tolak" href="<?= base_url('admin/tolakM/') . $row['id'] ?>"><i class="fas fa-fw fa-times mr-2"></i> Tidak Setujui</a></li>
                                            </ul>
                                        <?php
                                            // pemeriksa
                                        } elseif ($role == 'pemeriksa') {
                                        ?>
                                            <ul class="dropdown-menu" aria-labelledby="aksi">
                                                <li><a class="dropdown-item" href="<?= base_url("pemeriksa/mDetail/") . $row['id'] ?>"><i class="fas fa-fw fa-eye mr-2"></i> Detail</a></li>
                                                <li><a class="dropdown-item" href=""><i class="fas fa-fw fa-print mr-2"></i> Print</a></li>
                                                <?php
                                                if ($row['user_id'] == $user['id']) {
                                                ?>
                                                    <li><a class="dropdown-item" href="<?= base_url('pemeriksa/mEdit/') . $row['id'] ?>"><i class="fas fa-fw fa-edit mr-2"></i> Edit</a></li>
                                                    <li><a class="dropdown-item tombol-hapus text-danger" href="<?= base_url('pemeriksa/mHapus/') . $row['id'] ?>"><i class="fas fa-fw fa-trash mr-2"></i> Hapus</a></li>
                                                <?php
                                                }
                                                ?>
                                                <li><a class="dropdown-item text-success tombol-setuju" href="<?= base_url('pemeriksa/ttdM/') . $row['id'] ?>"><i class="fas fa-fw fa-check mr-2"></i> Setujui</a></li>
                                                <li><a class="dropdown-item text-danger tombol-tolak" href="<?= base_url('pemeriksa/tolakM/') . $row['id'] ?>"><i class="fas fa-fw fa-times mr-2"></i> Tidak Setujui</a></li>
                                            </ul>
                                        <?php
                                            // staff
                                        } elseif ($role == 'staff') {
                                        ?>
                                            <ul class="dropdown-menu" aria-labelledby="aksi">
                                                <li><a class="dropdown-item" href="<?= base_url("staff/mDetail/") . $row['id'] ?>"><i class="fas fa-fw fa-eye mr-2"></i> Detail</a></li>
                                                <li><a class="dropdown-item" href="" id="hapus"><i class="fas fa-fw fa-print mr-2"></i> Print</a></li>
                                                <li>
                                                    <button type="button" class="dropdown-item" data-toggle="modal" data-target="#prosesStaff" data-id="<?= $row['id'] ?>" data-nama="<?= $this->session->userdata('nama') ?>" data-divisi="<?= $this->session->userdata('divisi') ?>"><i class="fas fa-fw fa-cog mr-2"></i> Proses</button>
                                                </li>
                                                <?php
                                                if ($row['user_id'] == $user['id']) {
                                                ?>
                                                    <li><a class="dropdown-item" href="<?= base_url('staff/mEdit/') . $row['id'] ?>"><i class="fas fa-fw fa-edit mr-2"></i> Edit</a></li>
                                                    <li><a class="dropdown-item tombol-hapus text-danger" href="<?= base_url('staff/mHapus/') . $row['id'] ?>"><i class="fas fa-fw fa-trash mr-2"></i> Hapus</a></li>
                                                <?php
                                                }
                                                ?>
                                            </ul>
                                        <?php
                                        } else {
                                        ?>
                                            <ul class="dropdown-menu" aria-labelledby="aksi">
                                                <li><a class="dropdown-item" href="<?= base_url("umum/mDetail/") . $row['id'] ?>"><i class="fas fa-fw fa-eye mr-2"></i> Detail</a></li>
                                                <li><a class="dropdown-item" href="" id="hapus"><i class="fas fa-fw fa-print mr-2"></i> Print</a></li>
                                                <?php
                                                if ($row['user_id'] == $user['id']) {
                                                ?>
                                                    <li><a class="dropdown-item" href="<?= base_url('umum/mEdit/') . $row['id'] ?>"><i class="fas fa-fw fa-edit mr-2"></i> Edit</a></li>
                                                    <li><a class="dropdown-item tombol-hapus text-danger" href="<?= base_url('umum/mHapus/') . $row['id'] ?>"><i class="fas fa-fw fa-trash mr-2"></i> Hapus</a></li>
                                                <?php
                                                }
                                                ?>
                                            </ul>
                                        <?php
                                        }
                                        ?>
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