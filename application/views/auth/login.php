<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-5 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-primary font-weight-bold mb-5">Login</h1>
                                </div>
                                <?= $this->session->flashdata('message'); ?>
                                <form class="user" method="post" action="<?= base_url('auth') ?>">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="nip" placeholder="NIP" name="nip" value="<?= set_value('nip') ?>">
                                        <?= form_error('nip', '<small class="text-danger">', '</small>') ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password" placeholder="Password" name="password">
                                        <?= form_error('password', '<small class="text-danger">', '</small>') ?>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Login
                                    </button>
                                </form>
                                <div class="user">
                                    <a class="btn btn-primary btn-user btn-block mt-3">
                                        Laporan Kerusakan
                                    </a>
                                </div>
                            </div>
                            <div class="text-center">
                                <p class="small">2021 PT. Rajawali Nusantara Indonesia</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>