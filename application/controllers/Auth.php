<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model("M_Auth");
	}

	public function login()
	{
		$this->load->view('auth/login');
	}

	public function regis()
	{
		$this->load->view('auth/regis');
	}

	public function signUp()
	{
		$name = $this->input->post('name');
		$username = $this->input->post('username');
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('auth/regis');
		} else {
			$hashed_password = password_hash($password, PASSWORD_DEFAULT);
			$data = array(
				'name' => $username,
				'username' => $username,
				'email' => $email,
				'password' => $hashed_password
			);
			if ($this->M_Auth->insertUser($data)) {

				$this->session->set_flashdata('peringatan', 'Registrasi Berhasil, Masukan Email dan Password untuk login');

				redirect('login');
			} else {
				$this->session->set_flashdata('peringatan', 'Registrasi gagal, Lakukan registrasi ulang');

				redirect('regis');
			}
		}
	}

	public function loginProcess()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == FALSE) {
			redirect('login');
		} else {
			if ($this->M_Auth->cek_login($username, $password)) {
				$this->session->set_userdata('username', $username);
				$this->session->set_userdata('password', $password);
				redirect('home');
			} else {
				$this->session->set_flashdata('peringatan', 'Login Gagal, email atau password tidak sesuai');

				redirect('login');
			}
		}
	}


	public function logoutProcess()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
}

/* End of file Auth.php */
