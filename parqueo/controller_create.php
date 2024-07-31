<?php

// Incluye el archivo de configuración
include('../app/config.php');

// Obtiene los parámetros de la URL
$nro_espacio = $_GET['nro_espacio'];
$estado_espacio = $_GET['estado_espacio'];
$obs = $_GET['obs'];

// Muestra los valores obtenidos para depuración (comentado)
//echo $nro_espacio."-".$estado_espacio."-".$obs;

// Establece la zona horaria
date_default_timezone_set("America/Santo_Domingo");
// Obtiene la fecha y hora actuales en el formato especificado
$fechaHora = date("Y-m-d h:i:s");

// Prepara la sentencia SQL para insertar un nuevo registro en la tabla tb_mapeos
$sentencia = $pdo->prepare("INSERT INTO tb_mapeos 
        (nro_espacio, estado_espacio, obs, fyh_creacion, estado) 
VALUES (:nro_espacio, :estado_espacio, :obs, :fyh_creacion, :estado)");

// Asocia los parámetros con los valores correspondientes
$sentencia->bindParam('nro_espacio', $nro_espacio);
$sentencia->bindParam('estado_espacio', $estado_espacio);
$sentencia->bindParam('obs', $obs);
$sentencia->bindParam('fyh_creacion', $fechaHora);
$sentencia->bindParam('estado', $estado_del_registro);

// Ejecuta la sentencia
if($sentencia->execute()){
    // Si la ejecución es exitosa, muestra un mensaje de éxito
    echo "registro satisfactorio";
    // Redirige a la página 'mapeo-de-vehiculos.php' mediante JavaScript
    ?>
    <script>location.href = "mapeo-de-vehiculos.php";</script>
    <?php
}else{
    // Si ocurre un error, muestra un mensaje de error
    echo "no se pudo registrar a la base de datos";
}
