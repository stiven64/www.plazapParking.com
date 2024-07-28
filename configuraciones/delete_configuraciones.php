<?php
// Incluye el archivo de configuración para conectar con la base de datos y otras configuraciones
include('../app/config.php');

// Incluye el archivo que contiene la información de la sesión del usuario administrador
include('../layout/admin/datos_usuario_sesion.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Incluye el archivo de cabecera con las configuraciones y enlaces necesarios -->
    <?php include('../layout/admin/head.php'); ?>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- Incluye el menú de la interfaz de administración -->
    <?php include('../layout/admin/menu.php'); ?>
    <div class="content-wrapper">
        <br>
        <div class="container">

            <h2>Eliminación de la información</h2>

            <br>
            <div class="row">
                <div class="col-md-12">

                    <div class="card card-outline card-danger">
                        <div class="card-header">
                            <h3 class="card-title">¿Esta seguro de eliminar este registro?</h3>
                            <div class="card-tools">
                                <!-- Botón para colapsar el contenido de la tarjeta -->
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>

                        </div>

                        <?php
                        // Obtiene el ID de la información a eliminar desde la URL
                        $id_informacion_get = $_GET['id'];

                        // Prepara y ejecuta una consulta para obtener los datos de la información
                        $query_informacions = $pdo->prepare("SELECT * FROM tb_informaciones WHERE estado = '1' AND id_informacion = '$id_informacion_get' ");
                        $query_informacions->execute();
                        $informacions = $query_informacions->fetchAll(PDO::FETCH_ASSOC);

                        // Recorre los resultados de la consulta
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
                        ?>

                        <div class="card-body" style="display: block;">

                            <div class="row">
                                <div class="col-md-5">
                                    <label for="">Nombre del parqueo <span style="color: red"><b></b></span></label>
                                    <!-- Campo deshabilitado que muestra el nombre del parqueo -->
                                    <input type="text" class="form-control" id="nombre_parqueo" value="<?php echo $nombre_parqueo; ?>" disabled>
                                </div>
                                <div class="col-md-5">
                                    <label for="">Actividad de la empresa <span style="color: red"><b></b></span></label>
                                    <!-- Campo deshabilitado que muestra la actividad de la empresa -->
                                    <input type="text" class="form-control" id="actividad_empresa" value="<?php echo $actividad_empresa; ?>" disabled>
                                </div>
                                <div class="col-md-2">
                                    <label for="">Sucursal <span style="color: red"><b></b></span></label>
                                    <!-- Campo deshabilitado que muestra la sucursal -->
                                    <input type="text" class="form-control" id="sucursal" value="<?php echo $sucursal; ?>" disabled>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Dirección <span style="color: red"><b></b></span></label>
                                    <!-- Campo deshabilitado que muestra la dirección -->
                                    <input type="text" class="form-control" id="direccion" value="<?php echo $direccion; ?>" disabled>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Zona <span style="color: red"><b></b></span></label>
                                    <!-- Campo deshabilitado que muestra la zona -->
                                    <input type="text" class="form-control" id="zona" value="<?php echo $zona; ?>" disabled>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <label for="">Teléfono <span style="color: red"><b></b></span></label>
                                    <!-- Campo deshabilitado que muestra el teléfono -->
                                    <input type="text" class="form-control" id="telefono" value="<?php echo $telefono; ?>" disabled>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Departamento o ciudad <span style="color: red"><b></b></span></label>
                                    <!-- Campo deshabilitado que muestra el departamento o ciudad -->
                                    <input type="text" class="form-control" id="departamento_ciudad" value="<?php echo $departamento_ciudad; ?>" disabled>
                                </div>
                                <div class="col-md-4">
                                    <label for="">País <span style="color: red"><b></b></span></label>
                                    <!-- Campo deshabilitado que muestra el país -->
                                    <input type="text" class="form-control" id="pais" value="<?php echo $pais; ?>" disabled>
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-md-6">
                                    <!-- Botón para cancelar la eliminación y volver a la lista de informaciones -->
                                    <a href="informaciones.php" class="btn btn-default btn-block">Cancelar</a>
                                </div>
                                <div class="col-md-6">
                                    <!-- Botón para confirmar la eliminación -->
                                    <button class="btn btn-danger btn-block" id="btn_borrar_informacion">
                                        Eliminar
                                    </button>
                                </div>
                            </div>

                            <div id="respuesta">
                                <!-- Aquí se mostrará la respuesta del servidor -->
                            </div>


                        </div>

                    </div>



                </div>
            </div>

        </div>

    </div>
    <!-- /.content-wrapper -->
    <!-- Incluye el pie de página de la interfaz de administración -->
    <?php include('../layout/admin/footer.php'); ?>
</div>
<!-- Incluye los enlaces a los scripts del pie de página -->
<?php include('../layout/admin/footer_link.php'); ?>
</body>
</html>


<script>
// Maneja el evento de clic del botón para eliminar la información
$('#btn_borrar_informacion').click(function () {

    var id_informacion = '<?php echo $id_informacion_get; ?>';


            //alert("esta listo para el controlador");
            var url = 'controller_delete_informaciones.php';
            $.get(url,{id_informacion:id_informacion},function (datos) {
                $('#respuesta').html(datos);
            });

    });
</script>
