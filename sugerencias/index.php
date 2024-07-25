<?php
include('../app/config.php');
include('../layout/admin/datos_usuario_sesion.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php include('../layout/admin/head.php'); ?>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <?php include('../layout/admin/menu.php'); ?>
    <div class="content-wrapper">
        <br>
        <div class="container">


   
           

            <br>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <div class="content-wrapper">
        <br>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-secondary" role="alert">
                        <center><h2>Listado de Sugerencias</h2></center>
                    </div>
                </div>
            </div>
            <br>
            <!-- Tabla HTML para mostrar los datos -->
            <div class="table-responsive">
                <table id="tablaSugerencias" class="table table-striped table-bordered table-hover">
                    <thead class="table-custom-header">
                        <tr>
                            <th><center>ID</center></th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Mensaje</th>
                            <th><center>Fecha</center></th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query_sugerencias = $pdo->prepare("SELECT id, nombre, email, mensaje, fecha FROM tb_sugerencias");
                        $query_sugerencias->execute();
                        $sugerencias = $query_sugerencias->fetchAll(PDO::FETCH_ASSOC);
                        foreach($sugerencias as $sugerencia){
                            echo "<tr>";
                            echo "<td><center>" . htmlspecialchars($sugerencia['id']) . "</center></td>";
                            echo "<td>" . htmlspecialchars($sugerencia['nombre']) . "</td>";
                            echo "<td>" . htmlspecialchars($sugerencia['email']) . "</td>";
                            echo "<td>" . htmlspecialchars($sugerencia['mensaje']) . "</td>";
                            echo "<td><center>" . htmlspecialchars($sugerencia['fecha']) . "</center></td>";
                            echo "<td class='table-action-buttons'><center>";
                            echo "</center></td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <a href="generar-reporte.php" class="btn btn-primary">Generar reporte
                <i class="fa fa">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-bar-graph" viewBox="0 0 16 16">
                        <path d="M10 13.5a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-6a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v6zm-2.5.5a.5.5 0 0 1-.5-.5v-4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5h-1zm-3 0a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-1z"/>
                        <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
                    </svg>
                </i>
            </a>
    </div>
    
    <!-- /.content-wrapper -->
    <?php include('../layout/admin/footer.php'); ?>
</div>

<!-- jQuery, Popper.js, Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<!-- Inicializar DataTables -->
<script>
    $(document).ready(function() {
        $('#tablaSugerencias').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
            }
        });
    });
</script>
<?php include('../layout/admin/footer_link.php'); ?>
</body>
</html>