<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peraturan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('PeraturanBerlakuModel'); 
        $this->load->library('pdf'); 
    }

    public function cetak()
    {
        $data['peraturan'] = $this->PeraturanBerlakuModel->get_peraturan_berlaku(); 
        $this->load->view('peraturan/peraturan_print', $data); 
    }

    public function index()
    {
        $data['title'] = "PERATURAN BERLAKU | PLTU Asam Asam";
        $data['peraturan'] = $this->PeraturanBerlakuModel->get_peraturan_berlaku();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('peraturan/peraturan_read', $data); 
        $this->load->view('template/footer');
    }

    public function tambah()
    {
        if (isset($_POST['create'])) {
            $this->PeraturanBerlakuModel->insert_peraturan_berlaku();
            redirect('peraturan');
        } else {
            $data['title'] = "Tambah Data MCU | PLTU Asam Asam";
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('peraturan/peraturan_create'); 
            $this->load->view('template/footer');
        }
    }

    public function ubah($id)
    {
        if (isset($_POST['update'])) {
            $this->PeraturanBerlakuModel->update_peraturan_berlaku();
            redirect('peraturan');
        } else {
            $data['title'] = "Edit Data PERATURAN BERLAKU | PLTU Asam Asam";
            $data['peraturan'] = $this->PeraturanBerlakuModel->get_peraturan_berlaku_byid($id);
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('peraturan/peraturan_update', $data);
            $this->load->view('template/footer');
        }
    }

    public function hapus($id)
    {
        if (isset($id)) {
            $this->PeraturanBerlakuModel->delete_peraturan_berlaku($id);
            redirect('peraturan');
        }
    }
}
