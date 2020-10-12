<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_m extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getJml($table,$kolom,$tahun,$bulan)
	{
		$this->db->where("DATE_FORMAT(".$kolom.",'%Y-%m')", $tahun.'-'.$bulan);
		return $this->db->get($table);
	}

	public function getPendapatan($table, $kolom, $tahun,$bulan)
	{
		$this->db->select('sales_order.qty, barang.harga_barang');
		switch ($table) {
			case 'delivery_order':
				$this->db->join('sales_order', 'delivery_order.no_so = sales_order.id');
				break;
			case 'invoice':
				$this->db->join('sales_order', 'invoice.no_so = sales_order.id');
				break;
			
			default:
				# code...
				break;
		}
		$this->db->join('barang', 'sales_order.id_barang = barang.id');
		$this->db->where("DATE_FORMAT(". $kolom . ",'%Y-%m')", $tahun.'-'.$bulan);
		$data	= $this->db->get($table)->result_array();
		$data0	= 0;
		foreach ($data as $key) {
			$data0	+= $key['qty'] * $key['harga_barang'];
		}
		return $data0;
	}

}

/* End of file Dashboard_m.php */
/* Location: ./application/models/Dashboard_m.php */