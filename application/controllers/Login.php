<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('LoginModel');
    }


    public function index()
    {
        if (isset($_POST['btn_login'])) {
            $cek_login = $this->LoginModel->cek_login();
            if ($cek_login['status'] == true) {
                // Jangan menyimpan password dalam session
                $data = [
                    'id' => $cek_login['data_login']->id,
                    'username' => $cek_login['data_login']->username,
                    'nipeg' => $cek_login['data_login']->nipeg,
                    'nama_karyawan' => $cek_login['data_login']->nama_karyawan,
                    'unit' => $cek_login['data_login']->unit,
                    'divisi' => $cek_login['data_login']->divisi,
                    'email' => $cek_login['data_login']->email,
                    'level' => $cek_login['data_login']->level,
                ];
                $this->session->set_userdata($data);
                redirect('home');
            } else {
                $this->session->set_flashdata('pesan', $cek_login['pesan']);
                $this->session->set_flashdata('status', false);
                redirect('login');
            }
        } else {
            $data['title'] = "Halaman Login | PLTU-Asam Asam";
            $this->load->view('login/login_view', $data);
        }
    }
}
