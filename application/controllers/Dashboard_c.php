<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_c extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Dashboard_m','orderan');
	}

	public function index()
	{
		//Sales Order
			$data['so_jan'] = $this->orderan->getPendapatan("sales_order","so_date","2020","01");
			$data['so_feb'] = $this->orderan->getPendapatan("sales_order","so_date","2020","02");
			$data['so_mar'] = $this->orderan->getPendapatan("sales_order","so_date","2020","03");
			$data['so_apr'] = $this->orderan->getPendapatan("sales_order","so_date","2020","04");
			$data['so_mei'] = $this->orderan->getPendapatan("sales_order","so_date","2020","05");
			$data['so_jun'] = $this->orderan->getPendapatan("sales_order","so_date","2020","06");
			$data['so_jul'] = $this->orderan->getPendapatan("sales_order","so_date","2020","07");
			$data['so_agu'] = $this->orderan->getPendapatan("sales_order","so_date","2020","08");
			$data['so_sep'] = $this->orderan->getPendapatan("sales_order","so_date","2020","09");
			$data['so_okt'] = $this->orderan->getPendapatan("sales_order","so_date","2020","10");
			$data['so_nov'] = $this->orderan->getPendapatan("sales_order","so_date","2020","11");
			$data['so_des'] = $this->orderan->getPendapatan("sales_order","so_date","2020","12");
		// End Sales Order
		// Delivery Order
			$data['do_jan'] = $this->orderan->getPendapatan("delivery_order","do_date","2020","01");
			$data['do_feb'] = $this->orderan->getPendapatan("delivery_order","do_date","2020","02");
			$data['do_mar'] = $this->orderan->getPendapatan("delivery_order","do_date","2020","03");
			$data['do_apr'] = $this->orderan->getPendapatan("delivery_order","do_date","2020","04");
			$data['do_mei'] = $this->orderan->getPendapatan("delivery_order","do_date","2020","05");
			$data['do_jun'] = $this->orderan->getPendapatan("delivery_order","do_date","2020","06");
			$data['do_jul'] = $this->orderan->getPendapatan("delivery_order","do_date","2020","07");
			$data['do_agu'] = $this->orderan->getPendapatan("delivery_order","do_date","2020","08");
			$data['do_sep'] = $this->orderan->getPendapatan("delivery_order","do_date","2020","09");
			$data['do_okt'] = $this->orderan->getPendapatan("delivery_order","do_date","2020","10");
			$data['do_nov'] = $this->orderan->getPendapatan("delivery_order","do_date","2020","11");
			$data['do_des'] = $this->orderan->getPendapatan("delivery_order","do_date","2020","12");
		// End Delivery Order
		// Invoice
			$data['invoice_jan'] = $this->orderan->getPendapatan("invoice","invoice_date","2020","01");
			$data['invoice_feb'] = $this->orderan->getPendapatan("invoice","invoice_date","2020","02");
			$data['invoice_mar'] = $this->orderan->getPendapatan("invoice","invoice_date","2020","03");
			$data['invoice_apr'] = $this->orderan->getPendapatan("invoice","invoice_date","2020","04");
			$data['invoice_mei'] = $this->orderan->getPendapatan("invoice","invoice_date","2020","05");
			$data['invoice_jun'] = $this->orderan->getPendapatan("invoice","invoice_date","2020","06");
			$data['invoice_jul'] = $this->orderan->getPendapatan("invoice","invoice_date","2020","07");
			$data['invoice_agu'] = $this->orderan->getPendapatan("invoice","invoice_date","2020","08");
			$data['invoice_sep'] = $this->orderan->getPendapatan("invoice","invoice_date","2020","09");
			$data['invoice_okt'] = $this->orderan->getPendapatan("invoice","invoice_date","2020","10");
			$data['invoice_nov'] = $this->orderan->getPendapatan("invoice","invoice_date","2020","11");
			$data['invoice_des'] = $this->orderan->getPendapatan("invoice","invoice_date","2020","12");
		// End Invoice
			// $data['pendapatan_jan']	= $this->orderan->getPendapatan("2020","01");
			// $data['pendapatan_feb'] = $this->orderan->getPendapatan("2020","02");
			// $data['pendapatan_mar'] = $this->orderan->getPendapatan("2020","03");
			// $data['pendapatan_apr'] = $this->orderan->getPendapatan("2020","04");
			// $data['pendapatan_mei'] = $this->orderan->getPendapatan("2020","05");
			// $data['pendapatan_jun'] = $this->orderan->getPendapatan("2020","06");
			// $data['pendapatan_jul'] = $this->orderan->getPendapatan("2020","07");
			// $data['pendapatan_agu'] = $this->orderan->getPendapatan("2020","08");
			// $data['pendapatan_sep'] = $this->orderan->getPendapatan("2020","09");
			// $data['pendapatan_okt'] = $this->orderan->getPendapatan("2020","10");
			// $data['pendapatan_nov'] = $this->orderan->getPendapatan("2020","11");
			// $data['pendapatan_des'] = $this->orderan->getPendapatan("2020","12");
		$this->load->view('dashboard',$data);
	}

	public function getPerData($table)
	{
		$data = $this->db->get($table)->num_rows();
		echo json_encode($data);
	}

}

/* End of file Dashboard_c.php */
/* Location: ./application/controllers/Dashboard_c.php */