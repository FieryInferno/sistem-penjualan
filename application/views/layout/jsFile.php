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
<script src="<?php echo base_url('assets/'); ?>app-assets/vendors/js/chartist.min.js" type="text/javascript"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN APEX JS-->
<script src="<?php echo base_url('assets/'); ?>app-assets/js/app-sidebar.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/'); ?>app-assets/js/notification-sidebar.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/'); ?>app-assets/js/customizer.js" type="text/javascript"></script>
<!-- END APEX JS-->
<!-- BEGIN PAGE LEVEL JS-->
<script src="<?php echo base_url('assets/'); ?>app-assets/js/dashboard2.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/'); ?>app-assets/vendors/js/datatable/datatables.min.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/'); ?>app-assets/js/data-tables/datatable-basic.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/'); ?>app-assets/vendors/js/datatable/dataTables.buttons.min.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/'); ?>app-assets/vendors/js/datatable/buttons.flash.min.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/'); ?>app-assets/vendors/js/datatable/jszip.min.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/'); ?>app-assets/vendors/js/datatable/pdfmake.min.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/'); ?>app-assets/vendors/js/datatable/vfs_fonts.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/'); ?>app-assets/vendors/js/datatable/buttons.html5.min.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/'); ?>app-assets/vendors/js/datatable/buttons.print.min.js" type="text/javascript"></script>

<script src="<?php echo base_url('assets/'); ?>app-assets/js/components-modal.min.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/'); ?>app-assets/vendors/js/sweetalert2.min.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/'); ?>app-assets/js/sweet-alerts.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/'); ?>app-assets/vendors/js/toastr.min.js" type="text/javascript"></script> 
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script type="text/javascript">
	base_url = '<?php echo base_url(); ?>';
	id_akun = '<?php echo $this->session->userdata("id_user"); ?>';
	getDataAkun();
	function getDataAkun() {
		$.ajax({
			type: 'post',
			url: base_url+'Data_master_c/getDataAkun/',
			dataType: 'json',
			data: {id_akun: id_akun},
			success: function(e) {
				$.each(e,function(index,items) {
					$("#form_update_akun input[name=id_user]").val(items.id);
	              	$("#form_update_akun input[name=username_awal]").val(items.username);
					$("#form_update_akun input[name=nama_user]").val(items.nama_user);
					$("#form_update_akun input[name=email]").val(items.email);
          $("#form_update_akun input[name=level]").val(items.level);
					$("#form_update_akun input[name=username]").val(items.username);
				});
			}
		});
	} 

	$(".act-btn-akun").click(function () {
        $.ajax({
          type: "post", 
          dataType: "json",
          data: $("#form_update_akun").serialize(),
          url: base_url+'Data_master_c/edit_data_user',
          beforeSend: function() {
            $(".act-btn-akun").html('<span class="spinner-grow spinner-grow-sm" role="status"></span> Loading...').attr('disabled',true);
          },
          success: function (e) {
            $(".act-btn-akun").html('Simpan Perubahan').attr('disabled',false);
            $("#modal_edit_akun").modal('hide'); 
            if(e == "error") {
              toastr.error('username sudah ada.', 'Gagal Edit Data', {
                "showMethod": "slideDown",
                "hideMethod": "slideUp",
                timeOut: 5000
              });
            }
            else {
              toastr.info('Data berhasil diedit.', 'Berhasil Edit Data', {
                "showMethod": "slideDown",
                "hideMethod": "slideUp",
                timeOut: 5000
              });
            } 
            getDataAkun(); 
          }
        });
        return false;
      });
</script>