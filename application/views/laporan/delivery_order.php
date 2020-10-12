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
        'title' => 'Laporan - Delivery Order | Penjualan',
        'sidebar_title' => 'Laporan',
        'sidebar_subtitle' => 'Laporan Delivery Order'
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
<div class="row slideRight-1">
  <div class="col-md-4">
    <div class="row">
      <div class="col-md-12 col-sm-6 col-xs-12">
        <form id="form_filter_harian">
          <div class="form-group">
            <label for="tgl"><i class="fa fa-filter"></i> Filter Laporan /Hari</label>
            <div class="input-group">
              <input type="hidden" name="kolom" value="do_date">
              <input type="hidden" name="tipe_pencarian" value="harian">
              <input type="date" name="tgl" class="form-control" placeholder="Button on right" aria-describedby="button-addon2" id="tgl">
              <input type="date" name="tgl_akhir" class="form-control" placeholder="Button on right" aria-describedby="button-addon2" id="tgl">
              <div class="input-group-append">
                <button class="btn btn-raised btn-primary act-btn"  type="submit"><i class="fa fa-search"></i> Cari</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="row">
      <div class="col-md-12 col-sm-6 col-xs-12">
        <form id="form_filter_bulanan">
          <div class="form-group">
            <label for="tgl"><i class="fa fa-filter"></i> Filter Laporan /Bulan</label> 
            <div class="input-group">
              <input type="hidden" name="kolom" value="do_date">
              <input type="hidden" name="tipe_pencarian" value="bulanan">
              <select name="tgl" class="form-control" id="tgl">
                <option value="">Pilih Bulan</option>
                <option value="01">Januari</option> 
                <option value="02">Februari</option> 
                <option value="03">Maret</option> 
                <option value="04">April</option> 
                <option value="05">Mei</option> 
                <option value="06">Juni</option> 
                <option value="07">Juli</option> 
                <option value="08">Agustus</option> 
                <option value="09">September</option> 
                <option value="10">Oktober</option> 
                <option value="11">November</option> 
                <option value="12">Desember</option> 
              </select>
              <div class="input-group-append">
                <button class="btn btn-raised btn-primary act-btn"  type="submit"><i class="fa fa-search"></i> Cari</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="row">
      <div class="col-md-12 col-sm-6 col-xs-12">
        <form id="form_filter_tahunan">
          <div class="form-group">
            <label for="tgl"><i class="fa fa-filter"></i> Filter Laporan /Tahun</label> 
            <div class="input-group">
              <input type="hidden" name="kolom" value="do_date">
              <input type="hidden" name="tipe_pencarian" value="tahunan">
              <input type="number" name="tgl" class="form-control" placeholder="Masukkan Tahun, Contoh: 2020" id="tgl">
              <div class="input-group-append">
                <button class="btn btn-raised btn-primary act-btn"  type="submit"><i class="fa fa-search"></i> Cari</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div> 
<div class="row" id="filterPage" hidden="">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-11">
            <h4 class="card-title mb-0">Laporan Hasil Pencarian | Delivery Order</h4>
          </div>
          <div class="col-1">
            <form action="<?= base_url('Laporan_c/cari_laporan/delivery_order'); ?>" method="post">
              <input type="hidden" name="kolom" value="do_date">
              <input type="hidden" name="tipe_pencarian" id="print_tipe_pencarian">
              <input type="hidden" name="tgl" id="print_tgl">
              <input type="hidden" name="tgl_akhir" id="tgl_akhir">
              <input type="hidden" name="print" value="print">
              <button type="submit" class="btn btn-raised btn-outline-primary mr-1" ><i class="fa fa-print"></i> Print</button>
            </form>
          </div>
        </div>
      </div>
      <div class="card-body table-responsive">
        <table class="table table-striped zero3">
          <thead>
            <tr>
              <th>No</th>
              <th>Nomor DO</th>
              <th>Customer</th>
              <th>Ship To</th>
              <th>Kode Barang</th>
              <th>Nama Barang</th>
              <th>QTY</th>
              <th>Harga</th>
              <th>Total</th> 
            </tr>
          </thead>
          <tbody id="isi_tbody_filter"> 
          </tbody>
          <tfoot>
            <tr>
                <th colspan="8" style="text-align:right">Total:</th>
                <th></th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>
<div class="row slideRight-1">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title mb-0">Laporan Hari Ini (Tanggal <?php echo date('d') ?>) | Delivery Order</h4>
      </div>
      <div class="card-body table-responsive">
        <table class="table table-striped zero">
          <thead>
            <tr>
              <th>No</th>
              <th>Nomor DO</th>
              <th>Customer</th>
              <th>Ship To</th>
              <th>Kode Barang</th>
              <th>Nama Barang</th>
              <th>QTY</th>
              <th>Harga</th>
              <th>Total</th> 
            </tr>
          </thead>
          <tbody id="isi_tbody_harian"> 
          </tbody>
          <tfoot>
            <tr>
                <th colspan="8" style="text-align:right">Total:</th>
                <th></th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>  
