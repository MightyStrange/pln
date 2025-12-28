<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KaryawanModel extends CI_Model
{
    private $table = "karyawan"; // Ganti nama tabel sesuai dengan tabel karyawan di database Anda

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

    public function get_karyawan()
    {
        $this->db->order_by('nama_karyawan', 'ASC');
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function insert_karyawan()
    {
        $data = [
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')), // Disarankan menggunakan hashing untuk keamanan password
            'nipeg' => $this->input->post('nipeg'),
            'nama_karyawan' => $this->input->post('nama_karyawan'),
            'unit' => $this->input->post('unit'),
            'divisi' => $this->input->post('divisi'),
            'email' => $this->input->post('email'),
            'level' => $this->input->post('level')
        ];

        $this->db->insert($this->table, $data);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('pesan', "Data karyawan berhasil ditambahkan!");
            $this->session->set_flashdata('status', true);
            return true;
        } else {
            $this->session->set_flashdata('pesan', "Data karyawan gagal ditambahkan!");
            $this->session->set_flashdata('status', false);
            return false;
        }
    }

    public function get_karyawan_byid($id)
    {
        return $this->db->get_where($this->table, ['id' => $id])->row();
    }

    public function update_karyawan()
    {
        $data = [
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')),
            'nipeg' => $this->input->post('nipeg'),
            'nama_karyawan' => $this->input->post('nama_karyawan'),
            'unit' => $this->input->post('unit'),
            'divisi' => $this->input->post('divisi'),
            'email' => $this->input->post('email'),
            'level' => $this->input->post('level')
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update($this->table, $data);
    }

    public function delete_karyawan($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->table);

        if ($this->db->affected_rows() > 0) {
        $this->session->set_flashdata('pesan', "Data Karyawan berhasil dihapus!");
        $this->session->set_flashdata('status', true);
        return true;
    } else {
        $this->session->set_flashdata('pesan', "Data Karyawan gagal dihapus!");
        $this->session->set_flashdata('status', false);
        return false;
    }
    }

}
