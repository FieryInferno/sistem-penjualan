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
        'title' => 'Transaksi - Sales Order | Penjualan',
        'sidebar_title' => 'Transaksi',
        'sidebar_subtitle' => 'Sales Order'
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
<?php if($level == "Admin" || $level == "Admin Penjualan") { ?> 
<div class="row slideRight" id="addPage">
  <div class="col-md-12"> 
    <div class="card">
      <div class="card-header">
        <h4 class="card-title mb-0"><i class="fa fa-plus"></i> Tambah | Form Sales Order</h4>
      </div>
      <div class="card-body">
        <form id="form_tambah">
          <div class="row">
            <div class="col-md-6 col-xs-12">
              <fieldset class="form-group">
                <label for="no_so">No. SO :</label>
                <input type="text" class="form-control" name="no_so" id="no_so" placeholder="Masukkan No. SO" required="" oninvalid="this.setCustomValidity('Harap Masukkan No. SO')" oninput="setCustomValidity('')">
              </fieldset>
              <div class="row">
                <div class="col-md-6">
                  <fieldset class="form-group">
                    <label for="so_date">SO Date :</label>
                    <input type="text" class="form-control" name="so_date" id="so_date" required="" oninvalid="this.setCustomValidity('Harap Isi SO Date')" oninput="setCustomValidity('')">
                  </fieldset> 
                </div>
                <div class="col-md-6">
                  <fieldset class="form-group">
                    <label for="ship_date">Ship Date :</label>
                    <input type="date" class="form-control" name="ship_date" id="ship_date" required="" oninvalid="this.setCustomValidity('Harap Isi Ship Date')" oninput="setCustomValidity('')" onchange="validasiShipDate()">
                    <span class="text-danger" id="pesan_ship_date" style="display:none;">Tanggal Ship Date Salah</span>
                  </fieldset>
                  <script>
                    
                  </script> 
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <fieldset class="form-group">
                    <label for="id_barang">Barang : </label>
                    <select name="id_barang" id="id_barang" class="form-control" required="" oninvalid="this.setCustomValidity('Harap Isi Barang')" oninput="setCustomValidity('')"></select>
                  </fieldset>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12"> 
                  <fieldset class="form-group">
                    <label for="qty">QTY (Meter):</label>
                    <input type="number" name="qty" class="form-control" placeholder="QTY" required="" oninvalid="this.setCustomValidity('Harap Masukkan QTY')" oninput="setCustomValidity('')"> 
                  </fieldset>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-xs-12">
              <fieldset class="form-group">
                <label for="customer">Customer :</label>
                <select name="customer" id="customer" class="form-control" required="" oninvalid="this.setCustomValidity('Harap Isi Customer')" oninput="setCustomValidity('')"></select>
              </fieldset>
              <fieldset class="form-group">
                <label for="ship_to">Ship To :</label>
                <input type="text" class="form-control" name="ship_to" id="ship_to" placeholder=" Ship To" required="" oninvalid="this.setCustomValidity('Harap Masukkan Ship To')" oninput="setCustomValidity('')">
              </fieldset>
              <fieldset class="form-group">
                <label for="no_telp">No. Telp :</label>
                <input type="number" class="form-control" name="no_telp" id="no_telp" placeholder=" Masukkan Nomor Telepon" required="" oninvalid="this.setCustomValidity('Harap Masukkan No. Telp')" oninput="setCustomValidity('')">
              </fieldset>
              
            </div>
          </div>   
          <button type="submit" class="btn btn-warning white act-btn"><i class="fa fa-plus"></i> Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php } ?>
