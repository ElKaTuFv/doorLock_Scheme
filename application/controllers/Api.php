<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model("M_Api");
    }

    //user
    public function index_user()
    {
        $this->load->view('data/inputUser');
    }
    public function getAllUser()
    {
        $data = $this->M_Api->getAllUser();

        header("Content-Type: application/json");

        echo json_encode($data);
    }

    public function getUserId($id)
    {
        $data = $this->M_Api->getUserId($id);

        header("Content-Type: application/json");
        echo json_encode($data);
    }

    public function post_user()
    {
        $this->form_validation->set_rules("rfid_id", "RFID ID", "required", [
            "required" => "Wajib Diisi!"
        ]);
        $this->form_validation->set_rules("nama", "Nama", "required", [
            "required" => "Wajib Diisi!"
        ]);
        if (!$this->form_validation->run()) {
            $this->load->view("data/inputUser");
        } else {
            $data = [
                "rfid_id"   => $this->input->post("rfid_id"),
                "nama"      => $this->input->post("nama"),
            ];
            $insert = $this->M_Api->insertUser($data);
            header("Content-Type: application/json");
            if ($insert) {
                $respons = [
                    "status"    => "success",
                    "message"   => "Data user berhasil disimpan",
                    "data"      => $data
                ];
                echo json_encode($respons);
            } else {
                $respons = [
                    "status"    => "error",
                    "message"   => "Data user gagal disimpan",
                ];
                echo json_encode($respons);
            }
        }
    }
    public function put_user($id)
    {
        $rfid = $this->input->post('rfid_id');
        $nama = $this->input->post('nama');

        if ($rfid && $nama) {

            $data = [
                "rfid_id"   => $rfid,
                "nama"      => $nama,
            ];

            $update = $this->M_Api->updateUser($data, $id);
            header('Content-Type: application/json');
            if ($update) {
                $response = array(
                    "status"    => "success",
                    "message"   => "Data berhasil diperbarui",
                    "data"      => $data
                );
                echo json_encode($response);
            } else {
                $response = array(
                    "status"    => "error",
                    "message"   => "Gagal memperbarui data"
                );
                echo json_encode($response);
            }
        } else {
            // header('Content-Type: application/json');
            echo json_encode(array("status" => "error", "message" => "Data tidak lengkap"));

            $data['user'] = $this->M_Api->getUserId($id);
            $this->load->view('data/updateUser', $data);
        }
    }

    public function delete_user($id)
    {
        $delete = $this->M_Api->deleteUser($id);
        if ($delete) {
            echo json_encode('Data User Berhasil dihapus');
        } else {
            echo json_encode('Data User Gagal dihapus');
        }
    }

    //log

    public function index_log()
    {
        $this->load->view('data/inputlog');
    }

    public function getAllLog()
    {
        $data = $this->M_Api->getAllLog();

        header("Content-Type: application/json");

        echo json_encode($data);
    }

    public function getLogId($id)
    {
        $data = $this->M_Api->getLogId($id);

        header("Content-Type: application/json");
        echo json_encode($data);
    }

    public function postlog()
    {
        $this->form_validation->set_rules("rfid_id", "RFID ID", "required", [
            "required" => "Wajib Diisi!"
        ]);
        $this->form_validation->set_rules("waktu", "Waktu Akses", "required", [
            "required" => "Wajib Diisi!"
        ]);
        if (!$this->form_validation->run()) {
            $this->load->view("data/inputLog");
        } else {
            $rfid       = $this->input->post("rfid_id");

            $cekRFID    = $this->M_Api->getRfid_Id($rfid);

            if (!$cekRFID) {
                echo json_encode(array("status" => "error", "message" => "RFID ID Tidak Terdaftar"));
                exit();
            } else {
                $cekStatus = $this->M_Api->getLastLog();

                if ($cekStatus) {
                    if ($cekStatus->status == 'Terbuka') {
                        $status = 'Tertutup';
                    } else {
                        $status = 'Terbuka';
                    }
                } else {
                    $status = 'Terbuka';
                }

                $data = [
                    "rfid_id"   => $rfid,
                    "waktu"      => $this->input->post("waktu"),
                    "status"      => $status,
                ];
                $insert = $this->M_Api->insertLog($data);
                header("Content-Type: application/json");
                if ($insert) {
                    $respons = [
                        "status"    => "success",
                        "message"   => "Data Log Telah Dicatat",
                        "data"      => $data
                    ];
                    echo json_encode($respons);
                } else {
                    $respons = [
                        "status"    => "error",
                        "message"   => "Data Log gagal dicatat",
                    ];
                    echo json_encode($respons);
                }
            }
        }
    }
    public function put_log($id)
    {
        $rfid = $this->input->post('rfid_id');
        $waktu = $this->input->post('waktu');

        if ($rfid && $waktu) {

            $cekRFID    = $this->M_Api->getUserId($rfid);

            if (!$cekRFID) {
                echo json_encode(array("status" => "error", "message" => "RFID ID Tidak Terdaftar"));
                exit();
            } else {
                $data = [
                    "rfid_id"   => $rfid,
                    "waktu"      => $waktu,
                    "status"      => $this->input->post('status'),
                ];

                $update = $this->M_Api->updateLog($data, $id);
                header("Content-Type: application/json");
                if ($update) {
                    $respons = [
                        "status"    => "success",
                        "message"   => "Data Log Telah diperbarui",
                        "data"      => $data
                    ];
                    echo json_encode($respons);
                } else {
                    $respons = [
                        "status"    => "error",
                        "message"   => "Data Log gagal diperbarui",
                    ];
                    echo json_encode($respons);
                }
            }
        } else {
            // header('Content-Type: application/json');
            echo json_encode(array("status" => "error", "message" => "Data tidak lengkap"));

            $data['log'] = $this->M_Api->getLogId($id);
            $this->load->view('data/updateLog', $data);
        }
    }

    public function delete_log($id)
    {
        $delete = $this->M_Api->deleteLog($id);
        if ($delete) {
            echo json_encode('Data Log Berhasil dihapus');
        } else {
            echo json_encode('Data Log Gagal dihapus');
        }
    }
}
