<?php
//============================================================+
// File name   : example_004.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 004 for TCPDF class
//               Cell stretching
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Cell stretching
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
require_once('../app/templeates/TCPDF-main/tcpdf.php');
// Include the configuration file for database connection
include('../app/config.php');

// Load header information from the database
$query_informacions = $pdo->prepare("SELECT * FROM tb_informaciones WHERE estado = '1' ");
$query_informacions->execute();
$informacions = $query_informacions->fetchAll(PDO::FETCH_ASSOC);
foreach($informacions as $informacion){
    $id_informacion = $informacion['id_informacion'];
    $nombre_parqueo = $informacion['nombre_parqueo'];
    $actividad_empresa = $informacion['actividad_empresa'];
    $sucursal = $informacion['sucursal'];
    $direccion = $informacion['direccion'];
    $zona = $informacion['zona'];
    $telefono = $informacion['telefono'];
    $departamento_ciudad = $informacion['departamento_ciudad'];
    $pais = $informacion['pais'];
}

// Create a new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Set document information
$pdf->setCreator(PDF_CREATOR); // Set the creator of the PDF
$pdf->setAuthor('Nicola Asuni'); // Set the author of the PDF
$pdf->setTitle('TCPDF Example 004'); // Set the title of the PDF
$pdf->setSubject('TCPDF Tutorial'); // Set the subject of the PDF
$pdf->setKeywords('TCPDF, PDF, example, test, guide'); // Set keywords for the PDF

// Set header data
$PDF_HEADER_TITLE = $nombre_parqueo; // Title for the header
$PDF_HEADER_STRING = $direccion.' Telf: '.$telefono; // String for the header
$PDF_HEADER_LOGO = 'auto4.jpg'; // Logo for the header
$pdf->setHeaderData($PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $PDF_HEADER_TITLE, $PDF_HEADER_STRING);

// Set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN)); // Font for the header
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA)); // Font for the footer

// Set default monospaced font
$pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// Set margins
$pdf->setMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT); // Set margins
$pdf->setHeaderMargin(PDF_MARGIN_HEADER); // Set header margin
$pdf->setFooterMargin(PDF_MARGIN_FOOTER); // Set footer margin

// Set auto page breaks
$pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM); // Enable auto page breaks

// Set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO); // Set image scale ratio

// Set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php'); // Include language file if it exists
    $pdf->setLanguageArray($l); // Set language array
}

// ---------------------------------------------------------

// Set font
$pdf->setFont('Helvetica', '', 11); // Set font for the PDF

// Add a page
$pdf->AddPage(); // Add a new page to the PDF

// Create some HTML content
$html = '
<P><b>Reporte del Listado de espacios</b></P>
<table border="1" cellpadding="4">
<tr>
<td style="background-color: #c0c0c0;text-align: center" width="80px">Nro</td>
<td style="background-color: #c0c0c0;text-align: center" width="100px">Nro de espacio</td>
</tr>
';
$contador = 0;
// Load data for the table from the database
$query_mapeos = $pdo->prepare("SELECT * FROM tb_mapeos WHERE estado = '1' ");
$query_mapeos->execute();
$mapeos = $query_mapeos->fetchAll(PDO::FETCH_ASSOC);
foreach($mapeos as $mapeo){
    $id_map = $mapeo['id_map'];
    $nro_espacio = $mapeo['nro_espacio'];
    $contador = $contador + 1; // Increment the counter

    $html .= '
    <tr>
    <td style="text-align: center">'.$contador.'</td>
    <td style="text-align: center">'.$nro_espacio.'</td>
    </tr>
    ';


}

$html.='
</table>
';

// Output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// Close and output PDF document
$pdf->Output('example_004.pdf', 'I'); // Output the PDF document inline in the browser

//============================================================+
// END OF FILE
//============================================================+
