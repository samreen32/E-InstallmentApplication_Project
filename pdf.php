<?php

require("fpdf/fpdf.php");

if(isset($_POST['submit'])){
    $fname = $_POST['fname'];
    $product_name = $_POST['product_name'];
    $amount = $_POST['amount'];
    $interest = $_POST['interest'];
    $months = $_POST['months'];
    $totalMonth = $_POST['totalMonth'];
    // $s1 = $_POST['s1'];
    $yourInterest = $_POST['yourInterest'];
    $yourPayment = $_POST['yourPayment'];


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

    $pdf->Cell(190,10,"Plan For Above Information", 1,1, 'C');
    $pdf->Cell(50,10,"Monthly Installment",1,0);
    $pdf->Cell(140,10,$totalMonth,1,1);
    $pdf->Cell(50,10,"Total Interest",1,0);
    $pdf->Cell(140,10,$yourInterest,1,1);
    $pdf->Cell(50,10,"Total Payment",1,0);
    $pdf->Cell(140,10,$yourPayment,1,1);



    $pdf->Output();
}

?>