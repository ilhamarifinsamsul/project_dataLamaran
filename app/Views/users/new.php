<?= $this->extend('template/index'); ?>

<?= $this->section('content'); ?>

<!-- Content Header -->
<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-format-list-bulleted"></i>
        </span> Tambah Data User
    </h3>
    <nav aria-label="breadcrumb">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Dashboard</a></li>
            <li class="breadcrumb-item">Kelola User</li>
            <li class="breadcrumb-item">Tambah Data</li>
        </ul>
    </nav>
</div>

<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <form action="<?= base_url('users'); ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>

                    <div class="mb-3 text-danger"><?= validation_show_error('username'); ?></div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Username" value="<?= old('username'); ?>">
                    </div>
                    
                    <div class="mb-3 text-danger"><?= validation_show_error('nama_lengkap'); ?></div>
                    <div class="form-group">
                        <label for="nama_lengkap">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" placeholder="Nama Lengkap" value="<?= old('nama_lengkap'); ?>">
                    </div>
                    
                    <div class="mb-3 text-danger"><?= validation_show_error('email'); ?></div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="<?= old('email'); ?>">
                    </div>

                    <div class="mb-3 text-danger"><?= validation_show_error('password'); ?></div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                    </div>

                    <div class="mb-3 text-danger"><?= validation_show_error('alamat'); ?></div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Alamat" value="<?= old('alamat'); ?>">
                    </div>

                    <div class="mb-3 text-danger"><?= validation_show_error('no_hp'); ?></div>
                    <div class="form-group">
                        <label for="no_hp">No Hp</label>
                        <input type="text" name="no_hp" id="no_hp" class="form-control" placeholder="No Hp" value="<?= old('no_hp'); ?>">
                    </div>

                    <div class="form-group">
                        <label for="role_id">Role</label>
                        <select name="role_id" id="role_id" class="form-control">
                            <?php foreach ($role as $d ) : ?>
                                <option value="<?= $d['id']; ?>"><?= $d['nama_role']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="<?= base_url('users'); ?>" class="btn btn-danger">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection('content'); ?>