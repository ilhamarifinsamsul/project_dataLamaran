<?php 

    $user = new App\Models\UserModel();

    $resUser = $user->join('tb_role', 'tb_role.id = tb_users.role_id')->find(session()->get('id'));

?>


<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
                <div class="nav-profile-image">
                    <img src="<?= base_url(); ?>assets/dist/assets/images/faces/face1.jpg" alt="profile" />
                    <span class="login-status online"></span>
                <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                    <span class="font-weight-bold mb-2"><?= $resUser['nama_lengkap']; ?></span>
                    <span class="text-secondary text-small"><?= $resUser['nama_role']; ?></span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
            </a>
        </li>
        
        <li class="nav-item">
                <a class="nav-link" href="<?= base_url('dashboard'); ?>">
                    <span class="menu-title">Dashboard</span>
                    <i class="mdi mdi-home menu-icon"></i>
                </a>
        </li>

        <?php if (session()->get('role_id') == 1) :?>
        <li class="nav-item">
                <a class="nav-link" href="<?= base_url(); ?>users">
                    <span class="menu-title">Kelola Users</span>
                    <i class="mdi mdi-account-multiple menu-icon"></i>
                </a>
        </li>
        <?php endif; ?>

        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Data Master</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-crosshairs-gps menu-icon"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <?php if (session()->get('role_id') == 1) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('master/portal'); ?>">Portal Lamaran</a>
                    </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('master/lamaran'); ?>">List Lamaran</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
                <span class="menu-title">Laporan</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-contacts menu-icon"></i>
            </a>
            <div class="collapse" id="icons">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="">Laporan</a>
                    </li>
                </ul>
            </div>
        </li>
            
    </ul>
</nav>