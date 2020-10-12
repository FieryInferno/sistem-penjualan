<?php 
	if($this->session->userdata('id_user') == "") {
		redirect(base_url('Auth_c/login'),'refresh');
	} 
 ?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta name="description" content="Apex admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
<meta name="keywords" content="admin template, Apex admin template, dashboard template, flat admin template, responsive admin template, web app">
<meta name="author" content="PIXINVENT">
<title><?php echo $title; ?></title>
<link rel="apple-touch-icon" sizes="60x60" href="<?php echo base_url('assets/'); ?>app-assets/img/ico/apple-icon-60.png">
<link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url('assets/'); ?>app-assets/img/ico/apple-icon-76.png">
<link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url('assets/'); ?>app-assets/img/ico/apple-icon-120.png">
<link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url('assets/'); ?>app-assets/img/ico/apple-icon-152.png">
<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/'); ?>app-assets/img/ico/logo.ico">
<link rel="shortcut icon" type="image/png" href="<?php echo base_url('assets/'); ?>app-assets/img/ico/logo1.png">
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
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/'); ?>app-assets/vendors/css/chartist.min.css">
<!-- END VENDOR CSS-->
<!-- BEGIN APEX CSS-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/'); ?>app-assets/css/app.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/'); ?>app-assets/vendors/css/tables/datatable/datatables.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/'); ?>app-assets/vendors/css/sweetalert2.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/'); ?>app-assets/vendors/css/toastr.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
<script>
  window.OneSignal = window.OneSignal || [];
  OneSignal.push(function() {
    OneSignal.init({
      appId: "7add26e6-6484-4e06-8254-241d76915ec7",
      notifyButton: {
        enable: true,
      },
      subdomainName: "sistem-penjual",
    });
  });
</script>
<style type="text/css" media="screen">
	.slideRight {
		animation: slide_right 1s ease;
	}
	.slideRight-1 {
		animation: slide_right 1.5s ease;
	}

	.slideDown {
		animation: slide_down 1s ease;
	}

	.slideDown-1 {
		animation: slide_down 1.5s ease;
	}

	.slideUp {
		animation: slide_up 1s ease-in;
	}

	.slideLeft {
		animation: slide_left 0.7s ease-out; 
		display: none;
	}

	/*Slide In*/
	@keyframes slide_right {
		0% {
			transform: translateX(-500px);
			opacity: 0;
		}  
		90%{
			opacity: 1;
		}
		100% {
			transform: skewX(0deg);
		}
	}
	/*End Slide In*/
	/*Slide Out*/
	@keyframes slide_left {
		0% {
			transform: skewX(0deg);
			opacity: 0;
		}  
		90%{
			opacity: 1;
		}
		100% { 
			transform: translateX(-1000px);
		}
	}
	/*End Slide Out*/

	/*Slide Down*/
	@keyframes slide_down {
		0%{
			transform: translateY(-500px);
			opacity: 0;
		}
		90%{
			opacity: 1;
		}
		100%{ 
			transform: translateY(0);
		}
	}
	/*End Slide Down*/

	/*Slide Up*/
	@keyframes slide_up {
		0%{
			transform: translateY(0);
			opacity: 0;
		}
		90%{
			opacity: 1;
		}
		100%{  
			transform: translateY(-500px);
		}
	}
	/*End Slide Up*/
</style>
<!-- END APEX CSS-->
<!-- BEGIN Page Level CSS-->
<!-- END Page Level CSS-->
<script>
    function formatRupiah(angka, prefix){
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split           = number_string.split(','),
        sisa             = split[0].length % 3,
        rupiah             = split[0].substr(0, sisa),
        ribuan             = split[0].substr(sisa).match(/\d{3}/gi);
 		// tambahkan titik jika yang di input sudah menjadi angka satuan ribuan
        if(ribuan){
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
</script>