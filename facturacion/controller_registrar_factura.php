<?php

// Incluir el archivo de configuración para la conexión a la base de datos
include('../app/config.php');

// Incluir el archivo que contiene la función de conversión de número a literal
include('literal.php');

// Establecer la zona horaria a "America/Santo_Domingo"
date_default_timezone_set("America/Santo_Domingo");

// Obtener la fecha y hora actual en el formato "Y-m-d h:i:s"
$fechaHora = date("Y-m-d h:i:s");

// Obtener el día actual
$dia = date("d");

// Obtener el mes actual
$mes = date('m');
if($mes=="1")$mes = "Enero";
if($mes=="2")$mes = "Febrero";
if($mes=="3")$mes = "Marzo";
if($mes=="4")$mes = "Abril";
if($mes=="5")$mes = "Mayo";
if($mes=="6")$mes = "Junio";
if($mes=="7")$mes = "Julio";
if($mes=="8")$mes = "Agosto";
if($mes=="9")$mes = "Septiembre";
if($mes=="10")$mes = "Octubre";
if($mes=="11")$mes = "Noviembre";
if($mes=="12")$mes = "Diciembre";
$ano = date('Y');

// Convertir el número del mes a su nombre correspondiente en español
if($mes=="1") $mes = "Enero";
if($mes=="2") $mes = "Febrero";
if($mes=="3") $mes = "Marzo";
if($mes=="4") $mes = "Abril";
if($mes=="5") $mes = "Mayo";
if($mes=="6") $mes = "Junio";
if($mes=="7") $mes = "Julio";
if($mes=="8") $mes = "Agosto";
if($mes=="9") $mes = "Septiembre";
if($mes=="10") $mes = "Octubre";
if($mes=="11") $mes = "Noviembre";
if($mes=="12") $mes = "Diciembre";

// Obtener el año actual
$ano = date('Y');

// Obtener los parámetros de la URL: id_informacion, nro_factura, id_cliente
$id_informacion = $_GET['id_informacion'];
$nro_factura = $_GET['nro_factura'];
$id_cliente = $_GET['id_cliente'];

// Recuperar la información de la tabla tb_informaciones basada en id_informacion
$query_info = $pdo->prepare("SELECT * FROM tb_informaciones WHERE id_informacion = '$id_informacion' AND estado = '1' ");
$query_info->execute();
$infos = $query_info->fetchAll(PDO::FETCH_ASSOC);
foreach($infos as $info){
    // Obtener el valor de departamento_ciudad
    $departamento_ciudad = $info['departamento_ciudad'];
}

// Formatear la fecha de la factura
$fecha_factura = $departamento_ciudad.", ".$dia." de ".$mes." de ".$ano;

// Obtener los parámetros de la URL: fecha_ingreso, hora_ingreso
$fecha_ingreso = $_GET['fecha_ingreso'];
$hora_ingreso = $_GET['hora_ingreso'];

// Obtener la fecha y hora de salida actuales
$fecha_salida = date('Y-m-d');
$fecha_salida_para_calcular = date('Y/m/d');
$hora_salida = date('H:i');

// Calcular la diferencia entre la fecha y hora de ingreso y salida
$fecha_hora_ingreso = $fecha_ingreso." ".$hora_ingreso;
$fecha_hora_salida = $fecha_salida." ".$hora_salida;

$fecha_hora_ingreso  = new DateTime($fecha_hora_ingreso);
$fecha_hora_salida = new DateTime($fecha_hora_salida);
$diff = $fecha_hora_ingreso ->diff($fecha_hora_salida);

// Formatear la diferencia de tiempo
$tiempo = $diff->days." días con ".$diff->h." horas con ".$diff->i." minutos ";
//////////////////// CALCULA LA DIFERENCIA ENTRE EL TIEMPO DE ENTRADA Y DE SALIDA /////////////////////////////

// Obtener el parámetro de la URL: cubiculo
$cuviculo = $_GET['cubiculo'];

// Detalle del servicio
$detalle = "Servicio de parqueo de ".$tiempo;

// Calcular el precio basado en las horas de diferencia
$query_precios = $pdo->prepare("SELECT * FROM tb_precios WHERE cantidad = '$diff->h' AND detalle = 'HORAS' AND estado = '1'  ");
$query_precios->execute();
$datos_precios = $query_precios->fetchAll(PDO::FETCH_ASSOC);
foreach($datos_precios as $datos_precio){
    // Obtener el precio por hora
    $precio_hora = $datos_precio['precio'];
}
/////////////////////////////////////////////////////////


// Inicializar el precio por día
$precio_dia = 0;

// Calcular el precio basado en los días de diferencia
$query_precios_dias = $pdo->prepare("SELECT * FROM tb_precios WHERE cantidad = '$diff->days' AND detalle = 'DIAS' AND estado = '1'  ");
$query_precios_dias->execute();
$datos_precios_dias = $query_precios_dias->fetchAll(PDO::FETCH_ASSOC);
foreach($datos_precios_dias as $datos_precios_dia){
    // Obtener el precio por día
    $precio_dia = $datos_precios_dia['precio'];
}
/////////////////////////////////////////////////////////

// Calcular el precio final sumando el precio por día y por hora
$precio_final = $precio_dia + $precio_hora;

// Definir la cantidad como 1
$cantidad = "1";

// Calcular el monto total
$total = ($precio_final * $cantidad);

