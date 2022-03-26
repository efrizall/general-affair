<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 text-primary">Edit</h3>
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
                        <label class="" for="permintaan">Permintaan</label>
                        <input type="text" class="form-control" name="permintaan" id="permintaan" value="<?= $data['permintaan'] ?>">
                        <?= form_error('permintaan', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="col">
                        <label class="" for="ket">Keterangan atau Barang</label>
                        <input type="text" class="form-control" name="keterangan" id="ket" value="<?= $data['keterangan'] ?>">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <label for="tgl_surat">Tanggal Permintaan</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= $data['tanggal'] ?>">
                        <!-- <label class="" for="tanggal">Tanggal Permintaan</label>
                        <input type="text" class="form-control" name="tanggal" id="tanggal"> -->
                        <?= form_error('tanggal', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="col">
                        <label class="" for="pemeriksa">Pemeriksa</label>
                        <select name="pemeriksa" id="pemeriksa" class="custom-select">
                            <option selected disabled>Pilih Pemeriksa..</option>
                            <option value="AVP Pendukung Direksi & Kesekretariatan">
                                <b>AVP Pendukung Direksi & Kesekretariatan</b>
                            </option>
                            <option value="AVP Komunikasi & Relasi Korporasi">
                                <b>AVP Komunikasi & Relasi Korporasi</b>
                            </option>
                            <option value="AVP TJSL & CSR">
                                <b>AVP TJSL & CSR</b>
                            </option>
                            <option value="AVP Hukum Bisnis & Kepatuhan">
                                <b>AVP Hukum Bisnis & Kepatuhan</b>
                            </option>
                            <option value="AVP Penasihat Hukum & Litigasi">
                                <b>AVP Penasihat Hukum & Litigasi</b>
                            </option>
                            <option value="AVP Strategi Korporasi & Transformasi Organisasi">
                                <b>AVP Strategi Korporasi & Transformasi Organisasi</b>
                            </option>
                            <option value="AVP Pengendalian Kinerja Korporasi">
                                <b>AVP Pengendalian Kinerja Korporasi</b>
                            </option>
                            <option value="AVP Pengembangan Usaha & Portofolio">
                                <b>AVP Pengembangan Usaha & Portofolio</b>
                            </option>
                            <option value="AVP Riset & Inovasi">
                                <b>AVP Riset & Inovasi</b>
                            </option>
                            <option value="AVP Keuangan">
                                <b>AVP Keuangan</b>
                            </option>
                            <option value="AVP Tresuri">
                                <b>AVP Tresuri</b>
                            </option>
                            <option value="AVP Akuntansi">
                                <b>AVP Akuntansi</b>
                            </option>
                            <option value="AVP Anggaran">
                                <b>AVP Anggaran</b>
                            </option>
                            <option value="AVP Operasional & Pengelolaan Informasi Aset">
                                <b>AVP Operasional & Pengelolaan Informasi Aset</b>
                            </option>
                            <option value="AVP Strategi & Sinergi Aset">
                                <b>AVP Strategi & Sinergi Aset</b>
                            </option>
                            <option value="AVP Optimalisasi & Komersialisasi Aset">
                                <b>AVP Optimalisasi & Komersialisasi Aset</b>
                            </option>
                            <option value="AVP Pelayanan Strategis SDM & Umum">
                                <b>AVP Pelayanan Strategis SDM & Umum</b>
                            </option>
                            <option value="AVP Pendukung Strategik">
                                <b>AVP Pendukung Strategik</b>
                            </option>
                        </select>
                        <?= form_error('pemeriksa', '<small class="text-danger">', '</small>') ?>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col">
                    </div>
                    <div class="col">
                        <a href="<?= base_url('admin/pMaintenance') ?>" class="btn btn-danger float-right ml-2">Batal</a>
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