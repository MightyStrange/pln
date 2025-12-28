<?php
defined('BASEPATH') or exit('No direct script access allowed');

class McuModel extends CI_Model
{
    private $table = "mcu"; // Ganti nama tabel sesuai dengan tabel mcu di database Anda

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

    public function get_mcu()
    {
        $this->db->order_by('nama','ASC');
        $query = $this->db->get($this->table);
        return $query->result();
    }

	    public function insert_mcu()
    {
        $data = [

            'nama' => $this->input->post('nama'),
            'nipeg' => $this->input->post('nipeg'),
            'tahun_pelaksanaan' => $this->input->post('tahun_pelaksanaan'),
            'kesimpulan_pemeriksaan' => $this->input->post('kesimpulan_pemeriksaan'),
            'saran' => $this->input->post('saran'),
            'upload_dokumen' => $this->uploadFile()
        ];

        $this->db->insert($this->table, $data);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('pesan', "Data MCU berhasil ditambahkan!");
            $this->session->set_flashdata('status', true);
            return true;
        } else {
            $this->session->set_flashdata('pesan', "Data MCU gagal ditambahkan!");
            $this->session->set_flashdata('status', false);
            return false;
        }
    }

    public function get_mcu_byid($id)
    {
        return $this->db->get_where($this->table, ['id_mcu' => $id])->row();
    }

   public function update_mcu()
    {
    $data = [
        'nama' => $this->input->post('nama'),
        'nipeg' => $this->input->post('nipeg'),
        'tahun_pelaksanaan' => $this->input->post('tahun_pelaksanaan'),
        'kesimpulan_pemeriksaan' => $this->input->post('kesimpulan_pemeriksaan'),
        'saran' => $this->input->post('saran')
    ];

    // Periksa apakah ada file yang diunggah
    if (!empty($_FILES['upload_dokumen']['name'])) {
        $data['upload_dokumen'] = $this->uploadFile();
    }

    $this->db->where('id_mcu', $this->input->post('id_mcu'));
    $this->db->update($this->table, $data);

    if ($this->db->affected_rows() > 0) {
        $this->session->set_flashdata('pesan', "Data MCU berhasil diubah!");
        $this->session->set_flashdata('status', true);
        return true;
    } else {
        $this->session->set_flashdata('pesan', "Data MCU gagal diubah!");
        $this->session->set_flashdata('status', false);
        return false;
    }

    }

    public function delete_mcu($id)
    {
        $this->db->where('id_mcu', $id);
        $this->db->delete($this->table);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('pesan', "Data MCU berhasil dihapus!");
            $this->session->set_flashdata('status', true);
            return true;
        } else {
            $this->session->set_flashdata('pesan', "Data MCU gagal dihapus!");
            $this->session->set_flashdata('status', false);
            return false;
        }
    }


    private function uploadFile()
    {
        $config['upload_path'] = './upload/file_mcu/'; // Sesuaikan dengan folder penyimpanan dokumen
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
