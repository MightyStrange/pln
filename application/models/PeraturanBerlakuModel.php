<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PeraturanBerlakuModel extends CI_Model
{
    private $table = "peraturan_berlaku";

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

    public function get_peraturan_berlaku()
    {
        $this->db->order_by('nama_peraturan','ASC');
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function insert_peraturan_berlaku()
    {
        $data = [

            'nama_peraturan' => $this->input->post('nama_peraturan'),
            'tahun_berlaku' => $this->input->post('tahun_berlaku'),
			'upload_dokumen' => $this->uploadFile()
        ];

        $this->db->insert($this->table, $data);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('pesan', "Data PERATURAN BERLAKU berhasil ditambahkan!");
            $this->session->set_flashdata('status', true);
            return true;
        } else {
            $this->session->set_flashdata('pesan', "Data PERATURAN BERLAKU gagal ditambahkan!");
            $this->session->set_flashdata('status', false);
            return false;
        }
    }

    public function get_peraturan_berlaku_byid($id)
    {
        return $this->db->get_where($this->table, ['id_peraturan' => $id])->row();
    }

   public function update_peraturan_berlaku()
    {
    $data = [
        'nama_peraturan' => $this->input->post('nama_peraturan'),
        'tahun_berlaku' => $this->input->post('tahun_berlaku'),
		'upload_dokumen' => $this->uploadFile()
    ];

    $this->db->where('id_peraturan', $this->input->post('id_peraturan'));
    $this->db->update($this->table, $data);

    if ($this->db->affected_rows() > 0) {
        $this->session->set_flashdata('pesan', "Data PERATURAN BERLAKU berhasil diubah!");
        $this->session->set_flashdata('status', true);
        return true;
    } else {
        $this->session->set_flashdata('pesan', "Data PERATURAN BERLAKU gagal diubah!");
        $this->session->set_flashdata('status', false);
        return false;
    }

    }

    public function delete_peraturan_berlaku($id)
    {
        $this->db->where('id_peraturan', $id);
        $this->db->delete($this->table);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('pesan', "Data PERATURAN BERLAKU berhasil dihapus!");
            $this->session->set_flashdata('status', true);
            return true;
        } else {
            $this->session->set_flashdata('pesan', "Data PERATURAN BERLAKU gagal dihapus!");
            $this->session->set_flashdata('status', false);
            return false;
        }
    }

	private function uploadFile()
    {
        $config['upload_path'] = './upload/file_peraturan/'; // Sesuaikan dengan folder penyimpanan dokumen
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
