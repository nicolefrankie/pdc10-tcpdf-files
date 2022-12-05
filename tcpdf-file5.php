<?php
require "vendor/autoload.php";

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicole Frankie Capuno');
$pdf->SetTitle('TCPDF Favorites Qoutes');
$pdf->SetSubject('TCPDF Tutorial');

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// add a page
$pdf->AddPage();

// set default font subsetting mode
$pdf->setFontSubsetting(false);

$pdf->SetFont('helvetica', 'B', 20);
$pdf->Write(0, 'Favorite Qoutes', '', 0, 'C', 1, 0, false, false, 0);
$pdf->Ln(10);

$pdf->SetFont('FreeMono', '', 12);
$html = '<h3>“People, who can`t throw something important away, can never hope to change anything.”</h3> 
        <p> -Armin Arlert </p>';
$pdf->writeHTML($html, true, false, true, false, '');
$pdf->Ln(20);

$pdf->SetFont('dejavusans', '', 12);
$html = '<h3>"It`s not always easy to see the good in people. But if you can somehow, find a way to believe, sometimes that`s all it takes to help someone."</h3> 
        <p> -Honda Kyoko </p>';
$pdf->writeHTML($html, true, false, true, false, '');
$pdf->Ln(20);

$pdf->SetFont('FreeSans', '', 12);
$html = '<h3>“Even if I searched the world over, no one could compare to you.” </h3> 
        <p> -Hikaru Hitachiin </p>';
$pdf->writeHTML($html, true, false, true, false, '');


//Close and output PDF document
$pdf->Output();