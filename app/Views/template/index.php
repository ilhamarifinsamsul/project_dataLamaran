
<!DOCTYPE html>
<html lang="en">


<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $title; ?> | SI-Data Lamaran</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/assets/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/src/assets/css/map/style.css.map">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/jqvmap/jqvmap.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/DataTables/datatables.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/sweetalert2/sweetalert2.min.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="<?= base_url(); ?>assets/dist/assets/images/favicon.png"/>
    
    <?= $this->renderSection('head'); ?>
</head>
<body>

    <div class="container-scroller">
        
    <!-- partial:../../partials/_navbar.html -->
    <?= $this->include('template/topbar'); ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_sidebar.html -->
        <?= $this->include('template/sidebar'); ?>
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <?= $this->renderSection('content'); ?>
            </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2023 <a href="https://www.bootstrapdash.com/" target="_blank">BootstrapDash</a>. All rights reserved.</span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>
            </div>
        </footer>
        <!-- partial -->
        </div>
        <!-- main-panel ends -->
        </div>
    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    
    <!-- plugins:js -->
    <script src="<?= base_url(); ?>assets/dist/assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="<?= base_url(); ?>assets/dist/assets/js/off-canvas.js"></script>
    <script src="<?= base_url(); ?>assets/dist/assets/js/misc.js"></script>
    <script src="<?= base_url(); ?>assets/dist/assets/js/settings.js"></script>
    <script src="<?= base_url(); ?>assets/dist/assets/js/todolist.js"></script>
    <script src="<?= base_url(); ?>assets/dist/assets/js/jquery.cookie.js"></script>
    <script src="<?= base_url(); ?>assets/src/assets/js/select2.js"></script>
    <script src="<?= base_url(); ?>assets/dist/assets/js/chart.js"></script>
    <script src="<?= base_url(); ?>assets/dist/assets/js/file-upload.js"></script>
    <script src="<?= base_url(); ?>assets/dist/assets/js/jquery-file-upload.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/summernote/summernote-bs4.min.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/select2/js/select2.min.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/select2/js/select2.full.min.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="<?= base_url(); ?>assets/sweetalert2/sweetalert2.all.min.js"></script>

    <script>
        // var message = '<?= session()->get('message'); ?>'
        // if (message) {
        //     Swal.fire({
        //     title: 'Error!',
        //     text: 'Do you want to continue',
        //     icon: 'error',
        //     confirmButtonText: 'Cool'
        //     })
        // }

        <?php if(session()->get('message')): ?>
            Swal.fire({
            title: '<?= session()->get('message'); ?>',
            text: '<?= session()->get('text'); ?>' ,
            icon: '<?= session()->get('icon'); ?>',
            confirmButtonText: 'Yes'
            })

        <?php endif; ?>
        
    </script>
    
    <script type="text/javascript" src="<?= base_url(); ?>assets/DataTables/datatables.min.js"></script>
    
    
    <!-- endinject -->
    <!-- Custom js for this page -->
    <!-- End custom js for this page -->

    <?= $this->renderSection('script'); ?>
</body>
</html>