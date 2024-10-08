<?php 
    $user = new App\Models\UserModel();

    $resUser = $user->join('tb_role', 'tb_role.id = tb_users.role_id')->find(session()->get('id'));
    // dd($resUser);

?>


<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
        <a class="navbar-brand brand-logo" href="#"><img src="<?= base_url(); ?>assets/dist/assets/images/logo.svg" alt="logo" /></a>
        <a class="navbar-brand brand-logo-mini" href="#"><img src="<?= base_url(); ?>assets/dist/assets/images/logo-mini.svg" alt="logo" /></a>
    </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="mdi mdi-menu"></span>
            </button>
            <div class="search-field d-none d-md-block">
        </div>
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="nav-profile-img">
                    <img src="<?= base_url(); ?>assets/dist/assets/images/faces/face1.jpg" alt="image">
                    <span class="availability-status online"></span>
                </div>
                <div class="nav-profile-text">
                    <p class="mb-1 text-black"><?= $resUser['nama_lengkap']; ?></p>
                </div>
                </a>
                <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                    <a class="dropdown-item" href="#">
                        <i class="mdi mdi-cached me-2 text-success"></i> Activity Log </a>
                <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?= base_url(); ?>logout">
                    <i class="mdi mdi-logout me-2 text-primary"></i> Signout </a>
                </div>
            </li>
            <li class="nav-item d-none d-lg-block full-screen-link">
                <a class="nav-link">
                    <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
                </a>
            </li>
        </ul>
        
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
        </button>
    </div>
</nav>