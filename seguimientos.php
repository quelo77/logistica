<?php
    session_start();
    include_once dirname(__FILE__) . '/source/database/DBManager.php';


    if (empty($_SESSION['usuario'])) {
        header("Location: login.php");
    }

    $db = new DBManager();
    $viajes = $db->obtenerViajes();
?>

<!doctype html>
<html lang="es">

<?php require_once('source/inc/head.php'); ?>

<body>
    <?php require_once('source/inc/ga.php'); ?>
    <?php require_once('source/views/shared/_header.php'); ?>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
        		<h2 class="text-center">Seguimientos</h2>
        <!-- Contenido de pagina -->
                <!-- Lista Empleados -->
                <ul class="list-group" id="lista-viajes-con-mapa">
                    <?php foreach($viajes as $viaje): ?>
                        <li class="list-group-item text-center">
                            <p>
                                Viaje con destino a: <?php echo $viaje["DIRECCION"]; ?> <?php echo $viaje["NUMERO"]; ?>, <?php echo $viaje["LOCALIDAD"]; ?>, <?php echo $viaje["PAIS"]; ?>
                            </p>
                            <p class="text-muted">Cliente: <?php echo $viaje["CLIENTE"]; ?></p>
                            <p>
                                <a href="#modalMapa" data-id="<?php echo $viaje["ID"]; ?>" class="btn-mapa btn btn-primary text-uppercase" data-toggle="modal" data-target="#modalMapa">Ver paradas</a>
                            </p>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <!-- Fin Lista Empleados -->
            </div>
        </div>
        <!-- Fin Contenido de pagina -->        
    </div>
    <!-- Modal Mapa -->
	<div class="modal fade" id="modalMapa" tabindex="-1" role="dialog" aria-labelledby="modalMapaLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="modalMapaLabel">Paradas</h4>
				</div>
				<div class="modal-body">
            		<div id="contenedor-mapa"></div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				</div>
			</div>
		</div>
	</div>
    <!-- Fin Modal Mapa -->

    <?php
        require_once('source/views/shared/_footer.php');
        require_once('source/inc/scripts.php');
    ?>
</body>
</html>