<?php
// Include the configuration file for database connection
include('../app/config.php');
// Include the file for user session data
include('../layout/admin/datos_usuario_sesion.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Include the head section of the layout -->
    <?php include('../layout/admin/head.php'); ?>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- Include the menu section of the layout -->
    <?php include('../layout/admin/menu.php'); ?>
    <div class="content-wrapper">
        <br>
        <div class="container">
        <div class="col-md-11">
            <div class="alert alert-secondary" role="alert">
            <!-- Display the title of the page in an alert box -->
            <center><h2>Registro de precios</h2></center>
</div>
            </div>
</di>

            <br>
            <div class="row">
                <div class="col-md-10">

                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <div class="card-tools">
                            <!-- Button to collapse the card -->
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>

                        </div>

                        <div class="card-body" style="display: block;">
                        <!-- Form for registering prices -->
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Cantidad <span style="color: red"><b>*</b></span></label>
                                    <!-- Input field for quantity -->
                                    <input type="number" id="cantidad" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Detalle</label>
                                    <!-- Dropdown for details -->
                                    <select name="" id="detalle" class="form-control">
                                        <option value="HORAS">HORAS</option>
                                        <option value="DIAS">DIAS</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Precio <span style="color: red"><b>*</b></span></label>
                                    <!-- Input field for price -->
                                    <input type="number" id="precio" class="form-control">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <!-- Buttons for canceling and registering -->
                                    <a href="index.php" class="btn btn-default">Cancelar</a>
                                    <button class="btn btn-primary" id="btn_registrar_precio">Registrar precio</button>
                                </div>
                            </div>

                        <!-- JavaScript to handle the form submission -->
                            <script>
                                $('#btn_registrar_precio').click(function () {
                                // Get values from the form fields
                                    var cantidad = $('#cantidad').val();
                                    var detalle = $('#detalle').val();
                                    var precio = $('#precio').val();

                                // Validate the form fields
                                    if(cantidad == ""){
                                        alert("Debe de llenar el campo cantidad...");
                                        $('#cantidad').focus();
                                    }else if(precio == ""){
                                        alert("Debe de llenar el campo precio...");
                                        $('#precio').focus();
                                    }else {
                                    // Send the data to the server using GET request
                                        var url = 'controller_create.php';
                                        $.get(url,{cantidad:cantidad, detalle:detalle, precio:precio},function (datos) {
                                            $('#respuesta').html(datos);
                                        });
                                    }

                                });
                            </script>
                        </div>
                        <div id="respuesta">

                        </div>

                    </div>



                </div>
            </div>

        </div>

    </div>
    <!-- /.content-wrapper -->
    <!-- Include the footer section of the layout -->
    <?php include('../layout/admin/footer.php'); ?>
</div>
<!-- Include the footer links section of the layout -->
<?php include('../layout/admin/footer_link.php'); ?>
</body>
</html>


