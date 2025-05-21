<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_Api extends CI_Model
{
	//user

	public function insertLog($data)
	{
		return $this->db->insert('log', $data);
	}
	public function updateLog($where, $data)
	{
		$this->db->where($where);
		return $this->db->update('log', $data);
	}


	public function insertReg($data)
	{
		return $this->db->insert('reg_id', $data);
	}

	public function updateReg($where, $data)
	{
		$this->db->where($where);
		return $this->db->update('reg_id', $data);
	}

	public function getLastLog($where)
	{
		if (!empty($where)) {
			$this->db->where($where);
		}
		$this->db->order_by('id', 'DESC');
		$this->db->limit(1);
		return $this->db->get('log')->row();
	}
}

/* End of file M_Api.php */
