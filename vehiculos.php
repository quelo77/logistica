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
		<!-- Filtro de busqueda -->
		<div class="row">
			<div class="col-xs-12">
				<h2 class="text-center">Vehículos</h2>
				<div class="well">
					<form id="formularioListaFiltrada" class="form-inline">
						<div class="form-group">
							<label for="icon_prefix" class="sr-only">Buscar Vehículo</label>
							<div class="input-group">
								<div class="input-group-addon">
									<i class="material-icons prefix">search</i>
								</div>
								<input id="icon_prefix" type="text" class="form-control validate" name="DOMINIO">
							</div>
						</div>
						<input type="submit" id="btn-lista-filtrada" value="Buscar" class="btn btn-primary text-uppercase">
					</form>
				</div>
			</div>
		</div>
		<!-- Fin Filtro de busqueda -->
		<div class="row">
			<!-- boton nuevo vehiculo -->
			<?php if($_SESSION['id_rol'] == 3) { ?> <!-- Botón de agregar Empleado sólo habilitado para rol Supervisor -->
				<div class="col-xs-12">
					<p class="text-center">
						<a href="#modalNuevoVehiculo" id="btn-nuevo-lista" class="btn btn-primary text-uppercase" data-toggle="modal" data-target="#modalNuevoVehiculo">
							<i class="material-icons right">input</i>
							Agregar nuevo
						</a>
					</p>
				</div>
			<?php } ?>
			<!-- Fin boton nuevo vehiculo -->
			<div class="col-xs-12">
				<!-- Lista Vehiculos -->
				<ul class="list-group" id="lista-vehiculos"></ul>
				<!-- Fin Lista Vehiculos -->
			</div>
		</div>        
	</div>
	<!-- Modal Nuevo Vehiculo -->
	<div class="modal fade" id="modalNuevoVehiculo" tabindex="-1" role="dialog" aria-labelledby="modalNuevoVehiculoLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="modalNuevoVehiculoLabel">Agregar nuevo vehículo</h4>
				</div>
				<div class="modal-body"></div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					<button type="button" id="btn-nuevo-vehiculo" class="btn btn-primary">Agregar Nuevo Vehiculo</button>
				</div>
			</div>
		</div>
	</div>
	<!-- Fin Modal Nuevo Vehiculo -->

	<!-- Modal Ver Datos de Vehiculo -->
	<div class="modal fade" id="modalDatosVehiculo" tabindex="-1" role="dialog" aria-labelledby="modalDatosVehiculoLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="modalDatosVehiculoLabel">Datos del vehículo</h4>
				</div>
				<div class="modal-body"></div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				</div>
			</div>
		</div>
	</div>
	<!-- Fin Modal Ver Datos de Vehiculo -->

	<!-- Modal Editar Vehiculo -->
	<div class="modal fade" id="modalEditarVehiculo" tabindex="-1" role="dialog" aria-labelledby="modalEditarVehiculoLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="modalEditarVehiculoLabel">Editar ficha del Vehículo</h4>
				</div>
				<div class="modal-body"></div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					<button type="button" id="btn-editar-vehiculo" class="btn btn-primary">Actualizar vehículo</button>
				</div>
			</div>
		</div>
	</div>
	<!-- Fin Modal Editar de Vehiculo -->    
	<!-- Fin Contenido de pagina -->
	<?php
		require_once('source/views/shared/_footer.php');
		require_once('source/inc/scripts.php');
	?>
</body>
</html>