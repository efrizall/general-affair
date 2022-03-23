<!-- Begin Page Content -->
<div class="container-fluid" id="container">
    <form action="" method="post" class="none-print">
        <div class="row">
            <div class="col-3"><p>Dari tanggal</p></div>
            <div class="col-3"><p>Sampai</p></div>
        </div>
        <div class="row">
            <div class="col-3">
                <div class="form-group">
                <input type="date" class="form-control" name="mulai" id="mulai">
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                <input type="date" class="form-control" name="akhir" id="akhir">
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
                            <th>Tanggal Permintaan</th>
                            <th>Nomor Permintaan</th>
                            <th>Nama</th>
                            <th>Divisi</th>
                            <th>Permintaan Layanan</th>
                            <th class="td">Keterangan Atau Barang</th>
                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="td"></td>
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->