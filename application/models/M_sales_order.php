<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_sales_order extends CI_Model {

    public $table = 'sales_order';

	public function get_no_so()
    {
        $this->db->like('no_so', 'SO' . strtoupper(date('dM')), 'after');
        $this->db->order_by('id', 'DESC');
        return $this->db->get($this->table)->row_array();
    }

    public function get($id = null)
    {
        $this->db->select('sales_order.id as id_sales_order, sales_order.*, barang.*, pelanggan.*');
        $this->db->join('barang', 'sales_order.id_barang=barang.id');
        $this->db->join('pelanggan', 'sales_order.customer=pelanggan.id');
        $this->db->order_by('so_date', 'DESC');
        if ($id !== null) {
            
            $this->db->where('sales_order.id', $id);
            return $this->db->get($this->table)->row_array();
        } else {
            return $this->db->get($this->table)->result_array();
        }
    }
}