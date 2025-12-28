<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Model {

    public function getNamaKaryawan($id) {
        // Gantilah query sesuai dengan struktur tabel dan kolom Anda
        $query = $this->db->get_where('karyawan', array('id' => $id));
        $result = $query->row();

        return $result->nama_karyawan;
    }

}
