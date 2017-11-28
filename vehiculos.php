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
		<h2 class="text-center">Vehículos</h2>
		<!-- Contenido de pagina -->
		<!-- Filtro de busqueda -->
		<div class="row">
			<div class="col-xs-12">
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
						<a id="btn-lista-filtrada" class="light-blue darken-1 waves-effect waves-light btn btn-primary text-uppercase">Buscar</a>
					</form>
				</div>
			</div>
		</div>
		<!-- Fin Filtro de busqueda -->
		<div class="row">
			<!-- boton nuevo vehiculo -->
			<?php if($_SESSION['id_rol'] == 3) { ?> <!-- Botón de agregar Empleado sólo habilitado para rol Supervisor -->
				<div class="col-xs-12 margin-top-10 margin-bottom-10">
					<div class="text-center">
						<a href ="#modalNuevoVehiculo" id="btn-nuevo-lista" class="light-blue darken-1 waves-effect waves-light btn btn-primary text-uppercase modal-trigger">
							<i class="material-icons right">input</i>
							Agregar nuevo
						</a>
						<!--<a href ="#" id="btn-nuevo-lista" class="light-blue darken-1 waves-effect waves-light btn-large modal-trigger"><i class="material-icons right">input</i>agregar mantenimiento</a>-->
					</div>
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
	<div id="modalNuevoVehiculo" class="modal">
		<div class="modal-content text-center"></div>
	</div>
	<!-- Fin Modal Nuevo Vehiculo -->

	<!-- Modal Ver Datos de Vehiculo -->
	<div id="modalDatosVehiculo" class="modal modal-fixed-footer">
		<div class="modal-content text-center"></div>
		<div class="modal-footer">
			<a href="#!" class="modal-action modal-close waves-effect waves-blue btn-flat ">Aceptar</a>
		</div>
	</div>
	<!-- Fin Modal Ver Datos de Vehiculo -->

	<!-- Modal Editar Vehiculo -->
	<div id="modalEditarVehiculo" class="modal">
		<div class="modal-content text-center"></div>
	</div>
	<!-- Fin Modal Editar de Vehiculo -->    
	<!-- Fin Contenido de pagina -->
	<?php
		require_once('source/views/shared/_footer.php');
		require_once('source/inc/scripts.php');
	?>
</body>
</html>