<?php


$pdf = new FPDF("L", "cm", "A3");
$pdf->AddPage();
$pdf->SetTitle("Laporan Data Sertifikasi");
$pdf->SetFont("Arial", "B", "18");
$pdf->Cell(40, 1, "Data Sertifikasi", 0, 1, "C"); // Adjusted width for A3
$pdf->SetFont("Arial", "", "11");
$pdf->Line(1, 3, 40, 3); // Adjusted line length for A3
$pdf->ln();
$pdf->SetFont("Arial", "B", "12");
$pdf->Cell(40, 1, "Laporan Data Sertifikasi", 0, 1, "C"); // Adjusted width for A3
$pdf->ln();
$pdf->SetFont("Arial", "B", "11");
$pdf->SetFillColor(0, 255, 0);
$pdf->Cell(1, 1, "No", 1, 0, "C", true);
$pdf->Cell(7, 1, "Nama", 1, 0, "C", true); // New column
$pdf->Cell(4, 1, "NIPEG", 1, 0, "C", true); // New column
$pdf->Cell(10, 1, "Nama Sertifikasi", 1, 0, "C", true); // Adjusted width
$pdf->Cell(4, 1, "Tanggal Pelaksanaan", 1, 0, "C", true); // Adjusted width
$pdf->Cell(4, 1, "Tanggal Expired", 1, 0, "C", true); // Adjusted width
$pdf->Cell(10, 1, "Lembaga Penyelenggara", 1, 1, "C", true); // Adjusted width

$pdf->SetFont("Arial", "", "10"); // Reduced font size

$no = 1;
if (!empty($sertifikasi)) {
    foreach ($sertifikasi as $s) {
        $pdf->Cell(1, 1, $no++, 1, 0, "C", false);
        $pdf->Cell(7, 1, $s->nama, 1, 0, "C", false); // New column
        $pdf->Cell(4, 1, $s->nipeg, 1, 0, "C", false); // New column
        $pdf->Cell(10, 1, substr($s->nama_sertifikasi, 0, 40) . (strlen($s->nama_sertifikasi) > 40 ? '...' : ''), 1, 0, "C", false); // Truncate text
        $pdf->Cell(4, 1, $s->tanggal_pelaksanaan, 1, 0, "C", false);
        $pdf->Cell(4, 1, $s->tanggal_expired, 1, 0, "C", false);
        $pdf->Cell(10, 1, substr($s->lembaga_penyelenggara, 0, 40) . (strlen($s->lembaga_penyelenggara) > 40 ? '...' : ''), 1, 1, "C", false); // Truncate text
    }
} else {
    $pdf->Cell(40, 1, "No data available", 1, 1, "C", false); // Adjusted width for A3
}

$pdf->Output();
?>
