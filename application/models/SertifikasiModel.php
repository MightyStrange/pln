<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SertifikasiModel extends CI_Model
{
    private $table = "sertifikasi"; // Ganti nama tabel sesuai dengan tabel sertifikasi di database Anda

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

	
    public function get_sertifikasi_data()
    {
        $this->db->order_by('nama_sertifikasi','ASC');
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function insert_sertifikasi()
    {
        $data = [
            'nama' => $this->input->post('nama'),
            'nipeg' => $this->input->post('nipeg'),
            'nama_sertifikasi' => $this->input->post('nama_sertifikasi'),
            'tanggal_pelaksanaan' => $this->input->post('tanggal_pelaksanaan'),
            'tanggal_expired' => $this->input->post('tanggal_expired'),
            'lembaga_penyelenggara' => $this->input->post('lembaga_penyelenggara'),
            'upload_dokumen' => $this->uploadFile()
        ];

        $this->db->insert($this->table, $data);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('pesan', "Data Sertifikasi berhasil ditambahkan!");
            $this->session->set_flashdata('status', true);
            return true;
        } else {
            $this->session->set_flashdata('pesan', "Data Sertifikasi gagal ditambahkan!");
            $this->session->set_flashdata('status', false);
            return false;
        }
    }

    public function get_sertifikasi_byid($id)
    {
        return $this->db->get_where($this->table, ['id_sertifikasi' => $id])->row();
    }

    public function update_sertifikasi()
    {
        $data = [
            'nama' => $this->input->post('nama'),
            'nipeg' => $this->input->post('nipeg'),
            'nama_sertifikasi' => $this->input->post('nama_sertifikasi'),
            'tanggal_pelaksanaan' => $this->input->post('tanggal_pelaksanaan'),
            'tanggal_expired' => $this->input->post('tanggal_expired'),
            'lembaga_penyelenggara' => $this->input->post('lembaga_penyelenggara')
        ];

        // Periksa apakah ada file yang diunggah
        if (!empty($_FILES['upload_dokumen']['name'])) {
            $data['upload_dokumen'] = $this->uploadFile();
        }

        $this->db->where('id_sertifikasi', $this->input->post('id_sertifikasi'));
        $this->db->update($this->table, $data);

        if ($this->db->affected_rows() > 0) {
        $this->session->set_flashdata('pesan', "Data Sertifikasi berhasil diubah!");
        $this->session->set_flashdata('status', true);
        return true;
    } else {
        $this->session->set_flashdata('pesan', "Data Sertifikasi gagal diubah!");
        $this->session->set_flashdata('status', false);
        return false;
    }

    }

    public function delete_sertifikasi($id)
    {
        $this->db->where('id_sertifikasi', $id);
        $this->db->delete($this->table);

        if ($this->db->affected_rows() > 0) {
        $this->session->set_flashdata('pesan', "Data Sertifikasi berhasil dihapus!");
        $this->session->set_flashdata('status', true);
        return true;
    } else {
        $this->session->set_flashdata('pesan', "Data Sertifikasi gagal dihapus!");
        $this->session->set_flashdata('status', false);
        return false;
    }
    }

    private function uploadFile()
    {
        $config['upload_path'] = './upload/file_sertifikasi/'; // Sesuaikan dengan folder penyimpanan dokumen
        $config['allowed_types'] = 'pdf|doc|docx'; // Sesuaikan dengan jenis file yang diizinkan
        $config['max_size'] = 2048; // Sesuaikan dengan ukuran maksimum file (dalam kilobyte)

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('upload_dokumen')) {
            return $this->upload->data('file_name');
        } else {
            $this->session->set_flashdata('pesan', $this->upload->display_errors());
            $this->session->set_flashdata('status', false);
            return false;
        }
    }
}
