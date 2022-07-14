<?php
//model
include('../model/studentModel.php');
//caller
$caller=new Student();

// Include the main TCPDF library (search for installation path).
require_once('TCPDF-main/tcpdf.php');

date_default_timezone_set('Asia/Manila');



class PDF extends TCPDF
{
    //Header
    public function  Header()
    {
        //background
        $img_file = K_PATH_IMAGES.'cvsubg.jpg';
        $this->Image($img_file, 40, 67, 132, '', 'JPG', '', 'T', false, 300, '', false, false,
        0, false, false, false);

        //header
        if ($this->page == 1) {

            $image_file = K_PATH_IMAGES.'cvsuLogo.jpg';
            $this->Image($image_file, 52, 10, 23, '', 'JPG', '', 'T', false, 300, '', false, false,
            0, false, false, false);
            
            $this->Ln(1);
            //$this->SetTextColor(68, 0, 78, 44);
            $this->SetFont('helvetica','',10);
            $this->Cell(189,5,'Republic of the Philippines',0,1,'C');

            $this->Ln(0);
        // $this->SetTextColor(68, 0, 78, 44);
            $this->SetFont('helvetica','B',13);
            $this->Cell(189,5,'CAVITE STATE UNIVERSITY',0,1,'C');

            $this->Ln(0);
            //$this->SetTextColor(68, 0, 78, 44);
            $this->SetFont('helvetica','',10);
            $this->Cell(189,5,'CCAT Campus',0,1,'C');

            $this->Ln(0);
        //$this->SetTextColor(68, 0, 78, 44);
            $this->SetFont('helvetica','',10);
            $this->Cell(189,3,'Rosario, Cavite',0,1,'C');


            $this->Ln(5);
            //$this->SetTextColor(68, 0, 78, 44);
            $this->SetFont('helvetica','B',10);
            $this->Cell(189,3,'MEDICAL CLEARANCE',0,1,'C');
        }

    }
    //footer
    public function Footer()
    {
        // $this->SetY(-45);
        // $this->Ln(5);
        // //$this->SetTextColor(68, 0, 78, 44);


        // $this->SetFont('times','',8);
        // $this->Cell(74,5,'Checked and Verified by:',0,0,'L',0);
        // $this->Cell(78,5,'Recommending Approval:',0,0,'',0);
        // $this->Cell(63,5,'Approved:',0,0,'L',0);

        // $this->Ln(15);
        // $this->SetFont('times','B',10);
        // $this->Cell(63,5,'JUDITH B. LABRADOR',0,0,'L',0);
        // $this->Cell(63,5,'MARILOU P. LUSECO',0,0,'C',0);
        // $this->Cell(63,5,'DR. JOSE P. LISAMA',0,0,'R',0);

        // $this->Ln(5);
        // $this->SetFont('times','I',8);
        // $this->Cell(10,5,'',0,0,'L',0);
        // $this->Cell(53,5,'Clerk, QAAC',0,0,'L',0);
        // $this->Cell(63,5,'Director, Instructions',0,0,'C',0);
        // $this->Cell(19,5,'',0,0,'L',0);
        // $this->Cell(53,5,'Campus Administrator',0,0,'C',0);
    }
            
}

// create new PDF document
$pdf = new PDF('p', 'mm', 'A4', true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('CCAT Campus');
$pdf->SetTitle('Summary');
$pdf->SetSubject('');
$pdf->SetKeywords('');




// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
$pdf->setFooterData(array(0,64,0), array(0,64,128));

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

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('dejavusans', '', 8, '', true);

$pdf->SetMargins(15, 10, 15, true); // set the margins


$pdf->Addpage();

$pdf->Ln(35);




$pdf->Ln(3);
/*$pdf->SetFont('helvetica','B',10);
$pdf->Cell(21,5,'Department:',0,0,'',0);*/

$pdf->SetFont('helvetica','B',10);
$pdf->Cell(168,5,'',0,0,'',0);


$pdf->SetFont('helvetica','',8);
$tablehead='
    <table width="100%" cellspacing="0" cellpadding="1" border="1">
    
        <tr style="background-color:#247844;color:white;">
            <th width="20%" ><b>Student Control No.</b></th>
            <th width="40%"><b>Student Name</b></th>
            <th width="40%"><b>Program</b></th>
        
        </tr>
';

// table body
$tablebody="";
    $counter=1;
	$datatableoutput=array();

	$datatableoutput=$caller->getListOfStudents($_GET['program']);	

	foreach($datatableoutput as $datatableoutputfetch){
        $tablebody=$tablebody.
        '        
            <tr>
                <td >'.htmlentities($datatableoutputfetch["studentCtrlNo"]).'</td>
                <td>'.htmlentities($datatableoutputfetch["fullname"]).'</td>
                <td >'.htmlentities($datatableoutputfetch["program"]).'</td>
            </tr> 
        ';
        $counter++;
    }

    
$tablefooter = 
'
    </table>
'; 





$pdf->Ln(5);
//$table = $tblCommitment .$tblKnowledge .$tblTeaching .$tblManagement .$tblFinal ;
$pdf->writeHTML($tablehead.$tablebody.$tablefooter , true, false, false, false, 'C');

if($counter>50){
    $pdf->addPage();

}






// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('Summary.pdf', 'I');

?>