<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion none-print" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center my-3" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <!-- <i class="fas fa-laugh-wink"></i> -->
            <i class="fas fa-book"></i>
        </div>
        <div class="sidebar-brand-text mx-3">General <br> Affair</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <?php
    if ($role_id == 1) {
    ?>
        <!-- Nav Item - Pages Collapse Menu -->

        <!-- Admin -->
        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin') ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">
        <!-- Heading -->
        <div class="sidebar-heading">
            Menu
        </div>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#permintaan" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Permintaan</span>
            </a>
            <div id="permintaan" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="<?= base_url('admin/pMaintenance') ?>">Maintenance</a>
                    <a class="collapse-item" href="<?= base_url('admin/pTransportasi') ?>">Transportasi</a>
                    <a class="collapse-item" href="<?= base_url('admin/pEkspedisi') ?>">Ekspedisi</a>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#rekap" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-file"></i>
                <span>Rekapitulasi</span>
            </a>
            <div id="rekap" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="<?= base_url('admin/rMaintenance') ?>">Maintenance</a>
                    <a class="collapse-item" href="<?= base_url('admin/rTransportasi') ?>">Transportasi</a>
                    <a class="collapse-item" href="<?= base_url('admin/rEkspedisi') ?>">Ekspedisi</a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Manajemen
        </div>

        <!-- Nav Item - Users -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/mUser') ?>">
                <i class="fas fa-fw fa-user"></i>
                <span>Users</span></a>
        </li>

        <!-- Nav Item - Mobil -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/mMobil') ?>">
                <i class="fas fa-fw fa-car"></i>
                <span>Mobil</span></a>
        </li>

        <!-- Pemeriksa -->
    <?php
    } elseif ($role_id == 2) {
    ?>
        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('pemeriksa') ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">
        <!-- Heading -->
        <div class="sidebar-heading">
            Menu
        </div>

        <!-- Nav Item - Maintenance -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('pemeriksa/pMaintenance') ?>">
                <i class="fas fa-fw fa-cog"></i>
                <span>Maintenance</span></a>
        </li>

        <!-- Nav Item - Transportasi -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('pemeriksa/pTransportasi') ?>">
                <i class="fas fa-fw fa-car"></i>
                <span>Transportasi</span></a>
        </li>

        <!-- Nav Item - Ekspedisi -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('pemeriksa/pEkspedisi') ?>">
                <i class="fas fa-fw fa-truck"></i>
                <span>Ekspedisi</span></a>
        </li>

        <!-- Staff -->
    <?php
    } elseif ($role_id == 3) {
    ?>

        <!-- Staff -->
        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin') ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">
        <!-- Heading -->
        <div class="sidebar-heading">
            Menu
        </div>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#permintaan" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Permintaan</span>
            </a>
            <div id="permintaan" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="<?= base_url('staff/pMaintenance') ?>">Maintenance</a>
                    <a class="collapse-item" href="<?= base_url('staff/pTransportasi') ?>">Transportasi</a>
                    <a class="collapse-item" href="<?= base_url('staff/pEkspedisi') ?>">Ekspedisi</a>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#rekap" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-file"></i>
                <span>Rekapitulasi</span>
            </a>
            <div id="rekap" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="<?= base_url('staff/rMaintenance') ?>">Maintenance</a>
                    <a class="collapse-item" href="<?= base_url('staff/rTransportasi') ?>">Transportasi</a>
                    <a class="collapse-item" href="<?= base_url('staff/rEkspedisi') ?>">Ekspedisi</a>
                </div>
            </div>
        </li>


        <!-- Umum -->
    <?php
    } else {
    ?>

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('umum') ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">
        <!-- Heading -->
        <div class="sidebar-heading">
            Menu
        </div>

        <!-- Nav Item - Maintenance -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('umum/pMaintenance') ?>">
                <i class="fas fa-fw fa-cog"></i>
                <span>Maintenance</span></a>
        </li>

        <!-- Nav Item - Transportasi -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('umum/pTransportasi') ?>">
                <i class="fas fa-fw fa-car"></i>
                <span>Transportasi</span></a>
        </li>

        <!-- Nav Item - Ekspedisi -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('umum/pEkspedisi') ?>">
                <i class="fas fa-fw fa-truck"></i>
                <span>Ekspedisi</span></a>
        </li>

    <?php
    }
    ?>
</ul>