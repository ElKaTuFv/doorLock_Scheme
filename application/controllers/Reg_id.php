<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Reg_id extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Dashboard');
	}

	public function index()
	{
		$this->load->view('content/reg_id');
	}

	public function addUser()
	{
		$rfid_id = $this->input->post('rfid_id');
		$data = [
			'rfid_id' 	=> $rfid_id,
			'nama'		=> $this->input->post('nama'),
		];

		$insert = $this->M_Dashboard->insertUser($data);
		if ($insert) {
			$this->universal->delete(['rfid_id' => $rfid_id], 'reg_id');
		}
		redirect('/home');
	}
}

/* End of file Reg_id.php */
