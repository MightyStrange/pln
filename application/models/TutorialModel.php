<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TutorialModel extends CI_Model
{
    protected $table = 'tutorial'; // Nama tabel

    // Fungsi untuk mengambil semua data tutorial
    public function get_tutorial_data()
    {
        return $this->db->get($this->table)->result(); // Mengambil semua data dari tabel
    }

    // Fungsi untuk mengambil data tutorial berdasarkan ID
    public function get_tutorial_data_byid($id)
    {
        return $this->db->get_where($this->table, ['id_tutorial' => $id])->row(); // Mengambil data berdasarkan ID
    }

    // Fungsi untuk menambah data tutorial
    public function insert_tutorial_data()
    {
        $data = [
            'nama_tutorial' => $this->input->post('nama_tutorial', true), // Menggunakan XSS filtering
            'tahun' => $this->input->post('tahun', true),
            'upload_dokumen' => $this->uploadFile(),
        ];

        $this->db->insert($this->table, $data);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('pesan', "Data Tutorial berhasil ditambahkan!");
            $this->session->set_flashdata('status', true);
            return true;
        } else {
            $this->session->set_flashdata('pesan', "Data Tutorial gagal ditambahkan!");
            $this->session->set_flashdata('status', false);
            return false;
        }
    }

    // Fungsi untuk memperbarui data tutorial
    public function update_tutorial_data()
    {
        $id = $this->input->post('id_tutorial', true);
        $data = [
            'nama_tutorial' => $this->input->post('nama_tutorial', true),
            'tahun' => $this->input->post('tahun', true),
            'upload_dokumen' => $this->uploadFile() ?: $this->input->post('upload_dokumen_lama', true),
        ];

        $this->db->where('id_tutorial', $id)->update($this->table, $data);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('pesan', "Data Tutorial berhasil diperbarui!");
            $this->session->set_flashdata('status', true);
            return true;
        } else {
            $this->session->set_flashdata('pesan', "Data Tutorial gagal diperbarui!");
            $this->session->set_flashdata('status', false);
            return false;
        }
    }

    // Fungsi untuk menghapus data tutorial berdasarkan ID
	public function delete_tutorial_data($id)
	{
		$this->db->where('id_tutorial', $id);
		$this->db->delete($this->table); // Menghapus data sesuai dengan $id
	
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('pesan', "Data Tutorial berhasil dihapus!");
			$this->session->set_flashdata('status', true);
			return true;
		} else {
			$this->session->set_flashdata('pesan', "Data Tutorial gagal dihapus!");
			$this->session->set_flashdata('status', false);
			return false;
		}
	}
	

    // Fungsi untuk upload file dokumen
    private function uploadFile()
    {
        $config['upload_path'] = './upload/file_tutorial/';
        $config['allowed_types'] = 'pdf|doc|docx';
        $config['max_size'] = 2048;

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
