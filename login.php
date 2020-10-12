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
    <title>Halaman Login</title>
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
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/'); ?>app-assets/vendors/css/sweetalert2.min.css">
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
          <div class="content-wrapper"><!--Login Page Starts-->
<section id="login">
  <input type="hidden" name="ket_ganti" id="ket_ganti" value="<?php echo $this->session->flashdata('succ_ganti') ?>">
  <div class="container-fluid">
    <div class="row full-height-vh m-0">
      <div class="col-12 d-flex align-items-center justify-content-center">
        <div class="card">
          <div class="card-content">
            <div class="card-body login-img">
              <div class="row m-0">
                <div class="col-lg-6 d-lg-block d-none py-2 text-center align-middle">
                  <img src="<?php echo base_url('assets/'); ?>app-assets/img/gallery/login.png" alt="" class="img-fluid mt-5" width="400" height="230">
                </div>
                <div class="col-lg-6 col-md-12 bg-white px-4 pt-3">
                  <h4 class="mb-2 card-title">Login</h4>
                  <p class="card-text mb-3">
                    Selamat datang, harap login ke akunmu.
                  </p>
                  <form method="post" id="form_login" action="">
                    <input type="text" class="form-control mb-3" id="username" name="username" placeholder="Username" required="" oninvalid="this.setCustomValidity('Masukkan Username')" oninput="setCustomValidity('')" />
                    <input type="password" class="form-control mb-1" id="password" name="password" placeholder="Password" required="" oninvalid="this.setCustomValidity('Masukkan Password')" oninput="setCustomValidity('')" />
                    <div class="d-flex justify-content-between mt-2">
                      <div class="remember-me"> 
                      </div>
                      <div class="forgot-password-option">
                        <a href="<?php echo base_url('Auth_c/lupa_password'); ?>" class="text-decoration-none text-primary">Lupa Password
                          ?</a>
                      </div>
                    </div>
                    <div class="fg-actions d-flex justify-content-between">
                      <div class="login-btn"> 
                          
                      </div>
                      <div class="recover-pass">
                        <button class="btn btn-primary btn-act" type="submit">  
                          Login
                        </button>
                      </div>
                    </div>
                  </form>
                    <hr class="m-0">
                    <div class="d-flex justify-content-between mt-3"> 
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
<!--Login Page Ends-->

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
    <script src="<?php echo base_url('assets/'); ?>app-assets/vendors/js/sweetalert2.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/'); ?>app-assets/js/sweet-alerts.js" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/'); ?>app-assets/vendors/js/toastr.min.js" type="text/javascript"></script> 
    <!-- END APEX JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <!-- END PAGE LEVEL JS-->
    <script> 
      if($("#ket_ganti").val() == "success") {
        toastr.success('Password telah diganti.', 'Success Mengganti', {
          "showMethod": "slideDown",
          "hideMethod": "slideUp",
          timeOut: 5000
        });
      }
      base_url = '<?php echo base_url(); ?>';
      $("#form_login").submit(function (e) {
        $.ajax({ 
          type: "post",
          url : base_url+'Auth_c/act_login',
          dataType: 'json',
          data: $("#form_login").serialize(), 
          beforeSend: function() {
            $(".btn-act").html('<span class="spinner-grow spinner-grow-sm" role="status"></span> Loading...').attr('disabled',true);
          },
          success: function (e) {   
            if(e == "error") { 
              $("#username").val("");
              $("#password").val(""); 
              swal('','Username Atau Password Salah','error');  
              $(".btn-act").html('Login').attr('disabled',false);
            }
            else { 
              window.location.href = base_url+'Dashboard_c/'
            }
          },
          error: function(xhr, status, error) {
            var err = eval("(" + xhr.responseText + ")");
            alert(err.Message);
          }
        }); 
        return false;  
      });
    </script>
  </body>
  <!-- END : Body-->
</html>