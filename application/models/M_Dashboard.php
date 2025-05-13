<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_Dashboard extends CI_Model
{

	public function insertUser($data)
	{
		return $this->db->insert('user', $data);
	}
}

/* End of file M_Dashboard.php */
