<?php

require "vendor/autoload.php";

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicole Frankie Capuno');
$pdf->SetTitle('TCPDF Holiday Greeting Card');
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

// ---------------------------------------------------------

// set font
$pdf->SetFont('freesans', 'B', 20);

// --- first page ------------------------------------------

// add a page
$pdf->AddPage();

$pdf->Cell(0, 0, 'Holiday Greetings Card', 0, 1, 'C', 0, '', 0, false, 'T', 'M');

// set colors for gradients (r,g,b) or (grey 0-255)
$red = array(255, 0, 0);
$blue = array(0, 0, 200);
$yellow = array(255, 255, 0);
$green = array(0, 255, 0);
$white = array(255);
$black = array(0);

$style = array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => '10,20,5,10', 'phase' => 10, 'color' => array(255, 0, 0));
$style2 = array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(216, 179, 97));
$style3 = array('width' => 1, 'cap' => 'round', 'join' => 'round', 'dash' => '2,10', 'color' => array(255, 0, 0));
$style4 = array('L' => 0,
                'T' => array('width' => 0.25, 'cap' => 'butt', 'join' => 'miter', 'dash' => '20,10', 'phase' => 10, 'color' => array(100, 100, 255)),
                'R' => array('width' => 0.50, 'cap' => 'round', 'join' => 'miter', 'dash' => 0, 'color' => array(50, 50, 127)),
                'B' => array('width' => 0.75, 'cap' => 'square', 'join' => 'miter', 'dash' => '30,10,5,10'));
$style5 = array('width' => 0.25, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(8, 26, 61));
$style6 = array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => '10,10', 'color' => array(0, 128, 0));
$style7 = array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(106, 34, 37));


// first patch: f = 0
$patch_array[0]['f'] = 0;
$patch_array[0]['points'] = array(
    0.00,0.00, 0.33,0.00,
    0.67,0.00, 1.00,0.00, 1.00,0.33,
    0.8,0.67, 1.00,1.00, 0.67,0.8,
    0.33,1.80, 0.00,1.00, 0.00,0.67,
    0.00,0.33);
$patch_array[0]['colors'][0] = array('r' => 255, 'g' => 202, 'b' => 200);
$patch_array[0]['colors'][1] = array('r' => 255, 'g' => 202, 'b' => 200);
$patch_array[0]['colors'][2] = array('r' => 232, 'g' => 196, 'b' => 196);
$patch_array[0]['colors'][3] = array('r' => 232, 'g' => 196, 'b' => 196);

// second patch - above the other: f = 2
$patch_array[1]['f'] = 2;
$patch_array[1]['points'] = array(
    0.00,1.33,
    0.00,1.67, 0.00,2.00, 0.33,2.00,
    0.67,2.00, 1.00,2.00, 1.00,1.67,
    1.5,1.33);
$patch_array[1]['colors'][0]=array('r' => 255, 'g' => 255, 'b' => 255);
$patch_array[1]['colors'][1]=array('r' => 255, 'g' => 255, 'b' => 255);

// third patch - right of the above: f = 3
$patch_array[2]['f'] = 3;
$patch_array[2]['points'] = array(
    1.33,0.80,
    1.67,1.50, 2.00,1.00, 2.00,1.33,
    2.00,1.67, 2.00,2.00, 1.67,2.00,
    1.33,2.00);
$patch_array[2]['colors'][0] = array('r' => 242, 'g' => 229, 'b' => 229);
$patch_array[2]['colors'][1] = array('r' => 242, 'g' => 229, 'b' => 229);

// fourth patch - below the above, which means left(?) of the above: f = 1
$patch_array[3]['f'] = 1;
$patch_array[3]['points'] = array(
    2.00,0.67,
    2.00,0.33, 2.00,0.00, 1.67,0.00,
    1.33,0.00, 1.00,0.00, 1.00,0.33,
    0.8,0.67);
$patch_array[3]['colors'][0] = array('r' => 255, 'g' => 172, 'b' => 199);
$patch_array[3]['colors'][1] = array('r' => 255, 'g' => 185, 'b' => 185);

$coords_min = 0;
$coords_max = 2;

$pdf->CoonsPatchMesh(10, 45, 190, 200, '', '', '', '', $patch_array, $coords_min, $coords_max);

$pdf->SetLineStyle($style5);
$pdf->StarPolygon(105,225, 15, 7, 5, 30, 0, 'DF', array('all' => $style6), array(220, 220, 200), 'F', array(200, 200, 200));
$pdf->StarPolygon(140, 225, 9, 8, 5, 30, 1, 'DF', array('all' => $style5), array(225, 221, 210), 'F', array(100, 100, 100));
$pdf->StarPolygon(70, 225, 9, 9, 5, 30, 1, 'DF', array('all' => $style7), array(225, 221, 210), 'F', array(200, 200, 200));
$pdf->StarPolygon(105, 70, 15, 12, 5, 30, 0, 'DF', array('all' => $style5), array(225, 221, 210), 'F', array(255, 200, 200));
$pdf->StarPolygon(150, 70, 15, 12, 5, 30, 0, 'DF', array('all' => $style2), array(220, 220, 200), 'F', array(255, 200, 200));
$pdf->StarPolygon(60, 70, 15, 12, 5, 30, 0, 'DF', array('all' => $style7), array(220, 220, 200), 'F', array(255, 200, 200));


$pdf->SetFont('freesans', 'B', 60);
$pdf->SetTextColor(255, 255, 255);
$pdf->MultiCell(150, 0, "Best wishes for a sparkling holiday season.", 0, 'C', 0, 1, 30, 95, true, 0);

//Close and output PDF document
$pdf->Output();