<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_invoice extends CI_Model {

    public $table = 'invoice';

	public function get_no_invoice()
    {
        $this->db->like('no_invoice', 'I' . strtoupper(date('dM')), 'after');
        $this->db->order_by('id', 'DESC');
        return $this->db->get($this->table)->row_array();
    }

    public function get($id = null)
    {
        $this->db->select('invoice.id as id_invoice, invoice.no_invoice, invoice.invoice_date, barang.*, pelanggan.*, sales_order.*, invoice.validasi as validasi_invoice');
        $this->db->join('sales_order', 'invoice.no_so=sales_order.id');
        $this->db->join('barang', 'sales_order.id_barang=barang.id');
        $this->db->join('pelanggan', 'sales_order.customer=pelanggan.id');
        $this->db->order_by('invoice_date', 'DESC');
        if ($id !== null) {
            $this->db->where('invoice.id', $id);
            return $this->db->get($this->table)->row_array();
        } else {
            return $this->db->get($this->table)->result_array();
        }
    }
}