<!-- Begin Page Content -->
<div class="container-fluid">
    
    <form action="" method="post" class="none-print">
        <div class="row">
            <div class="col-3"><p>Dari tanggal</p></div>
            <div class="col-3"><p>Sampai</p></div>
        </div>
        <div class="row">
            <div class="col-3">
                <div class="form-group">
                <input type="date" class="form-control" name="mulai">
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                <input type="date" class="form-control" name="akhir">
                </div>
            </div>
            <div class="col">
                <button type="submit" class="btn btn-primary" name="submit">Tampilkan</button>
            </div>
        </div>
    </form>

    <!-- Page Heading -->
    <div class="row">
        <div class="col">
            <button class="btn btn-primary mb-3 float-right" type="button" onclick="window.print()">
                <i class="fas fa-fw fa-print"></i> Cetak Report
            </button>
        
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header py-3">
            <h3 class="judul h3 text-gray-800">Rekapitulasi Ekspedisi</h3>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped display" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tanggal Pengiriman</th>
                            <th>Nomor Permintaan</th>
                            <th>Nama</th>
                            <th>Divisi</th>
                            <th>Tujuan Pengiriman</th>
                            <th>No. Surat</th>
                            <th>No. Resi</th>
                            <th class="td">Sifat Dokumen</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
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