<div class="row" hidden="" id="editPage">
  <div class="col-md-12"> 
    <div class="card">
      <div class="card-header">
        <h4 class="card-title mb-0"><i class="fa fa-pencil"></i> Edit | Form Sales Order</h4>
      </div>
      <div class="card-body">
        <form id="form_edit">
          <div class="row">
            <div class="col-md-6 col-xs-12">
              <input type="hidden" name="id_so">
              <fieldset class="form-group">
                <label for="no_so">No. SO :</label>
                <input type="text" class="form-control" name="no_so" id="no_so" placeholder="Masukkan No. SO" required="" oninvalid="this.setCustomValidity('Harap Masukkan No. SO')" oninput="setCustomValidity('')">
              </fieldset>
              <div class="row">
                <div class="col-md-6">
                  <fieldset class="form-group">
                    <label for="so_date">SO Date :</label>
                    <input type="date" class="form-control" name="so_date" id="so_date" required="" oninvalid="this.setCustomValidity('Harap Isi SO Date')" oninput="setCustomValidity('')">
                  </fieldset> 
                </div>
                <div class="col-md-6">
                  <fieldset class="form-group">
                    <label for="ship_date">Ship Date :</label>
                    <input type="date" class="form-control" name="ship_date" id="ship_date" required="" oninvalid="this.setCustomValidity('Harap Isi Ship Date')" oninput="setCustomValidity('')">
                  </fieldset> 
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <fieldset class="form-group">
                    <label for="id_barang">Barang : </label>
                    <select name="id_barang" id="id_barang" class="form-control" required="" oninvalid="this.setCustomValidity('Harap Isi Barang')" oninput="setCustomValidity('')"></select>
                  </fieldset>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12"> 
                  <fieldset class="form-group">
                    <label for="qty">QTY (Meter):</label>
                    <input type="number" name="qty" class="form-control" placeholder="QTY" required="" oninvalid="this.setCustomValidity('Harap Masukkan QTY')" oninput="setCustomValidity('')"> 
                  </fieldset>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-xs-12">
              <fieldset class="form-group">
                <label for="customer">Customer :</label>
                <select name="customer" id="customer" class="form-control" required="" oninvalid="this.setCustomValidity('Harap Isi Customer')" oninput="setCustomValidity('')"></select>
              </fieldset>
              <fieldset class="form-group">
                <label for="ship_to">Ship To :</label>
                <input type="text" class="form-control" name="ship_to" id="ship_to" placeholder=" Ship To" required="" oninvalid="this.setCustomValidity('Harap Masukkan Ship To')" oninput="setCustomValidity('')">
              </fieldset>
              <fieldset class="form-group">
                <label for="no_telp">No. Telp :</label>
                <input type="number" class="form-control" name="no_telp" id="no_telp" placeholder=" Masukkan Nomor Telepon" required="" oninvalid="this.setCustomValidity('Harap Masukkan No. Telp')" oninput="setCustomValidity('')">
              </fieldset>
             
            </div>
          </div>   
          <button type="submit" class="btn btn-primary act-btn"><i class="fa fa-save"></i> Simpan</button>
          <button type="button" class="btn btn-danger cancel-btn"><i class="ft-x"></i> Batal</button>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="row slideRight-1">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title mb-0">Sales Order</h4>
      </div>
      <div class="card-body table-responsive">
        <table class="table table-striped zero">
          <thead>
            <tr>
              <th>No.</th>
              <?php if ($level == 'Admin' || $level == 'Admin Penjualan') {echo '<th>Validasi</th>'; } ?>
              <th>Nomor SO</th>
              <th>Kode Barang</th>
              <th>QTY (Meter)</th>
              <th>Harga</th>
              <th>Total</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody id="isi_tbody"> 
          </tbody>
          <tfoot>
            <tr>
              <?php
                if ($level == 'Admin' || $level == 'Admin Penjualan') { ?>
                  <th colspan="6" style="text-align:right">Total:</th>
                  <th></th>
                  <th></th>
                <?php } else if ($level == 'Direktur') { ?>
                  <th colspan="5" style="text-align:right">Total:</th>
                  <th></th>
                <?php }
              ?>
            </tr>
          </tfoot>
        </table>
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
            <input type="hidden" id="id_so_hps" name="id_so"> 
            <input type="hidden" id="no_so_hps" name="no_so"> 
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
<!-- Modal Verifikasi -->
  <div class="modal fade text-left" id="modal_verifikasi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel12" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form id="form_verifkasi" action=""> 
          <div class="modal-body">
            <input type="hidden" id="id_so_verifikasi" name="id_so"> 
            <input type="hidden" id="no_so_verifikasi" name="no_so"> 
            <div id="pesan_verifikasi"></div> 
          </div>
          <div class="modal-footer">
            <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-outline-success act-btn-verifikasi">Verifikasi</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<!-- End Modal Verifikasi -->
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
      base_url = '<?php echo base_url(); ?>';
      $(document).ready(function() {
          $('#id_barang').select2();
          $('#customer').select2();
      });
      $('.zero').DataTable({
          dom: 'Bfrtip',
          buttons: [
              'copy', 'csv', 'excel', 'pdf', 'print'
          ]
      });
      $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-outline-primary mr-1');
      function validasiShipDate() {
        var tanggal           = new Date($('#ship_date').val()).getTime();
        var tanggal_sekarang  = new Date().getTime();
        if (tanggal < tanggal_sekarang) {
          $('#pesan_ship_date').css('display', 'block');
          return false;
        } else {
          $('#pesan_ship_date').css('display', 'none');
        }
      }
      getDataBarang();
      getDataCostumer();

      function getDataBarang() {
        $.ajax({
          url: base_url+'Data_master_c/getData/barang',
          type: 'get',
          dataType: 'json',
          success: function(e) {
            option = '<option value="">Pilih Barang</option>';
            $.each(e, function (i,item) {
              option += '<option value="'+item.id+'">'+item.nama_barang+' (Kode : '+item.kode_barang+')</option>';
            });
            $("#id_barang").html(option);
          }
        });
      }

      function getDataCostumer() {
        $.ajax({
          url       : base_url+'Data_master_c/getData/pelanggan',
          type      : 'get',
          dataType  : 'json',
          success   : function(e) {
            option = '<option value="">Pilih Customer</option>';
            $.each(e, function (i,item) {
              option += '<option value="'+item.id+'">'+item.kode_pelanggan+' - '+item.nama_pelanggan+'</option>';
            });
            $("#customer").html(option);
          }
        });
      }

      getData();
      function getData() {
        $.ajax({
          type        : "get",
          dataType    : "json",
          url         : base_url+'Data_master_c/get_sales_order',
          beforeSend  : function() {
            $('.zero').dataTable().fnClearTable();
            $('.zero').dataTable().fnDestroy();
          },
          success     : function (resp) {
            $.ajax({
              type: "get",
              dataType: "json",
              url: base_url+'Data_master_c/get_no/sales_order',
              success: function(res_jml) {
                $("#form_tambah input[name=no_so]").val(res_jml).attr('readonly',true);
              }
            });
            date    = new Date();
            tanggal = date.getDate();
            if (tanggal.toString().length == 1) {
              tanggal = '0' + tanggal; 
            }
            bulan   = date.getMonth() + 1;
            if (bulan.toString().length == 1) {
              bulan = '0' + bulan; 
            }
            tahun   = date.getFullYear();
            $("#form_tambah input[name=so_date]").val(tanggal+"/"+bulan+"/"+tahun).attr('readonly',true);
            isi_tbody = "";
            no = 1;
            $.each(resp, function(i,item) {  
              var total = item.qty * item.harga_barang;
              var number_string = total.toString(),
                sisa  = number_string.length % 3,
                rupiah  = number_string.substr(0, sisa),
                ribuan  = number_string.substr(sisa).match(/\d{3}/g);
                  
              if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
              }

              var number_string1 = item.qty.toString(),
                sisa1  = number_string1.length % 3,
                rupiah1  = number_string1.substr(0, sisa1),
                ribuan1  = number_string1.substr(sisa1).match(/\d{3}/g);
                  
              if (ribuan1) {
                separator1 = sisa1 ? '.' : '';
                rupiah1 += separator1 + ribuan1.join('.');
              }

              var number_string2 = item.harga_barang.toString(),
                sisa2  = number_string2.length % 3,
                rupiah2  = number_string2.substr(0, sisa2),
                ribuan2  = number_string2.substr(sisa2).match(/\d{3}/g);
                  
              if (ribuan2) {
                separator2 = sisa2 ? '.' : '';
                rupiah2 += separator2 + ribuan2.join('.');
              }
              level = '<?php echo $level; ?>';
              if(level == "Admin" || level == "Admin Penjualan") {
                btn_validasi = '';
                if(item.validasi == "valid") {
                  btn_validasi = '<button type="button" class="btn btn-raised btn-success round mr-1">Valid</button>';
                } else {
                  btn_validasi = '<button type="button" class="btn btn-raised btn-warning white round mr-1">Invalid</button>'
                }
                isi_tbody += '<tr>'+
                                '<td>'+no+'</td>'+
                                '<td>'+btn_validasi+'</td>'+
                                '<td>'+item.no_so+'</td>'+
                                '<td>'+item.kode_barang+'</td>'+
                                '<td>'+rupiah1+'</td>'+
                                '<td>Rp '+rupiah2+'</td>'+
                                '<td>Rp '+rupiah+'</td>'+
                                '<td align="center">'+
                                  '<form action="<?= base_url('laporan/sales_order'); ?>" method="post">'+
                                    '<input type="hidden" value="'+item.id_sales_order+'" name="id_so">'+
                                    '<button type="button" class="btn btn-raised btn-outline-info mr-1" id_so = "'+item.id_sales_order+'" no_so = "'+item.no_so+'" onclick="editPage(this)"><i class="fa fa-pencil"></i> Edit</button>'+
                                    '<button type="submit" class="btn btn-raised btn-outline-primary mr-1"><i class="fa fa-print"></i> Print</button>'+
                                    '<button type="button" class="btn btn-raised btn-outline-danger mr-1" id_so = "'+item.id_sales_order+'" no_so = "'+item.no_so+'" onclick="modalHapus(this)"><i class="fa fa-remove"></i> Del</button>'+
                                  '</form>'+
                                '</td>'+
                              '</tr>';
              } else {
                if(item.validasi == 'valid') { 
                  isi_tbody += '<tr><td>'+no+'</td><td>'+item.no_so+'</td><td>'+item.kode_barang+'</td><td>'+rupiah1+'</td><td>Rp '+rupiah2+'</td><td>Rp '+rupiah+'</td><td align="center"><button type="button" class="btn btn-raised btn-outline-success mr-1"><i class="fa fa-check"></i></button></td></tr>';  
                } else { 
                  isi_tbody += `<tr>
                                  <td>${no}</td>
                                  <td>${item.no_so}</td>
                                  <td>${item.kode_barang}</td>
                                  <td>${rupiah1}</td>
                                  <td>Rp ${rupiah2}</td>
                                  <td>Rp ${rupiah}</td>
                                  <td align="center">
                                    <button type="button" class="btn btn-raised btn-outline-success mr-1" id_so = "${item.id_sales_order}" no_so = "${item.no_so}" onclick="modalVerifikasi(this)"> Verifikasi</button>
                                  </td>
                                </tr>`; 
                }
              } 
              no++;
            });
            $("#isi_tbody").html(isi_tbody);
            $('.zero').DataTable({
                dom         : 'Bfrtip',  
                buttons     : [
                    
                ],
                columnDefs  : [
                  { "width": "5%", "targets": 0 },
                  { "width": "10%", "targets": 1 }
                ],
                "footerCallback": function ( row, data, start, end, display ) {
                  var api = this.api(), data;
      
                  // Remove the formatting to get integer data for summation
                  var intVal = function ( i ) {
                      return typeof i === 'string' ?
                          i.replace(/[\Rp.,]/g, '')*1 :
                          typeof i === 'number' ?
                              i : 0;
                  };
      
                  // Total over all pages
                  if (level == 'Admin Penjualan' || level == 'Admin' ) {
                    kolom = 6; 
                  } else if (level == 'Direktur') {
                    kolom = 5;
                  }
                  total = api
                      .column( kolom )
                      .data()
                      .reduce( function (a, b) {
                          return intVal(a) + intVal(b);
                      }, 0 );
                      
      
                  // Total over this page
                  pageTotal = api
                      .column( kolom, { page: 'current'} )
                      .data()
                      .reduce( function (a, b) {
                          return intVal(a) + intVal(b);
                      }, 0 );
      
                  // Update footer
                  $( api.column( kolom ).footer() ).html(
                    // '$'+pageTotal +' ( $'+ total +' total)'
                    formatRupiah(String(pageTotal), 'Rp.')+',00'
                  );
                },
                order : false,
            });
            $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-outline-primary mr-1');
          }
        });
      }

      $("#form_tambah").submit(function () {
        $.ajax({
          type        : "post", 
          data        : $("#form_tambah").serialize(),
          dataType    : "json",
          url         : base_url+'Transaksi_c/tambah_so',
          beforeSend  : function() {
            $(".act-btn").html('<span class="spinner-grow spinner-grow-sm" role="status"></span> Loading...').attr('disabled',true);
          },
          success     : function (e) {
            if(e == 'error_no_so') {
              toastr.error('Nomor sales order sudah ada.', 'Gagal Tambah Data', {
                "showMethod": "slideDown",
                "hideMethod": "slideUp",
                timeOut: 5000
              });
            } else if(e == 'error_qty') {
              toastr.error('Stok barang kurang.', 'Gagal Tambah Data', {
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
            $("#form_tambah input[name=no_so]").val("");
            $("#form_tambah input[name=so_date]").val("");
            $("#form_tambah input[name=ship_date]").val("");
            $("#form_tambah select[name=id_barang]").val("");
            $("#form_tambah input[name=qty]").val(""); 
            $("#form_tambah select[name=customer]").val(""); 
            $("#form_tambah input[name=ship_to]").val(""); 
            $("#form_tambah input[name=no_telp]").val(""); 
            
            getData();   
          }
        });
        return false;
      });

      $("#form_edit").submit(function () {
        $.ajax({
          type        : "post", 
          data        : $("#form_edit").serialize(),
          dataType    : "json",
          url         : base_url+'Transaksi_c/edit_so',
          beforeSend  : function() {
            $(".act-btn").html('<span class="spinner-grow spinner-grow-sm" role="status"></span> Loading...').attr('disabled',true);
          },
          success: function (e) {
            if(e == 'error_no_so') {
              toastr.error('Nomor sales order sudah ada.', 'Gagal Edit Data', {
                "showMethod": "slideDown",
                "hideMethod": "slideUp",
                timeOut: 5000
              });
            } else if(e == 'error_qty') {
              toastr.error('Stok barang kurang.', 'Gagal Edit Data', {
                "showMethod": "slideDown",
                "hideMethod": "slideUp",
                timeOut: 5000
              });
            } else if(e == 'success') {
              toastr.info('Data berhasil diedit.', 'Berhasil Mengedit', {
                "showMethod": "slideDown",
                "hideMethod": "slideUp",
                timeOut: 5000
              });
            }
            $(".act-btn").html('<i class="fa fa-check-square-o"></i> Simpan').attr('disabled',false);
            $("#form_tambah input[name=no_so]").val("");
            $("#form_tambah input[name=so_date]").val("");
            $("#form_tambah input[name=ship_date]").val("");
            $("#form_tambah select[name=id_barang]").val("");
            $("#form_tambah input[name=qty]").val(""); 
            $("#form_tambah input[name=customer]").val(""); 
            $("#form_tambah input[name=ship_to]").val(""); 
            $("#form_tambah input[name=no_telp]").val("");
            $("#form_tambah input[name=edit]").val(""); 
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
          url: base_url+'Transaksi_c/hapus_so',
          beforeSend: function() {
            $(".act-btn-hps").html('<span class="spinner-grow spinner-grow-sm" role="status"></span> Loading...').attr('disabled',true);
          },
          success: function (e) {
            $(".act-btn-hps").html('Hapus').attr('disabled',false);
            $("#modal_hapus").modal('hide');
            getData();  
            toastr.info('Sales Order Bernomor '+e+' telah terhapus.', 'Berhasil Menghapus', {
                "showMethod": "slideDown",
                "hideMethod": "slideUp",
                timeOut: 5000
              });
          }
        });
        return false;
      });

      $("#form_verifkasi").submit(function () {
        $.ajax({
          type: "post",  
          data: $("#form_verifkasi").serialize(),
          dataType: 'json',
          url: base_url+'Transaksi_c/verifikasi_so',
          beforeSend: function() {
            $(".act-btn-verifikasi").html('<span class="spinner-grow spinner-grow-sm" role="status"></span> Loading...').attr('disabled',true);
          },
          success: function (e) {
            $(".act-btn-verifikasi").html('Hapus').attr('disabled',false);
            $("#modal_verifikasi").modal('hide');
            getData();  
            toastr.success('Sales Order Bernomor '+e+' telah terverifikasi.', 'Berhasil memverifikasi', {
                "showMethod": "slideDown",
                "hideMethod": "slideUp",
                timeOut: 5000
              });
          }
        });
        return false;
      });

      function editPage(e) { 
        $.ajax({
          url       : base_url+'Transaksi_c/dataSoById/'+e.getAttribute('id_so'),
          type      : 'get',
          dataType  : 'json',
          success   : function(resp) {
            $("#form_edit input[name=id_so]").val(resp.id_sales_order);
            $("#form_edit input[name=no_so]").val(resp.no_so).attr('readonly',true);
            $("#form_edit input[name=so_date]").val(resp.so_date);
            $("#form_edit input[name=ship_date]").val(resp.ship_date); 
            $("#form_edit input[name=qty]").val(resp.qty);
            $("#form_edit input[name=customer]").val(resp.customer);
            $("#form_edit input[name=ship_to]").val(resp.ship_to);
            $("#form_edit input[name=no_telp]").val(resp.no_telp);
            
            $.ajax({
              url: base_url+'Data_master_c/getData/barang',
              type: 'get',
              dataType: 'json',
              success: function(e) {
                option = '<option value="">Pilih Barang</option>';
                $.each(e, function (i,res) {
                  attribute = "";
                  if(res.id == resp.id_barang) {
                    attribute = "selected";
                  }
                  option += '<option '+attribute+' value="'+res.id+'">'+res.nama_barang+' (Kode : '+res.kode_barang+') (Stok : '+res.jml_barang+')</option>';
                });
                $("#form_edit #id_barang").html(option);
              }
            });
            $.ajax({
              url       : base_url+'Data_master_c/getData/pelanggan',
              type      : 'get',
              dataType  : 'json',
              success   : function(e) {
                option = '<option value="">Pilih Customer</option>';
                $.each(e, function (i,item) {
                  option += '<option value="'+item.id+'">'+item.kode_pelanggan+' - '+item.nama_pelanggan+'</option>';
                });
                $("#customer").html(option);

                option = '<option value="">Pilih Customer</option>';
                $.each(e, function (i,res) {
                  attribute = "";
                  if(res.id == resp.customer) {
                    attribute = "selected";
                  }
                  option += '<option '+attribute+' value="'+res.id+'">'+res.kode_pelanggan+' - '+res.nama_pelanggan+'</option>';
                });
                $("#form_edit #customer").html(option);
              }
            });
            window.scrollTo({top: 0, behavior: 'smooth'});
            $("#addPage").attr('hidden',true);
            $("#editPage").attr('hidden',false).addClass('slideDown');
          }
        });
      }

      $(".cancel-btn").click(function() {
        $("#addPage").attr('hidden',false).removeClass('slideRight').addClass('slideDown');
        $("#editPage").attr('hidden',true);
      });

      function modalHapus(e) {
        $("#id_so_hps").val(e.getAttribute('id_so'));
        $("#no_so_hps").val(e.getAttribute('no_so'));
        $("#pesan_hapus").html('Hapus sales order bernomor <b>'+e.getAttribute('no_so')+'</b> ?');
        $("#modal_hapus").modal('show');
      }

      function modalVerifikasi(e) {
        $("#id_so_verifikasi").val(e.getAttribute('id_so'));
        $("#no_so_verifikasi").val(e.getAttribute('no_so'));
        $("#pesan_verifikasi").html('Verifikasi Sales order bernomor <b>'+e.getAttribute('no_so')+'</b> ?');
        $("#modal_verifikasi").modal('show');
      }
    </script>
    <!-- END PAGE LEVEL JS-->
  </body>
  <!-- END : Body-->
</html>