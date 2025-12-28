<?php
$pdf = new FPDF("L", "cm", "A3");
$pdf->AddPage();
$pdf->SetTitle("Laporan Data KTP");
$pdf->SetFont("Arial", "B", "18");
$pdf->Cell(40, 1, "Data KTP", 0, 1, "C"); // Adjusted width
$pdf->SetFont("Arial", "", "11");
$pdf->Line(1, 3, 40, 3); // Adjusted line length
$pdf->ln();
$pdf->SetFont("Arial", "B", "12");
$pdf->Cell(40, 1, "Laporan Data KTP", 0, 1, "C"); // Adjusted width
$pdf->ln();
$pdf->SetFont("Arial", "B", "11");
$pdf->SetFillColor(0, 255, 0);
$pdf->Cell(1, 1, "No", 1, 0, "C", true);
$pdf->Cell(5, 1, "No Ktp", 1, 0, "C", true);
$pdf->Cell(7, 1, "Nama", 1, 0, "C", true); // Adjusted width
$pdf->Cell(20, 1, "Alamat", 1, 0, "C", true); // Adjusted width
$pdf->Cell(4, 1, "Tanggal Lahir", 1, 0, "C", true); // Adjusted width
$pdf->SetFont("Arial", "", "11");
$no = 1;
foreach ($ktp as $t) {
    $pdf->ln(); // New line for each data row
    $pdf->Cell(1, 1, $no++, 1, 0, "C", false);
    $pdf->Cell(5, 1, $t->no_ktp, 1, 0, "C", false);
    $pdf->Cell(7, 1, $t->nama, 1, 0, "C", false);
    $pdf->Cell(20, 1, $t->alamat, 1,  "C", false);
    $pdf->Cell(4, 1, $t->tanggal_lahir, 1,"C", false);
}
$pdf->Output();
?>
