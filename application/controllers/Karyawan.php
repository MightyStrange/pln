<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('KaryawanModel');
        $this->load->library('pdf');
    }

    public function cetak()
    {
        $data['karyawan'] = $this->KaryawanModel->get_karyawan();
        $this->load->view('karyawan/karyawan_print', $data);
    }

    public function index()
    {
        $data['title'] = "Dashboard | PLTU Asam Asam";
        $data['karyawan'] = $this->KaryawanModel->get_karyawan();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('karyawan/karyawan_read', $data);
        $this->load->view('template/footer');
    }

    public function tambah()
    {
        if (isset($_POST['create'])) {
            $this->KaryawanModel->insert_karyawan();
            redirect('karyawan');
        } else {
            $data['title'] = "Tambah Data Karyawan | PLTU Asam Asam";
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('karyawan/karyawan_create');
            $this->load->view('template/footer');
        }
    }

    public function ubah($id)
    {
        if (isset($_POST['update'])) {
            $this->KaryawanModel->update_karyawan();
            redirect('karyawan');
        } else {
            $data['title'] = "Edit Data Karyawan | PLTU Asam Asam";
            $data['karyawan'] = $this->KaryawanModel->get_karyawan_byid($id);
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('karyawan/karyawan_update', $data);
            $this->load->view('template/footer');
        }
    }

    public function hapus($id)
    {
        if (isset($id)) {
            $this->KaryawanModel->delete_karyawan($id);
            redirect('karyawan');
        }
    }
   
}
