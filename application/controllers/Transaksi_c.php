<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transaksi_c extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}    

// Sales Order
	public function sales_order()
	{
		$this->load->view('transaksi/sales_order');
	}

	public function dataSoById($id)
	{
		$data = $this->M_sales_order->get($id);
		echo json_encode($data);
	}

	public function tambah_so()
	{
		$no_so 		= $this->input->post('no_so');
		$so_date 	= date('Y-m-d');
		$ship_date 	= $this->input->post('ship_date');
		$id_barang 	= $this->input->post('id_barang');
		$qty 		= $this->input->post('qty');
		$customer 	= $this->input->post('customer');
		$ship_to 	= $this->input->post('ship_to');
		$no_telp 	= $this->input->post('no_telp');
		$dataInsert = array(
			'no_so' 	=> $no_so,
			'so_date' 	=> $so_date,
			'ship_date' => $ship_date,
			'id_barang' => $id_barang,
			'qty' 		=> $qty,
			'customer' 	=> $customer,
			'ship_to' 	=> $ship_to,
			'no_telp' 	=> $no_telp,
		);
		$cek_no_so = $this->db->get_where('sales_order',array('no_so' => $no_so))->num_rows();
		if($cek_no_so == 1 ) {
			echo json_encode('error_no_so');
		} else {
			$this->db->insert('sales_order',$dataInsert);
			$this->kirim_email('so_baru');
			echo json_encode('success');
		}
	}

	private function kirim_email($jenis)
	{
		switch ($jenis) {
			case 'so_baru':
				$subjek 	= "Sales Order Baru untuk Direktur";
				$pesan 		= "Sales Order Baru untuk Direktur";
				$penerima	= $this->M_user->get($id = null, 'Direktur');  	
				break;
			case 'do_baru':
				$subjek 	= "Delivery Order Baru";
				$pesan 		= "Delivery Order Baru";		
				$penerima	= $this->M_user->get($id = null, 'Staff Produksi');
				break;
			case 'invoice_baru':
				$subjek 	= "Invoice Baru";
				$pesan 		= "Invoice Baru";		
				$penerima	= $this->M_user->get($id = null, 'Direktur');
				break;
			case 'verifikasi_direktur':
				$subjek 	= "Sales Order Sudah Diverifikasi Direktur";
				$pesan 		= "Sales Order Sudah Diverifikasi Direktur";		
				$penerima	= $this->M_user->get($id = null, 'Admin Penjualan');
				break;
			case 'tambah_rincian_barang':
				$subjek 	= "Rincian Barang Sudah Ditambah";
				$pesan 		= "Rincian Barang Sudah Ditambah";		
				$penerima	= $this->M_user->get($id = null, 'Admin Penjualan');
				break;
			default:
				# code...
				break;
		}
		$config = [
			'mailtype'  	=> 'html',
			'charset'   	=> 'utf-8',
			'protocol'  	=> 'smtp',
			'smtp_host' 	=> 'smtp.gmail.com',
			'smtp_user'		=> 'sistem.penjualan2020@gmail.com',  // Email gmail
			'smtp_pass'   	=> 'NaonWeAh00',  // Password gmail
			'smtp_crypto'	=> 'ssl',
			'smtp_port'   	=> 465,
			'crlf'    		=> "\r\n", 
			'newline' 		=> "\r\n"
		];
		$this->email->initialize($config);
		$this->email->from('sistem.penjualan2020@gmail.com', 'Sistem Penjualan');
		foreach ($penerima as $key => $value) {
			$this->email->to($value['email']);
		}
		// $this->email->to('bagassetia271@gmail.com');
		$this->email->subject($subjek);
		$this->email->message($pesan);
		$this->email->send();
	}

	public function edit_so()
	{
		$no_so 		= $this->input->post('no_so');
		$so_date 	= $this->input->post('so_date');
		$ship_date 	= $this->input->post('ship_date');
		$id_barang 	= $this->input->post('id_barang');
		$qty 		= $this->input->post('qty');
		$customer 	= $this->input->post('customer');
		$ship_to 	= $this->input->post('ship_to');
		$no_telp 	= $this->input->post('no_telp');
		$pcs 		= $this->input->post('pcs');

		$dataUpdate = array(
			'no_so' 	=> $no_so,
			'so_date' 	=> $so_date,
			'ship_date' => $ship_date,
			'id_barang' => $id_barang,
			'qty' 		=> $qty,
			'customer'	=> $customer,
			'ship_to' 	=> $ship_to,
			'no_telp'	=> $no_telp,
			'pcs'	=> $pcs
		);

		// $cek_no_so = $this->db->get_where('sales_order',array('no_so' => $no_so))->num_rows();
		// if($cek_no_so == 1 ) {
		// 	echo json_encode('error_no_so');
		// } else {
			// $data_barang = $this->db->get_where('barang',array('id' => $id_barang))->result();
			// $jml_barang = 0;
			// foreach ($data_barang as $db) {
			// 	$jml_barang = $db->jml_barang;
			// }
			// if($qty <= $jml_barang) {
				$this->db->where('id',$this->input->post('id_so'));
				$this->db->update('sales_order',$dataUpdate);
				echo json_encode('success');
		// 	}
		// 	else {
		// 		echo json_encode('error_qty');
		// 	}
		// }
	}

	public function hapus_so()
	{
		$this->db->where('id', $this->input->post('id_so'));	
		$this->db->delete('sales_order'); 
		echo json_encode($this->input->post('no_so'));
	} 

	public function verifikasi_so()
	{
		$this->db->where('id', $this->input->post('id_so'));	
		$this->db->update('sales_order',array('validasi' => 'valid')); 
		$this->kirim_email('verifikasi_direktur');
		echo json_encode($this->input->post('no_so'));
	} 
