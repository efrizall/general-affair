<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 text-primary">Edit Permintaan Transportasi</h3>
        </div>
        <div class="card-body">
            <form action="" method="post">
                <div class="row">
                    <input type="text" name="id" value="<?= $data['id'] ?>" hidden>
                    <div class="col">
                        <label class="" for="nama">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama" value="<?= $data['nama'] ?>">
                        <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="col">
                        <label class="" for="divisi">Divisi</label>
                        <input type="text" class="form-control" name="divisi" id="divisi" value="<?= $data['divisi'] ?>">
                        <?= form_error('divisi', '<small class="text-danger">', '</small>') ?>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <label class="" for="tujuan">Tujuan</label>
                        <input type="text" class="form-control" name="tujuan" id="tujuan" value="<?= $data['tujuan'] ?>">
                        <?= form_error('tujuan', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="col">
                        <label class="" for="keperluan">Keperluan</label>
                        <input type="text" class="form-control" name="keperluan" id="keperluan" value="<?= $data['keperluan'] ?>">
                        <?= form_error('keperluan', '<small class="text-danger">', '</small>') ?>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <label for="tgl_pakai">Tanggal Pakai</label>
                        <input type="date" class="form-control" id="tgl_pakai" name="tgl_pakai" value="<?= $data['tgl_pakai'] ?>">
                        <?= form_error('tgl_pakai', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="col">
                        <label for="tgl_kembali">Tanggal Kembali</label>
                        <input type="date" class="form-control" id="tgl_kembali" name="tgl_kembali" value="<?= $data['tgl_kembali'] ?>">
                        <?= form_error('tgl_kembali', '<small class="text-danger">', '</small>') ?>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <label for="jam_pakai">Jam Pakai</label>
                        <input type="time" class="form-control" id="jam_pakai" name="jam_pakai" value="<?= $data['jam_pakai'] ?>">
                        <?= form_error('jam_pakai', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="col">
                        <label for="jam_kembali">Jam Kembali</label>
                        <input type="time" class="form-control" id="jam_kembali" name="jam_kembali" value="<?= $data['jam_kembali'] ?>">
                        <?= form_error('jam_kebali', '<small class="text-danger">', '</small>') ?>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <label for="mobil">Jenis Mobil</label>
                        <select name="mobil" id="mobil" class="custom-select">
                            <option selected disabled>Pilih Mobil..</option>
                            <?php
                            foreach ($mobil as $row) {
                            ?>
                                <option value="<?= $row['id'] ?>"><?= $row['jenis'] . ' - ' . $row['nopol'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                        <?= form_error('mobil', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="col">
                        <label class="" for="pemeriksa">Pemeriksa</label>
                        <select name="pemeriksa" id="pemeriksa" class="custom-select">
                            <option selected disabled>Pilih Pemeriksa..</option>
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
                        <label for="tanggal">Tanggal Permintaan</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= $data['tanggal'] ?>">
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
                        <button onclick="history.back()" type="button" class="btn btn-danger float-right ml-2">Batal</button>
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