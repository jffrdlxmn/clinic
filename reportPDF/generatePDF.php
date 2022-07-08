<?php
// Include the main TCPDF library (search for installation path).
require_once('TCPDF-main/tcpdf.php');


class PDF extends TCPDF
{
    //Header
    public function  Header()
    {
        

    }
    //footer
    public function Footer()
    {
       

    }
}

// create new PDF document
$pagelayout=  array("210", "148.5");
$pdf = new PDF('P', 'mm',$pagelayout, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('CCAT Campus');
$pdf->SetTitle('Medical Certificate');
$pdf->SetSubject('');
$pdf->SetKeywords('');




$pdf->SetPrintHeader(false);
$pdf->SetPrintFooter(false);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}
$pdf->SetAutoPageBreak(true, 0);
// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);
// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('dejavusans', '', 11, '', true);
        
// set the margins 
$pdf->SetMargins(0, 0, 0, 0);
$pdf->Addpage();
$img_file = K_PATH_IMAGES.'test3.png';
$pdf->Image($img_file, 0, 0, 148, '100', 'PNG', '', 'T', false, 300, '', false, false,
0, false, false, false);




$pdf->Ln(9);
$pdf->SetFont('times','B',6);
$pdf->Cell(130,5,'Student No.',0,0,'R');
$pdf->SetFont('times','',6);
$pdf->Cell(25,5,$_GET['studentCtrlNo'],0,0,'L');
$pdf->Ln(13);

$pdf->SetFont('times','',7);
$pdf->Cell(10,5,'',0,0,0);
$pdf->Cell(55,5,'This is to certify that I have personally seen/examined ',0,0,0);
$pdf->SetFont('times','B',7);
$pdf->Cell(55,4,ucwords(strtoupper($_GET['name'])),'B',0,'C');
$pdf->SetFont('times','',7);
$pdf->Cell(12,5,'and found him/her','',0,0);


$pdf->Ln(4);
$pdf->SetFont('times','',7);
$pdf->Cell(5,5,'','',0,0);
$pdf->Cell(33,5,' to be physically and medically',0,0,0);
$pdf->SetFont('times','B',7);
$pdf->Cell(6,4,'FIT','B',0,0);
$pdf->SetFont('times','',7);
$pdf->Cell(17,5,'to enroll on the','',0,0);
$pdf->SetFont('times','B',7);
$pdf->Cell(65,4,ucwords(strtoupper($_GET['program'])),'B',0,'C');
$pdf->SetFont('times','',7);
$pdf->Cell(10,5,'program.','',0,'');

$pdf->Ln(33);
$pdf->SetFont('times','B',6);
$pdf->Cell(130,5,'Student No.',0,0,'R');
$pdf->SetFont('times','',6);
$pdf->Cell(25,5,$_GET['studentCtrlNo'],0,0,'L');
$pdf->Ln(13);

$pdf->SetFont('times','',7);
$pdf->Cell(10,5,'',0,0,0);
$pdf->Cell(55,5,'This is to certify that I have personally seen/examined ',0,0,0);
$pdf->SetFont('times','B',7);
$pdf->Cell(55,4,ucwords(strtoupper($_GET['name'])),'B',0,'C');
$pdf->SetFont('times','',7);
$pdf->Cell(12,5,'and found him/her','',0,0);

$pdf->Ln(4);
$pdf->SetFont('times','',7);
$pdf->Cell(5,5,'','',0,0);
$pdf->Cell(33,5,' to be physically and medically',0,0,0);
$pdf->SetFont('times','B',7);
$pdf->Cell(6,4,'FIT','B',0,0);
$pdf->SetFont('times','',7);
$pdf->Cell(17,5,'to enroll on the','',0,0);
$pdf->SetFont('times','B',7);
$pdf->Cell(65,4,ucwords(strtoupper($_GET['program'])),'B',0,'C');
$pdf->SetFont('times','',7);
$pdf->Cell(10,5,'program.','',0,'');












// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('Clearance.pdf', 'I');

?>
