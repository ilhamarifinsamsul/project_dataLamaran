<?= $this->extend('template/index'); ?>

<?= $this->section('content'); ?>

<!-- Content Header -->
<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-plus"></i>
        </span> Tambah Portal Lamaran
    </h3>
    <nav aria-label="breadcrumb">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Dashboard</a></li>
            <li class="breadcrumb-item">Kelola Portal</li>
            <li class="breadcrumb-item">Tambah Data</li>
        </ul>
        </ul>
    </nav>
</div>

<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <form action="<?= base_url('master/portal'); ?>" method="post">
                        <?= csrf_field(); ?>
                    <div class="form-group">
                        <label for="nama_portal">Nama Portal</label>
                        <input type="text" name="nama_portal" id="nama_portal" class="form-control" placeholder="Nama Portal" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="<?= base_url('master/portal'); ?>" class="btn btn-danger">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection('content'); ?>