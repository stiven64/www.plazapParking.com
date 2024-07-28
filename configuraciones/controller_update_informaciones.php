<?php

// Incluye el archivo de configuración
include('../app/config.php');

// Obtiene los datos de los parámetros GET
$nombre_parqueo = $_GET['nombre_parqueo'];
$actividad_empresa = $_GET['actividad_empresa'];
$sucursal = $_GET['sucursal'];
$direccion = $_GET['direccion'];
$zona = $_GET['zona'];
$telefono = $_GET['telefono'];
$departamento_ciudad = $_GET['departamento_ciudad'];
$pais = $_GET['pais'];
$id_informacion = $_GET['id_informacion'];

// Establece la zona horaria predeterminada y obtiene la fecha y hora actual
date_default_timezone_set("America/Santo_Domingo");
$fechaHora = date("Y-m-d h:i:s");

// Prepara la sentencia SQL para actualizar los datos en la tabla 'tb_informaciones'
$sentencia = $pdo->prepare("UPDATE tb_informaciones SET
nombre_parqueo = :nombre_parqueo,
actividad_empresa = :actividad_empresa,
sucursal = :sucursal,
direccion = :direccion,
zona = :zona,
telefono = :telefono,
departamento_ciudad = :departamento_ciudad,
pais = :pais,
fyh_actualizacion = :fyh_actualizacion 
WHERE id_informacion = :id_informacion");

// Vincula los parámetros con los valores obtenidos de la solicitud GET
$sentencia->bindParam(':nombre_parqueo', $nombre_parqueo);
$sentencia->bindParam(':actividad_empresa', $actividad_empresa);
$sentencia->bindParam(':sucursal', $sucursal);
$sentencia->bindParam(':direccion', $direccion);
$sentencia->bindParam(':zona', $zona);
$sentencia->bindParam(':telefono', $telefono);
$sentencia->bindParam(':departamento_ciudad', $departamento_ciudad);
$sentencia->bindParam(':pais', $pais);
$sentencia->bindParam('fyh_actualizacion', $fechaHora);
$sentencia->bindParam('id_informacion', $id_informacion);

// Ejecuta la sentencia SQL y verifica si la actualización fue exitosa
if ($sentencia->execute()) {
    echo 'success';
    // Redirige a la página 'informaciones.php' si la actualización fue exitosa
    ?>
    <script>location.href = "informaciones.php";</script>
    <?php
} else {
    // Muestra un mensaje de error si la actualización falla
    echo 'error al registrar a la base de datos';
}
?>