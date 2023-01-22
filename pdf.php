<?php

require("fpdf/fpdf.php");

if(isset($_POST['submit'])){
    $fname = $_POST['fname'];
    $product_name = $_POST['product_name'];
    $amount = $_POST['amount'];
    $interest = $_POST['interest'];
    $months = $_POST['months'];

    $pdf = new FPDF();  
    $pdf->AddPage();
    $pdf->SetFont("times", "I", 12);

    $pdf->Cell(190,10,"E-Installment Quotation",1,1, 'C');

    $pdf->Cell(50,10,"Customer Name",1,0);
    $pdf->Cell(140,10,$fname,1,1);
    $pdf->Cell(50,10,"Product Name",1,0);
    $pdf->Cell(140,10,$product_name,1,1);
    $pdf->Cell(50,10,"Amount Entered",1,0);
    $pdf->Cell(140,10,$amount,1,1);
    $pdf->Cell(50,10,"Interest Rate",1,0);
    $pdf->Cell(140,10,$interest,1,1);
    $pdf->Cell(50,10,"Installment Plan",1,0);
    $pdf->Cell(140,10,$months,1,1);



    $pdf->Output();
}

?>