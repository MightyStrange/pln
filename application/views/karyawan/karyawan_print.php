<?php
$pdf = new FPDF("L", "cm", "A3");
$pdf->AddPage();
$pdf->SetTitle("Laporan Data Karyawan");
$pdf->SetFont("Arial", "B", "18");
$pdf->Cell(40, 1, "Data Karyawan PLTU Asam Asam", 0, 1, "C"); // Adjusted width
$pdf->SetFont("Arial", "", "11");
$pdf->Cell(40, 1, "Alamat : Jl. Asam asam", 0, 1, "C"); // Adjusted width
$pdf->Line(1, 3, 41, 3); // Adjusted line length
$pdf->ln();
$pdf->SetFont("Arial", "B", "12");
$pdf->Cell(40, 1, "Alamat : Laporan Data Karyawan", 0, 1, "C"); // Adjusted width
$pdf->ln();
$pdf->SetFont("Arial", "B", "10");
$pdf->SetFillColor(0, 255, 0);
$pdf->Cell(1, 1, "No", 1, 0, "C", true);
$pdf->Cell(5, 1, "Username", 1, 0, "C", true);
$pdf->Cell(4, 1, "NIPEG", 1, 0, "C", true);
$pdf->Cell(9, 1, "Nama Karyawan", 1, 0, "C", true);
$pdf->Cell(5, 1, "Unit", 1, 0, "C", true);
$pdf->Cell(4, 1, "Divisi", 1, 0, "C", true);
$pdf->Cell(9, 1, "Email", 1, 0, "C", true);
$pdf->Cell(3, 1, "Level", 1, 1, "C", true);
$pdf->SetFont("Arial", "", "11");
$no = 1;
foreach ($karyawan as $k) {
    $pdf->Cell(1, 1, $no++, 1, 0, "C", false);
    $pdf->Cell(5, 1, $k->username, 1, 0, "C", false);
    $pdf->Cell(4, 1, $k->nipeg, 1, 0, "C", false);
    $pdf->Cell(9, 1, $k->nama_karyawan, 1, 0, "C", false);
    $pdf->Cell(5, 1, $k->unit, 1, 0, "C", false);
    $pdf->Cell(4, 1, $k->divisi, 1, 0, "C", false);
    $pdf->Cell(9, 1, $k->email, 1, 0, "C", false);
    $pdf->Cell(3, 1, $k->level, 1, 1, "C", false);
}
$pdf->Output();
?>
