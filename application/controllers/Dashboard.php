<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Dashboard');
	}


	public function index()
	{
		$data = [
			'title' => 'Dashboard',
			'dataUser' => $this->universal->getMulti('', 'user'),
			'dataAksesHariIni' => $this->universal->getMulti(['tanggal' => date('Y-d-m')], 'log'),
		];
		$this->load->view('content/dashboard', $data);
	}

	public function getId()
	{
		$rfid_id = $this->universal->getOrderBy('', 'reg_id', '', '', 1);
		echo json_encode($rfid_id[0]->rfid_id);
	}

	public function getDataHariIni()
	{
		$data = [
			'dataUser' => count($this->universal->getMulti('', 'user')),
			'dataAksesHariIni' => count($this->universal->getMulti(['tanggal' => date('Y-d-m')], 'log')),
		];
		echo json_encode($data);
	}
}

/* End of file Dashboard.php */