// End Sales Order

// Delivery Order
	public function delivery_order()
	{
		$this->load->view('transaksi/delivery_order');
	}

	public function dataDoById($id)
	{
		$data = $this->M_delivery_order->get($id);
		echo json_encode($data);
	}

	public function rincian_barang($id)
	{
		$data	= $this->M_delivery_order->get_rincian_barang($id);
		echo json_encode($data);
	}

	public function tambah_do()
	{
		$no_do 			= $this->input->post('no_do');
		$do_date 		= date('Y-m-d');
		$no_so 			= $this->input->post('no_so');
		$so_date 		= $this->input->post('so_date');
		$validasi 		= $this->input->post('validasi');
		$dataInsert 	= array();
		if($validasi !== "valid") {
			$validasi = null;
		}
		$dataInsert = array(
			'no_do' 	=> $no_do,
			'do_date' 	=> $do_date,
			'no_so' 	=> $no_so,
			'so_date' 	=> $so_date,
			'validasi' 	=> $validasi
		); 

		$cek_no_do = $this->db->get_where('delivery_order',array('no_do' => $no_do))->num_rows();
		$cek_no_so = $this->db->get_where('delivery_order',array('no_so' => $no_so))->num_rows();
		if($cek_no_do == 1 ) {
			echo json_encode('error_no_do');
		} else {
			if($cek_no_so == 1 ) {
				echo json_encode('error_no_so');
			}
			else {
				$this->db->insert('delivery_order',$dataInsert);
				$this->kirim_email('do_baru');
				echo json_encode('success');
			}
		} 
	}

	public function tambah_rincian_barang()
	{
		$id_rincian			= uniqid('rincian-');
		$id_delivery_order	= $this->input->post('id_delivery_order');
		$panjang 			= $this->input->post('panjang');
		$dataInsert = [
			'id_rincian'		=> $id_rincian,
			'id_delivery_order'	=> $id_delivery_order,
			'panjang'			=> $panjang
		];
		$this->db->insert('rincian_barang', $dataInsert);
		$this->kirim_email('tambah_rincian_barang');
		echo json_encode('success'); 
	}

	public function edit_do()
	{
		$no_do 		= $this->input->post('no_do');
		$do_date 	= $this->input->post('do_date');
		$no_so 		= $this->input->post('no_so');
		$so_date 	= $this->input->post('so_date');
		// $ship_date = $this->input->post('ship_date');
		// $id_barang = $this->input->post('id_barang');
		// $qty = $this->input->post('qty');
		// $customer = $this->input->post('customer');
		// $ship_to = $this->input->post('ship_to');
		// $no_telp = $this->input->post('no_telp');
		$validasi 	= $this->input->post('validasi');
		$dataUpdate = array();
		if($validasi == "valid") {
			$dataUpdate = array(
				'no_do' 	=> $no_do,
				'do_date' 	=> $do_date,
				'no_so' 	=> $no_so,
				'so_date' 	=> $so_date,
				// 'ship_date' => $ship_date,
				// 'id_barang' => $id_barang,
				// 'qty' => $qty,
				// 'customer' => $customer,
				// 'ship_to' => $ship_to,
				// 'no_telp' => $no_telp,
				'validasi' 	=> $validasi
			);
		} else {
			$dataUpdate = array(
				'no_do' 	=> $no_do,
				'do_date' 	=> $do_date,
				'no_so' 	=> $no_so,
				'so_date' 	=> $so_date,
				// 'ship_date' => $ship_date,
				// 'id_barang' => $id_barang,
				// 'qty' => $qty,
				// 'customer' => $customer,
				// 'ship_to' => $ship_to,
				// 'no_telp' => $no_telp,
				'validasi' 	=> '',
			);
		} 

		$cek_no_do = $this->db->get_where('delivery_order',array('no_do' => $no_do))->num_rows();
		$cek_no_so = $this->db->get_where('delivery_order',array('no_so' => $no_so))->num_rows();
		$data_barang = $this->db->get_where('barang',array('id' => $id_barang))->result();
		$jml_barang = 0;
		foreach ($data_barang as $db) {
			$jml_barang = $db->jml_barang;
		}
		if($this->input->post('no_do_awal') == $no_do) {
			if($this->input->post('no_so_awal') == $no_so) {
				if($qty <= $jml_barang) {
					$this->db->where('id',$this->input->post('id_do'));
					$this->db->update('delivery_order',$dataUpdate);
					echo json_encode('success');
				}
				else {
					echo json_encode('error_qty');
				}
			}
			else { 
				if($cek_no_so == 1 ) {
					echo json_encode('error_no_so');
				}
				else { 
					if($qty <= $jml_barang) {
						$this->db->where('id',$this->input->post('id_do'));
						$this->db->update('delivery_order',$dataUpdate);
						echo json_encode('success');
					}
					else {
						echo json_encode('error_qty');
					}	
				} 
			}	
		}
		else {
			if($this->input->post('no_so_awal') == $no_so) {
				if($cek_no_do == 1 ) {
					echo json_encode('error_no_do');
				} else { 
					if($qty <= $jml_barang) {
						$this->db->where('id',$this->input->post('id_do'));
						$this->db->update('delivery_order',$dataUpdate);
						echo json_encode('success');
					}
					else {
						echo json_encode('error_qty');
					} 
				} 
			}
			else {
				if($cek_no_do == 1 ) {
					echo json_encode('error_no_do');
				} else {
					if($cek_no_so == 1 ) {
						echo json_encode('error_no_so');
					}
					else { 
						if($qty <= $jml_barang) {
							$this->db->where('id',$this->input->post('id_do'));
							$this->db->update('delivery_order',$dataUpdate);
							echo json_encode('success');
						}
						else {
							echo json_encode('error_qty');
						}	
					}
				} 
			}	
		} 
	}

	public function edit_ship_do()
	{
		$no_do = $this->input->post('no_do'); 
		$ship_date = $this->input->post('ship_date'); 
		$ship_to = $this->input->post('ship_to'); 
		$dataUpdate = array(  
			'ship_date' => $ship_date, 
			'ship_to' => $ship_to
		); 
		$this->db->where('id',$this->input->post('id_do'));
		$this->db->update('delivery_order',$dataUpdate);
		echo json_encode('success');
	}

	public function hapus_do()
	{
		$this->db->where('id', $this->input->post('id_do'));	
		$this->db->delete('delivery_order'); 
		echo json_encode($this->input->post('no_do'));
	} 

	public function verifikasi_do()
	{
		$this->db->where('id', $this->input->post('id_do'));	
		$this->db->update('delivery_order',array('validasi' => 'valid')); 
		echo json_encode($this->input->post('no_do'));
	} 
