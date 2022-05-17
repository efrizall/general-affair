<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 text-primary">Tambah Mobil</h3>
        </div>
        <div class="card-body">
            <form action="" method="post">
                <div class="row">
                    <div class="col">
                        <label class="" for="jenis">Jenis</label>
                        <input type="text" class="form-control" name="jenis" id="jenis" value="<?= $data['jenis'] ?>">
                        <small class="">Contoh : Merk Tipe (Toyota Innova)</small>
                        <br>
                        <?= form_error('jenis', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="col">
                        <label class="" for="nopol">No Polisi</label>
                        <input type="text" class="form-control" name="nopol" id="nopol" value="<?= $data['nopol'] ?>">
                        <?= form_error('nopol', '<small class="text-danger">', '</small>') ?>
                    </div>
                </div>
                
                <div class="row mt-5">
                    <div class="col">
                    </div>
                    <div class="col">
                        <a href="<?= base_url('admin/mMobil') ?>" class="btn btn-danger float-right ml-2">Batal</a>
                        <button type="submit" class="btn btn-success float-right">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->