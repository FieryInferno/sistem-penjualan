<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_user extends CI_Model {

    public $table = 'user';

	public function get($id = null, $user = null)
    {
        if ($user !== null) {
            return $this->db->get_where($this->table, ['level' => $user])->result_array();
        } else {
            if ($id !== null) {
                return $this->db->get_where($this->table, ['id' => $id])->result_array();
            } else {
                return $this->db->get($this->table)->result_array();
            }
        }
    }
}