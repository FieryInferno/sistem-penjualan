<!DOCTYPE html>
<html lang="en" class="loading">
  <!-- BEGIN : Head-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Apex admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Apex admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Lupa Password</title>
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo base_url('assets/'); ?>app-assets/img/ico/apple-icon-60.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url('assets/'); ?>app-assets/img/ico/apple-icon-76.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url('assets/'); ?>app-assets/img/ico/apple-icon-120.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url('assets/'); ?>app-assets/img/ico/apple-icon-152.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/'); ?>app-assets/img/ico/favicon.ico">
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url('assets/'); ?>app-assets/img/ico/favicon-32.png">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900|Montserrat:300,400,500,600,700,800,900" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <!-- font icons-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/'); ?>app-assets/fonts/feather/style.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/'); ?>app-assets/fonts/simple-line-icons/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/'); ?>app-assets/fonts/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/'); ?>app-assets/vendors/css/perfect-scrollbar.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/'); ?>app-assets/vendors/css/prism.min.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN APEX CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/'); ?>app-assets/css/app.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/'); ?>app-assets/vendors/css/toastr.css">
    <!-- END APEX CSS-->
    <!-- BEGIN Page Level CSS-->
    <!-- END Page Level CSS-->
  </head>
  <!-- END : Head-->

  <!-- BEGIN : Body-->
  <body data-col="1-column" class=" 1-column blank-page">
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="wrapper">
      <div class="main-panel">
        <!-- BEGIN : Main Content-->
        <div class="main-content">
          <div class="content-wrapper"><!--Forgot Password Starts-->
