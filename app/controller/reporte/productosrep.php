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
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 001');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));

//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, '', 'Proveedora de Alimentos y Servicios', array(0,64,255), array(0,64,128));
$pdf->setFooterData(array(0,64,0), array(0,64,128));

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
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

//Declaramos las columnas
$posxini = PDF_MARGIN_LEFT+1;
$posxnro = 40;
$posxnom = 90;
$posxtip = 110;
$posxpre = 140;
$posxplu = 170;
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
    $pdf->MultiCell($posxnro-$posxini-1,7, "Nro PLU",'','C',0, 0, '', '', true);
    $pdf->line($posxnro-1, $tab_top, $posxnro-1, $tab_top + $tab_height + 50);
    
    $pdf->SetXY($posxnro-1, $tab_top+3);
    $pdf->MultiCell($posxnom-$posxnro-1,2, "Nombre Producto",'','C');
    $pdf->line($posxnom-1, $tab_top, $posxnom-1, $tab_top + $tab_height+ 50);

    $pdf->SetXY($posxnom-1, $tab_top+1);
    $pdf->MultiCell($posxtip-$posxnom-1,2, "Tipo de Venta",'','C');
    $pdf->line($posxtip-1, $tab_top, $posxtip-1, $tab_top + $tab_height+ 50);

    $pdf->SetXY($posxtip-1, $tab_top+3);
    $pdf->MultiCell($posxpre-$posxtip-1,2, "Precio",'','C');
    $pdf->line($posxpre-1, $tab_top, $posxpre-1, $tab_top + $tab_height+ 50);

    $pdf->SetXY($posxpre-1, $tab_top+3);
    $pdf->MultiCell($posxplu-$posxpre-1,2, "Codigo PLU",'','C');
    $pdf->line($posxplu-1, $tab_top, $posxplu-1, $tab_top + $tab_height+ 50);

    $pdf->SetXY($posxplu-1, $tab_top+3);
    $pdf->MultiCell($posxfin-$posxplu-1,2, "Seccion",'','C');
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
        $pdf->MultiCell($posxnro-$posxini-1, 1,$fila['nro_plu'] , 0, 'C',0);

        $pdf->SetXY($posxnro, $curY);
        $pdf->MultiCell($posxnom-$posxnro-1, 1,$fila['nombreuno'] , 0, 'L',0);

        $pdf->SetXY($posxnom, $curY);
        if($fila['tipo'] == 1){
            $pdf->MultiCell($posxtip-$posxnom-1, 1,"Cantidad", 0, 'C',0);
        }
        if($fila['tipo'] == 2){
            $pdf->MultiCell($posxtip-$posxnom-1, 1,"Peso" , 0, 'C',0);
        }    

        $pdf->SetXY($posxtip, $curY);
        $pdf->MultiCell($posxpre-$posxtip-1, 1,$fila['precio'] , 0, 'C',0);

        $pdf->SetXY($posxpre, $curY);
        $pdf->MultiCell($posxplu-$posxpre-1, 1,$fila['cod_plu'] , 0, 'C',0);

        $pdf->SetXY($posxplu, $curY);
        $pdf->MultiCell($posxfin-$posxplu-1, 1,$fila['nombredos'] , 0, 'L',0);

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
                $pdf->SetXY($posxini + 2, $tab_top+3);
                $pdf->MultiCell($posxnro-$posxini-1,2, "Nro PLU",'','C');
                $pdf->line($posxnro-1, $tab_top, $posxnro-1, $tab_top + $tab_height + 50);
                
                $pdf->SetXY($posxnro-1, $tab_top+3);
                $pdf->MultiCell($posxnom-$posxnro-1,2, "Nombre Producto",'','C');
                $pdf->line($posxnom-1, $tab_top, $posxnom-1, $tab_top + $tab_height+ 50);
            
                $pdf->SetXY($posxnom-1, $tab_top+1);
                $pdf->MultiCell($posxtip-$posxnom-1,2, "Tipo de Venta",'','C');
                $pdf->line($posxtip-1, $tab_top, $posxtip-1, $tab_top + $tab_height+ 50);
            
                $pdf->SetXY($posxtip-1, $tab_top+3);
                $pdf->MultiCell($posxpre-$posxtip-1,2, "Precio",'','C');
                $pdf->line($posxpre-1, $tab_top, $posxpre-1, $tab_top + $tab_height+ 50);
            
                $pdf->SetXY($posxpre-1, $tab_top+3);
                $pdf->MultiCell($posxplu-$posxpre-1,2, "Codigo PLU",'','C');
                $pdf->line($posxplu-1, $tab_top, $posxplu-1, $tab_top + $tab_height+ 50);
            
                $pdf->SetXY($posxplu-1, $tab_top+3);
                $pdf->MultiCell($posxfin-$posxplu-1,2, "Acciones",'','C');
                //$pdf->line($posxci-1, $tab_top, $posxci-1, $tab_top + $tab_height+ 50);
                $pdf->line(20, $tab_top+10, 216-21, $tab_top+10);
            }
            
        }

        
    }
// ---------------------------------------------------------

function cabezeraReporte($pdf){

    $pdf->SetXY(20, 10);
    $pdf->Image('../../../resources/assets/images/logopas.png', '', '', 30, 30, '', '', 'T', false, 300, '', false, false, 1, false, false, false);
    
    $posxini = PDF_MARGIN_LEFT+1;
    $posxfin = 200;
    
    $pdf->SetXY(20,27);
    $pdf->MultiCell($posxfin-$posxini,7, "REPORTE DE PRODUCTOS",'','C',0, 0, '', '', true);

    $pdf->SetXY(20,33);
    $pdf->MultiCell($posxfin-$posxini,7, "Fecha: ".date("Y-m-d H:i:s"),'','C',0, 0, '', '', true);
}

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('ReporteProductos.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
