<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KtpModel extends CI_Model
{
    private $table = "ktp";

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

    public function get_ktp()
    {
        $this->db->order_by('nama','ASC');
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function insert_ktp()
    {
        $data = [
            'no_ktp' => $this->input->post('no_ktp'),
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'upload_dokumen' => $this->uploadFile()
        ];
        
        $this->db->insert($this->table, $data);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('pesan', "Data KTP berhasil ditambahkan!");
            $this->session->set_flashdata('status', true);
            return true;
        } else {
            $this->session->set_flashdata('pesan', "Data KTP gagal ditambahkan!");
            $this->session->set_flashdata('status', false);
            return false;
        }
    }

    public function get_ktp_byid($id)
    {
        return $this->db->get_where($this->table, ['id_ktp' => $id])->row();
    }

    public function update_ktp()
    {
        $data = [
            'no_ktp' => $this->input->post('no_ktp'),
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
        ];

        
        if (!empty($_FILES['upload_dokumen']['name'])) {
            $data['upload_dokumen'] = $this->uploadFile();
        }

        $this->db->where('id_ktp', $this->input->post('id_ktp'));
        $this->db->update($this->table, $data);

        if ($this->db->affected_rows() > 0) {
        $this->session->set_flashdata('pesan', "Data KTP berhasil diubah!");
        $this->session->set_flashdata('status', true);
        return true;
    } else {
        $this->session->set_flashdata('pesan', "Data KTP gagal diubah!");
        $this->session->set_flashdata('status', false);
        return false;
    }
    }

    public function delete_ktp($id)
    {
        $this->db->where('id_ktp', $id);
        $this->db->delete($this->table);

        if ($this->db->affected_rows() > 0) {
        $this->session->set_flashdata('pesan', "Data KTP berhasil dihapus!");
        $this->session->set_flashdata('status', true);
        return true;
    } else {
        $this->session->set_flashdata('pesan', "Data KTP gagal dihapus!");
        $this->session->set_flashdata('status', false);
        return false;
    }
    }
    private function uploadFile()
    {
        $config['upload_path'] = './upload/file_ktp/'; // Sesuaikan dengan folder penyimpanan dokumen
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