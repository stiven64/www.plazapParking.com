<?php
// Incluye el archivo de configuración
include('../app/config.php');
// Incluye el archivo que contiene datos de la sesión del usuario
include('../layout/admin/datos_usuario_sesion.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Incluye el archivo que contiene los elementos del <head> -->
    <?php include('../layout/admin/head.php'); ?>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- Incluye el archivo que contiene el menú de navegación -->
    <?php include('../layout/admin/menu.php'); ?>
    <div class="content-wrapper">
        <br>
        <div class="container">
        <div class="row">
            <div class="col-md-6">
            <div class="alert alert-secondary" role="alert">
            <!-- Muestra un mensaje de alerta centrado -->
            <center><h2>Creación de un nuevo espacios</h2></center>
</div>
            </div>
        </div>
            

            <br>
            <div class="row">
                <div class="col-md-6">

                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <div class="card-tools">
                                <!-- Botón para colapsar el card -->
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>

                        </div>

                        <div class="card-body" style="display: block;">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form group">
                                        <label for="">Nro espacio</label>
                                        <!-- Campo de entrada para el número de espacio -->
                                        <input type="number" id="nro_espacio" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form group">
                                        <label for="">Estado</label>
                                        <!-- Menú desplegable para seleccionar el estado del espacio -->
                                        <select name="" id="estado_espacio" class="form-control">
                                            <option value="LIBRE">LIBRE</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form group">
                                        <label for="">Observaciones</label>
                                        <!-- Área de texto para observaciones -->
                                        <textarea name="" id="obs" cols="30" class="form-control" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-md-6">
                                    <!-- Botón para cancelar -->
                                    <a href="" class="btn btn-default btn-block">Cancelar</a>
                                </div>
                                <div class="col-md-6">
                                    <!-- Botón para registrar -->
                                    <button class="btn btn-primary btn-block" id="btn_registrar">
                                        Registrar
                                    </button>
                                </div>
                            </div>

                            <!-- Div para mostrar la respuesta del servidor -->
                            <div id="respuesta">

                            </div>


                        </div>

                    </div>



                </div>
            </div>

        </div>

    </div>
    <!-- /.content-wrapper -->
    <!-- Incluye el archivo que contiene el pie de página -->
    <?php include('../layout/admin/footer.php'); ?>
</div>
<!-- Incluye los archivos de enlaces del pie de página -->
<?php include('../layout/admin/footer_link.php'); ?>
</body>
</html>


<script>
    // Maneja el evento de clic en el botón de registrar
    $('#btn_registrar').click(function () {

        // Obtiene los valores de los campos del formulario
        var nro_espacio = $('#nro_espacio').val();
        var estado_espacio = $('#estado_espacio').val();
        var obs = $('#obs').val();

        // Verifica si el campo número de espacio está vacío
        if(nro_espacio == ""){
            alert('Debe de llenar el campo nro de espacio');
            $('#nro_espacio').focus();
        }
        else{
            // Si no está vacío, realiza una solicitud GET al servidor
            var url = 'controller_create.php';
            $.get(url,{nro_espacio:nro_espacio,estado_espacio:estado_espacio,obs:obs},function (datos) {
                // Muestra la respuesta del servidor en el div de respuesta
                $('#respuesta').html(datos);
            });
        }
    });
</script>
