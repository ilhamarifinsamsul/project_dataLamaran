<?= $this->extend('template/index'); ?>

<?= $this->section('content'); ?>

<!-- Content Header -->
<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-format-list-bulleted"></i>
        </span> List Users
    </h3>
    <nav aria-label="breadcrumb">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Dashboard</a></li>
            <li class="breadcrumb-item">Kelola Users</li>
        </ul>
    </nav>
</div>

<div class="row">
    <div class="col-12 grid-margin">
        <a href="<?= base_url(); ?>users/new" class="btn btn-primary btn-sm mb-2">Tambah data <i class="fa solid fa-plus"></i></a>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Kelola Users</h4>
                    <div class="table-responsive">
                        <table class="table" id="table">
                            <thead>
                                <tr>
                                    <th> No </th>
                                    <th> Username </th>
                                    <th> Nama Lengkap </th>
                                    <th> Alamat </th>
                                    <th> Role </th>
                                    <th> Aksi </th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php $a = 1; 
                                foreach ($user as $d) : ?>
                                <tr>
                                    <td><?= $a++; ?></td>
                                    <td><?= $d['username']; ?></td>
                                    <td><?= $d['nama_lengkap']; ?></td>
                                    <td><?= $d['alamat']; ?></td>
                                    <td><?= $d['nama_role']; ?></td>
                                    <td>
                                        <a href="<?= base_url('users/' . $d['id'] . '/show'); ?>" class="btn btn-primary btn-sm mb-2"><i class="mdi mdi-eye"></i></a>
                                        <a href="<?= base_url('users/' . $d['id'] . '/edit'); ?>" class="btn btn-warning btn-sm mb-2"><i class="mdi mdi-pen"></i></a>

                                        <form action="<?= base_url('users') . '/' . $d['id']; ?>" method="post" enctype="multipart/form-data">
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