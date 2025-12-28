<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TutorialData extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('TutorialModel'); // Load model
    }

	public function cetak()
    {
        $data['tutorial'] = $this->TutorialModel->get_tutorial_data(); 
        $this->load->view('tutorial/tutorial_print', $data); 
    }

    // Function untuk menampilkan data tutorial
    public function index()
    {
        $data['title'] = "Data Tutorial";
        $data['tutorial'] = $this->TutorialModel->get_tutorial_data(); // Ambil data dari model
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('tutorial/tutorial_read', $data); // Tampilkan view
        $this->load->view('template/footer');
    }

    // Function untuk menambah data
    public function tambah()
    {
        if (isset($_POST['create'])) {
            $this->TutorialModel->insert_tutorial_data(); // Panggil fungsi insert dari model
            redirect('TutorialData');
        } else {
            $data['title'] = "Tambah Data MCU | PLTU Asam Asam";
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('tutorial/tutorial_create'); // Tampilkan view untuk tambah data
            $this->load->view('template/footer');
        }
    }

	

    // Function untuk memperbarui data
    public function ubah($id)
    {
        if (isset($_POST['update'])) {
            $this->TutorialModel->update_tutorial_data(); // Panggil fungsi update dari model
            redirect('TutorialData');
        } else {
            $data['title'] = "Edit Data Tutorial";
            $data['tutorial'] = $this->TutorialModel->get_tutorial_data_byid($id); // Ambil data tutorial berdasarkan ID
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('tutorial/tutorial_update', $data); // Tampilkan view untuk edit data
            $this->load->view('template/footer');
        }
    }

    // Function untuk menghapus data
    public function hapus($id)
{
    if ($this->TutorialModel->delete_tutorial_data($id)) {
        $this->session->set_flashdata('pesan', 'Data berhasil dihapus.');
    } else {
        $this->session->set_flashdata('pesan', 'Data gagal dihapus.');
    }
    redirect('TutorialData');
}

}
