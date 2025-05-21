<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Api');
	}

	public function checkUserAkses()
	{
		$rfid_id = $this->input->get('rfid_id');

		$checkRfid = $this->universal->getOne(['rfid_id' => $rfid_id], 'user');
		if ($checkRfid) {
			$data = [
				'rfid_id'   => $rfid_id,
				'nama'      => $checkRfid->nama,
			];

			echo json_encode($data);
		}
	}

	public function insertId()
	{
		$rfid = $this->input->get('rfid_id');
		$jenis = $this->input->get('jenis'); // "masuk" atau "keluar"
		$tanggal = $this->input->get('tanggal') ?: date('Y-m-d');
		$waktu = $this->input->get('waktu') ?: date('H:i:s');

		$dataUser = $this->universal->getOne(['rfid_id' => $rfid], 'user');

		$insertLog = false;
		if ($dataUser) {
			$data = [
				'rfid_id'   => $rfid,
				'tanggal'   => $tanggal,
				'waktu'     => $waktu,
				'keterangan' => ucfirst($jenis), // simpan jenis sebagai keterangan: "Masuk" / "Keluar"
			];
			$lastLog = $this->M_Api->getLastLog(['rfid_id' => $rfid]);
			if ($lastLog->keterangan == ucfirst($jenis)) {
				$insertLog = $this->M_Api->updateLog(['id' => $lastLog->id], $data);
			} else {
				// Update status user (opsional, jika ingin dibalik setiap scan)
				$newStatus = ($jenis == 'masuk') ? 1 : 0;
				$this->universal->update(['status' => $newStatus], ['id' => $dataUser->id], 'user');

				$insertLog = $this->M_Api->insertLog($data);
			}
		}

		// Simpan/Update reg_id (opsional)
		$dataReg_id = $this->universal->getMulti('', 'reg_id');
		$data = ['rfid_id' => $rfid];
		$insertReg = (count($dataReg_id) == 0)
			? $this->M_Api->insertReg($data)
			: $this->M_Api->updateReg(['rfid_id' => $dataReg_id[0]->rfid_id], $data);

		header('Content-Type: application/json');
		echo json_encode(($insertLog && $insertReg) ? 'data berhasil ditambahkan' : 'data gagal ditambahkan');
	}
}

/* End of file Api.php */
