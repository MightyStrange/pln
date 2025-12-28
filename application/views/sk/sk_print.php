<?php
$pdf = new FPDF("L", "cm", "A4");
$pdf->AddPage();
$pdf->SetTitle("Laporan Data SK");
$pdf->SetFont("Arial", "B", "18");
$pdf->Cell(28, 1, "Data SK", 0, 1, "C"); // Adjusted width
$pdf->SetFont("Arial", "", "11");
$pdf->Line(1, 3, 28, 3); // Adjusted line length
$pdf->ln();
$pdf->SetFont("Arial", "B", "12");
$pdf->Cell(28, 1, "Laporan Data SK", 0, 1, "C"); // Adjusted width
$pdf->ln();
$pdf->SetFont("Arial", "B", "11");
$pdf->SetFillColor(0, 255, 0);
$pdf->Cell(1, 1, "No", 1, 0, "C", true);
$pdf->Cell(7, 1, "Nama", 1, 0, "C", true);
$pdf->Cell(3, 1, "NIPEG", 1, 0, "C", true);
$pdf->Cell(7, 1, "No SK", 1, 0, "C", true);
$pdf->Cell(5, 1, "Tanggal Pembuatan SK", 1, 0, "C", true);
$pdf->Cell(5, 1, "Tanggal Berlaku", 1, 1, "C", true);
$pdf->SetFont("Arial", "", "11");
$no = 1;
foreach ($sk as $m) {
    $pdf->Cell(1, 1, $no++, 1, 0, "C", false);
    $pdf->Cell(7, 1, $m->nama, 1, 0, "C", false);
    $pdf->Cell(3, 1, $m->nipeg, 1, 0, "C", false);
    $pdf->Cell(7, 1, $m->no_sk, 1, 0, "C", false);
    $pdf->Cell(5, 1, $m->tanggal_pembuatan_sk, 1, 0, "C", false);
    $pdf->Cell(5, 1, $m->tanggal_berlaku, 1, 1, "C", false);
}
$pdf->Output();
?>
