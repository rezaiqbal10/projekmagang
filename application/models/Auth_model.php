<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{

    public function cek_username($username)
    {
        $query = $this->db->get_where('user', ['username' => $username]);
        return $query->num_rows();
    }

    public function get_password($username)
    {
        $data = $this->db->get_where('user', ['username' => $username])->row_array();
        return $data['password'];
    }

    public function userdata($username)
    {
        return $this->db->get_where('user', ['username' => $username])->row_array();
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
