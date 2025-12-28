<?php

class LoginModel extends CI_Model
{
    private $table_pengguna = "karyawan";

    public function cek_login()
    {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));

        $cek = $this->db->get_where($this->table_pengguna, ['username' => $username, 'password' => $password]);

        if ($cek->num_rows() > 0) {
            $data_login = $cek->row();

            $return = [
                'status' => true,
                'data_login' => $data_login,
                'nipeg' => $data_login->nipeg,
                'nama_karyawan' => $data_login->nama_karyawan,
                'unit' => $data_login->unit,
                'divisi' => $data_login->divisi,
                'email' => $data_login->email,
                'level' => $data_login->level,
            ];
        } else {
            $return = ['status' => false, 'pesan' => 'Username dan Password tidak ditemukan dalam sistem!'];
        }

        return $return;
    }
}
