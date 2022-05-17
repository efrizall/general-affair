<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 text-primary">Tambah Permintaan Transportasi</h3>
        </div>
        <div class="card-body">
            <form action="" method="post">
                <input type="text" hidden name="id" id="id" value="<?= $user['id'] ?>">
                <div class="row">
                    <div class="col">
                        <label class="" for="nama">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama">
                        <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="col">
                        <label class="" for="divisi">Divisi</label>
                        <input type="text" class="form-control" name="divisi" id="divisi">
                        <?= form_error('divisi', '<small class="text-danger">', '</small>') ?>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <label class="" for="permintaan">Tujuan</label>
                        <input type="text" class="form-control" name="tujuan" id="tujuan">
                        <?= form_error('tujuan', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="col">
                        <label class="" for="ket">Keperluan</label>
                        <input type="text" class="form-control" name="keperluan" id="keperluan">
                        <?= form_error('keperluan', '<small class="text-danger">', '</small>') ?>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <label for="tanggal_pakai">Tanggal Pakai</label>
                        <input type="date" class="form-control" id="tanggal_pakai" name="tanggal_pakai">
                        <!-- <label class="" for="tanggal">Tanggal Permintaan</label>
                        <input type="text" class="form-control" name="tanggal" id="tanggal"> -->
                        <?= form_error('tanggal_pakai', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="col">
                        <label for="tanggal_kembali">Tanggal Kembali</label>
                        <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali">
                        <!-- <label class="" for="tanggal">Tanggal Permintaan</label>
                        <input type="text" class="form-control" name="tanggal" id="tanggal"> -->
                        <?= form_error('tanggal_kembali', '<small class="text-danger">', '</small>') ?>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <label for="tgl_surat">Jam Pakai</label>
                        <input type="time" class="form-control" id="jam_pakai" name="jam_pakai">
                        <!-- <label class="" for="tanggal">Tanggal Permintaan</label>
                        <input type="text" class="form-control" name="tanggal" id="tanggal"> -->
                        <?= form_error('jam_pakai', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="col">
                        <label for="tgl_surat">Jam Kembali</label>
                        <input type="time" class="form-control" id="jam_kembali" name="jam_kembali">
                        <!-- <label class="" for="tanggal">Tanggal Permintaan</label>
                        <input type="text" class="form-control" name="tanggal" id="tanggal"> -->
                        <?= form_error('jam_kembali', '<small class="text-danger">', '</small>') ?>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <label for="tgl_surat">Jenis Mobil</label>
                        <select name="mobil" id="mobil" class="custom-select">
                            <option value="" selected disabled>Pilih Mobil..</option>
                            <?php
                            foreach ($mobil as $row) {
                            ?>
                                <option value="<?= $row['id'] ?>"><?= $row['jenis'] . ' - ' . $row['nopol'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                        <!-- <label class="" for="tanggal">Tanggal Permintaan</label>
                        <input type="text" class="form-control" name="tanggal" id="tanggal"> -->
                        <?= form_error('tanggal', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="col">
                        <label class="" for="pemeriksa">Pemeriksa</label>
                        <select name="pemeriksa" id="pemeriksa" class="custom-select">
                            <option selected disabled value="">Pilih Pemeriksa Surat..</option>
                            <?php
                            foreach ($pemeriksa as $row) {
                            ?>
                                <option value="<?= $row['pemeriksa'] ?>"><?= $row['pemeriksa'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                        <?= form_error('pemeriksa', '<small class="text-danger">', '</small>') ?>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <label for="tgl_surat">Tanggal Permintaan</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal">
                        <!-- <label class="" for="tanggal">Tanggal Permintaan</label>
                        <input type="text" class="form-control" name="tanggal" id="tanggal"> -->
                        <?= form_error('tanggal', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group col-md-6">
                        <p class="mb-2">File</p>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="file" name="file">
                            <label class="custom-file-label" for="file">Pilih Dokumen...</label>
                            <div class="invalid-feedback">Example invalid custom file feedback</div>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col">
                    </div>
                    <div class="col">
                        <button type="button" onclick="history.back()" class="btn btn-danger float-right ml-2">Batal</button>
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