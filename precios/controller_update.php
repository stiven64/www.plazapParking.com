<?php

// Include the configuration file for database connection
include('../app/config.php');

// Retrieve the parameters from the URL query string
$cantidad = $_GET['cantidad'];
$detalle = $_GET['detalle'];
$precio = $_GET['precio'];
$id_precio = $_GET['id_precio'];

// Set the default timezone
date_default_timezone_set("America/Santo_Domingo");
// Get the current date and time
$fechaHora = date("Y-m-d h:i:s");

// Prepare an SQL statement for updating a record in the tb_precios table
$sentencia = $pdo->prepare("UPDATE tb_precios SET
cantidad = :cantidad,
detalle = :detalle,
precio = :precio,
fyh_actualizacion = :fyh_actualizacion 
WHERE id_precio = :id_precio");

// Bind parameters to the SQL query
$sentencia->bindParam(':cantidad', $cantidad);
$sentencia->bindParam(':detalle', $detalle);
$sentencia->bindParam(':precio', $precio);
$sentencia->bindParam(':fyh_actualizacion', $fechaHora);
$sentencia->bindParam(':id_precio', $id_precio);

// Execute the SQL statement
if($sentencia->execute()){
    // If execution is successful, output 'success'
    echo 'success';
    // Redirect to 'index.php'
    ?>
    <script>location.href = "index.php";</script>
    <?php
}else{
    // If there's an error, output an error message
    echo 'error al registrar a la base de datos';
}
?>