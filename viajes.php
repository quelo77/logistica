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
	<div class="container margin-top-20">
		<!-- Contenido de pagina -->
		<div class="row">
			<div class="col-xs-12">
				<h2 class="text-center">Viajes</h2>
			</div>
			<!-- boton nuevo viaje -->
			<?php if($_SESSION['id_rol'] == 3) { ?> <!-- Botón de agregar Viaje sólo habilitado para rol Supervisor -->
				<div class="col-xs-12">
					<p class="text-center">
						<a href ="#modalNuevoViaje" id="btn-nuevo-viaje-lista" class="btn btn-primary text-uppercase modal-trigger">
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
	<div class="modal fade" id="modalNuevoViaje" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-body"></div>
			</div>
		</div>
	</div>
	<!-- Fin Modal Nuevo Viaje -->

	<!-- Modal Editar Viaje -->
	<div class="modal fade" id="modalEditarViaje" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-body"></div>
			</div>
		</div>
	</div>
	<!-- Fin Modal Editar de Viaje -->

	<!-- Modal Ver Datos de Viaje -->
	<div class="modal fade" id="modalDatosViaje" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-body"></div>
				<div class="modal-footer">
					<a href="#!" class="modal-action modal-close waves-effect waves-blue btn-flat">Aceptar</a>
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