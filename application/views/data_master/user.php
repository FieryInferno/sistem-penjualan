<!DOCTYPE html>
<html lang="en" class="loading">
  <!-- BEGIN : Head-->
  <head>
    <?php 
      $dataUser = $this->db->get_where('user', array('id' => $this->session->userdata('id_user')))->result();
      $nama_user = "";
      $level = "";
      foreach ($dataUser as $ds) {
        $nama_user = $ds->nama_user;
        $level = $ds->level;
      }
      $dataPage = array(
        'title' => 'Data Master - User | Penjualan',
        'sidebar_title' => 'Data Master',
        'sidebar_subtitle' => 'Data User'
      );
    ?> 
    <?php $this->load->view('layout/head',$dataPage); ?>
  </head>
  <!-- END : Head-->

  <!-- BEGIN : Body-->
  <body data-col="2-columns" class=" 2-columns ">
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="wrapper">


      <!-- main menu-->
      <!--.main-menu(class="#{menuColor} #{menuOpenType}", class=(menuShadow == true ? 'menu-shadow' : ''))-->
      <?php $this->load->view('layout/sidebar-tema'); ?>
        <!-- main menu header-->
        <!-- Sidebar Header starts-->
        <?php $this->load->view('layout/sidebar-header'); ?>
        <!-- Sidebar Header Ends-->
        <!-- / main menu header-->
        <!-- main menu content-->
        <?php $this->load->view('layout/sidebar',$dataPage); ?>
        <!-- main menu content-->
        <div class="sidebar-background"></div>
        <!-- main menu footer-->
        <!-- include includes/menu-footer-->
        <!-- main menu footer-->
      </div>
      <!-- / main menu-->


      <!-- Navbar (Header) Starts-->
      <nav class="navbar navbar-expand-lg navbar-light bg-faded header-navbar">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" data-toggle="collapse" class="navbar-toggle d-lg-none float-left"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><span class="d-lg-none navbar-right navbar-collapse-toggle"><a aria-controls="navbarSupportedContent" href="javascript:;" class="open-navbar-container black"><i class="ft-more-vertical"></i></a></span>  
            <form role="search" class="navbar-form navbar-right mt-1 slideDown">
              <div class="position-relative has-icon-right">
                <h3><?php echo $nama_user; ?><br><span style="font-size: 15px !important; font-weight: bold;"><?php echo $level; ?></span></h3> 
              </div> 
            </form>
          </div>
          <?php $this->load->view('layout/navbar-container'); ?>
        </div>
      </nav>
      <!-- Navbar (Header) Ends-->

      <div class="main-panel">
        <!-- BEGIN : Main Content-->
        <div class="main-content">
          <div class="content-wrapper">
<div class="row slideRight" id="addPage">
  <div class="col-md-12">
    <div class="card">
        <div class="card-header"> 
        </div>
        <div class="card-content">
          <div class="px-3">
            <form id="form_tambah" class="form form-horizontal">
              <div class="form-body">
                <h4 class="form-section"><i class="fa fa-user-plus"></i> Tambah User</h4>
                <div class="form-group row">
                  <label class="col-md-3 label-control" for="nama_user">Nama Lengkap: </label>
                  <div class="col-md-9">
                    <input type="text" id="nama_user" class="form-control" name="nama_user" placeholder="Isi Nama Lengkap" required>
                  </div>
                </div> 
                <div class="form-group row">
                  <label class="col-md-3 label-control" for="level">Jabatan: </label>
                  <div class="col-md-9">
                    <select name="level" id="level" class="form-control" required>
                      <option value="">Pilih Jabatan</option>
                      
                      <option value="Admin Penjualan">Admin Penjualan</option>
                      <option value="Staff Produksi">Staff Produksi</option>
                      <option value="Direktur">Direktur</option>
                    </select>
                  </div>
                </div>   
                <div class="form-group row">
                  <label class="col-md-3 label-control" for="email">E-mail: </label>
                  <div class="col-md-9">
                    <input type="email" id="email" class="form-control" name="email" placeholder="Isi Email" required>
                  </div>
                </div> 
                <div class="form-group row">
                  <label class="col-md-3 label-control" for="username">Username: </label>
                  <div class="col-md-9">
                    <input type="text" id="username" class="form-control" name="username" placeholder="Isi Username" required>
                  </div>
                </div> 
                <div class="form-group row">
                  <label class="col-md-3 label-control" for="password">Password: </label>
                  <div class="col-md-9">
                    <input type="text" id="password" class="form-control" name="password" placeholder="Isi Password" required>
                  </div>
                </div> 
              </div> 
              <div class="form-actions"> 
                <button type="submit" class="btn btn-raised btn-warning white act-btn">
                  <i class="fa fa-check-square-o"></i> Simpan
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
  </div>
