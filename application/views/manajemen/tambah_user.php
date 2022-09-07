<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 text-primary">Tambah User</h3>
        </div>
        <div class="card-body">
            <form action="" method="post">
                <div class="row">
                    <div class="col">
                        <label class="" for="nip">NIP</label>
                        <input type="text" class="form-control" name="nip" id="nip">
                        <?= form_error('nip', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="col">
                        <label class="" for="nama">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama">
                        <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <label class="" for="divisi">Divisi</label>
                        <select name="divisi" id="divisi" class="custom-select">
                            <option selected disabled value="">Pilih Divisi..</option>
                            <?php
                            foreach ($divisi as $d) { ?>
                                <option value="<?= $d['divisi'] ?>">
                                    <?= $d['divisi'] ?>
                                </option>
                            <?php
                            }
                            ?>
                            <!-- <option value="Pendukung Direksi & Kesekretariatan">
                                <b>Pendukung Direksi & Kesekretariatan</b>
                            </option>
                            <option value="Komunikasi & Relasi Korporasi">
                                <b>Komunikasi & Relasi Korporasi</b>
                            </option>
                            <option value="TJSL & CSR">
                                <b>TJSL & CSR</b>
                            </option>
                            <option value="Hukum Bisnis & Kepatuhan" >
                                <b>Hukum Bisnis & Kepatuhan</b>
                            </option>
                            <option value="Penasihat Hukum & Litigasi" >
                                <b>Penasihat Hukum & Litigasi</b>
                            </option>
                            <option value="Strategi Korporasi & Transformasi Organisasi" >
                                <b>Strategi Korporasi & Transformasi Organisasi</b>
                            </option>
                            <option value="Pengendalian Kinerja Korporasi" >
                                <b>Pengendalian Kinerja Korporasi</b>
                            </option>
                            <option value="Pengembangan Usaha & Portofolio" >
                                <b>Pengembangan Usaha & Portofolio</b>
                            </option>
                            <option value="Riset & Inovasi" >
                                <b>Riset & Inovasi</b>
                            </option>
                            <option value="Keuangan" >
                                <b>Keuangan</b>
                            </option>
                            <option value="Tresuri" >
                                <b>Tresuri</b>
                            </option>
                            <option value="Akuntansi" >
                                <b>Akuntansi</b>
                            </option>
                            <option value="Anggaran" >
                                <b>Anggaran</b>
                            </option>
                            <option value="Operasional & Pengelolaan Informasi Aset" >
                                <b>Operasional & Pengelolaan Informasi Aset</b>
                            </option>
                            <option value="Strategi & Sinergi Aset" >
                                <b>Strategi & Sinergi Aset</b>
                            </option>
                            <option value="Optimalisasi & Komersialisasi Aset" >
                                <b>Optimalisasi & Komersialisasi Aset</b>
                            </option>
                            <option value="Pelayanan Strategis SDM & Umum" >
                                <b>Pelayanan Strategis SDM & Umum</b>
                            </option>
                            <option value="Pendukung Strategik" >
                                <b>Pendukung Strategik</b>
                            </option> -->
                        </select>
                        <?= form_error('divisi', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="col">
                        <label class="" for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password">
                        <?= form_error('password', '<small class="text-danger">', '</small>') ?>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-6">
                        <label class="" for="role">Level</label>
                        <select name="role" id="role" class="custom-select">
                            <option selected disabled value="">Pilih Level..</option>
                            <option value="1">Admin</option>
                            <option value="2">Pemeriksa</option>
                            <option value="3">Staff</option>
                            <option value="4">Umum</option>
                        </select>
                        <?= form_error('role', '<small class="text-danger">', '</small>') ?>
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