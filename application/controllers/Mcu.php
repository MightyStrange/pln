<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mcu extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('McuModel'); // Gantilah 'McuModel' sesuai dengan model yang sesuai untuk tabel 'mcu'
        $this->load->library('pdf');
    }

    public function cetak()
    {
        $data['mcu'] = $this->McuModel->get_mcu(); // Gantilah 'get_mcu' sesuai dengan metode yang sesuai di model
        $this->load->view('mcu/mcu_print', $data); // Pastikan view 'mcu_print' ada dan sesuai
    }

    public function index()
    {
        $data['title'] = "MCU | PLTU Asam Asam";
        $data['mcu'] = $this->McuModel->get_mcu();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('mcu/mcu_read', $data); // Pastikan view 'mcu_read' ada dan sesuai
        $this->load->view('template/footer');
    }

    public function tambah()
    {
        if (isset($_POST['create'])) {
            $this->McuModel->insert_mcu();
            redirect('mcu');
        } else {
            $data['title'] = "Tambah Data MCU | PLTU Asam Asam";
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('mcu/mcu_create'); // Pastikan view 'mcu_create' ada dan sesuai
            $this->load->view('template/footer');
        }
    }

    public function ubah($id)
    {
        if (isset($_POST['update'])) {
            $this->McuModel->update_mcu();
            redirect('mcu');
        } else {
            $data['title'] = "Edit Data MCU | PLTU Asam Asam";
            $data['mcu'] = $this->McuModel->get_mcu_byid($id);
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('mcu/mcu_update', $data); // Pastikan view 'mcu_update' ada dan sesuai
            $this->load->view('template/footer');
        }
    }

    public function hapus($id)
    {
        if (isset($id)) {
            $this->McuModel->delete_mcu($id);
            redirect('mcu');
        }
    }
}
