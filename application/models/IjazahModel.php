<?php
defined('BASEPATH') or exit('No direct script access allowed');

class IjazahModel extends CI_Model
{
    private $table = "ijazah";

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

    public function get_ijazah()
    {
        $this->db->order_by('nama','ASC');
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function insert_ijazah()
    {
        $data = [

			'nama' => $this->input->post('nama'),
            'nama_sekolah' => $this->input->post('nama_sekolah'),
            'pendidikan' => $this->input->post('pendidikan'),
            'tahun_masuk' => $this->input->post('tahun_masuk'),
            'tahun_lulus' => $this->input->post('tahun_lulus'),
            'upload_dokumen' => $this->uploadFile()
        ];

        $this->db->insert($this->table, $data);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('pesan', "Data IJAZAH berhasil ditambahkan!");
            $this->session->set_flashdata('status', true);
            return true;
        } else {
            $this->session->set_flashdata('pesan', "Data IJAZAH gagal ditambahkan!");
            $this->session->set_flashdata('status', false);
            return false;
        }
    }

    public function get_ijazah_byid($id)
    {
        return $this->db->get_where($this->table, ['id_ijazah' => $id])->row();
    }

   public function update_ijazah()
    {
    $data = [
			'nama' => $this->input->post('nama'),
       	    'nama_sekolah' => $this->input->post('nama_sekolah'),
            'pendidikan' => $this->input->post('pendidikan'),
            'tahun_masuk' => $this->input->post('tahun_masuk'),
            'tahun_lulus' => $this->input->post('tahun_lulus')
    ];

    if (!empty($_FILES['upload_dokumen']['name'])) {
        $data['upload_dokumen'] = $this->uploadFile();
    }

    $this->db->where('id_ijazah', $this->input->post('id_ijazah'));
    $this->db->update($this->table, $data);

    if ($this->db->affected_rows() > 0) {
        $this->session->set_flashdata('pesan', "Data IJAZAH berhasil diubah!");
        $this->session->set_flashdata('status', true);
        return true;
    } else {
        $this->session->set_flashdata('pesan', "Data IJAZAH gagal diubah!");
        $this->session->set_flashdata('status', false);
        return false;
    }

    }

    public function delete_ijazah($id)
    {
        $this->db->where('id_ijazah', $id);
        $this->db->delete($this->table);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('pesan', "Data IJAZAH berhasil dihapus!");
            $this->session->set_flashdata('status', true);
            return true;
        } else {
            $this->session->set_flashdata('pesan', "Data IJAZAH gagal dihapus!");
            $this->session->set_flashdata('status', false);
            return false;
        }
    }

    private function uploadFile()
    {
        $config['upload_path'] = './upload/file_ijazah/'; // Sesuaikan dengan folder penyimpanan dokumen
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
