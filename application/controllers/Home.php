<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index()
    {
        $data['title'] = "Dashboard | PLTU Asam Asam";
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('home_view');
        $this->load->view('template/footer');
    }
}
