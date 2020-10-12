<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laporan_m extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getLaporanHarian($table,$kolom,$hari)
	{
		$this->db->where("DATE_FORMAT(".$kolom.",'%d')", $hari);
		if ($table == 'delivery_order' || $table == 'invoice') {
			$this->db->join('sales_order', $table . '.no_so=sales_order.id');
			$this->db->join('barang', 'sales_order.id_barang=barang.id');
			$this->db->join('pelanggan', 'sales_order.customer=pelanggan.id');
		} else {
			$this->db->join('barang', $table . '.id_barang=barang.id');
			$this->db->join('pelanggan', $table . '.customer=pelanggan.id');
		}
		return $this->db->get($table);	
	}

	public function getLaporanBulanan($table,$kolom,$bulan)
	{
		$this->db->where("DATE_FORMAT(".$kolom.",'%m')", $bulan);
		if ($table == 'delivery_order' || $table == 'invoice') {
			$this->db->join('sales_order', $table . '.no_so=sales_order.id');
			$this->db->join('barang', 'sales_order.id_barang=barang.id');
			$this->db->join('pelanggan', 'sales_order.customer=pelanggan.id');
		} else {
			$this->db->join('barang', $table . '.id_barang=barang.id');
			$this->db->join('pelanggan', $table . '.customer=pelanggan.id');
		}
		return $this->db->get($table);	
	}

	public function getLaporanTahunan($table,$kolom,$tahun)
	{
		$this->db->where("DATE_FORMAT(".$kolom.",'%Y')", $tahun);
		if ($table == 'delivery_order' || $table == 'invoice') {
			$this->db->join('sales_order', $table . '.no_so=sales_order.id');
			$this->db->join('barang', 'sales_order.id_barang=barang.id');
			$this->db->join('pelanggan', 'sales_order.customer=pelanggan.id');
		} else {
			$this->db->join('barang', $table . '.id_barang=barang.id');
			$this->db->join('pelanggan', $table . '.customer=pelanggan.id');
		}
		return $this->db->get($table);	
	}

}

/* End of file Laporan_m.php */
/* Location: ./application/models/Laporan_m.php */