<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data_master_c extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function getData($table)
	{
		$data = $this->db->get($table)->result();
		echo json_encode($data);
	}

	public function get_sales_order()
	{
		$data	= $this->M_sales_order->get();
		echo json_encode($data);
	}

	public function get_delivery_order()
	{
		$data	= $this->M_delivery_order->get();
		echo json_encode($data);
	}

	public function get_invoice()
	{
		$data	= $this->M_invoice->get();
		echo json_encode($data);
	}

	public function getDataAkun()
	{
		$data = $this->db->get_where('user',array('id' => $this->input->post('id_akun')))->result();
		echo json_encode($data);
	}

	public function getDataJml($table)
	{
		$data = $this->db->get($table)->num_rows();
		echo json_encode($data);
	}
// Data Barang
	public function data_barang()
	{ 
		$this->load->view('data_master/barang');	
	}

	public function getDataPerBarang($id)
	{
		$data = $this->db->get_where('barang',array('id' => $id))->result();
		echo json_encode($data);
	}

	public function tambah_data_barang()
	{
		$kode_barang = $this->input->post('kode_barang');
		$nama_barang = $this->input->post('nama_barang');
		$harga_barang = $this->input->post('harga_barang'); 
		// $jml_barang = $this->input->post('jml_barang');

		$dataInsert = array(
			'kode_barang' => $kode_barang,
			'nama_barang' => $nama_barang,
			'harga_barang' => $harga_barang
			// 'jml_barang' => $jml_barang
		);
		$cek = $this->db->get_where('barang',array('kode_barang' => $kode_barang))->num_rows();
		if($cek == 0 ) {
			$this->db->insert('barang',$dataInsert);  
			echo json_encode("success");
		}
		else {
			echo json_encode("error");
		} 
	}

	public function edit_data_barang()
	{
		$id_barang = $this->input->post('id_barang');
		$kode_awal = $this->input->post('kode_awal');
		$kode_barang = $this->input->post('kode_barang');
		$nama_barang = $this->input->post('nama_barang');
		$harga_barang = $this->input->post('harga_barang'); 
		// $jml_barang = $this->input->post('jml_barang');

		$dataUpdate = array(
			'kode_barang' => $kode_barang,
			'nama_barang' => $nama_barang,
			'harga_barang' => $harga_barang,
			// 'jml_barang' => $jml_barang
		);
		$cek = $this->db->get_where('barang',array('kode_barang' => $kode_barang))->num_rows();
		if($kode_awal != $kode_barang) {
			if($cek == 1) {
				echo json_encode('error');
			}
			else {
				$this->db->where('id',$id_barang);
				$this->db->update('barang',$dataUpdate); 
				echo json_encode('success');
			} 
		}
		else {
			$this->db->where('id',$id_barang);
			$this->db->update('barang',$dataUpdate); 
			echo json_encode('success'); 
		} 
	}

	public function hapus_data_barang()
	{
		$this->db->where('id', $this->input->post('id_barang'));	
		$this->db->delete('barang'); 
		echo json_encode($this->input->post('kode_awal'));
	} 
// End Data Barang
	
// Data Pelanggan
	public function data_pelanggan()
	{ 
		$this->load->view('data_master/pelanggan');	
	}

	public function getDataPerPelanggan($id)
	{
		$data = $this->db->get_where('pelanggan',array('id' => $id))->result();
		echo json_encode($data);
	} 

	public function tambah_data_pelanggan()
	{
		$kode_pelanggan = $this->input->post('kode_pelanggan');
		$nama_pelanggan = $this->input->post('nama_pelanggan');
		$no_telp = $this->input->post('no_telp'); 
		$alamat = $this->input->post('alamat');
		$email = $this->input->post('email');

		$dataInsert = array(
			'kode_pelanggan' => $kode_pelanggan,
			'nama_pelanggan' => $nama_pelanggan,
			'no_telp' => $no_telp,
			'email' => $email,
			'alamat' => $alamat
		);
		$cek = $this->db->get_where('pelanggan',array('kode_pelanggan' => $kode_pelanggan))->num_rows();
		if($cek == 0 ) {
			$this->db->insert('pelanggan',$dataInsert);  
			echo json_encode("success");
		}
		else {
			echo json_encode("error");
		}

	} 

	public function edit_data_pelanggan()
	{
		$kode_awal = $this->input->post('kode_awal');
		$id_pelanggan = $this->input->post('id_pelanggan');
		$kode_pelanggan = $this->input->post('kode_pelanggan');
		$nama_pelanggan = $this->input->post('nama_pelanggan');
		$email = $this->input->post('email'); 
		$no_telp = $this->input->post('no_telp');
		$alamat = $this->input->post('alamat');

		$dataUpdate = array(
			'kode_pelanggan' => $kode_pelanggan,
			'nama_pelanggan' => $nama_pelanggan,
			'email' => $email,
			'alamat' => $alamat,
			'no_telp' => $no_telp
		);
		$cek = $this->db->get_where('pelanggan',array('kode_pelanggan' => $kode_pelanggan))->num_rows();
		if($kode_awal != $kode_pelanggan) {
			if($cek == 1) {
				echo json_encode('error');
			}
			else {
				$this->db->where('id',$id_pelanggan);
				$this->db->update('pelanggan',$dataUpdate); 
				echo json_encode('success');
			} 
		}
		else {
			$this->db->where('id',$id_pelanggan);
			$this->db->update('pelanggan',$dataUpdate); 
			echo json_encode('success'); 
		} 
	} 

	public function hapus_data_pelanggan()
	{
		$this->db->where('id', $this->input->post('id_pelanggan'));	
		$this->db->delete('pelanggan'); 
		echo json_encode($this->input->post('kode_awal'));
	}
