<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-sm-4">
        </div>
        <div class="col my-auto">
            <button class="float-right btn btn btn-primary mb-3" type="button" onclick="history.back()">
            <i class="fas fa-fw fa-chevron-left"></i> Kembali
            </button>                        
        </div>
    </div>
    <div class="card card-detail">
        <div class="card-header py-3">
            <h3 class="h3 text-primary">Detail</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3"><b>Nomor</b> </div>
                <div class="col-md-1 d-none d-md-block">:</div>
                <?php $tanggal = date_create($data['tgl_surat']) ?>
                <div class="col-md-8"><?= $data['id'] ?>/FE/RNI/<?= date_format($tanggal, "m/Y") ?></div>
            </div>  
            <div class="row mt-3">
                <div class="col-md-3"><b>Nama</b> </div>
                <div class="col-md-1 d-none d-md-block">:</div>
                <div class="col-md-8"><?= $data['nama'] ?></div>
            </div>
            <div class="row mt-3">
                <div class="col-md-3"><b>Divisi</b> </div>
                <div class="col-md-1 d-none d-md-block">:</div>
                <div class="col-md-8"><?= $data['divisi'] ?></div>
            </div>
            <div class="row mt-3">
                <div class="col-md-3"><b>Tujuan Pengiriman</b> </div>
                <div class="col-md-1 d-none d-md-block">:</div>
                <div class="col-md-8"><?= $data['tujuan'] ?></div>
            </div>
            <div class="row mt-3">
                <div class="col-md-3"><b>No.Surat</b> </div>
                <div class="col-md-1 d-none d-md-block">:</div>
                <div class="col-md-8"><?= $data['no_surat'] ?></div>
            </div>
            <div class="row mt-3">
                <div class="col-md-3"><b>No. Resi</b> </div>
                <div class="col-md-1 d-none d-md-block">:</div>
                <div class="col-md-8"><?= $data['no_resi'] ?></div>
            </div>
            <div class="row mt-3">
                <div class="col-md-3"><b>Sifat Dokumen</b> </div>
                <div class="col-md-1 d-none d-md-block">:</div>
                <div class="col-md-8"><?= $data['sifat'] ?></div>
            </div>
            <div class="row mt-3">
                <div class="col-md-3"><b>Pemeriksa Permintaan</b> </div>
                <div class="col-md-1 d-none d-md-block">:</div>
                <div class="col-md-8"><?= $data['pemeriksa'] ?></div>
            </div>
            <div class="row mt-3">
                <div class="col-md-3"><b>Tanggal Permintaan</b> </div>
                <div class="col-md-1 d-none d-md-block">:</div>
                <div class="col-md-8"><?= $data['tgl_surat'] ?></div>
            </div>
            <div class="row mt-3">
                <div class="col-md-3"><b>File</b> </div>
                <div class="col-md-1 d-none d-md-block">:</div>
                <div class="col-md-8">Tidak ada</div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->