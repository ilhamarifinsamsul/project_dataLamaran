<?= $this->extend('template/index'); ?>

<?= $this->section('content'); ?>

<!-- Content Header -->
<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-format-list-bulleted"></i>
        </span> List Lamaran
    </h3>
    <nav aria-label="breadcrumb">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Dashboard</a></li>
            <li class="breadcrumb-item">Kelola Lamaran</li>
        </ul>
    </nav>
</div>

<div class="row">
    <div class="col-12 grid-margin">
        <a href="<?= base_url(); ?>master/lamaran/new" class="btn btn-primary btn-sm mb-2">Tambah data <i class="fa solid fa-plus"></i></a>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">List Lamaran</h4>
                    <div class="table-responsive">
                        <table class="table" id="table">
                            <thead>
                                <tr>
                                    <th> No </th>
                                    <th> Nama </th>
                                    <th> Perusahaan </th>
                                    <th> Posisi </th>
                                    <th> Alamat </th>
                                    <th> Tanggal </th>
                                    <th> Portal </th>
                                    <th> Status </th>
                                    <th> Aksi </th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php $a = 1; 
                                foreach ($lamaran as $d) : ?>
                                <tr>
                                    <td><?= $a++; ?></td>
                                    <td><?= $d['nama_lengkap']; ?></td>
                                    <td><?= $d['perusahaan']; ?></td>
                                    <td><?= $d['posisi']; ?></td>
                                    <td><?= $d['alamat_perusahaan']; ?></td>
                                    <td><?= $d['tanggal']; ?></td>
                                    <td><?= $d['nama_portal']; ?></td>
                                    <td>
                                        <?php if($d['status_id'] == 1) :?>
                                            <span class="badge badge-secondary"><?= $d['nama_status']; ?></span>
                                        <?php elseif($d['status_id'] == 2) : ?>
                                            <span class="badge badge-info"><?= $d['nama_status']; ?></span>
                                        <?php elseif($d['status_id'] == 3) : ?>
                                            <span class="badge badge-primary"><?= $d['nama_status']; ?></span>
                                        <?php elseif($d['status_id'] == 4) : ?>
                                            <span class="badge badge-danger"><?= $d['nama_status']; ?></span>
                                        <?php elseif($d['status_id'] == 5) : ?>
                                            <span class="badge badge-warning"><?= $d['nama_status']; ?></span>
                                        <?php elseif($d['status_id'] == 6) : ?>
                                            <span class="badge badge-success"><?= $d['nama_status']; ?></span>
                                        <?php endif; ?>
                                    </td>

                                    <td>
                                        <?php if($d['status_id'] == 1 || 2 || 3 || 4 || 5 || 6 ) : ?>

                                            <?php if(session()->get('role_id') == 1) :?>
                                                <a href="<?= base_url('master/lamaran/' . $d['id'] . '/edit'); ?>" class="btn btn-warning btn-sm mb-2"><i class="mdi mdi-pen"></i></a>
                                            <?php else : ?>
                                                <?php endif; ?>
                                            <?php else : ?>
                                        <?php endif; ?>
                                        <form action="<?= base_url('master/lamaran') . '/' . $d['id']; ?>" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <!-- GET, POST, PUT, PATCH, DELETE-->
                                            <?= csrf_field(); ?>
                                            <button type="button" onclick="deleteTombol(this)" class="btn btn-danger btn-sm mb-2"><i class="mdi mdi-delete-empty"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection('content'); ?>

<?= $this->section('script'); ?>
<script>
    var table = $('#table').DataTable({
        responsive: true,
        "dom": 'Bflrtip',
        buttons: [
            // 'copy', 'excel', 'pdf'
        ],
        "pageLength": 5,
        "lengthMenu": [
            [5, 100, 1000, -1],
            [5, 100, 1000, "ALL"],
        ],

    })
</script>
<?= $this->endSection('script'); ?>