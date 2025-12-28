<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendaftaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('PendaftaranModel');
    }

    public function index()
    {
        $data['title'] = "Hal Pendaftaran | PLTU Asam Asam";
        $this->load->view('pendaftaran/daftar_create');
    }

    public function proses_pendaftaran()
    {
        $data = array(
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'nipeg' => $this->input->post('nipeg'),
            'nama_karyawan' => $this->input->post('nama_karyawan'),
            'unit' => $this->input->post('unit'),
            'divisi' => $this->input->post('divisi'),
            'email' => $this->input->post('email')
        );

        $result = $this->PendaftaranModel->daftar_pengguna($data);

        if ($result) {
            redirect('login');
        } else {
            redirect('pendaftaran');
        }
    }
}
