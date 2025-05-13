<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_Auth extends CI_Model
{

	public function insertUser($data)
	{
		return $this->db->insert('admin', $data);
	}
	public function cek_login($username, $password)
	{
		$this->db->where('username', $username);
		$user = $this->db->get('admin')->row();
		if ($user && password_verify($password, $user->password)) {
			return $user;
		}
		return false;
	}
}

/* End of file M_Api.php */