// End Data Pelanggan

// Data User
	public function data_user()
	{
		$this->load->view('data_master/user');
	}

	public function dataUserById($id)
	{
		$data = $this->db->get_where('user',array('id' => $id))->result();
		echo json_encode($data);
	}

	public function tambah_data_user()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$nama_user = $this->input->post('nama_user');
		$email = $this->input->post('email');
		$level = $this->input->post('level');
		$md5pass = md5($password);
		$sha1pass = sha1($md5pass);

		$dataInsert = array(
			'username' => $username,
			'nama_user' => $nama_user,
			'level' => $level,
			'email' => $email,
			'password' => $sha1pass
		);

		$cek = $this->db->get_where('user',array('username' => $username))->num_rows();
		if($cek == 0 ) {
			$this->db->insert('user',$dataInsert);  
			echo json_encode("success");
		}
		else {
			echo json_encode("error");
		} 
	}

	public function edit_data_user()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$nama_user = $this->input->post('nama_user');
		$email = $this->input->post('email');
		$level = $this->input->post('level');
		$dataUpdt = array();

		if($password == "") {
			$dataUpdt = array(
				'username' => $username,
				'nama_user' => $nama_user,
				'level' => $level,
				'email' => $email, 
			); 
		} else {
			$md5pass = md5($password);
			$sha1pass = sha1($md5pass);
			$dataUpdt = array(
				'username' => $username,
				'nama_user' => $nama_user,
				'level' => $level,
				'email' => $email,
				'password' => $sha1pass
			); 
		}

		if($username == $this->input->post('username_awal')) {
			$this->db->where('id',$this->input->post('id_user'));
			$this->db->update('user',$dataUpdt);  
			echo json_encode("success");
		} else {
			$cek = $this->db->get_where('user',array('username' => $username))->num_rows();
			if($cek == 0 ) {
				$this->db->where('id',$this->input->post('id_user'));
				$this->db->update('user',$dataUpdt);  
				echo json_encode("success");
			}
			else {
				echo json_encode("error");
			}  
		}
	}

	public function hapus_data_user()
	{
		$this->db->where('id', $this->input->post('id_user'));	
		$this->db->delete('user'); 
		echo json_encode($this->input->post('nama_user'));
	}

	public function get_no($jenis)
	{
		switch ($jenis) {
			case 'sales_order':
				$data 	= $this->M_sales_order->get_no_so();
				if ($data !== null) {
					$n	= (int) substr($data['no_so'], 7) + 1;
				} else {
					$n 	= '';
				}
				$id		= 'SO';
				break;
			case 'delivery_order':
				$data 	= $this->M_delivery_order->get_no_do();
				if ($data !== null) {
					$n	= (int) substr($data['no_do'], 7) + 1;
				} else {
					$n 	= '';
				}
				$id	= 'DO';
				break;
			case 'invoice':
				$data 	= $this->M_invoice->get_no_invoice();
				if ($data !== null) {
					$n	= (int) substr($data['no_invoice'], 6) + 1;
				} else {
					$n 	= '';
				}
				$id		= 'I';
				break;
			
			default:
				# code...
				break;
		}
		switch (strlen($n)) {
			case 0:
				$no	= '0001';
				break;
			case 1:
				$no	= '000' . $n;
				break;
			case 2:
				$no	= '00' . $n;
				break;
			case 3:
				$no	= '0' . $n;
				break;
			case 4:
				$no	= $n;
				break;
			
			default:
				# code...
				break;
		}
		$no_so	= $id . strtoupper(date('dM')) . $no;
		echo json_encode($no_so);
	}
}