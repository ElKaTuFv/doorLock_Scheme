<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_Api extends CI_Model
{
	//user
	public function getAllUser()
	{

		$query = $this->db->get('user');

		return $query->result();
	}
	public function getUserId($id)
	{

		$this->db->where('id', $id);
		$query = $this->db->get('user');

		return $query->row();
	}

	public function insertUser($data)
	{

		return $this->db->insert('user', $data);
	}

	public function updateUser($data, $id)
	{

		$this->db->where('id', $id);
		return $this->db->update('user', $data);
	}


	public function deleteUser($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('user');
	}

	//log
	public function getAllLog()
	{
		$this->db->select('log.*, user.rfid_id, user.nama');
		$this->db->from('log');
		$this->db->join('user', 'user.rfid_id = log.rfid_id', 'left');

		$this->db->order_by('log.id', 'desc');

		$query = $this->db->get();

		return $query->result();
	}

	public function getLogId($id)
	{
		$this->db->where('log.id', $id);
		$this->db->select('log.*, user.rfid_id, user.nama');
		$this->db->from('log');
		$this->db->join('user', 'user.rfid_id = log.rfid_id', 'left');

		$query = $this->db->get();

		return $query->row();
	}

	public function getLastLog()
	{
		$this->db->order_by('id', 'desc');
		$this->db->limit(1);

		$query = $this->db->get('log');

		return $query->row();
	}

	public function insertLog($data)
	{
		return $this->db->insert('log', $data);
	}

	public function updateLog($data, $id)
	{

		$this->db->where('id', $id);
		return $this->db->update('log', $data);
	}


	public function deleteLog($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('log');
	}
}

/* End of file M_Api.php */
