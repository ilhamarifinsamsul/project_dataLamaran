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
            <li class="breadcrumb-item">Edit Data</li>
        </ul>
    </nav>
</div>

<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <form action="<?= base_url('master/lamaran' . $lamaran['id']); ?>" method="post">
                        <?= csrf_field(); ?>
                    
                        <div class="form-group">
                        <label for="user_id">Nama</label>
                        <select name="user_id" id="user_id" class="form-control" disabled>
                            <?php foreach ($user as $d ) : ?>
                                <?php if($lamaran['user_id'] == $d['id']) : ?>
                                    <option selected value="<?= $d['id']; ?>"><?= $d['nama_lengkap']; ?></option>
                                    <?php else : ?>
                                    <option value="<?= $d['id']; ?>"><?= $d['nama_lengkap']; ?></option>
                                    <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <input type="hidden" name="_method" value="PUT">
                        <label for="perusahaan">Nama Perusahaan</label>
                        <input type="text" name="perusahaan" id="perusahaan" class="form-control" value="<?= $lamaran['perusahaan']; ?>" disabled>
                    </div>

                    <div class="form-group">
                        <label for="posisi">Nama Posisi</label>
                        <input type="text" name="posisi" id="posisi" class="form-control" value="<?= $lamaran['posisi']; ?>" disabled>
                    </div>

                    <div class="form-group">
                        <label for="alamat_perusahaan">Alamat Perusahaan</label>
                        <input type="text" name="alamat_perusahaan" id="alamat_perusahaan" class="form-control" value="<?= $lamaran['alamat_perusahaan']; ?>" disabled>
                    </div>

                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" value="<?= $lamaran['tanggal']; ?>" class="form-control" id="tanggal" name="tanggal">
                    </div>

                    <div class="form-group">
                        <label for="portal_id">Portal</label>
                        <select name="portal_id" id="portal_id" class="form-control" disabled>
                            <?php foreach ($portal as $d ) : ?>
                                <?php if($lamaran['portal_id'] == $d['id']) : ?>
                                    <option selected value="<?= $d['id']; ?>"><?= $d['nama_portal']; ?></option>
                                    <?php else : ?>
                                    <option value="<?= $d['id']; ?>"><?= $d['nama_portal']; ?></option>
                                    <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <?php if(session()->get('role_id') == 1) : ?>
                        <div class="form-group">
                            <label for="status_id">Status</label>
                            <select class="form-control" name="status_id" id="status_id">
                                <option value="1">Apply</option>
                                <option value="2">Psikotest</option>
                                <option value="3">Interview HR</option>
                                <option value="4">Interview User</option>
                                <option value="5">MCU</option>
                                <option value="6">Joined</option>
                            </select>
                        </div>
                    
                    <?php endif; ?>

                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="<?= base_url('master/lamaran'); ?>" class="btn btn-danger">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection('content'); ?>