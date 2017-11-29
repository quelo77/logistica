<?php
    session_start();
    include_once dirname(__FILE__) . '/source/database/DBManager.php';

    if (empty($_SESSION['usuario'])) {
        header("Location: login.php");
    }
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
        		<h2 class="text-center">Mantenimientos</h2>
			</div>
        <!-- Contenido de pagina -->
            <!-- boton nuevo mantenimiento -->
            <?php if($_SESSION['id_rol'] == 3) { ?> <!-- Botón de agregar mantenimiento sólo habilitado para rol Supervisor -->
                <div class="col-xs-12">
                    <p class="text-center">
                        <a href ="#modalNuevoMantenimiento" id="btn-nuevo-lista" class="btn btn-primary text-uppercase modal-trigger"><i class="material-icons right">input</i> agregar nuevo</a>
                    </p>
                </div>
            <?php } ?>
            <!-- Fin boton nuevo mantenimiento -->
            <div class="col-xs-12">
                <!-- Lista Mantenimientos -->
                <ul class="list-group" id="lista-mantenimientos"></ul>
                <!-- Fin Lista mantenimientos -->
            </div>
        </div>        
    </div>
    <!-- Modal Nuevo mantenimiento -->
	<div class="modal fade" id="modalNuevoMantenimiento" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-body"></div>
			</div>
		</div>
	</div>
    <!-- Fin Modal Nuevo mantenimiento -->

    <!-- Modal Ver Datos de mantenimiento -->
	<div class="modal fade" id="modalDatosMantenimiento" tabindex="-1" role="dialog" aria-labelledby="modalDatosMantenimientoLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="modalDatosMantenimientoLabel">Ficha del Mantenimiento</h4>
				</div>
				<div class="modal-body"></div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
				</div>
			</div>
		</div>
	</div>
    <!-- Fin Modal Ver Datos de mantenimiento -->

    <!-- Fin Modal Editar de mantenimiento -->    
    <!-- Fin Contenido de pagina -->
    <?php
        require_once('source/views/shared/_footer.php');
        require_once('source/inc/scripts.php');
    ?>
</body>
</html>