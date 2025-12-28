<?php
$pdf = new FPDF("L", "cm", "A4");
$pdf->AddPage();
$pdf->SetTitle("Laporan Data PERATURAN BERLAKU");
$pdf->SetFont("Arial", "B", "18");
$pdf->Cell(28, 1, "Data PERATURAN BERLAKU", 0, 1, "C"); // Adjusted width
$pdf->SetFont("Arial", "", "11");
$pdf->Line(1, 3, 28, 3); // Adjusted line length
$pdf->ln();
$pdf->SetFont("Arial", "B", "12");
$pdf->Cell(28, 1, "Laporan Data PERATURAN BERLAKU", 0, 1, "C"); // Adjusted width
$pdf->ln();
$pdf->SetFont("Arial", "B", "11");
$pdf->SetFillColor(0, 255, 0);
$pdf->Cell(1, 1, "No", 1, 0, "C", true);
$pdf->Cell(15, 1, "Nama Peraturan", 1, 0, "C", true);
$pdf->Cell(4, 1, "Tahun Berlaku", 1, 0, "C", true);
$pdf->SetFont("Arial", "", "11");
$no = 1;

foreach ($tutorial as $k) {
    $pdf->ln(); // New line for each data row
    $pdf->Cell(1, 1, $no++, 1, 0, "C", false);
    $pdf->Cell(15, 1, $k->nama_tutorial, 1, 0, "L", false);
    $pdf->Cell(4, 1, $k->tahun, 1, 0, "C", false);
	
}
$pdf->Output();
?>
