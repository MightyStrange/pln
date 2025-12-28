<?php
$pdf = new FPDF("L", "cm", "A4");
$pdf->AddPage();
$pdf->SetTitle("Laporan Data Ijazah");
$pdf->SetFont("Arial", "B", "18");
$pdf->Cell(28, 1, "Data Ijazah", 0, 1, "C"); // Adjusted width
$pdf->SetFont("Arial", "", "11");
$pdf->Line(1, 3, 28, 3); // Adjusted line length
$pdf->ln();
$pdf->SetFont("Arial", "B", "12");
$pdf->Cell(28, 1, "Laporan Data Ijazah", 0, 1, "C"); // Adjusted width
$pdf->ln();
$pdf->SetFont("Arial", "B", "11");
$pdf->SetFillColor(0, 255, 0);
$pdf->Cell(1, 1, "No", 1, 0, "C", true);
$pdf->Cell(7, 1, "Nama", 1, 0, "C", true);
$pdf->Cell(5, 1, "Nama Sekolah", 1, 0, "C", true);
$pdf->Cell(5, 1, "Pendidikan", 1, 0, "C", true); // Adjusted width
$pdf->Cell(4, 1, "Tahun Masuk", 1, 0, "C", true); // Adjusted width
$pdf->Cell(4, 1, "Tahun Lulus", 1, 0, "C", true); // Adjusted width
$pdf->SetFont("Arial", "", "11");
$no = 1;
foreach ($ijazah as $i) {
    $pdf->ln(); // New line for each data row
    $pdf->Cell(1, 1, $no++, 1, 0, "C", false);
	$pdf->Cell(7, 1, $i->nama, 1, 0, "C", false);
    $pdf->Cell(5, 1, $i->nama_sekolah, 1, 0, "C", false);
    $pdf->Cell(5, 1, $i->pendidikan, 1, 0, "C", false);
    $pdf->Cell(4, 1, $i->tahun_masuk, 1, 0, "C", false);
    $pdf->Cell(4, 1, $i->tahun_lulus, 1, 0, "C", false);
}
$pdf->Output();
?>
