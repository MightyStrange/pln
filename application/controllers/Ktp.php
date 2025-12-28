<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ktp extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('KtpModel'); // Sesuaikan dengan model yang sesuai untuk tabel 'ktp'
        $this->load->library('pdf');
    }

    public function cetak()
    {
        $data['ktp'] = $this->KtpModel->get_ktp(); // Sesuaikan dengan metode yang sesuai di model
        $this->load->view('ktp/ktp_print', $data); // Pastikan view 'ktp_print' ada dan sesuai
    }

    public function index()
    {
        $data['title'] = "KTP | PLTU Asam Asam";
        $data['ktp'] = $this->KtpModel->get_ktp();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('ktp/ktp_read', $data); // Pastikan view ktp_read' ada dan sesuai
        $this->load->view('template/footer');
    }

    public function tambah()
    {
        if (isset($_POST['create'])) {
            $this->KtpModel->insert_ktp();
            redirect('ktp');
        } else {
            $data['title'] = "Tambah Data KTP | PLTU Asam Asam";
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('ktp/ktp_create'); // Pastikan view 'ktp_create' ada dan sesuai
            $this->load->view('template/footer');
        }
    }

    public function ubah($id)
    {
        if (isset($_POST['update'])) {
            $this->KtpModel->update_ktp();
            redirect('ktp');
        } else {
            $data['title'] = "Edit Data KTP | PLTU Asam Asam";
            $data['ktp'] = $this->KtpModel->get_ktp_byid($id);
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('ktp/ktp_update', $data); // Pastikan view 'ktp_update' ada dan sesuai
            $this->load->view('template/footer');
        }
    }

    public function hapus($id)
    {
        if (isset($id)) {
            $this->KtpModel->delete_ktp($id);
            redirect('ktp');
        }
    }
}
