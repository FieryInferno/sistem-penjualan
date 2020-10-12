<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_delivery_order extends CI_Model {

    public $table = 'delivery_order';

	public function get_no_do()
    {
        $this->db->like('no_do', 'DO' . strtoupper(date('dM')), 'after');
        $this->db->order_by('id', 'DESC');
        return $this->db->get($this->table)->row_array();
    }

    public function get($id = null)
    {
        $this->db->select('delivery_order.id as id_delivery_order, delivery_order.no_do, delivery_order.do_date, barang.*, pelanggan.*, sales_order.*, delivery_order.validasi as validasi_do');
        $this->db->join('sales_order', 'delivery_order.no_so=sales_order.id');
        $this->db->join('barang', 'sales_order.id_barang=barang.id');
        $this->db->join('pelanggan', 'sales_order.customer=pelanggan.id');
        $this->db->order_by('do_date', 'DESC');
        if ($id !== null) {
            $this->db->where('delivery_order.id', $id);
            return $this->db->get($this->table)->row_array();
        } else {
            return $this->db->get($this->table)->result_array();
        }
    }

    public function get_rincian_barang($id)
    {
        $this->db->select('');            
        $this->db->join('rincian_barang', 'delivery_order.id=rincian_barang.id_delivery_order');
        $this->db->join('sales_order', 'delivery_order.no_so=sales_order.id');
        $this->db->join('barang', 'sales_order.id_barang=barang.id');
        $this->db->where('delivery_order.id', $id);
        return $this->db->get($this->table)->result_array();
    }
}