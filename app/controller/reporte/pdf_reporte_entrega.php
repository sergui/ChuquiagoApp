<?php
require_once('../../config/db.php');
require_once('../../config/conexion.php');
require_once('../../librarys/tcpdf/examples/tcpdf_include.php');

// create new PDF document
$dimen = array(216,280);
// $pdf = new TCPDF('P','mm','A4',true, 'UTF-8', false);
 //$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT,$dimen, true, 'UTF-8', false);

//$pdf->addFormat('custom',216,280);
// set document information 
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Luis Miguel Mendoza Ticona');
$pdf->SetTitle('Reporte');
$pdf->SetSubject('');
$pdf->SetKeywords('');

// set default header data
//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));

//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, '', 'Proveedora de Alimentos y Servicios', array(0,64,255), array(0,64,128));
//$pdf->setFooterData(array(0,64,0), array(0,64,128));

// set header and footer fonts
//$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced fontñ
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
//$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
//$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

//Declaramos las columnas
$posxini = PDF_MARGIN_LEFT+1;
$posxnro = 50;
$posxci  = 90;
$posxben = 170;
$posxfin = 200;
// ---------------------------------------------------------
// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.

$pdf->SetFont('dejavusans', '', 10, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();
// set text shadow effect
$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

// Set some content to print

/* La linea rectangular de pagina vertical */
$hidetop = 40; 
$tab_top = 40;
$tab_height = 160;
$pdf->SetFillColor(255, 255, 127);

cabezeraReporte($pdf);

//$this->printRect($pdf,$this->marge_gauche, $tab_top, $this->page_largeur-$this->marge_gauche-$this->marge_droite, $tab_height, $hidetop, $hidebottom);
$pdf->Rect(20, $tab_top, 175, $tab_top + $tab_height, 'D');

if (!empty($hidetop)){    
    $pdf->SetXY($posxini + 2, $tab_top+3);
    $pdf->MultiCell($posxnro-$posxini-1,7, "Nro Recibo",'','C',0, 0, '', '', true);
    $pdf->line($posxnro-1, $tab_top, $posxnro-1, $tab_top + $tab_height + 50);
    
    $pdf->SetXY($posxnro-1, $tab_top+3);
    $pdf->MultiCell($posxci-$posxnro-1,2, "CI",'','C');
    $pdf->line($posxci-1, $tab_top, $posxci-1, $tab_top + $tab_height+ 50);

    $pdf->SetXY($posxci-1, $tab_top+3);
    $pdf->MultiCell($posxben-$posxci-1,2, "Beneficiario",'','C');
    $pdf->line($posxben-1, $tab_top, $posxben-1, $tab_top + $tab_height+ 50);

    $pdf->SetXY($posxben-1, $tab_top+3);
    $pdf->MultiCell($posxfin-$posxben-1,2, "Venta Total",'','C');
     
    //$pdf->line($posxci-1, $tab_top, $posxci-1, $tab_top + $tab_height+ 50);
    $pdf->line(20, $tab_top+10, 216-21, $tab_top+10);
}

    //$sql = "SELECT * FROM seccion WHERE 1=1";
    $sql = "call lista_productos()";
    //echo $sql;
    $res=$con->query($sql);
    $conca = "";

    $iniY = 30;
    $curY = $tab_top + 12;
    $nexY = 30;
    foreach($res as $fila){
        $pdf->SetXY($posxini, $curY);
        //$pdf->MultiCell($posxnro-$posxini-1, 1,$fila['nro_plu'] , 0, 'C',0);
        
        $nexY = $pdf->GetY();
        $curY = $nexY + 1;
        $pdf->line($posxini+4, $curY, $posxfin-5, $curY);
        $curY = $nexY + 2;
        $nexY = $curY;

        if ($nexY > 245)
        {
            
            $pdf->AddPage();
            $curY = $tab_top + 12;
            $nexY = 30;
            if (!empty($hidetop)){ 
                $pdf->Rect(20, $tab_top, 175, $tab_top + $tab_height, 'D');   
                /*$pdf->SetXY($posxini + 2, $tab_top+3);
                $pdf->MultiCell($posxnro-$posxini-1,2, "Nro PLU",'','C');
                $pdf->line($posxnro-1, $tab_top, $posxnro-1, $tab_top + $tab_height + 50);*/
                                
            }
            
        }

        
    }
// ---------------------------------------------------------

function cabezeraReporte($pdf){

    $pdf->SetXY(20, 10);
    $pdf->Image('../../../resources/assets/images/logopas.png', '', '', 30, 30, '', '', 'T', false, 300, '', false, false, 1, false, false, false);
    
    $posxini = PDF_MARGIN_LEFT+1;
    $posxnro = 50;
    $posxci  = 90;
    $posxben = 170;
    $posxfin = 200;
    
    $pdf->SetXY(20,27);
    $pdf->MultiCell($posxfin-$posxini,7, "REPORTE de ENTREGA de SUBSIDIOS",'','C',0, 0, '', '', true);

    $pdf->SetXY(20,33);
    $pdf->MultiCell($posxfin-$posxini,7, "De Fecha: ",'','C',0, 0, '', '', true);
}
// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('ReporteEntregaSubsidios.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
