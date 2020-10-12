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
        'title' => 'Data Master - Barang | Penjualan',
        'sidebar_title' => 'Data Master',
        'sidebar_subtitle' => 'Data Barang'
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
<div class="row slideRight">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Data Barang</h4>
      </div>
      <div class="card-content">
        <div class="card-body table-responsive"> 
          <?php if($level != "Direktur") { ?>
          <button type="button" class="btn btn-outline-warning mb-3" data-toggle="modal" data-target="#modal_tambah"><i class="fa fa-plus"></i> Tambah Data</button>
          <?php } ?>
          <!-- Modal Tambah -->
          <div class="modal fade text-left" id="modal_tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel12" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <form id="form_tambah" action="">
                  <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel12"><i class="fa fa-plus"></i> Tambah Data Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="form-group">
                      <label>Kode Barang: </label> 
                      <input type="text" name="kode_barang" placeholder="Masukkan Kode Barang" class="form-control" required="" oninvalid="this.setCustomValidity('Harap Masukkan Kode Barang')" oninput="setCustomValidity('')">
                    </div>
                    <div class="form-group">
                      <label>Nama Barang: </label> 
                      <input type="text" name="nama_barang" placeholder="Masukkan Nama Barang" class="form-control" required="" oninvalid="this.setCustomValidity('Harap Masukkan Nama Barang')" oninput="setCustomValidity('')">
                    </div>
                    <div class="form-group">
                      <label>Harga /Barang: </label> 
                      <input type="number" name="harga_barang" placeholder="Masukkan Harga Barang" class="form-control" required="" oninvalid="this.setCustomValidity('Harap Masukkan Harga Barang')" oninput="setCustomValidity('')">
                    </div>
                    <!-- <div class="form-group">
                      <label>Jumlah Barang: </label> 
                      <input type="number" name="jml_barang" placeholder="Masukkan Jumlah Barang" class="form-control" required="" oninvalid="this.setCustomValidity('Harap Masukkan Jumlah Barang')" oninput="setCustomValidity('')">
                    </div> -->
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-outline-warning act-btn">Tambah</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- End Modal Tambah -->
          <!-- Modal Edit -->
          <div class="modal fade text-left" id="modal_edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel12" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <form id="form_edit" action="">
                  <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel12"><i class="fa fa-pencil"></i> Edit Data Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="form-group">
                      <label>Kode Barang: </label> 
                      <input type="hidden" id="id_barang" name="id_barang">
                      <input type="hidden" id="kode_awal" name="kode_awal">
                      <input type="text" id="kode_barang" name="kode_barang" placeholder="Masukkan Kode Barang" class="form-control" required="" oninvalid="this.setCustomValidity('Harap Masukkan Kode Barang')" oninput="setCustomValidity('')">
                    </div>
                    <div class="form-group">
                      <label>Nama Barang: </label> 
                      <input type="text" id="nama_barang" name="nama_barang" placeholder="Masukkan Nama Barang" class="form-control" required="" oninvalid="this.setCustomValidity('Harap Masukkan Nama Barang')" oninput="setCustomValidity('')">
                    </div>
                    <div class="form-group">
                      <label>Harga /Barang: </label> 
                      <input type="number" id="harga_barang" name="harga_barang" placeholder="Masukkan Harga Barang" class="form-control" required="" oninvalid="this.setCustomValidity('Harap Masukkan Harga Barang')" oninput="setCustomValidity('')">
                    </div>
                    <!-- <div class="form-group">
                      <label>Jumlah Barang: </label> 
                      <input type="number" id="jml_barang" name="jml_barang" placeholder="Masukkan Jumlah Barang" class="form-control" required="" oninvalid="this.setCustomValidity('Harap Masukkan Jumlah Barang')" oninput="setCustomValidity('')">
                    </div> -->
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-outline-warning act-btn-edit">Edit</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- End Modal Edit -->
          <!-- Modal Hapus -->
          <div class="modal fade text-left" id="modal_hapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel12" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <form id="form_hapus" action=""> 
                  <div class="modal-body">
                    <input type="hidden" id="id_barang_hps" name="id_barang"> 
                    <input type="hidden" id="kode_awal_hps" name="kode_awal"> 
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
          <table class="table table-striped zero">
            <thead>
              <tr>
                <th>No</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <!-- <th>Jumlah Barang</th> -->
                <th>Harga /Barang</th>
                <?php if($level != "Direktur"){ ?><th>Aksi</th><?php } ?>
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
          url: base_url+'Data_master_c/getData/barang',
          beforeSend: function() {
            $('.zero').dataTable().fnClearTable();
            $('.zero').dataTable().fnDestroy();
          },
          success: function (resp) {
            isi_tbody = "";
            no = 1;
            $.each(resp, function(i,item) { 
              // var number_string = item.jml_barang.toString(),
              //   sisa  = number_string.length % 3,
              //   rupiah  = number_string.substr(0, sisa),
              //   ribuan  = number_string.substr(sisa).match(/\d{3}/g);
                  
              // if (ribuan) {
              //   separator = sisa ? '.' : '';
              //   rupiah += separator + ribuan.join('.');
              // }

              var number_string1 = item.harga_barang.toString(),
                sisa1  = number_string1.length % 3,
                rupiah1  = number_string1.substr(0, sisa1),
                ribuan1  = number_string1.substr(sisa1).match(/\d{3}/g);
                  
              if (ribuan1) {
                separator1 = sisa1 ? '.' : '';
                rupiah1 += separator1 + ribuan1.join('.');
              }

              level = '<?php echo $level; ?>';
              if(level == 'Direktur') {
                isi_tbody += '<tr>'+
                                '<td>'+no+'</td>'+
                                '<td>'+item.kode_barang+'</td>'+
                                '<td>'+item.nama_barang+'</td>'+
                                // '<td>'+rupiah+'</td>'+
                                '<td>Rp '+rupiah1+'</td>'+
                              '</tr>';
              }
              else {
                isi_tbody += '<tr>'+
                                '<td>'+no+'</td>'+
                                '<td>'+item.kode_barang+'</td>'+
                                '<td>'+item.nama_barang+'</td>'+
                                // '<td>'+rupiah+'</td>'+
                                '<td>Rp '+rupiah1+'</td>'+
                                '<td align="center">'+
                                  '<button type="button" class="btn btn-raised btn-outline-info mr-1" id_barang = "'+item.id+'" kode_barang = "'+item.kode_barang+'" onclick="modalEdit(this)"><i class="fa fa-pencil"></i> Edit</button>'+
                                  '<button type="button" class="btn btn-raised btn-outline-danger mr-1" id_barang = "'+item.id+'" kode_barang = "'+item.kode_barang+'" onclick="modalHapus(this)"><i class="fa fa-remove"></i> Del</button>'+
                                '</td>'+
                              '</tr>';
              } 
              no++;
            });
            $("#isi_tbody").html(isi_tbody);
            $(".zero").DataTable({
              "columnDefs": [
                { "width": "10%", "targets": 0 }
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
          url: base_url+'Data_master_c/tambah_data_barang',
          beforeSend: function() {
            $(".act-btn").html('<span class="spinner-grow spinner-grow-sm" role="status"></span> Loading...').attr('disabled',true);
          },
          success: function (e) {
            if(e == 'error') {
              toastr.error('Kode barang sudah dipakai.', 'Gagal Tambah Data', {
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
            $(".act-btn").html('Tambah').attr('disabled',false);
            $("#form_tambah input[name=kode_barang]").val("");
            $("#form_tambah input[name=nama_barang]").val("");
            // $("#form_tambah input[name=jml_barang]").val("");
            $("#form_tambah input[name=harga_barang]").val("");
            $("#modal_tambah").modal('hide');
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
          url: base_url+'Data_master_c/edit_data_barang',
          beforeSend: function() {
            $(".act-btn-edit").html('<span class="spinner-grow spinner-grow-sm" role="status"></span> Loading...').attr('disabled',true);
          },
          success: function (e) {
            $(".act-btn-edit").html('Edit').attr('disabled',false);
            $("#modal_edit").modal('hide');
            getData(); 
            if(e == "error") {
              toastr.error('Kode barang sudah ada.', 'Gagal Edit Data', {
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
          }
        });
        return false;
      });

      $("#form_hapus").submit(function () {
        $.ajax({
          type: "post",  
          data: $("#form_hapus").serialize(),
          dataType: 'json',
          url: base_url+'Data_master_c/hapus_data_barang',
          beforeSend: function() {
            $(".act-btn-hps").html('<span class="spinner-grow spinner-grow-sm" role="status"></span> Loading...').attr('disabled',true);
          },
          success: function (e) {
            $(".act-btn-hps").html('Hapus').attr('disabled',false);
            $("#modal_hapus").modal('hide');
            getData();  
            toastr.info('Barang dengan kode '+e+' telah terhapus.', 'Berhasil Menghapus', {
                "showMethod": "slideDown",
                "hideMethod": "slideUp",
                timeOut: 5000
              });
          }
        });
        return false;
      });



      function modalEdit(e){
        id_barang = e.getAttribute('id_barang');
        $.ajax({
          type: "get",
          dataType: "json",
          url: base_url+'Data_master_c/getDataPerBarang/'+id_barang,
          success: function (resp) { 
            $.each(resp, function(i,item) {  
              $("#id_barang").val(item.id);
              $("#kode_awal").val(item.kode_barang);
              $("#kode_barang").val(item.kode_barang);
              $("#nama_barang").val(item.nama_barang);
              $("#harga_barang").val(item.harga_barang);
              // $("#jml_barang").val(item.jml_barang); 
              $("#modal_edit").modal('show'); 
            }); 
          }
        });  
      }

      function modalHapus(e) {
        $("#id_barang_hps").val(e.getAttribute('id_barang'));
        $("#kode_awal_hps").val(e.getAttribute('kode_barang'));
        $("#pesan_hapus").html('Hapus barang dengan kode <b>'+e.getAttribute('kode_barang')+'</b> ?');
        $("#modal_hapus").modal('show');
      }
    </script>
    <!-- END PAGE LEVEL JS-->
  </body>
  <!-- END : Body-->
</html>