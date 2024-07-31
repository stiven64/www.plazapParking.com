<?php

// Incluye el archivo de configuración
include('../app/config.php');

// Obtiene el parámetro 'cuviculo' de la URL
$cuviculo = $_GET['cuviculo'];
// Define el estado del espacio como "RESERVADO"
$estado_espacio = "RESERVADO";

// Establece la zona horaria
date_default_timezone_set("America/Santo_Domingo");
// Obtiene la fecha y hora actuales en el formato especificado
$fechaHora = date("Y-m-d h:i:s");

// Prepara la sentencia SQL para actualizar el estado del espacio y la fecha de actualización
$sentencia = $pdo->prepare("UPDATE tb_mapeos SET
estado_espacio = :estado_espacio,
fyh_actualizacion = :fyh_actualizacion 
WHERE id_map = :id_map");

// Asocia los parámetros con los valores correspondientes
$sentencia->bindParam(':estado_espacio', $estado_espacio);
$sentencia->bindParam(':fyh_actualizacion', $fechaHora);
$sentencia->bindParam(':id_map', $cuviculo);

// Ejecuta la sentencia
if($sentencia->execute()){
    // Si la ejecución es exitosa, muestra un mensaje de éxito
    echo "se actualizo el registro de la manera correcta";
    ?>
    <!-- El siguiente script redirige a la página de usuarios, actualmente está comentado -->
    <!-- <script>location.href = "../usuarios/";</script> -->
    <?php
}else{
    // Si ocurre un error, muestra un mensaje de error
    echo "error al actualizar el registro";
}