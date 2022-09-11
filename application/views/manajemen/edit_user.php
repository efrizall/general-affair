<!-- Begin Page Content -->
<div class="container-fluid">
    <?php
    // var_dump();
    ?>

    <div class="card mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 text-primary">Edit User</h3>
        </div>
        <div class="card-body">
            <form action="" method="post">
                <div class="row">
                    <div class="col">
                        <label class="" for="nip">NIP</label>
                        <input type="text" class="form-control" name="nip" id="nip" value="<?= $data['nip'] ?>">
                        <?= form_error('nip', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="col">
                        <label class="" for="nama">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama" value="<?= $data['name'] ?>">
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
                                    <b><?= $d['divisi'] ?></b>
                                </option>
                            <?php }
                            ?>
                        </select>
                        <?= form_error('divisi', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="col">
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

                <!-- <div class="row mt-3">
                    <div class="col-6">

                    </div>
                </div> -->

                <div class="row mt-5">
                    <div class="col">
                    </div>
                    <div class="col">
                        <a href="<?= base_url('admin/mUser') ?>" class="btn btn-danger float-right ml-2">Batal</a>
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