<?= $this->extend('template/index'); ?>

<?= $this->section('content'); ?>

<!-- Content Header -->
<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-format-list-bulleted"></i>
        </span> Tambah Data Lamaran
    </h3>
    <nav aria-label="breadcrumb">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Dashboard</a></li>
            <li class="breadcrumb-item">Kelola Lamaran</li>
            <li class="breadcrumb-item">Tambah Data</li>
        </ul>
    </nav>
</div>

<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <form action="<?= base_url('master/lamaran'); ?>" method="post">
                        <?= csrf_field(); ?>
                    
                        <div class="form-group">
                        <label for="user_id">Nama</label>
                        <select name="user_id" id="user_id" class="form-control">
                            <?php foreach ($user as $d ) : ?>
                                <option value="<?= $d['id']; ?>"><?= $d['nama_lengkap']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="perusahaan">Nama Perusahaan</label>
                        <input type="text" name="perusahaan" id="perusahaan" class="form-control <?= ($validation->hasError('perusahaan')) ? 'is-invalid' : ''; ?> " placeholder="Nama Perusahaan">
                    </div>

                    <div class="form-group">
                        <label for="posisi">Nama Posisi</label>
                        <input type="text" name="posisi" id="posisi" class="form-control <?= ($validation->hasError('posisi')) ? 'is-invalid' : ''; ?>" placeholder="Nama Posisi">
                    </div>

                    <div class="form-group">
                        <label for="alamat_perusahaan">Alamat Perusahaan</label>
                        <input type="text" name="alamat_perusahaan" id="alamat_perusahaan" class="form-control <?= ($validation->hasError('alamat_perusahaan')) ? 'is-invalid' : ''; ?>" placeholder="Alamat Perusahaan">
                    </div>

                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" value="<?= date("Y-m-d"); ?>" class="form-control" id="tanggal" name="tanggal" placeholder="Tanggal">
                    </div>

                    <div class="form-group">
                        <label for="portal_id">Portal</label>
                        <select name="portal_id" id="portal_id" class="form-control">
                            <?php foreach ($portal as $d ) : ?>
                                <option value="<?= $d['id']; ?>"><?= $d['nama_portal']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="<?= base_url('master/lamaran'); ?>" class="btn btn-danger">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection('content'); ?>