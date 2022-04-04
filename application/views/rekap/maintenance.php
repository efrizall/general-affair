<style>
    @media print{
        .none-print{
            display:none;
        }
        
        .judul{
            text-align:center;
            margin-bottom:30px;
        }
        
        .table{
            border-top:1px solid black;
            color: black;
        }
        
        .td{
            border-right: 1px solid black;
        }
        
        td{
            border-bottom: 1px solid black;
            border-left: 1px solid black;
            padding: 10px;
            color: black;
        }

        tr{
            border-bottom: 1px solid black;
        }
        
        th{
            border-bottom: 1px solid black;
            border-left: 1px solid black;
            padding: 10px;
            color: black;
        }
    }
</style>

<!-- Begin Page Content -->
<div class="container-fluid" id="container">
    <form action="<?= base_url('admin/rMaintenance') ?>" method="post" class="none-print">
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
            <button class="btn btn-primary mb-3 float-right" type="button" href="cetak_report_maintenance.php" onclick="window.print();">
                <i class="fas fa-fw fa-print"></i> Cetak Report
            </button>
        </div>
    </div>
    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    <!-- Data Maintenance -->


    <div class="card mb-4">
        <div class="card-header py-3">
            <h3 class="judul h3 text-gray-800">Rekapitulasi Maintenance</h3>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped display" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="td">Tanggal Permintaan</th>
                            <th class="td">Nomor Permintaan</th>
                            <th class="td">Nama</th>
                            <th class="td">Divisi</th>
                            <th class="td">Permintaan Layanan</th>
                            <th class="td">Keterangan Atau Barang</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($result as $row) {
                            $tanggal = date_create($row['tanggal']);
                        ?>
                            <tr>
                                <td><?= date_format($tanggal, "d-m-Y") ?></td>
                                <td><?= $row['id'] ?>/FPL/RNI/<?= date_format($tanggal, "m/Y") ?></td>
                                <td><?= $row['nama'] ?></td>
                                <td><?= $row['divisi'] ?></td>
                                <td><?= $row['permintaan'] ?></td>
                                <td class="td"><?= $row['keterangan'] ?></td>
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