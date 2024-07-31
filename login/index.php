<?php
// Incluye el archivo de configuración que contiene variables y ajustes necesarios
include('../app/config.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Título de la página que aparecerá en la pestaña del navegador -->
    <title>AdminLTE 3 | Log in</title>
    <!-- Indica al navegador que sea responsive a diferentes anchos de pantalla -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome para íconos -->
    <link rel="stylesheet" href="<?php echo $URL;?>/app/templeates/AdminLTE-3.0.5/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons para íconos adicionales -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap para estilos de casillas de verificación -->
    <link rel="stylesheet" href="<?php echo $URL;?>/app/templeates/AdminLTE-3.0.5/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Estilos principales del tema AdminLTE -->
    <link rel="stylesheet" href="<?php echo $URL;?>/app/templeates/AdminLTE-3.0.5/dist/css/adminlte.min.css">
    <!-- Fuente de Google: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">

<!-- Centra la imagen de la página de inicio de sesión -->
<center>
    <img src="<?php echo $URL;?>/public/imagenes/auto1.png" width="100px" alt=""> <br><br>
</center>

<!-- Contenedor principal para la caja de inicio de sesión -->
<div class="login-box">
    <!-- Logo del sistema -->
    <div class="login-logo">
        <a href=""><b>SISTEMA DE</b> PARQUEO</a>
    </div>
    <!-- /.login-logo -->
    
    <!-- Caja de la tarjeta de inicio de sesión -->
    <div class="card">
        <div class="card-body login-card-body">
            <!-- Mensaje de inicio de sesión -->
            <p class="login-box-msg">Inicio de sesión</p>

            <!-- Formulario de inicio de sesión -->
            <form action="controller_login.php" method="post">
                <!-- Campo oculto para enviar un valor específico -->
                <input type="text" name="form_login" value="form_login" hidden>
                
                <!-- Grupo de entrada para el correo electrónico -->
                <div class="input-group mb-3">
                    <input type="email" name="usuario" class="form-control" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <!-- Ícono de correo electrónico -->
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                
                <!-- Grupo de entrada para la contraseña -->
                <div class="input-group mb-3">
                    <input type="password" name="password_user" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <!-- Ícono de candado para la contraseña -->
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                
                <!-- Fila para el botón de enviar -->
                <div class="row">
                    <!-- Columna para el botón -->
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->

<!-- jQuery para funcionalidades de JavaScript -->
<script src="<?php echo $URL;?>/app/templeates/AdminLTE-3.0.5/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 para componentes y estilos de Bootstrap -->
<script src="<?php echo $URL;?>/app/templeates/AdminLTE-3.0.5/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Archivo JavaScript de AdminLTE -->
<script src="<?php echo $URL;?>/app/templeates/AdminLTE-3.0.5/dist/js/adminlte.min.js"></script>

</body>
</html>
