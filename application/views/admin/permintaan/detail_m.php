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
                <?php $tanggal = date_create($data['tanggal']) ?>
                <div class="col-md-8"> <?= $data['id'] ?>/FPL/RNI/<?= date_format($tanggal, "m/Y") ?> </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-3"><b>Nama</b> </div>
                <div class="col-md-1 d-none d-md-block">:</div>
                <div class="col-md-8"><?= $data['nama'] ?></div>
            </div>
            <div class="row mt-3">
                <div class="col-md-3"><b>Divis</b> </div>
                <div class="col-md-1 d-none d-md-block">:</div>
                <div class="col-md-8"><?= $data['divisi'] ?></div>
            </div>
            <div class="row mt-3">
                <div class="col-md-3"><b>Permintaan</b> </div>
                <div class="col-md-1 d-none d-md-block">:</div>
                <div class="col-md-8"><?= $data['permintaan'] ?></div>
            </div>
            <div class="row mt-3">
                <div class="col-md-3"><b>Keterangan atau Barang</b> </div>
                <div class="col-md-1 d-none d-md-block">:</div>
                <div class="col-md-8"><?= $data['keterangan'] ?></div>
            </div>
            <div class="row mt-3">
                <div class="col-md-3"><b>Status</b> </div>
                <div class="col-md-1 d-none d-md-block">:</div>
                <div class="col-md-8"><?= $data['status'] ?></div>
            </div>
            <div class="row mt-3">
                <div class="col-md-3"><b>Pemeriksa Permintaan</b> </div>
                <div class="col-md-1 d-none d-md-block">:</div>
                <div class="col-md-8"><?= $data['pemeriksa'] ?></div>
            </div>
            <div class="row mt-3">
                <div class="col-md-3"><b>Tanggal Permintaan</b> </div>
                <div class="col-md-1 d-none d-md-block">:</div>
                <div class="col-md-8"><?= $data['tanggal'] ?></div>
            </div>
            <div class="row mt-3">
                <div class="col-md-3"><b>File</b> </div>
                <div class="col-md-1 d-none d-md-block">:</div>
                <div class="col-md-8"><?= $data['file'] ?></div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->