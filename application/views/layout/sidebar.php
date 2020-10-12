<?php 
  $dataUser = $this->db->get_where('user', array('id' => $this->session->userdata('id_user')))->result();
    $nama_user = "";
    $level = "";
    foreach ($dataUser as $ds) {
      $nama_user = $ds->nama_user;
      $level = $ds->level;
    }
 ?>
<div class="sidebar-content">
  <div class="nav-container">
    <ul id="main-menu-navigation" data-menu="menu-navigation" data-scroll-to-active="true" class="navigation navigation-main">
      <li class="<?php if($sidebar_title == 'Dashboard') {echo 'active';} ?> nav-item"><a href="<?php echo base_url('Dashboard_c/'); ?>"><i class="ft-home"></i><span data-i18n="" class="menu-title">Dashboard</span></a>
      </li>  
      <?php if($level == 'Direktur') { ?>
        <li class="has-sub nav-item"><a href="#"><i class="ft-file-text"></i><span data-i18n="" class="menu-title">Data Master</span></a>
        <ul class="menu-content"> 
          <li class="<?php if($sidebar_subtitle == 'Data Barang') {echo 'active';} ?>"><a href="<?php echo base_url('Data_master_c/data_barang'); ?>" class="menu-item">Data Barang</a>
          </li>
          <li class="<?php if($sidebar_subtitle == 'Data Pelanggan') {echo 'active';} ?>"><a href="<?php echo base_url('Data_master_c/data_pelanggan'); ?>" class="menu-item">Data Pelanggan</a>
          </li>
        </ul>
      </li> 
      <?php } ?>
      <?php if($level == 'Admin' || $level == 'Admin Penjualan') { ?>
      <li class="has-sub nav-item"><a href="#"><i class="ft-file-text"></i><span data-i18n="" class="menu-title">Data Master</span></a>
        <ul class="menu-content">
          <li class="<?php if($sidebar_subtitle == 'Data User') {echo 'active';} ?>"><a href="<?php echo base_url('Data_master_c/data_user'); ?>" class="menu-item">Data User</a>
          </li>
          <li class="<?php if($sidebar_subtitle == 'Data Barang') {echo 'active';} ?>"><a href="<?php echo base_url('Data_master_c/data_barang'); ?>" class="menu-item">Data Barang</a>
          </li>
          <li class="<?php if($sidebar_subtitle == 'Data Pelanggan') {echo 'active';} ?>"><a href="<?php echo base_url('Data_master_c/data_pelanggan'); ?>" class="menu-item">Data Pelanggan</a>
          </li>
        </ul>
      </li> 
      <?php } ?>
      <li class="has-sub nav-item"><a href="#"><i class="icon-wallet"></i><span data-i18n="" class="menu-title">Transaksi</span></a>
        <ul class="menu-content">
          <?php if($level == 'Admin' || $level == 'Admin Penjualan' || $level == 'Direktur') { ?>
          <li class="<?php if($sidebar_subtitle == 'Sales Order') {echo 'active';} ?>"><a href="<?php echo base_url('Transaksi_c/sales_order'); ?>" class="menu-item">Sales Order</a>
          </li> 
          <?php } ?>
          <?php if($level == 'Admin' || $level == 'Admin Penjualan' || $level == 'Staff Produksi') { ?>
          <li class="<?php if($sidebar_subtitle == 'Delivery Order') {echo 'active';} ?>"><a href="<?php echo base_url('Transaksi_c/delivery_order'); ?>" class="menu-item">Delivery Order</a>
          </li>
          <?php } ?>
          <?php if($level == 'Admin' || $level == 'Admin Penjualan' || $level == 'Direktur') { ?>
          <li class="<?php if($sidebar_subtitle == 'Invoice') {echo 'active';} ?>"><a href="<?php echo base_url('Transaksi_c/invoice'); ?>" class="menu-item">Invoice</a>
          </li>
          <?php } ?>
        </ul>
      </li> 
      <?php if($level == "Admin" || $level == "Direktur") { ?>
      <li class="has-sub nav-item"><a href="#"><i class="fa fa-book"></i><span data-i18n="" class="menu-title">Laporan</span></a>
        <ul class="menu-content">
          <li class="<?php if($sidebar_subtitle == 'Laporan Sales Order') {echo 'active';} ?>"><a href="<?php echo base_url('Laporan_c/sales_order'); ?>" class="menu-item">Sales Order</a>
          </li>
          <li class="<?php if($sidebar_subtitle == 'Laporan Delivery Order') {echo 'active';} ?>"><a href="<?php echo base_url('Laporan_c/delivery_order'); ?>" class="menu-item">Delivery Order</a>
          </li>
          <li class="<?php if($sidebar_subtitle == 'Laporan Invoice') {echo 'active';} ?>"><a href="<?php echo base_url('Laporan_c/invoice'); ?>" class="menu-item">Invoice</a>
          </li>
        </ul>
      </li> 
      <?php } ?>
    </ul>
  </div>
</div>