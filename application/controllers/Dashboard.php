<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load model jika diperlukan
        // $this->load->model('DashboardModel');

        // Periksa apakah session nama karyawan ada
        if (!$this->session->userdata('nama_karyawan')) {
            // Jika tidak ada, redirect ke halaman login
            redirect('login');
        }
    }

    public function index() {
        // Ambil session nama karyawan
        $nama_karyawan = $this->session->userdata('nama_karyawan');

        // Gunakan session nama karyawan di view
        $data['nama_karyawan'] = $nama_karyawan;

        // Tampilkan halaman dashboard dengan data session
        $this->load->view('dashboard', $data);
    }
}
