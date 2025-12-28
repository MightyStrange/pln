<?php
defined('BASEPATH') or exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Sertifikasi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('SertifikasiModel'); // Sesuaikan dengan model yang sesuai untuk tabel 'sertifikasi'
        $this->load->library('pdf');
    }

	public function export_excel()
{
    // Load model sertifikasi
    $this->load->model('SertifikasiModel');
    $sertifikasi = $this->SertifikasiModel->get_sertifikasi_data();

    // Membuat object Spreadsheet baru
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Menambahkan header kolom
    $sheet->setCellValue('A1', 'NO');
    $sheet->setCellValue('B1', 'Nama');
    $sheet->setCellValue('C1', 'NIPEG');
    $sheet->setCellValue('D1', 'Nama Sertifikasi');
    $sheet->setCellValue('E1', 'Tanggal Pelaksanaan');
    $sheet->setCellValue('F1', 'Tanggal Expired');
    $sheet->setCellValue('G1', 'Lembaga Penyelenggara');
    $sheet->setCellValue('H1', 'Upload Dokumen');

    // Mengisi data sertifikasi
    $row = 2; // Baris dimulai dari 2 karena baris pertama untuk header
    $no = 1;
    foreach ($sertifikasi as $s) {
        $sheet->setCellValue('A' . $row, $no++);
        $sheet->setCellValue('B' . $row, $s->nama);
        $sheet->setCellValue('C' . $row, $s->nipeg);
        $sheet->setCellValue('D' . $row, $s->nama_sertifikasi);
        $sheet->setCellValue('E' . $row, $s->tanggal_pelaksanaan);
        $sheet->setCellValue('F' . $row, $s->tanggal_expired);
        $sheet->setCellValue('G' . $row, $s->lembaga_penyelenggara);
        $sheet->setCellValue('H' . $row, base_url('upload/file_sertifikasi/' . $s->upload_dokumen));
        $row++;
    }

    // Membuat file excel dan mengunduhnya
    $writer = new Xlsx($spreadsheet);
    $filename = 'data_sertifikasi.xlsx';

    // Set header untuk mendownload file excel
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="' . $filename . '"');
    header('Cache-Control: max-age=0');

    $writer->save('php://output');
}

    public function cetak()
    {
        $data['sertifikasi'] = $this->SertifikasiModel->get_sertifikasi_data(); // Sesuaikan dengan metode yang sesuai di model
        $this->load->view('sertifikasi/sertifikasi_print', $data); // Pastikan view 'sertifikasi_print' ada dan sesuai
    }

    public function index()
    {
        $data['title'] = "Sertifikasi | PLTU Asam Asam";
        $data['sertifikasi'] = $this->SertifikasiModel->get_sertifikasi_data();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('sertifikasi/sertifikasi_read', $data); // Pastikan view 'sertifikasi_read' ada dan sesuai
        $this->load->view('template/footer');
    }

    public function tambah()
    {
        if (isset($_POST['create'])) {
            $this->SertifikasiModel->insert_sertifikasi();
            redirect('sertifikasi');
        } else {
            $data['title'] = "Tambah Data Sertifikasi | PLTU Asam Asam";
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('sertifikasi/sertifikasi_create'); // Pastikan view 'sertifikasi_create' ada dan sesuai
            $this->load->view('template/footer');
        }
    }

    public function ubah($id)
    {
        if (isset($_POST['update'])) {
            $this->SertifikasiModel->update_sertifikasi();
            redirect('sertifikasi');
        } else {
            $data['title'] = "Edit Data Sertifikasi | PLTU Asam Asam";
            $data['sertifikasi'] = $this->SertifikasiModel->get_sertifikasi_byid($id);
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('sertifikasi/sertifikasi_update', $data); // Pastikan view 'sertifikasi_update' ada dan sesuai
            $this->load->view('template/footer');
        }
    }

    public function hapus($id)
    {
        if (isset($id)) {
            $this->SertifikasiModel->delete_sertifikasi($id);
            redirect('sertifikasi');
        }
    }
}
