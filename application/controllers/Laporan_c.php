<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once("./vendor/autoload.php");
use Dompdf\Dompdf;
use Dompdf\Options;

class Laporan_c extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Laporan_m','laporan');
	}

	public function sales_order()
	{
		$this->load->view('laporan/sales_order');
	}

	public function delivery_order()
	{
		$this->load->view('laporan/delivery_order');
	}

	public function invoice()
	{
		$this->load->view('laporan/invoice');
	}

	public function getData($table)
	{
		$data['laporanHarian'] = $this->laporan->getLaporanHarian($table,$this->input->post('kolom'),$this->input->post('hari'))->result();
		$data['laporanBulanan'] = $this->laporan->getLaporanBulanan($table,$this->input->post('kolom'),$this->input->post('bulan'))->result();
		$data['laporanTahunan'] = $this->laporan->getLaporanTahunan($table,$this->input->post('kolom'),$this->input->post('tahun'))->result();
		echo json_encode($data);
	}

	public function cari_laporan($table) {
		$tipe = $this->input->post('tipe_pencarian');
		if($tipe == "harian") {
			if ($this->input->post('tgl_akhir') !== "") {
				$akhir	= ' TANGGAL ' . substr($this->input->post('tgl'), 8) . ' - ' . $this->tgl_indo($this->input->post('tgl_akhir'));
				$this->db->where($this->input->post('kolom') . ' BETWEEN "' . $this->input->post('tgl') . '" AND "' . $this->input->post('tgl_akhir') . '"');
			} else {
				$akhir	= ' TANGGAL ' . $this->tgl_indo($this->input->post('tgl'));
				$this->db->where("DATE_FORMAT(".$this->input->post('kolom').",'%d')", (substr($this->input->post('tgl'), 8)));
				$this->db->where("DATE_FORMAT(".$this->input->post('kolom').",'%m')", (substr($this->input->post('tgl'), 5, 2)));
			}
		}
		else if($tipe == "bulanan") {
			$akhir	= ' BULAN ' . $this->tgl_indo($this->input->post('tgl')) . ' 2020';
			$this->db->where("DATE_FORMAT(".$this->input->post('kolom').",'%m')",$this->input->post('tgl'));
		}
		else if($tipe == "tahunan") {
			$akhir	= ' TAHUN ' . $this->input->post('tgl');
			$this->db->where("DATE_FORMAT(".$this->input->post('kolom').",'%Y')",$this->input->post('tgl'));
			$this->db->limit(100);
		}
		if ($table == 'delivery_order' || $table == 'invoice') {
			$this->db->join('sales_order', $table . '.no_so=sales_order.id');
			$this->db->join('barang', 'sales_order.id_barang=barang.id');
			$this->db->join('pelanggan', 'sales_order.customer=pelanggan.id');
		} else {
			$this->db->join('barang', $table . '.id_barang=barang.id');
			$this->db->join('pelanggan', $table . '.customer=pelanggan.id');
		}
		$data['laporan']	= $this->db->get($table)->result();
		$data['table']		= $table;
		$data['judul']		= ' LAPORAN ' . strtoupper(str_replace('_', ' ', $table)) . $akhir;
		if ($this->input->post('print') !== null) {
		// 	print_r($data['laporan']);
		// die();
			ob_start();
				$this->load->view('laporan/laporan_direktur', $data);
				$html = ob_get_contents();
			ob_end_clean();
			ob_clean();
			switch ($table) {
				case 'delivery_order':
					$filename	= 'Laporan Delivery Order';
					break;

				case 'sales_order':
					$filename	= 'Laporan Sales Order';
					break;

				case 'invoice':
					$filename	= 'Laporan Invoice';
					break;
				
				default:
					# code...
					break;
			}
			$options  	= new Options();
			$options->set('isRemoteEnabled', TRUE);
			$dompdf = new Dompdf($options);
			$dompdf->loadHtml($html);
			$dompdf->setPaper('legal', 'potrait');
			$dompdf->render();
			$dompdf->stream($filename, array("Attachment" => 0) );
		} else {
			echo json_encode($data['laporan']);
		}	
	}

	private function tgl_indo($tanggal)
	{
		$bulan = array (
			1 =>   'JANUARI',
			'FEBRUARI',
			'MARET',
			'APRIL',
			'MEI',
			'JUNI',
			'JULI',
			'AGUSTUS',
			'SEPTEMBER',
			'OKTOBER',
			'NOVEMBER',
			'DESEMBER'
		);
		$pecahkan = explode('-', $tanggal);
		switch (strlen($tanggal)) {
			case 2:
				return $bulan[(int)$tanggal];
				break;
			case 4:
				return $tanggal;
				break;
			
			default:
				return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
				break;
		}
	}
}

/* End of file Laporan_c.php */
/* Location: ./application/controllers/Laporan_c.php */