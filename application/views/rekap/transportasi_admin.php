<style>
    @media print {
        @page {
            size: landscape;
        }

        .none-print {
            display: none;
        }

        .judul {
            text-align: center;
            margin-bottom: 30px;
        }

        .table {
            border-top: 1px solid black;
            color: black;
        }

        .td {
            border-right: 1px solid black;
        }

        td {
            border-bottom: 1px solid black;
            border-left: 1px solid black;
            padding: 5px;
            color: black;
            font-size: 10px;
        }

        tr {
            border-bottom: 1px solid black;
        }

        th {
            border-bottom: 1px solid black;
            border-left: 1px solid black;
            padding: 5px;
            color: black;
            font-size: 10px;
        }
    }
</style>

<!-- Begin Page Content -->
<div class="container-fluid">
    <form action="<?= base_url('admin/rTransportasi') ?>" method="post" class="none-print">
        <div class="row">
            <div class="col-3">
                <p>Dari tanggal</p>
            </div>
            <div class="col-3">
                <p>Sampai</p>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <div class="form-group">
                    <input type="date" class="form-control" name="mulai" id="mulai">
                    <?= form_error('mulai', '<small class="text-danger">', '</small>') ?>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <input type="date" class="form-control" name="akhir" id="akhir">
                    <?= form_error('akhir', '<small class="text-danger">', '</small>') ?>
                </div>
            </div>
            <div class="col">
                <button type="submit" class="btn btn-primary" name="submit">Tampilkan</button>
            </div>
        </div>
    </form>

    <!-- Page Heading -->
    <div class="row none-print">
        <div class="col">
            <button class="btn btn-primary mb-3 float-right" type="button" onclick="window.print()">
                <i class="fas fa-fw fa-print"></i> Cetak Report
            </button>
        </div>
    </div>

    <div class=" card mb-4">
        <div class="card-header py-3">
            <h3 class="judul h3 text-gray-800">Rekapitulasi Transportasi</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped display" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tanggal Permintaan</th>
                            <th>Nomor Permintaan</th>
                            <th>Nama</th>
                            <th>Divisi</th>
                            <th>Jenis Mobil</th>
                            <th>Tujuan</th>
                            <th>Keperluan</th>
                            <th>Tanggal Pakai</th>
                            <th>Tanggal Kembali</th>
                            <th>Jam Pakai</th>
                            <th class="td">Jam Kembali</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($result as $row) {
                            $tanggal = date_create($row['tanggal']);
                        ?>
                            <tr>
                                <td><?= date_format($tanggal, "d-m-Y") ?></td>
                                <td><?= $row['id'] ?>/FPK/RNI/<?= date_format($tanggal, "m/Y") ?></td>
                                <td><?= $row['nama'] ?></td>
                                <td><?= $row['divisi'] ?></td>
                                <td><?= $row['mobil_id'] ?></td>
                                <td><?= $row['tujuan'] ?></td>
                                <td><?= $row['keperluan'] ?></td>
                                <td><?= $row['tgl_pakai'] ?></td>
                                <td><?= $row['tgl_kembali'] ?></td>
                                <td><?= $row['jam_pakai'] ?></td>
                                <td class="td"><?= $row['jam_kembali'] ?></td>
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