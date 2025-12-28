<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('SkModel'); // Sesuaikan dengan model yang sesuai untuk tabel 'sk'
        $this->load->library('pdf');
    }

    public function cetak()
    {
        $data['sk'] = $this->SkModel->get_sk(); // Sesuaikan dengan metode yang sesuai di model
        $this->load->view('sk/sk_print', $data); // Pastikan view 'sk_print' ada dan sesuai
    }

    public function index()
    {
        $data['title'] = "SK | PLTU Asam Asam";
        $data['sk'] = $this->SkModel->get_sk();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('sk/sk_read', $data); // Pastikan view 'sk_read' ada dan sesuai
        $this->load->view('template/footer');
    }

    public function tambah()
    {
        if (isset($_POST['create'])) {
            $this->SkModel->insert_sk();
            redirect('sk');
        } else {
            $data['title'] = "Tambah Data SK | PLTU Asam Asam";
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('sk/sk_create'); // Pastikan view 'sk_create' ada dan sesuai
            $this->load->view('template/footer');
        }
    }

    public function ubah($id)
    {
        if (isset($_POST['update'])) {
            $this->SkModel->update_sk();
            redirect('sk');
        } else {
            $data['title'] = "Edit Data SK | PLTU Asam Asam";
            $data['sk'] = $this->SkModel->get_sk_byid($id);
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('sk/sk_update', $data); // Pastikan view 'sk_update' ada dan sesuai
            $this->load->view('template/footer');
        }
    }

    public function hapus($id)
    {
        if (isset($id)) {
            $this->SkModel->delete_sk($id);
            redirect('sk');
        }
    }
}
