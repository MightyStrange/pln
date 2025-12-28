<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load library atau helper yang dibutuhkan
        $this->load->library('session');
    }

    public function logout() {
    // Hancurkan session
    $this->session->sess_destroy();

    // Set flashdata untuk notifikasi
    $this->session->set_flashdata('success', 'Anda telah berhasil logout.');

    // Redirect ke halaman login atau halaman lain yang sesuai
    redirect('login');
}

}
