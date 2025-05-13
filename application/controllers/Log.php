<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Log extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Log');
	}

	public function index()
	{
		$data = [
			'title' => 'Log Data',
			'data_log' => $this->M_Log->getLog(),
		];
		$this->load->view('content/log', $data);
	}
}

/* End of file Log.php */