// Asignar el monto total
$monto_total = $total;

// Convertir el monto total a letras
$monto_literal = numtoletras($monto_total);

// Obtener el parámetro de la URL: user_sesion
$user_sesion = $_GET['user_sesion'];

// Recuperar los datos del cliente de la tabla tb_clientes
$query_clientes = $pdo->prepare("SELECT * FROM tb_clientes WHERE id_cliente = '$id_cliente' AND estado = '1'  ");
$query_clientes->execute();
$datos_clientes = $query_clientes->fetchAll(PDO::FETCH_ASSOC);
foreach($datos_clientes as $datos_cliente){
    // Asignar los datos del cliente
    $id_cliente = $datos_cliente['id_cliente'];
    $nombre_cliente = $datos_cliente['nombre_cliente'];
    $nit_ci_cliente = $datos_cliente['nit_ci_cliente'];
    $placa_auto = $datos_cliente['placa_auto'];
}
/////////////////////////////////////////////////////////////////////////////////////////////

$qr = "Factura realizada por el sistema de paqueo, al cliente ".$nombre_cliente." con CI/NIT:
 ".$nit_ci_cliente." con el vehiculo con número de placa ".$placa_auto." y esta factura se genero en
  ".$fecha_factura." a hr: ".$hora_salida;

// Generar el código QR con la información de la factura
$qr = "Factura realizada por el sistema de parqueo, al cliente ".$nombre_cliente." con CI/NIT: ".$nit_ci_cliente." con el vehiculo con número de placa ".$placa_auto." y esta factura se generó en ".$fecha_factura." a hr: ".$hora_salida;

// Preparar la sentencia SQL para insertar los datos de la factura en la tabla tb_facturaciones
$sentencia = $pdo->prepare('INSERT INTO tb_facturaciones
(id_informacion,nro_factura,id_cliente,fecha_factura,fecha_ingreso,hora_ingreso,fecha_salida,hora_salida,tiempo,cubiculo,detalle,precio,cantidad,total,monto_total,monto_literal,user_sesion,qr, fyh_creacion, estado)
VALUES ( :id_informacion,:nro_factura,:id_cliente,:fecha_factura,:fecha_ingreso,:hora_ingreso,:fecha_salida,:hora_salida,:tiempo,:cubiculo,:detalle,:precio,:cantidad,:total,:monto_total,:monto_literal,:user_sesion,:qr,:fyh_creacion,:estado)');

// Enlazar los parámetros de la sentencia SQL con las variables correspondientes
$sentencia->bindParam(':id_informacion',$id_informacion);
$sentencia->bindParam(':nro_factura',$nro_factura);
$sentencia->bindParam(':id_cliente',$id_cliente);
$sentencia->bindParam(':fecha_factura',$fecha_factura);
$sentencia->bindParam(':fecha_ingreso',$fecha_ingreso);
$sentencia->bindParam(':hora_ingreso',$hora_ingreso);
$sentencia->bindParam(':fecha_salida',$fecha_salida);
$sentencia->bindParam(':hora_salida',$hora_salida);
$sentencia->bindParam(':tiempo',$tiempo);
$sentencia->bindParam(':cubiculo',$cubiculo);
$sentencia->bindParam(':detalle',$detalle);
$sentencia->bindParam(':precio',$precio_final);
$sentencia->bindParam(':cantidad',$cantidad);
$sentencia->bindParam(':total',$total);
$sentencia->bindParam(':monto_total',$monto_total);
$sentencia->bindParam(':monto_literal',$monto_literal);
$sentencia->bindParam(':user_sesion',$user_sesion);
$sentencia->bindParam(':qr',$qr);
$sentencia->bindParam('fyh_creacion',$fechaHora);
$sentencia->bindParam('estado',$estado_del_registro);

// Ejecutar la sentencia SQL y verificar si la inserción fue exitosa
if($sentencia->execute()){
    // Mostrar mensaje de éxito
    echo 'success';

    // Actualizar el estado del espacio a "LIBRE" en la tabla tb_mapeos
    $estado_espacio = "LIBRE";
    date_default_timezone_set("America/caracas");
    $fechaHora = date("Y-m-d h:i:s");
    $sentencia = $pdo->prepare("UPDATE tb_mapeos SET
    estado_espacio = :estado_espacio,
    fyh_actualizacion = :fyh_actualizacion 
    WHERE nro_espacio = :nro_espacio");
    $sentencia->bindParam(':estado_espacio',$estado_espacio);
    $sentencia->bindParam(':fyh_actualizacion',$fechaHora);
    $sentencia->bindParam(':nro_espacio',$cubiculo);
    $sentencia->execute();


    $estado_espacio_ticket = "LIBRE";
    $sentencia_ticket = $pdo->prepare("UPDATE tb_tickets SET
    estado_ticket = :estado_ticket WHERE fecha_ingreso = :fecha_ingreso AND hora_ingreso = :hora_ingreso");
    $sentencia_ticket->bindParam(':estado_ticket',$estado_espacio_ticket);
    $sentencia_ticket->bindParam(':fecha_ingreso',$fecha_ingreso);
    $sentencia_ticket->bindParam(':hora_ingreso',$hora_ingreso);
    $sentencia_ticket->execute();


    ?>
    <script>location.href = "facturacion/factura.php";</script>
    <?php
}else{
    echo 'error al registrar a la base de datos';
}
