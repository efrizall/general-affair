<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Hello, Admin</h1>

    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Maintenance</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $data_maintenance ?> Surat</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-cog fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Annual) Card Example -->
        <div class="col-xl-4 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Transportasi</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $data_transportasi ?> Surat</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-car fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Annual) Card Example -->
        <div class="col-xl-4 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Ekspedisi</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $data_ekspedisi ?> Surat</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-truck fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Maintenance
                            </div>
                            <div class="row">
                                <div class="col-8">Selesai</div>
                                <div class="col-4 font-weight-bold"><?= $selesai['m'] ?></div>
                            </div>
                            <div class="row">
                                <div class="col-8">Sedang diproses</div>
                                <div class="col-4 font-weight-bold"><?= $sedang_diproses ?></div>
                            </div>
                            <div class="row">
                                <div class="col-8">Belum diproses</div>
                                <div class="col-4 font-weight-bold"><?= $belum_diproses['m'] ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Annual) Card Example -->
        <div class="col-xl-4 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Transportasi
                            </div>
                            <div class="row">
                                <div class="col-8">Sudah Dikembalikan</div>
                                <div class="col-4 font-weight-bold"><?= $selesai['t'] ?></div>
                            </div>
                            <div class="row">
                                <div class="col-8">Belum Dikembalikan</div>
                                <div class="col-4 font-weight-bold"><?= $belum_diproses['t'] ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->