<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_customer extends CI_Model {

    public $table = 'pelanggan';

	public function get_all()
    {
        return $this->db->get($this->table)->result_array();
    }
}