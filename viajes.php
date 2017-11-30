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
		<!-- Contenido de pagina -->
		<div class="row">
			<div class="col-xs-12">
				<h2 class="text-center">Viajes</h2>
			</div>
			<!-- boton nuevo viaje -->
			<?php if($_SESSION['id_rol'] == 3) { ?> <!-- Botón de agregar Viaje sólo habilitado para rol Supervisor -->
				<div class="col-xs-12">
					<p class="text-center">
						<a href="#modalNuevoViaje" id="btn-nuevo-viaje-lista" class="btn btn-primary text-uppercase" data-toggle="modal" data-target="#modalNuevoViaje">
							<i class="material-icons right">input</i>
							Agregar nuevo
						</a>
					</p>
				</div>
			<?php } ?>
			<!-- Fin boton nuevo viaje -->
			<div class="col-xs-12">
				<!-- Lista Viajes -->
				<ul class="list-group" id="lista-viajes"></ul>
				<!-- Fin Lista Viajes -->
			</div>
		</div>             
	</div>
	<!-- Fin Contenido de pagina -->

	<!-- Modal Nuevo Viaje -->
	<div class="modal fade" id="modalNuevoViaje" tabindex="-1" role="dialog" aria-labelledby="modalNuevoViajeLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="modalNuevoViajeLabel">Agregar nuevo viaje</h4>
				</div>
				<div class="modal-body"></div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					<button type="button" id="btn-nuevo-viaje" class="btn btn-primary">Agregar Nuevo Viaje</button>
				</div>
			</div>
		</div>
	</div>
	<!-- Fin Modal Nuevo Viaje -->

	<!-- Modal Editar Viaje -->
	<div class="modal fade" id="modalEditarViaje" tabindex="-1" role="dialog" aria-labelledby="modalEditarViajeLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="modalEditarViajeLabel">Editar viaje</h4>
				</div>
				<div class="modal-body"></div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					<button type="button" id="btn-editar-viaje" class="btn btn-primary">Actualizar Viaje</button>
				</div>
			</div>
		</div>
	</div>
	<!-- Fin Modal Editar de Viaje -->

	<!-- Modal Ver Datos de Viaje -->
	<div class="modal fade" id="modalDatosViaje" tabindex="-1" role="dialog" aria-labelledby="modalDatosViajeLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="modalDatosViajeLabel">Datos del viaje</h4>
				</div>
				<div class="modal-body"></div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				</div>
			</div>
		</div>
	</div>
	<!-- Fin Modal Ver Datos de Viaje -->

	<?php
		require_once('source/views/shared/_footer.php');
		require_once('source/inc/scripts.php');
	?>
</body>
</html>