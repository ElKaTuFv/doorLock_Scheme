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

        $dataReg_id = $this->universal->getMulti('', 'reg_id');
        if (count($dataReg_id) == 0) {
            $data = ['rfid_id' => $rfid];
            $insertReg = $this->M_Api->insertReg($data);
        } else {
            $data = ['rfid_id' => $rfid];
            $insertReg = $this->M_Api->updateReg(['rfid_id' => $dataReg_id[0]->rfid_id], $data);
        }

        $dataUser = $this->universal->getOne(['rfid_id' => $rfid], 'user');
        if ($dataUser) {

            $tanggal = date("Y-m-d", strtotime(str_replace("-", "/", $this->input->get('tanggal'))));
            $data = [
                'rfid_id' => $rfid,
                'waktu'   => $this->input->get('waktu'),
                'tanggal'   => $tanggal,
            ];
            $insertLog = $this->M_Api->insertLog($data);
        }

        if ($insertReg && $insertLog) {
            header('Content-Type: application/json');
            echo json_encode('data berhasil ditambahkan');
        } else {
            echo json_encode('data gagal ditambahkan');
        }
    }
}

/* End of file Api.php */
