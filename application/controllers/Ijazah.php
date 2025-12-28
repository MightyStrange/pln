<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ijazah extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('IjazahModel'); 
        $this->load->library('pdf');
    }

    public function cetak()
    {
        $data['ijazah'] = $this->IjazahModel->get_ijazah(); 
        $this->load->view('ijazah/ijazah_print', $data); 
    }

    public function index()
    {
        $data['title'] = "IJAZAH | PLTU Asam Asam";
        $data['ijazah'] = $this->IjazahModel->get_ijazah();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('ijazah/ijazah_read', $data); 
        $this->load->view('template/footer');
    }

    public function tambah()
    {
        if (isset($_POST['create'])) {
            $this->IjazahModel->insert_ijazah();
            redirect('ijazah');
        } else {
            $data['title'] = "Tambah Data IJAZAH | PLTU Asam Asam";
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('ijazah/ijazah_create');
            $this->load->view('template/footer');
        }
    }

    public function ubah($id)
    {
        if (isset($_POST['update'])) {
            $this->IjazahModel->update_ijazah();
            redirect('ijazah');
        } else {
            $data['title'] = "Edit Data IJAZAH | PLTU Asam Asam";
            $data['ijazah'] = $this->IjazahModel->get_ijazah_byid($id);
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('ijazah/ijazah_update', $data);
            $this->load->view('template/footer');
        }
    }

    public function hapus($id)
    {
        if (isset($id)) {
            $this->IjazahModel->delete_ijazah($id);
            redirect('ijazah');
        }
    }
}
