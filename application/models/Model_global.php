<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_global extends CI_Model
{
    public function getDataAll($table)
    {
        return $this->db->get($table)->result();
    }
	public function get_keyword($keyword)
	{
		$this->db->select('*');
		$this->db->from('kontruksi');
		$this->db->like('paket_pekerjaan');
		$this->db->or_like('lokasi');
		return $this->db->get()->result();
	}
}