// End Delivery Order

// Invoice
	public function invoice()
	{
		$this->load->view('transaksi/invoice');
	}

	public function dataInvoiceById($id)
	{
		$data = $this->db->get_where('invoice_v',array('id' => $id))->result();
		echo json_encode($data);
	}

	public function tambah_invoice()
	{
		$no_invoice 	= $this->input->post('no_invoice');
		$invoice_date 	= date('Y-m-d');
		$no_so 			= $this->input->post('no_so');
		$so_date 		= $this->input->post('so_date');
		$ship_date 		= $this->input->post('ship_date');
		$id_barang 		= $this->input->post('id_barang');
		$qty 			= $this->input->post('qty');
		$customer 		= $this->input->post('customer');
		$ship_to 		= $this->input->post('ship_to');
		$no_telp 		= $this->input->post('no_telp');
		$validasi 		= $this->input->post('validasi');
		$dataInsert 	= array();
		if($validasi == "valid") {
			$dataInsert = array(
				'no_invoice'	=> $no_invoice,
				'invoice_date'	=> $invoice_date,
				'no_so' 		=> $no_so,
				'so_date' 		=> $so_date,
				'ship_date' 	=> $ship_date,
				'id_barang' 	=> $id_barang,
				'qty' 			=> $qty,
				'customer' 		=> $customer,
				'ship_to' 		=> $ship_to,
				'no_telp' 		=> $no_telp,
				'validasi' 		=> $validasi
			);
		} else {
			$dataInsert = array(
				'no_invoice' 	=> $no_invoice,
				'invoice_date' 	=> $invoice_date,
				'no_so' 		=> $no_so,
				'so_date' 		=> $so_date,
				'ship_date' 	=> $ship_date,
				'id_barang' 	=> $id_barang,
				'qty' 			=> $qty,
				'customer' 		=> $customer,
				'ship_to' 		=> $ship_to,
				'no_telp' 		=> $no_telp
			);
		}
		$this->db->insert('invoice',$dataInsert);
		$this->kirim_email('invoice_baru');
		echo json_encode('success');
	}

	public function edit_invoice()
	{
		$no_invoice = $this->input->post('no_invoice');
		$invoice_date = $this->input->post('invoice_date');
		$no_so = $this->input->post('no_so');
		$so_date = $this->input->post('so_date');
		$ship_date = $this->input->post('ship_date');
		$id_barang = $this->input->post('id_barang');
		$qty = $this->input->post('qty');
		$customer = $this->input->post('customer');
		$ship_to = $this->input->post('ship_to');
		$no_telp = $this->input->post('no_telp');
		$validasi = $this->input->post('validasi');
		$dataUpdate = array();
		if($validasi == "valid") {
			$dataUpdate = array(
				'no_invoice' => $no_invoice,
				'invoice_date' => $invoice_date,
				'no_so' => $no_so,
				'so_date' => $so_date,
				'ship_date' => $ship_date,
				'id_barang' => $id_barang,
				'qty' => $qty,
				'customer' => $customer,
				'ship_to' => $ship_to,
				'no_telp' => $no_telp,
				'validasi' => $validasi
			);
		} else {
			$dataUpdate = array(
				'no_invoice' => $no_invoice,
				'invoice_date' => $invoice_date,
				'no_so' => $no_so,
				'so_date' => $so_date,
				'ship_date' => $ship_date,
				'id_barang' => $id_barang,
				'qty' => $qty,
				'customer' => $customer,
				'ship_to' => $ship_to,
				'no_telp' => $no_telp,
				'validasi' => '',
			);
		} 

		$cek_no_invoice = $this->db->get_where('invoice',array('no_invoice' => $no_invoice))->num_rows();
		$cek_no_so = $this->db->get_where('invoice',array('no_so' => $no_so))->num_rows();
		$data_barang = $this->db->get_where('barang',array('id' => $id_barang))->result();
		$jml_barang = 0;
		foreach ($data_barang as $db) {
			$jml_barang = $db->jml_barang;
		}
		if($this->input->post('no_invoice_awal') == $no_invoice) {
			if($this->input->post('no_so_awal') == $no_so) {
				if($qty <= $jml_barang) {
					$this->db->where('id',$this->input->post('id_invoice'));
					$this->db->update('invoice',$dataUpdate);
					echo json_encode('success');
				}
				else {
					echo json_encode('error_qty');
				}
			}
			else { 
				if($cek_no_so == 1 ) {
					echo json_encode('error_no_so');
				}
				else { 
					if($qty <= $jml_barang) {
						$this->db->where('id',$this->input->post('id_invoice'));
						$this->db->update('invoice',$dataUpdate);
						echo json_encode('success');
					}
					else {
						echo json_encode('error_qty');
					}	
				} 
			}	
		}
		else {
			if($this->input->post('no_so_awal') == $no_so) {
				if($cek_no_invoice == 1 ) {
					echo json_encode('error_no_invoice');
				} else { 
					if($qty <= $jml_barang) {
						$this->db->where('id',$this->input->post('id_invoice'));
						$this->db->update('invoice',$dataUpdate);
						echo json_encode('success');
					}
					else {
						echo json_encode('error_qty');
					} 
				} 
			}
			else {
				if($cek_no_invoice == 1 ) {
					echo json_encode('error_no_invoice');
				} else {
					if($cek_no_so == 1 ) {
						echo json_encode('error_no_so');
					}
					else { 
						if($qty <= $jml_barang) {
							$this->db->where('id',$this->input->post('id_invoice'));
							$this->db->update('invoice',$dataUpdate);
							echo json_encode('success');
						}
						else {
							echo json_encode('error_qty');
						}	
					}
				} 
			}	
		} 
	}

	public function hapus_invoice()
	{
		$this->db->where('no_invoice', $this->input->post('no_invoice'));	
		$this->db->delete('invoice'); 
		echo json_encode('success');
	} 

	public function verifikasi_invoice()
	{
		$this->db->where('no_invoice', $this->input->post('no_invoice'));	
		$this->db->update('invoice',array('validasi' => 'valid')); 
		echo json_encode('success');
	} 
// End Invoice
}

/* End of file Transaksi_c.php */
/* Location: ./application/controllers/Transaksi_c.php */