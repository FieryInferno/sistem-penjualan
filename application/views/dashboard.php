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
        'title' => 'Dashboard | Penjualan',
        'sidebar_title' => 'Dashboard',
        'sidebar_subtitle' => ''
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
  <div class="col-xl-4 col-lg-6 col-md-6 col-12">
    <div class="card bg-primary">
      <div class="card-content">
        <div class="card-body pt-2 pb-0">
          <div class="media">
            <div class="media-body white text-left">
              <span>Total Sales Order</span>
              <h3 class="font-large-1 mb-0" id="t_so"></h3>
            </div>
            <div class="media-right white text-right">
              <i class="ft-file-text font-large-1"></i>
            </div>
          </div>
        </div>
        <div id="Widget-line-chart" class="height-75 WidgetlineChart WidgetlineChartShadow mb-3">
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-4 col-lg-6 col-md-6 col-12">
    <div class="card bg-warning">
      <div class="card-content">
        <div class="card-body pt-2 pb-0">
          <div class="media">
            <div class="media-body white text-left">
              <span>Total Delivery Order</span>
              <h3 class="font-large-1 mb-0" id="t_do"></h3>
            </div>
            <div class="media-right white text-right">
              <i class="fa fa-car font-large-1"></i>
            </div>
          </div>
        </div>
        <div id="Widget-line-chart2" class="height-75 WidgetlineChart WidgetlineChartShadow mb-3">
        </div>
      </div>
    </div>
  </div> 
  <div class="col-xl-4 col-lg-6 col-md-6 col-12">
    <div class="card bg-danger">
      <div class="card-content">
        <div class="card-body pt-2 pb-0">
          <div class="media">
            <div class="media-body white text-left">
              <span>Total invoice</span>
              <h3 class="font-large-1 mb-0" id="t_invoice"></h3>
            </div>
            <div class="media-right white text-right">
              <i class="icon-check font-large-1"></i>
            </div>
          </div>
        </div>
        <div id="Widget-line-chart4" class="height-75 WidgetlineChart WidgetlineChartShadow mb-3">
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row match-height slideRight-1"> 
  <div class="col-xl-12 col-lg-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title mb-0">Sales Analysis</h4>
      </div>
      <div class="card-content">
        <div class="card-body">
          <div class="chart-info mb-3">
            <span class="text-uppercase mr-3"><i class="fa fa-circle primary font-small-2 mr-1"></i> Sales Order</span>
            <span class="text-uppercase mr-3"><i class="fa fa-circle warning font-small-2 mr-1"></i> Delivery Order</span>
            <span class="text-uppercase"><i class="fa fa-circle danger font-small-2 mr-1"></i> Invoice</span>
          </div>
          <div id="sales_chart" class="height-350 lineChart1 lineChart1Shadow">
          </div>
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
      $(document).ready(function () {
        base_url = '<?php echo base_url(); ?>';
        salesChart();
        getSo();
        getDo();
        getInvoice();
      })
      function getSo() {
        $.ajax({
          type: 'get',
          url: base_url+'Dashboard_c/getPerData/sales_order',
          dataType: 'json',
          beforeSend: function () {
            $("#t_so").html();
          },
          success: function(e) { 
            var number_string1 = e.toString(),
              sisa1  = number_string1.length % 3,
              rupiah1  = number_string1.substr(0, sisa1),
              ribuan1  = number_string1.substr(sisa1).match(/\d{3}/g);
                
            if (ribuan1) {
              separator1 = sisa1 ? '.' : '';
              rupiah1 += separator1 + ribuan1.join('.');
            }
            $("#t_so").html(rupiah1);
          }
        });
      }
      
      function getDo() {
        $.ajax({
          type: 'get',
          url: base_url+'Dashboard_c/getPerData/delivery_order',
          dataType: 'json',
          beforeSend: function () {
            $("#t_do").html();
          },
          success: function(e) {
            var number_string1 = e.toString(),
              sisa1  = number_string1.length % 3,
              rupiah1  = number_string1.substr(0, sisa1),
              ribuan1  = number_string1.substr(sisa1).match(/\d{3}/g);
                
            if (ribuan1) {
              separator1 = sisa1 ? '.' : '';
              rupiah1 += separator1 + ribuan1.join('.');
            }
            $("#t_do").html(rupiah1);
          }
        });
      }
      
      function getInvoice() {
        $.ajax({
          type: 'get',
          url: base_url+'Dashboard_c/getPerData/invoice',
          dataType: 'json',
          beforeSend: function () {
            $("#t_invoice").html();
          },
          success: function(e) {
            var number_string1 = e.toString(),
              sisa1  = number_string1.length % 3,
              rupiah1  = number_string1.substr(0, sisa1),
              ribuan1  = number_string1.substr(sisa1).match(/\d{3}/g);
                
            if (ribuan1) {
              separator1 = sisa1 ? '.' : '';
              rupiah1 += separator1 + ribuan1.join('.');
            }
            $("#t_invoice").html(rupiah1);
          }
        });
      } 

      function salesChart() {
        so_jan = '<?php echo $so_jan; ?>';
        so_feb = '<?php echo $so_feb; ?>';
        so_mar = '<?php echo $so_mar; ?>';
        so_apr = '<?php echo $so_apr; ?>';
        so_mei = '<?php echo $so_mei; ?>';
        so_jun = '<?php echo $so_jun; ?>';
        so_jul = '<?php echo $so_jul; ?>';
        so_agu = '<?php echo $so_agu; ?>';
        so_sep = '<?php echo $so_sep; ?>';
        so_okt = '<?php echo $so_okt; ?>';
        so_nov = '<?php echo $so_nov; ?>';
        so_des = '<?php echo $so_des; ?>';

        do_jan = '<?php echo $do_jan; ?>';
        do_feb = '<?php echo $do_feb; ?>';
        do_mar = '<?php echo $do_mar; ?>';
        do_apr = '<?php echo $do_apr; ?>';
        do_mei = '<?php echo $do_mei; ?>';
        do_jun = '<?php echo $do_jun; ?>';
        do_jul = '<?php echo $do_jul; ?>';
        do_agu = '<?php echo $do_agu; ?>';
        do_sep = '<?php echo $do_sep; ?>';
        do_okt = '<?php echo $do_okt; ?>';
        do_nov = '<?php echo $do_nov; ?>';
        do_des = '<?php echo $do_des; ?>';

        invoice_jan = '<?php echo $invoice_jan; ?>';
        invoice_feb = '<?php echo $invoice_feb; ?>';
        invoice_mar = '<?php echo $invoice_mar; ?>';
        invoice_apr = '<?php echo $invoice_apr; ?>';
        invoice_mei = '<?php echo $invoice_mei; ?>';
        invoice_jun = '<?php echo $invoice_jun; ?>';
        invoice_jul = '<?php echo $invoice_jul; ?>';
        invoice_agu = '<?php echo $invoice_agu; ?>';
        invoice_sep = '<?php echo $invoice_sep; ?>';
        invoice_okt = '<?php echo $invoice_okt; ?>';
        invoice_nov = '<?php echo $invoice_nov; ?>';
        invoice_des = '<?php echo $invoice_des; ?>';

        // Line Chart 1 Starts
        var lineChart1 = new Chartist.Line('#sales_chart', {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            series: [
                [so_jan, so_feb, so_mar, so_apr, so_mei, so_jun, so_jul, so_agu, so_sep, so_okt, so_nov, so_des],
                [do_jan, do_feb, do_mar, do_apr, do_mei, do_jun, do_jul, do_agu, do_sep, do_okt, do_nov, do_des],
                [invoice_jan, invoice_feb, invoice_mar, invoice_apr, invoice_mei, invoice_jun, invoice_jul, invoice_agu, invoice_sep, invoice_okt, invoice_nov, invoice_des]
            ]
        }, {
                axisX: {
                    showGrid: false,
                },
                axisY: {
                  scaleMinSpace: 50,
                  labelInterpolationFnc: function(value) {
                    if (value == 0) {
                      return '0'
                    }
                    // return String.fromCharCode(64 + value)
                    return formatRupiah(String(value), 'Rp. ');
                  }
                },
                fullWidth: true,
                chartPadding: { top: 0, right: 25, bottom: 0, left: 100 }
            });
        // Line Chart 1 Ends
      }
    </script>
    <!-- END PAGE LEVEL JS-->
  </body>
  <!-- END : Body-->
</html>