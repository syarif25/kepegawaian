
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="P2S3">
    <link rel="icon" href="<?php echo base_url() ?>assets/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="<?php echo base_url() ?>assets/images/favicon.png" type="image/x-icon">
    <title>SIMPEG - Sistem Informasi Kepegawaian FIK UNIB</title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/font-awesome.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/vendors/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/vendors/themify.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/vendors/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/vendors/feather-icon.css">
    <!-- Plugins css start-->
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/vendors/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/style.css">
    <link id="color" rel="stylesheet" href="<?php echo base_url() ?>assets/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/responsive.css">
  </head>
  <body>
    <!-- login page start-->
    <div class="container-fluid">
      <div class="row">
        <div class="col-xl-7"><img class="bg-img-cover bg-center" src="<?php echo base_url() ?>assets/images/login/2.jpg" alt="looginpage"></div>
        <div class="col-xl-5 p-0">
          <div class="login-card login-dark">
            <div>
                <?= $this->session->flashdata('message') ?>
              <!-- <div><a class="logo text-start" href="index.html"><img class="img-fluid for-light" src="<?php echo base_url() ?>assets/images/logo/logo1.jpg" alt="looginpage"><img class="img-fluid for-dark" src="<?php echo base_url() ?>assets/images/logo/logo_dark.png" alt="looginpage"></a></div> -->
              <div class="login-main"> 
                <form class="theme-form" action="<?= base_url('auth/aksi_login'); ?>" method="post">
                  <h4>Sistem Informasi Kepegawaian</h4>
                  <p>Enter your username & password to login</p>
                  <div class="form-group">
                    <label class="col-form-label">Email Address</label>
                    <input class="form-control" type="text" name="username" value="<?= set_value('username') ?>">
                  </div>
                  <div class="form-group">
                    <label class="col-form-label">Password</label>
                    <div class="form-input position-relative">
                      <input class="form-control" type="password" id="password" name="password" value="<?= set_value('username') ?>">
                      <div class="show-hide"><span class="show" id="show-password">                         </span></div>
                    </div>
                  </div>
                  <div class="form-group mb-0">
                    <div class="checkbox p-0">
                      <input id="checkbox1" type="checkbox">
                      <!-- <label class="text-muted" for="checkbox1">Remember password</label> -->
                    </div>
                    <button class="btn btn-primary btn-block w-100" type="submit">Sign in</button>
                  </div>
                  
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- latest jquery-->
      <script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
      <!-- Bootstrap js-->
      <script src="<?php echo base_url() ?>assets/js/bootstrap/bootstrap.bundle.min.js"></script>
      <!-- feather icon js-->
      <script src="<?php echo base_url() ?>assets/js/icons/feather-icon/feather.min.js"></script>
      <script src="<?php echo base_url() ?>assets/js/icons/feather-icon/feather-icon.js"></script>
      <!-- scrollbar js-->
      <!-- Sidebar jquery-->
      <script src="<?php echo base_url() ?>assets/js/config.js"></script>
      <!-- Plugins JS start-->
      <!-- Plugins JS Ends-->
      <!-- Theme js-->
      <script src="<?php echo base_url() ?>assets/js/script.js"></script>
       <!-- Sweet alert -->
	 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        const showPasswordCheckbox = document.getElementById('show-password');
        const passwordInput = document.getElementById('password');

        showPasswordCheckbox.addEventListener('change', function () {
        if (this.checked) {
            passwordInput.type = 'text';
        } else {
            passwordInput.type = 'password';
        }
        });
    </script>
      <!-- Plugin used-->
      <?php if ($this->session->flashdata('login-failed-1')) : ?>
    
    <script >
        swal.fire({
            icon: "error",
            title: "Gagal!",
            text: "Login gagal, password salah!"
        })
    </script>
    <?php endif; ?>

    <?php if ($this->session->flashdata('login-failed-2')) : ?>
    <script>
        swal.fire({
            icon: "error",
            title: "Gagal!",
            text: "Login gagal, username salah!"
        })
    </script>
    <?php endif; ?>
    </div>
  </body>
</html>