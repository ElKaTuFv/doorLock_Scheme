<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_Log extends CI_Model
{

	public function getLog()
	{

		$this->db->select('user.nama, log.*');
		$this->db->from('log');
		$this->db->join('user', 'user.rfid_id = log.rfid_id', 'left');
		$this->db->order_by('log.id', 'desc');
		$this->db->limit(31);

		return $this->db->get()->result();
	}
}

/* End of file M_Log.php */
