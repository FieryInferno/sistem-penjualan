<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once("./vendor/autoload.php");
use Dompdf\Dompdf;
use Dompdf\Options;
use Spipu\Html2Pdf\Html2Pdf;

class Laporan extends CI_Controller {

	public function sales_order()
	{
		$data['so']	= $this->M_sales_order->get($this->input->post('id_so'));
		ob_start();
			$this->load->view('laporan_baru/sales_order', $data);
			$html = ob_get_contents();
		ob_end_clean();
		ob_clean();
		$filename	= 'Laporan Sales Order';
        $options  	= new Options();
        $options->set('isRemoteEnabled', TRUE);
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('legal', 'potrait');
        $dompdf->render();
		$dompdf->stream($filename, array("Attachment" => 0) );
	}

	public function invoice()
	{
		$data['invoice']	= $this->db->get_where('invoice_v', ['id' => $this->input->post('id_invoice')])->row_array();
		ob_start();
			$this->load->view('laporan_baru/invoice', $data);
			$html = ob_get_contents();
		ob_end_clean();
		ob_clean();
		$filename	= 'Laporan Invoice';
        $options  	= new Options();
        $options->set('isRemoteEnabled', TRUE);
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('legal', 'potrait');
        $dompdf->render();
		$dompdf->stream($filename, array("Attachment" => 0) );
	}

	public function delivery_order()
	{
		$data['do']				= $this->M_delivery_order->get($this->input->post('id_do'));
		$this->db->select('*');
		$this->db->from('delivery_order');
		$this->db->join('rincian_barang', 'delivery_order.id = rincian_barang.id_delivery_order');
		$this->db->join('sales_order', 'delivery_order.no_so = sales_order.id');
		$this->db->join('barang', 'sales_order.id_barang = barang.id');
		$this->db->where('delivery_order.id', $this->input->post('id_do'));
		$data['rincian_barang']	= $this->db->get()->result_array();
		ob_start();
			$this->load->view('laporan_baru/delivery_order', $data);
			$html = ob_get_contents();
		ob_end_clean();
		ob_clean();
		$filename	= 'Laporan Delivery Order';
        $options  	= new Options();
        $options->set('isRemoteEnabled', TRUE);
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('legal', 'potrait');
        $dompdf->render();
		$dompdf->stream($filename, array("Attachment" => 0) );
	}
}

/* End of file Laporan_c.php */
/* Location: ./application/controllers/Laporan_c.php */