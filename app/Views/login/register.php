<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Purple Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/src/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/src/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/src/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/src/assets/vendors/font-awesome/css/font-awesome.min.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/src/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="<?= base_url(); ?>assets/src/assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                  <img src="<?= base_url(); ?>assets/src/assets/images/logo.svg">
                </div>
                <h3>REGISTRASI</h3>
                
                <form class="pt-3" action="<?= base_url() ?>authcontroller/register" method="post">

                  <div class="mb-3 text-danger"><?= validation_show_error('username'); ?></div>
                  <div class="input-group mb-2">
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?= old('username'); ?>">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="mdi mdi-account"></span>
                      </div>
                    </div>
                  </div>

                  <div class="mb-3 text-danger"><?= validation_show_error('nama_lengkap'); ?></div>
                  <div class="input-group mb-2">
                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Nama Lengkap" value="<?= old('nama_lengkap'); ?>">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="mdi mdi-account-multiple"></span>
                      </div>
                    </div>
                  </div>

                  <div class="mb-3 text-danger"><?= validation_show_error('email'); ?></div>
                  <div class="input-group mb-2">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?= old('email'); ?>">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="mdi mdi-gmail"></span>
                      </div>
                    </div>
                  </div>

                  <div class="mb-3 text-danger"><?= validation_show_error('password'); ?></div>
                  <div class="input-group mb-2">
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="mdi mdi-lock"></span>
                      </div>
                    </div>
                  </div>
                  
                  <div class="mb-3 text-danger"><?= validation_show_error('confirm_password'); ?></div>
                  <div class="input-group mb-2">
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Retype Password">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="mdi mdi-key"></span>
                      </div>
                    </div>
                  </div>
                  
                  <div class="mb-3 text-danger"><?= validation_show_error('alamat'); ?></div>
                  <div class="input-group mb-2">
                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" value="<?= old('alamat'); ?>">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="mdi mdi-home"></span>
                      </div>
                    </div>
                  </div>

                  <div class="mb-3 text-danger"><?= validation_show_error('no_hp'); ?></div>
                  <div class="input-group mb-2">
                    <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="No HP" value="<?= old('no_hp'); ?>">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="mdi mdi-phone-classic"></span>
                      </div>
                    </div>
                  </div>

                  <div class="mb-6">
                    <div class="form-check">
                      <label class="form-check-label text-muted">
                        <input type="checkbox" class="form-check-input"> I agree to all Terms & Conditions </label>
                    </div>
                  </div>
                  <div class="mt-3 d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Register</button>
                    <!-- <a class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" href="../../index.html">SIGN UP</a> -->
                  </div>
                  <div class="text-center mt-4 font-weight-light"> Already have an account? <a href="<?= base_url(); ?>authcontroller/index" class="text-primary">Login</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="<?= base_url(); ?>assets/src/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="<?= base_url(); ?>assets/src/assets/js/off-canvas.js"></script>
    <script src="<?= base_url(); ?>assets/src/assets/js/misc.js"></script>
    <script src="<?= base_url(); ?>assets/src/assets/js/settings.js"></script>
    <script src="<?= base_url(); ?>assets/src/assets/js/todolist.js"></script>
    <script src="<?= base_url(); ?>assets/src/assets/js/jquery.cookie.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>assets/sweetalert2/sweetalert2.all.min.js"></script>

    <?php if(session()->get('message')): ?>
            Swal.fire({
            title: '<?= session()->get('message'); ?>',
            text: '<?= session()->get('text'); ?>' ,
            icon: '<?= session()->get('icon'); ?>',
            confirmButtonText: 'Yes'
            })

    <?php endif; ?>

    <script>
        function fixAlert() {
            // var alertShow = document.getElementsByClassName('swal2-shown');
            // script by saepulfariz 3/12/2022
            var alertShow = document.getElementsByClassName('swal2-height-auto');

            if (alertShow) {
                document.body.classList.remove('swal2-height-auto');
            }
        }
        fixAlert();
        setInterval(fixAlert, 5);
    </script>

    
    <!-- endinject -->
  </body>
</html>