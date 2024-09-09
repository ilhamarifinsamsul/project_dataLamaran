<?= $this->extend('template/index'); ?>

<?= $this->section('content'); ?>

<!-- Content Header -->
<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-email"></i>
        </span> Portal Lamaran
    </h3>
    <nav aria-label="breadcrumb">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
            <li class="breadcrumb-item">Kelola Portal</li>
        </ul>
    </nav>
</div>


<div class="row">
    <div class="col-12 grid-margin">
        <a href="<?= base_url(); ?>master/portal/new" class="btn btn-primary btn-sm mb-2">Tambah data <i class="fa solid fa-plus"></i></a>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">List Portal</h4>
                    <div class="table-responsive">
                        <table class="table" id="table">
                            <thead>
                                <tr>
                                    <th> No </th>
                                    <th> Nama Portal </th>
                                    <th> Aksi </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $a = 1; 
                                foreach($portal as $d) :?>
                                <tr>
                                    <td><?= $a++; ?></td>
                                    <td><?= $d['nama_portal']; ?></td>
                                    <td>
                                        <a href="<?= base_url('master/portal' . $d['id'] . '/edit'); ?>" class="btn btn-primary btn-sm mb-2"><i class="mdi mdi-pen"></i></a>
                                        <form action="<?= base_url('master/portal') . '/' . $d['id']; ?>" method="post" enctype="multipart/form-data">
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