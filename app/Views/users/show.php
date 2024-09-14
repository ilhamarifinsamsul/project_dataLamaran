<?= $this->extend('template/index'); ?>

<?= $this->section('content'); ?>

<!-- Content Header -->
<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-format-list-bulleted"></i>
        </span> Detail Users
    </h3>
    <nav aria-label="breadcrumb">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Dashboard</a></li>
            <li class="breadcrumb-item">Kelola Users</li>
            <li class="breadcrumb-item">Detail Users</li>
        </ul>
    </nav>
</div>

<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <form action="<?= base_url('users' . $user['id']); ?>" method="post">
                        <?= csrf_field(); ?>
                    
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control" value="<?= $user['username']; ?>" disabled>
                    </div>
                    
                    <div class="form-group">
                        <label for="nama_lengkap">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" value="<?= $user['nama_lengkap']; ?>" disabled>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" class="form-control" value="<?= $user['email']; ?>" disabled>
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" name="alamat" id="alamat" class="form-control" value="<?= $user['alamat']; ?>" disabled>
                    </div>

                    <div class="form-group">
                        <label for="no_hp">No Hp</label>
                        <input type="text" value="<?= $user['no_hp']; ?>" class="form-control" id="no_hp" name="no_hp" disabled>
                    </div>

                    <div class="form-group">
                        <label for="role_id">Role</label>
                        <select name="role_id" id="role_id" class="form-control" disabled>
                            <?php foreach ($role as $d ) : ?>
                                <?php if($user['role_id'] == $d['id']) : ?>
                                    <option selected value="<?= $d['id']; ?>"><?= $d['nama_role']; ?></option>
                                    <?php else : ?>
                                    <option value="<?= $d['id']; ?>"><?= $d['nama_role']; ?></option>
                                    <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    
                    <a href="<?= base_url('users'); ?>" class="btn btn-danger">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection('content'); ?>