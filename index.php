<?php
    session_start();
    if (empty($_SESSION['logueado'])) {
        header("Location: login.php");
    }
?>

<!doctype html>
<html lang="es">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<?php require_once('source/inc/head.php'); ?>

<body>
    <?php require_once('source/inc/ga.php'); ?>
    <?php require_once('source/views/shared/_header.php'); ?>
    <div class=" tarjetas container margin-top-20">
        <!-- Contenido de pagina -->
        <div class="row">
            <!-- Tarjeta Empleados -->
            <?php if($_SESSION['id_rol'] != 1) { ?>
                <div class="col-xs-12 col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <img class="img-responsive" src="assets/imagenes/empleados.jpg">
							<h2 class="h3">Empleados</h2>
							<p><a href="empleados.php" class="link">Ver Empleados</a></p>
                            <p>Ver información acerca de los empleados de esta empresa</p>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <!-- Fin Tarjeta Empleados -->

            <!-- Tarjeta vehiculos -->
            <?php if($_SESSION['id_rol'] != 1) { ?>
                <div class="col-xs-12 col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <img class="img-responsive" src="assets/imagenes/camion.jpg">
							<h2 class="h3">Vehiculos</h2>
							<p><a href="vehiculos.php" class="link">Ver Vehículos</a></p>
                            <p>Ver información acerca de los vehículos de esta empresa</p>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <!-- Fin Tarjeta vehiculos-->

            <!-- Tarjeta Viajes -->
            <?php if($_SESSION['id_rol'] != 1) { ?>
                <div class="col-xs-12 col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <img class="img-responsive" src="assets/imagenes/viajes.jpg">
							<h2 class="h3">Viajes</h2>
							<p><a href="viajes.php" class="link">Ver Viajes</a></p>
                            <p>Ver información acerca de los viajes realizados por los vehiculos</p>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <!-- Fin Tarjeta Viajes -->

            <!-- Tarjeta Reportes -->
            <?php if($_SESSION['id_rol'] == 3) { ?>
                <div class="col-xs-12 col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <img class="img-responsive" src="assets/imagenes/graficos.jpg">
							<h2 class="h3">Reportes</h2>
							<p><a href="reportes.php" class="link">Ver Reportes</a></p>
                            <p>Ver información acerca de los reportes de esta empresa</p>
                            <br>  
                        </div>
                    </div>
                </div>
            <?php } ?>
            <!-- Fin Tarjeta Reportes -->

            <!-- Tarjeta Seguimiento -->
            <div class="col-xs-12 col-md-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <img class="img-responsive" src="assets/imagenes/seguimientos.jpg">
						<h2 class="h3">Seguimiento</h2>
						<p><a href="seguimientos.php" class="link">Ver Seguimientos</a></p>
                        <p>Ver información acerca de los seguimientos de los viajes que realiza esta empresa</p>
                    </div>
                </div>
            </div>
            <!-- Fin Tarjeta Seguimiento -->        

            <!-- Tarjeta Mantenimientos -->
            <div class="col-xs-12 col-md-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <img class="img-responsive" src="assets/imagenes/mantenimientos.jpg">
						<h2 class="h3">Mantenimientos</h2>
						<p><a href="mantenimientos.php" class="link">Ver Mantenimientos</a></p>
                        <p>Ver información acerca de los mantenimientos de los vehículos de la empresa</p>
                    </div>
                </div>
            </div>
            <!-- Fin Tarjeta Mantenimientos -->                             
        </div>
    </div>

    <?php
        require_once('source/views/shared/_footer.php');
        require_once('source/inc/scripts.php');
    ?>
</body>
</html>