<div class="row slideRight-1">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title mb-0">Laporan Bulan Ini (bulan <?php echo date('m'); ?>) | Delivery Order</h4>
      </div>
      <div class="card-body table-responsive">
        <table class="table table-striped zero1">
          <thead>
            <tr>
              <th>No</th>
              <th>Nomor DO</th>
              <th>Customer</th>
              <th>Ship To</th>
              <th>Kode Barang</th>
              <th>Nama Barang</th>
              <th>QTY</th>
              <th>Harga</th>
              <th>Total</th> 
            </tr>
          </thead>
          <tbody id="isi_tbody_bulanan"> 
          </tbody>
          <tfoot>
            <tr>
                <th colspan="8" style="text-align:right">Total:</th>
                <th></th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>  
<div class="row slideRight-1">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title mb-0">Laporan Tahun Ini (Tahun <?php echo date('Y'); ?>) | Delivery Order</h4>
      </div>
      <div class="card-body table-responsive">
        <table class="table table-striped zero2">
          <thead>
            <tr>
              <th>No</th>
              <th>Nomor DO</th>
              <th>Customer</th>
              <th>Ship To</th>
              <th>Kode Barang</th>
              <th>Nama Barang</th>
              <th>QTY</th>
              <th>Harga</th>
              <th>Total</th> 
            </tr>
          </thead>
          <tbody id="isi_tbody_tahunan"> 
          </tbody>
          <tfoot>
            <tr>
                <th colspan="8" style="text-align:right">Total:</th>
                <th></th>
            </tr>
          </tfoot>
        </table>
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
      base_url = '<?php echo base_url(); ?>'; 

      getData();  
      function getData() {
        $.ajax({
          type: "post",
          dataType: "json",
          url: base_url+'Laporan_c/getData/delivery_order',
          data: {kolom: 'do_date',hari: '<?php echo date('d'); ?>', bulan: '<?php echo date('m'); ?>', tahun: '<?php echo date('Y'); ?>'},
          beforeSend: function() {
            $('.zero').dataTable().fnClearTable();
            $('.zero').dataTable().fnDestroy();
            $('.zero1').dataTable().fnClearTable();
            $('.zero1').dataTable().fnDestroy();
            $('.zero2').dataTable().fnClearTable();
            $('.zero2').dataTable().fnDestroy();
          },
          success: function (resp) {
            isi_tbody_harian = "";
            isi_tbody_bulanan = "";
            isi_tbody_tahunan = "";
            no = 1;
            no1 = 1;
            no2 = 1;

            // Harian
            $.each(resp.laporanHarian, function(i,item) {  
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
              isi_tbody_harian += `
                <tr>
                  <td>${no}</td>
                  <td>${item.no_do}</td>
                  <td>${item.nama_pelanggan}</td>
                  <td>${item.ship_to}</td>
                  <td>${item.kode_barang}</td>
                  <td>${item.nama_barang}</td>
                  <td>${rupiah1}</td>
                  <td>Rp ${rupiah2}</td>
                  <td>Rp ${rupiah}</td>
                </tr>`;
              no++;
            });
            // End Harian

            // Bulanan  
            $.each(resp.laporanBulanan, function(i,item) {  
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
              isi_tbody_bulanan += `
                <tr>
                  <td>${no1}</td>
                  <td>${item.no_do}</td>
                  <td>${item.nama_pelanggan}</td>
                  <td>${item.ship_to}</td>
                  <td>${item.kode_barang}</td>
                  <td>${item.nama_barang}</td>
                  <td>${rupiah1}</td>
                  <td>Rp ${rupiah2}</td>
                  <td>Rp ${rupiah}</td>
                </tr>`;
              no1++;
            });
            // End Bulanan

            // Tahunan
            $.each(resp.laporanTahunan, function(i,item) {  
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
              isi_tbody_tahunan += `
                <tr>
                  <td>${no2}</td>
                  <td>${item.no_do}</td>
                  <td>${item.nama_pelanggan}</td>
                  <td>${item.ship_to}</td>
                  <td>${item.kode_barang}</td>
                  <td>${item.nama_barang}</td>
                  <td>${rupiah1}</td>
                  <td>Rp ${rupiah2}</td>
                  <td>Rp ${rupiah}</td>
                </tr>'`;
              no2++;
            });
            // End Tahunan

            $("#isi_tbody_harian").html(isi_tbody_harian);
            $("#isi_tbody_bulanan").html(isi_tbody_bulanan);
            $("#isi_tbody_tahunan").html(isi_tbody_tahunan);
            $('.zero').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    
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
                  total = api
                      .column( 8 )
                      .data()
                      .reduce( function (a, b) {
                          return intVal(a) + intVal(b);
                      }, 0 );
                      
      
                  // Total over this page
                  pageTotal = api
                      .column( 8, { page: 'current'} )
                      .data()
                      .reduce( function (a, b) {
                          return intVal(a) + intVal(b);
                      }, 0 );
      
                  // Update footer
                  $( api.column( 8 ).footer() ).html(
                    // '$'+pageTotal +' ( $'+ total +' total)'
                    formatRupiah(String(pageTotal), 'Rp.')+',00'
                  );
                }
            });
            $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-outline-primary mr-1');

            $('.zero1').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    
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
                  total = api
                      .column( 8 )
                      .data()
                      .reduce( function (a, b) {
                          return intVal(a) + intVal(b);
                      }, 0 );
                      
      
                  // Total over this page
                  pageTotal = api
                      .column( 8, { page: 'current'} )
                      .data()
                      .reduce( function (a, b) {
                          return intVal(a) + intVal(b);
                      }, 0 );
      
                  // Update footer
                  $( api.column( 8 ).footer() ).html(
                    // '$'+pageTotal +' ( $'+ total +' total)'
                    formatRupiah(String(pageTotal), 'Rp.')+',00'
                  );
                }
            });
            $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-outline-primary mr-1');

            $('.zero2').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    
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
                  total = api
                      .column( 8 )
                      .data()
                      .reduce( function (a, b) {
                          return intVal(a) + intVal(b);
                      }, 0 );
                      
      
                  // Total over this page
                  pageTotal = api
                      .column( 8, { page: 'current'} )
                      .data()
                      .reduce( function (a, b) {
                          return intVal(a) + intVal(b);
                      }, 0 );
      
                  // Update footer
                  $( api.column( 8 ).footer() ).html(
                    // '$'+pageTotal +' ( $'+ total +' total)'
                    formatRupiah(String(pageTotal), 'Rp.')+',00'
                  );
                }
            });
            $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-outline-primary mr-1');

          }
        });
      } 

      $("#form_filter_harian").submit(function() {
        var tipe_pencarian  = $(this)[0][1].value;
        var tgl_awal        = $(this)[0][2].value;
        var tgl_akhir       = $(this)[0][3].value;
        $.ajax({
          type: 'post',
          url: base_url+'Laporan_c/cari_laporan/delivery_order',
          data: $(this).serialize(),
          dataType: 'json',
          beforeSend: function() {
            $(".act-btn").html('<span class="spinner-grow spinner-grow-sm" role="status"></span> Loading...').attr('disabled',true);
            $("#filterPage").attr('hidden',true).removeClass('slideRight');
            $('.zero3').dataTable().fnClearTable();
            $('.zero3').dataTable().fnDestroy();
          },
          success: function(resp) {
            isi_tbody_filter = "";
            no3 = 1;
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
              isi_tbody_filter += `
                <tr>
                  <td>${no3}</td>
                  <td>${item.no_do}</td>
                  <td>${item.nama_pelanggan}</td>
                  <td>${item.ship_to}</td>
                  <td>${item.kode_barang}</td>
                  <td>${item.nama_barang}</td>
                  <td>${rupiah1}</td>
                  <td>Rp ${rupiah2}</td>
                  <td>Rp ${rupiah}</td>
                </tr>`;
              no3++;
            });
            $("#isi_tbody_filter").html(isi_tbody_filter);
            $('.zero3').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    
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
                  total = api
                      .column( 8 )
                      .data()
                      .reduce( function (a, b) {
                          return intVal(a) + intVal(b);
                      }, 0 );
                      
      
                  // Total over this page
                  pageTotal = api
                      .column( 8, { page: 'current'} )
                      .data()
                      .reduce( function (a, b) {
                          return intVal(a) + intVal(b);
                      }, 0 );
      
                  // Update footer
                  $( api.column( 8 ).footer() ).html(
                    // '$'+pageTotal +' ( $'+ total +' total)'
                    formatRupiah(String(pageTotal), 'Rp.')+',00'
                  );
                }
            });
            $(".act-btn").html('<i class="fa fa-search"></i> Cari').attr('disabled',false);
            window.scrollTo({top: 0, behavior: 'smooth'});
            $("#form_filter_harian #tgl").val("");
            $("#filterPage").attr('hidden',false).addClass('slideDown');
            $('#print_tipe_pencarian').val(tipe_pencarian);
            $('#print_tgl').val(tgl_awal);
            $('#tgl_akhir').val(tgl_akhir);
          }
        });
        return false;
      }); 

      $("#form_filter_bulanan").submit(function() {
        var tipe_pencarian  = $(this)[0][1].value;
        var tgl             = $(this)[0][2].value;
        $.ajax({
          type: 'post',
          url: base_url+'Laporan_c/cari_laporan/delivery_order',
          data: $(this).serialize(),
          dataType: 'json',
          beforeSend: function() {
            $(".act-btn").html('<span class="spinner-grow spinner-grow-sm" role="status"></span> Loading...').attr('disabled',true);
            $("#filterPage").attr('hidden',true).removeClass('slideRight');
            $('.zero3').dataTable().fnClearTable();
            $('.zero3').dataTable().fnDestroy();
          },
          success: function(resp) {
            isi_tbody_filter = "";
            no3 = 1;
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
              isi_tbody_filter += `
                <tr>
                  <td>${no3}</td>
                  <td>${item.no_do}</td>
                  <td>${item.nama_pelanggan}</td>
                  <td>${item.ship_to}</td>
                  <td>${item.kode_barang}</td>
                  <td>${item.nama_barang}</td>
                  <td>${rupiah1}</td>
                  <td>Rp ${rupiah2}</td>
                  <td>Rp ${rupiah}</td>
                </tr>`;
              no3++;
            });
            $("#isi_tbody_filter").html(isi_tbody_filter);
            $('.zero3').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    
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
                  total = api
                      .column( 8 )
                      .data()
                      .reduce( function (a, b) {
                          return intVal(a) + intVal(b);
                      }, 0 );
                      
      
                  // Total over this page
                  pageTotal = api
                      .column( 8, { page: 'current'} )
                      .data()
                      .reduce( function (a, b) {
                          return intVal(a) + intVal(b);
                      }, 0 );
      
                  // Update footer
                  $( api.column( 8 ).footer() ).html(
                    // '$'+pageTotal +' ( $'+ total +' total)'
                    formatRupiah(String(pageTotal), 'Rp.')+',00'
                  );
                }
            });
            $(".act-btn").html('<i class="fa fa-search"></i> Cari').attr('disabled',false);
            window.scrollTo({top: 0, behavior: 'smooth'});
            $("#form_filter_bulanan #tgl").val("");
            $("#filterPage").attr('hidden',false).addClass('slideDown');
            $('#print_tipe_pencarian').val(tipe_pencarian);
            $('#print_tgl').val(tgl);
          }
        });
        return false;
      }); 

      $("#form_filter_tahunan").submit(function() {
        var tipe_pencarian  = $(this)[0][1].value;
        var tgl             = $(this)[0][2].value;
        $.ajax({
          type: 'post',
          url: base_url+'Laporan_c/cari_laporan/delivery_order',
          data: $(this).serialize(),
          dataType: 'json',
          beforeSend: function() {
            $(".act-btn").html('<span class="spinner-grow spinner-grow-sm" role="status"></span> Loading...').attr('disabled',true);
            $("#filterPage").attr('hidden',true).removeClass('slideRight');
            $('.zero3').dataTable().fnClearTable();
            $('.zero3').dataTable().fnDestroy();
          },
          success: function(resp) {
            isi_tbody_filter = "";
            no3 = 1;
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
              isi_tbody_filter += `
                <tr>
                  <td>${no3}</td>
                  <td>${item.no_do}</td>
                  <td>${item.nama_pelanggan}</td>
                  <td>${item.ship_to}</td>
                  <td>${item.kode_barang}</td>
                  <td>${item.nama_barang}</td>
                  <td>${rupiah1}</td>
                  <td>Rp ${rupiah2}</td>
                  <td>Rp ${rupiah}</td>
                </tr>`;
              no3++;
            });
            $("#isi_tbody_filter").html(isi_tbody_filter);
            $('.zero3').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    
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
                  total = api
                      .column( 8 )
                      .data()
                      .reduce( function (a, b) {
                          return intVal(a) + intVal(b);
                      }, 0 );
                      
      
                  // Total over this page
                  pageTotal = api
                      .column( 8, { page: 'current'} )
                      .data()
                      .reduce( function (a, b) {
                          return intVal(a) + intVal(b);
                      }, 0 );
      
                  // Update footer
                  $( api.column( 8 ).footer() ).html(
                    // '$'+pageTotal +' ( $'+ total +' total)'
                    formatRupiah(String(pageTotal), 'Rp.')+',00'
                  );
                }
            });
            $(".act-btn").html('<i class="fa fa-search"></i> Cari').attr('disabled',false);
            window.scrollTo({top: 0, behavior: 'smooth'});
            $("#form_filter_tahunan #tgl").val("");
            $("#filterPage").attr('hidden',false).addClass('slideDown');
            $('#print_tipe_pencarian').val(tipe_pencarian);
            $('#print_tgl').val(tgl);
          }
        });
        return false;
      }); 
    </script>
    <!-- END PAGE LEVEL JS-->
  </body>
  <!-- END : Body-->
</html>