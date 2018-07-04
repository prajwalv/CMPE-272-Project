<?php
require('fpdf.php');
$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'/PasswordManager/user.view-all.php');
$pdf->Output();
?>
