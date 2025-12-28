<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PendaftaranModel extends CI_Model
{
    private $tabel = "karyawan"; // Ganti nama tabel sesuai dengan tabel user di database Anda

    public function __construct()
    {
        parent::__construct();
    }

    public function daftar_pengguna($data)
    {
        // Cek apakah NIP/NIPEG sudah terdaftar
        if ($this->cek_nipeg($data['nipeg'])) {
            $this->session->set_flashdata('pesan', 'NIP/NIPEG sudah terdaftar.');
            return false;
        }

        // Cek apakah username sudah terdaftar
        if ($this->cek_username($data['username'])) {
            $this->session->set_flashdata('pesan', 'Username sudah terdaftar.');
            return false;
        }

        // Cek apakah email sudah terdaftar
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $this->session->set_flashdata('pesan', 'Format email tidak valid.');
        return false;
        }

        // Jika NIP/NIPEG, username, dan email belum terdaftar, lakukan pendaftaran
        $data['password'] = md5($data['password']); // Enkripsi password dengan MD5
        $data['level'] = 'user'; // Tambahkan level user

        $this->db->insert($this->tabel, $data);

       if ($this->db->affected_rows() > 0) {
        $this->session->set_flashdata('pesan', 'Registrasi berhasil. Silakan login.');
        $this->session->set_flashdata('status', 'success'); // Tambahkan ini
        return true;
        } 
        else {
        $this->session->set_flashdata('pesan', 'Registrasi gagal. Silakan coba lagi.');
        $this->session->set_flashdata('status', 'error'); // Tambahkan ini
        return false;
        }

    }

    public function cek_nipeg($nipeg)
    {
        $query = $this->db->get_where($this->tabel, ['nipeg' => $nipeg]);

        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function cek_username($username)
    {
        $query = $this->db->get_where($this->tabel, ['username' => $username]);

        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function cek_email($email)
    {
        $query = $this->db->get_where($this->tabel, ['email' => $email]);

        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