</div>
<div class="row" id="editPage" hidden="">
  <div class="col-md-12">
    <div class="card">
        <div class="card-header"> 
        </div>
        <div class="card-content">
          <div class="px-3">
            <form id="form_edit" class="form form-horizontal">
              <div class="form-body">
                <h4 class="form-section"><i class="fa fa-pencil"></i> Edit User</h4>
                <input type="hidden" name="id_user">
                <input type="hidden" name="username_awal">
                <div class="form-group row">
                  <label class="col-md-3 label-control" for="nama_user">Nama Lengkap: </label>
                  <div class="col-md-9">
                    <input type="text" id="nama_user" class="form-control" name="nama_user" placeholder="Isi Nama Lengkap">
                  </div>
                </div> 
                <div class="form-group row">
                  <label class="col-md-3 label-control" for="level">Jabatan: </label>
                  <div class="col-md-9">
                    <select name="level" id="level" class="form-control">
                      <option value="">Pilih Jabatan</option>
                      
                      <option value="Admin Penjualan">Admin Penjualan</option>
                      <option value="Staff Produksi">Staff Produksi</option>
                      <option value="Direktur">Direktur</option>
                    </select>
                  </div>
                </div>   
                <div class="form-group row">
                  <label class="col-md-3 label-control" for="email">E-mail: </label>
                  <div class="col-md-9">
                    <input type="email" id="email" class="form-control" name="email" placeholder="Isi Email">
                  </div>
                </div> 
                <div class="form-group row">
                  <label class="col-md-3 label-control" for="username">Username: </label>
                  <div class="col-md-9">
                    <input type="text" id="username" class="form-control" name="username" placeholder="Isi Username">
                  </div>
                </div> 
                <div class="form-group row">
                  <label class="col-md-3 label-control" for="password">Password: </label>
                  <div class="col-md-9">
                    <small><b>Informasi!</b> Jika tidak ingin mengubah password, abaikan isi password.</small>
                    <input type="text" id="password" class="form-control" name="password" placeholder="Isi Password">
                  </div>
                </div> 
              </div> 
              <div class="form-actions"> 
                <button type="submit" class="btn btn-primary act-btn"><i class="fa fa-save"></i> Simpan</button>
                <button type="button" class="btn btn-danger cancel-btn"><i class="ft-x"></i> Batal</button>
              </div>
            </form>
          </div>
        </div>
      </div>
  </div>
