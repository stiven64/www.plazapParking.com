<?php
// Incluye la biblioteca TCPDF (ajusta la ruta según sea necesario)
require_once('../app/templeates/TCPDF-main/tcpdf.php');
include('../app/config.php');

// ... Resto del código para configurar el documento PDF ...
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
// Crear nuevo documento PDF
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor('Nicola Asuni');
$pdf->setTitle('TCPDF Example 004');
$pdf->setSubject('TCPDF Tutorial');
$pdf->setKeywords('TCPDF, PDF, example, test, guide');

$PDF_HEADER_TITLE = $nombre_parqueo;
$PDF_HEADER_STRING = $direccion.' Telf: '.$telefono;
$PDF_HEADER_LOGO = 'auto4.jpg';
// set default header data
$pdf->setHeaderData($PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $PDF_HEADER_TITLE, $PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->setMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->setHeaderMargin(PDF_MARGIN_HEADER);
$pdf->setFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// Consulta para cargar los datos de la tabla tb_sugerencias
$query_sugerencias = $pdo->prepare("SELECT id, nombre, email, mensaje, fecha FROM tb_sugerencias");
$query_sugerencias->execute();
$sugerencias = $query_sugerencias->fetchAll(PDO::FETCH_ASSOC);



// Añadir una página
$pdf->AddPage();

// Contenido HTML del reporte
$html = '
<h2>Listado de Sugerencias</h2>
<table border="1" cellpadding="4">
    <thead>
        <tr style="background-color: #c0c0c0; text-align: center;">
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Mensaje</th>
            <th>Fecha</th>
        </tr>
    </thead>
    <tbody>';

foreach ($sugerencias as $sugerencia) {
    $html .= '<tr>
        <td>' . $sugerencia['id'] . '</td>
        <td>' . $sugerencia['nombre'] . '</td>
        <td>' . $sugerencia['email'] . '</td>
        <td>' . $sugerencia['mensaje'] . '</td>
        <td>' . $sugerencia['fecha'] . '</td>
    </tr>';
}

$html .= '</tbody></table>';

// Escribir el contenido HTML
$pdf->writeHTML($html, true, false, true, false, '');

// Cerrar y mostrar el documento PDF
$pdf->Output('reporte_sugerencias.pdf', 'I');
?>

html.='
</table>
