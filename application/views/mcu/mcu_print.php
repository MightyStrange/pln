<?php
$pdf = new FPDF("L", "cm", "A4");
$pdf->AddPage();
$pdf->SetTitle("Laporan Data MCU");
$pdf->SetFont("Arial", "B", "18");
$pdf->Cell(28, 1, "Data MCU", 0, 1, "C"); // Adjusted width
$pdf->SetFont("Arial", "", "11");
$pdf->Line(1, 3, 28, 3); // Adjusted line length
$pdf->ln();
$pdf->SetFont("Arial", "B", "12");
$pdf->Cell(28, 1, "Laporan Data MCU", 0, 1, "C"); // Adjusted width
$pdf->ln();
$pdf->SetFont("Arial", "B", "11");
$pdf->SetFillColor(0, 255, 0);
$pdf->Cell(1, 1, "No", 1, 0, "C", true);
$pdf->Cell(2, 1, "ID MCU", 1, 0, "C", true); // Adjusted width
$pdf->Cell(7, 1, "Nama", 1, 0, "C", true); // Adjusted width
$pdf->Cell(3, 1, "NIPEG", 1, 0, "C", true); // Adjusted width
$pdf->Cell(4, 1, "Tahun Pelaksanaan", 1, 0, "C", true); // Adjusted width
$pdf->Cell(6, 1, "Kesimpulan Pemeriksaan", 1, 0, "C", true); // Adjusted width
$pdf->Cell(5, 1, "Saran", 1, 1, "C", true); // Adjusted width
$pdf->SetFont("Arial", "", "11");
$no = 1;
foreach ($mcu as $m) {
    $pdf->Cell(1, 1, $no++, 1, 0, "C", false);
    $pdf->Cell(2, 1, $m->id_mcu, 1, 0, "C", false);
    $pdf->Cell(7, 1, $m->nama, 1, 0, "C", false);
    $pdf->Cell(3, 1, $m->nipeg, 1, 0, "C", false);
    $pdf->Cell(4, 1, $m->tahun_pelaksanaan, 1, 0, "C", false);
    // Simpan posisi awal untuk kolom "Kesimpulan Pemeriksaan"
    $x = $pdf->GetX();
    $y = $pdf->GetY();
    $pdf->MultiCell(6, 0.5, $m->kesimpulan_pemeriksaan, 1, "L");
    $pdf->SetXY($x + 6, $y); // Pindahkan ke kolom berikutnya
    $pdf->MultiCell(5, 1, $m->saran, 1, "C", false);
}
$pdf->Output();
?>