</div>
<div class="row slideRight-1">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Data User</h4>
      </div>
      <div class="card-content">
        <div class="card-body table-responsive">  
          <table class="table table-striped zero">
            <thead>
              <tr>
                <th>No</th>
                <th>Username</th>
                <th>Email</th>
                <th>Nama User</th>
                <th>Level User</th>
                <th>Aksi</th>
              </tr>
            </thead>    
            <tbody id="isi_tbody"> 
              
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal Hapus -->
  <div class="modal fade text-left" id="modal_hapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel12" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form id="form_hapus" action=""> 
          <div class="modal-body">
            <input type="hidden" id="id_user_hps" name="id_user"> 
            <input type="hidden" id="nama_user_hps" name="nama_user"> 
            <div id="pesan_hapus"></div> 
          </div>
          <div class="modal-footer">
            <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-outline-danger act-btn-hps">Hapus</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<!-- End Modal Hapus -->
          </div>
        </div>
        <!-- END : End Main Content-->

        <!-- BEGIN : Footer-->
        <?php $this->load->view('layout/footer.php'); ?>
        <!-- End : Footer-->

      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////--> 
    <!-- Theme customizer Starts-->
    <?php $this->load->view('layout/theme-custom'); ?>
    <!-- Theme customizer Ends-->
    <!-- BEGIN VENDOR JS-->
    <?php $this->load->view('layout/jsFile'); ?>
    <script type="text/javascript">
      base_url = '<?php echo base_url();?>';
      $(document).ready(function () {
        $(".slideDown").slideDown();
      });
      getData();
      function getData() {
        $.ajax({
          type: "get",
          dataType: "json",
          url: base_url+'Data_master_c/getData/user',
          beforeSend: function() {
            $('.zero').dataTable().fnClearTable();
            $('.zero').dataTable().fnDestroy();
          },
          success: function (resp) {
            isi_tbody = "";
            no = 1;
            $.each(resp, function(i,item) {  

              isi_tbody += '<tr><td>'+no+'</td><td>'+item.username+'</td><td>'+item.email+'</td><td>'+item.nama_user+'</td><td>'+item.level+'</td><td align="center"><button type="button" class="btn btn-raised btn-outline-info mr-1" id_user = "'+item.id+'" onclick="editPage(this)"><i class="fa fa-pencil"></i> Edit</button> <button type="button" class="btn btn-raised btn-outline-danger mr-1" id_user = "'+item.id+'" nama_user = "'+item.nama_user+'" onclick="modalHapus(this)"><i class="fa fa-remove"></i> Del</button></td></tr>';
              no++;
            });
            $("#isi_tbody").html(isi_tbody);
            $(".zero").DataTable({
              "columnDefs": [
                { "width": "5%", "targets": 0 },
                { "width": "10%", "targets": 1 }
              ]
            });
          }
        });
      }

      $("#form_tambah").submit(function () {
        $.ajax({
          type: "post", 
          data: $("#form_tambah").serialize(),
          dataType: "json",
          url: base_url+'Data_master_c/tambah_data_user',
          beforeSend: function() {
            $(".act-btn").html('<span class="spinner-grow spinner-grow-sm" role="status"></span> Loading...').attr('disabled',true);
          },
          success: function (e) {
            if(e == 'error') {
              toastr.error('Username sudah dipakai.', 'Gagal Tambah Data', {
                "showMethod": "slideDown",
                "hideMethod": "slideUp",
                timeOut: 5000
              });
            } else if(e == 'success') {
              toastr.info('Data berhasil ditambah.', 'Berhasil Menambah', {
                "showMethod": "slideDown",
                "hideMethod": "slideUp",
                timeOut: 5000
              });
            }
            $(".act-btn").html('<i class="fa fa-check-square-o"></i> Simpan').attr('disabled',false);
            $("#form_tambah input[name=nama_user]").val("");
            $("#form_tambah input[name=level]").val("");
            $("#form_tambah input[name=email]").val("");
            $("#form_tambah input[name=username]").val("");
            $("#form_tambah input[name=password]").val(""); 
            getData();   
          }
        });
        return false;
      }); 

      $("#form_edit").submit(function () {
        $.ajax({
          type: "post", 
          dataType: "json",
          data: $("#form_edit").serialize(),
          url: base_url+'Data_master_c/edit_data_user',
          beforeSend: function() {
            $(".act-btn-edit").html('<span class="spinner-grow spinner-grow-sm" role="status"></span> Loading...').attr('disabled',true);
          },
          success: function (e) {
            $(".act-btn-edit").html('Edit').attr('disabled',false);
            $("#modal_edit").modal('hide');
            getData(); 
            if(e == "error") {
              toastr.error('Username sudah ada.', 'Gagal Edit Data', {
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
            $(".act-btn").html('<i class="fa fa-check-square-o"></i> Simpan').attr('disabled',false);
            $("#form_tambah input[name=nama_user]").val("");
            $("#form_tambah input[name=level]").val("");
            $("#form_tambah input[name=email]").val("");
            $("#form_tambah input[name=username]").val("");
            $("#form_tambah input[name=password]").val("");   
            getData(); 
            $("#addPage").attr('hidden',false).removeClass('slideRight').addClass('slideDown');
            $("#editPage").attr('hidden',true);
          }
        });
        return false;
      });

      $("#form_hapus").submit(function () {
        $.ajax({
          type: "post",  
          data: $("#form_hapus").serialize(),
          dataType: 'json',
          url: base_url+'Data_master_c/hapus_data_user',
          beforeSend: function() {
            $(".act-btn-hps").html('<span class="spinner-grow spinner-grow-sm" role="status"></span> Loading...').attr('disabled',true);
          },
          success: function (e) {
            $(".act-btn-hps").html('Hapus').attr('disabled',false);
            $("#modal_hapus").modal('hide');
            getData();  
            toastr.info('User bernama '+e+' telah terhapus.', 'Berhasil Menghapus', {
                "showMethod": "slideDown",
                "hideMethod": "slideUp",
                timeOut: 5000
              });
          }
        });
        return false;
      });



      function editPage(e){
        $.ajax({
          url: base_url+'Data_master_c/dataUserById/'+e.getAttribute('id_user'),
          type: 'get',
          dataType: 'json',
          success: function(resp) { 
            $.each(resp, function(i,item) {
              $("#form_edit input[name=id_user]").val(item.id);
              $("#form_edit input[name=username_awal]").val(item.username);
              $("#form_edit input[name=nama_user]").val(item.nama_user);
              $("#form_edit input[name=email]").val(item.email);
              $("#form_edit select[name=level]").val(item.level);
              $("#form_edit input[name=username]").val(item.username);  
              window.scrollTo({top: 0, behavior: 'smooth'});
              $("#addPage").attr('hidden',true);
              $("#editPage").attr('hidden',false).addClass('slideDown');
            });
          }
        });
      }

      $(".cancel-btn").click(function() {
        $("#addPage").attr('hidden',false).removeClass('slideRight').addClass('slideDown');
        $("#editPage").attr('hidden',true);
      });

      function modalHapus(e) {
        $("#id_user_hps").val(e.getAttribute('id_user'));
        $("#nama_user_hps").val(e.getAttribute('nama_user'));
        $("#pesan_hapus").html('Hapus user bernama <b>'+e.getAttribute('nama_user')+'</b> ?');
        $("#modal_hapus").modal('show');
      }
    </script>
    <!-- END PAGE LEVEL JS-->
  </body>
  <!-- END : Body-->
</html>