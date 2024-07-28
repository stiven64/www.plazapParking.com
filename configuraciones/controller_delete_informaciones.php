<?php

// Incluye el archivo de configuración
include('../app/config.php');

// Obtiene el ID de la información desde la URL
$id_informacion = $_GET['id_informacion'];
// Define el estado inactivo
$estado_inactivo = "0";

// Establece la zona horaria predeterminada y obtiene la fecha y hora actual
date_default_timezone_set("America/Santo_Domingo");
$fechaHora = date("Y-m-d h:i:s");

// Prepara la sentencia SQL para actualizar el estado y la fecha de eliminación de un registro en 'tb_informaciones'
$sentencia = $pdo->prepare("UPDATE tb_informaciones SET
estado = :estado,
fyh_eliminacion = :fyh_eliminacion 
WHERE id_informacion = :id_informacion");

// Vincula los parámetros con los valores correspondientes
$sentencia->bindParam(':estado', $estado_inactivo);
$sentencia->bindParam(':fyh_eliminacion', $fechaHora);
$sentencia->bindParam(':id_informacion', $id_informacion);

// Ejecuta la sentencia SQL y verifica si la actualización fue exitosa
if ($sentencia->execute()) {
    // Muestra un mensaje de éxito si la actualización fue exitosa
    echo "se elimino el registro de la manera correcta";
    ?>
    <script>location.href = "informaciones.php";</script>
    <?php
} else {
    // Muestra un mensaje de error si la actualización falla
    echo "error al eliminar el registro";
}
?>