<section id="forgot-password">
  <div class="container-fluid forgot-password-bg">
    <div class="row full-height-vh m-0 d-flex align-items-center justify-content-center">
      <div class="col-md-7 col-sm-12">
        <div class="card">
          <div class="card-content">
            <div class="card-body fg-image">
              <div class="row m-0">
                <div class="col-lg-6 d-none d-lg-block text-center py-2">
                  <img src="<?php echo base_url('assets/'); ?>app-assets/img/gallery/forgot.png" alt="" class="img-fluid" width="300" height="230">
                </div>
                <div class="col-lg-6 col-md-12 bg-white px-4 pt-3">
                  <h4 class="mb-2 card-title">Memulihkan Password</h4>
                  <p class="card-text mb-3">
                    Silakan masukkan alamat email Anda dan kami akan mengirimkan Anda
                    petunjuk tentang cara mengatur ulang kata sandi Anda.
                  </p>
                  <div class="input-group">
                    <input type="email" class="form-control" placeholder="Masukkan Email" aria-describedby="button-addon2" id="email" name="email">
                    <div class="input-group-append">
                      <button class="btn btn-raised btn-primary" id="btn-kirim-kode" type="button"><i class="fa fa-paper-plane"></i> Kirim Kode</button>
                    </div>
                  </div>
                  <div class="input-group" hidden="" id="kode_verifikasi">
                    <input type="text" class="form-control" placeholder="Masukkan Kode Verifikasi" aria-describedby="button-addon2" id="kode" name="kode">
                    <div class="input-group-append">
                      <button class="btn btn-raised btn-primary" id="cek-kode" type="button"><i class="fa fa-check"></i> Cek</button>
                    </div>
                  </div>
                  <form id="form_ganti">
                    <div class="form-group" hidden="" id="form_pw">
                      <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan Password Baru">
                    </div>
                    <div class="form-group" hidden="" id="form_pw1">
                      <input type="hidden" name="email_last" id="email_last">
                      <input type="password" name="re-password" id="re-password"  class="form-control" placeholder="Masukkan Ulang Password Baru">
                    </div>
                    <div class="alert alert-danger" id="err_pass" hidden=""></div>
                    <div class="fg-actions d-flex justify-content-between">
                      <div class="login-btn"> 
                        <a href="<?php echo base_url('Auth_c/login'); ?>" class="text-decoration-none btn btn-outline-primary">Kembali Login</a> 
                      </div>
                      <div class="recover-pass">
                        <button class="btn btn-primary" id="btn-pulihkan" hidden="" type="submit" disabled="">
                          Pulihkan
                        </button>
                      </div> 
                  </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--Forgot Password Ends-->

          </div>
        </div>
        <!-- END : End Main Content-->
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

    <!-- BEGIN VENDOR JS-->
    <script src="<?php echo base_url('assets/'); ?>app-assets/vendors/js/core/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/'); ?>app-assets/vendors/js/core/popper.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/'); ?>app-assets/vendors/js/core/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/'); ?>app-assets/vendors/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/'); ?>app-assets/vendors/js/prism.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/'); ?>app-assets/vendors/js/jquery.matchHeight-min.js" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/'); ?>app-assets/vendors/js/screenfull.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/'); ?>app-assets/vendors/js/pace/pace.min.js" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN APEX JS-->
    <script src="<?php echo base_url('assets/'); ?>app-assets/js/app-sidebar.js" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/'); ?>app-assets/js/notification-sidebar.js" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/'); ?>app-assets/js/customizer.js" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/'); ?>app-assets/vendors/js/toastr.min.js" type="text/javascript"></script> 
    <script type="text/javascript">
      base_url = '<?php echo base_url(); ?>';
      $("#btn-kirim-kode").click(function () {
        $.ajax({
          url: base_url+'Auth_c/kirim_kode/',
          data: {email: $("#email").val()},
          type: 'post',
          beforeSend: function() {
            $("#btn-kirim-kode").html('<span class="spinner-grow spinner-grow-sm" role="status"></span> Loading...').attr('disabled',true);
          },
          success: function() {
            $("#email").attr('hidden',true);
            $("#btn-kirim-kode").attr('hidden',true);
            $("#kode_verifikasi").attr('hidden',false);
          }
        });
      });

      $("#cek-kode").click(function() {
        $.ajax({
          url: base_url+'Auth_c/cek_kode/',
          data: {email: $("#email").val(), kode: $("#kode").val()},
          type: 'post',
          dataType: 'json',
          beforeSend: function() {
            $("#cek-kode").html('<span class="spinner-grow spinner-grow-sm" role="status"></span> Loading...').attr('disabled',true);
          },
          success: function(e) {
            if(e == "success") {
              $("#cek-kode").attr('hidden',true); 
              $("#kode").attr('hidden',true); 
              toastr.success('Kode terverifikasi.', 'Success Kode', {
                "showMethod": "slideDown",
                "hideMethod": "slideUp",
                timeOut: 5000
              });
              $("#btn-pulihkan").attr('hidden',false);
              $("#form_pw").attr('hidden',false);
              $("#form_pw1").attr('hidden',false);
              $("#email_last").val($("#email").val());
            } else {
              $("#cek-kode").html('<i class="fa fa-check"></i> Cek').attr('disabled',false); 
              $("#kode").val('').focus(); 
              toastr.error('Kode yang dimasukkan salah.', 'Error Kode', {
                "showMethod": "slideDown",
                "hideMethod": "slideUp",
                timeOut: 5000
              });
            }
          }
        });
      });

      $("#form_ganti").submit(function () {
        $.ajax({
          url: base_url+'Auth_c/ganti_password',
          data: $("#form_ganti").serialize(),
          type: 'post',
          dataType: 'json',
          beforeSend: function() {
            $("#btn-pulihkan").html('<span class="spinner-grow spinner-grow-sm" role="status"></span> Loading...').attr('disabled',true);
          },
          success: function(e) {
            if(e == "success") { 
              <?php $this->session->set_flashdata('succ_ganti','success'); ?>
              window.location.href = base_url; 
            } else {
              $("#cek-kode").html('Pulihkan').attr('disabled',false); 
              $("#password").val('').focus(); 
              $("#re-password").val('');   
            }
          }
        });
        return false;
      });

      $("#re-password").keyup(function() {
        if($("#re-password").val() != $("#password").val()) {
          $("#err_pass").html('Password tidak sesuai.').attr('hidden',false);
          $("#btn-pulihkan").attr('disabled',true);
        } else {
          $("#err_pass").attr('hidden',true);
          $("#btn-pulihkan").attr('disabled',false);
        }
      });
    </script>
    <!-- END APEX JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <!-- END PAGE LEVEL JS-->
  </body>
  <!-- END : Body-->
</html>