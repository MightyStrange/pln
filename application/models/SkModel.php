<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SkModel extends CI_Model
{
    private $table = "sk"; // Ganti nama tabel sesuai dengan tabel sk di database Anda

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

    public function get_sk()
    {
        $this->db->order_by('nama','ASC');
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function insert_sk()
    {
        $data = [
            'no_sk' => $this->input->post('no_sk'),
            'nama' => $this->input->post('nama'),
            'nipeg' => $this->input->post('nipeg'),
            'tanggal_pembuatan_sk' => $this->input->post('tanggal_pembuatan_sk'),
            'tanggal_berlaku' => $this->input->post('tanggal_berlaku'),
            'upload_dokumen' => $this->uploadFile()
        ];

        $this->db->insert($this->table, $data);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('pesan', "Data SK berhasil ditambahkan!");
            $this->session->set_flashdata('status', true);
            return true;
        } else {
            $this->session->set_flashdata('pesan', "Data SK gagal ditambahkan!");
            $this->session->set_flashdata('status', false);
            return false;
        }
    }

    public function get_sk_byid($id)
    {
        return $this->db->get_where($this->table, ['id_sk' => $id])->row();
    }

    public function update_sk()
    {
        $data = [
            'no_sk' => $this->input->post('no_sk'),        
            'nama' => $this->input->post('nama'),
            'nipeg' => $this->input->post('nipeg'),
            'tanggal_pembuatan_sk' => $this->input->post('tanggal_pembuatan_sk'),
            'tanggal_berlaku' => $this->input->post('tanggal_berlaku')
        ];

        // Periksa apakah ada file yang diunggah
        if (!empty($_FILES['upload_dokumen']['name'])) {
            $data['upload_dokumen'] = $this->uploadFile();
        }

        $this->db->where('id_sk', $this->input->post('id_sk'));
        $this->db->update($this->table, $data);

        if ($this->db->affected_rows() > 0) {
        $this->session->set_flashdata('pesan', "Data SK berhasil diubah!");
        $this->session->set_flashdata('status', true);
        return true;
    } else {
        $this->session->set_flashdata('pesan', "Data SK gagal diubah!");
        $this->session->set_flashdata('status', false);
        return false;
    }
    }

    public function delete_sk($id)
    {
        $this->db->where('id_sk', $id);
        $this->db->delete($this->table);

        if ($this->db->affected_rows() > 0) {
        $this->session->set_flashdata('pesan', "Data SK berhasil dihapus!");
        $this->session->set_flashdata('status', true);
        return true;
    } else {
        $this->session->set_flashdata('pesan', "Data SK gagal dihapus!");
        $this->session->set_flashdata('status', false);
        return false;
    }
    }

    private function uploadFile()
    {
        $config['upload_path'] = 'upload/file_sk/'; // Sesuaikan dengan folder penyimpanan dokumen
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
