<?php
require "vendor/autoload.php";

class MYPDF extends TCPDF {
    //Page header
    public function Header() {
        // Set font
        $this->SetFont('times', 'B', 30);
    }
    // Page footer
    public function Footer() {
        // Position from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('times', '', 6);
        // Page number
        $this->Cell(0, 10, 'Page ' . $this->getAliasNumPage() . '/' . $this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicole Frankie Capuno');
$pdf->SetTitle('TCPDF Chapter of Novels');
$pdf->SetSubject('TCPDF Tutorial');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . '', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

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

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// set font
$pdf->SetFont('times', '', 12);

// add a page
$pdf->AddPage();

// Print a text
$html = '<h1 style="text-align:center;font-weight:bold;font-size:20pt;">Harry Potter and the Sorcerer`s Stone </h1><br>';
$pdf->writeHTML($html, true, false, true, false, '');

// get esternal file content
$chap1 = file_get_contents('text-files/chap1.txt', false);
$chap2 = file_get_contents('text-files/chap2.txt', false);
$chap3 = file_get_contents('text-files/chap3.txt', false);
$chap4 = file_get_contents('text-files/chap4.txt', false);

// write the text
$pdf->Write(5, $chap1, '', 0, '', false, 0, false, false, 0);
$pdf->Write(5, $chap2, '', 0, '', false, 0, false, false, 0);
$pdf->Write(5, $chap3, '', 0, '', false, 0, false, false, 0);
$pdf->Write(5, $chap4, '', 0, '', false, 0, false, false, 0);

// Close and output PDF document
$pdf->Output();