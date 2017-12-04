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
				<h2 class="text-center">Empleados</h2>
		<!-- Contenido de pagina -->
		<!-- Filtro de busqueda -->
				<div class="well">
					<form id="formularioListaFiltrada" class="form-inline">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon"><i class="material-icons prefix">search</i></div>
								<input id="icon_prefix" type="text" class="form-control validate" name="NOMBREEMPLEADO">
							</div>
						</div>
						<input type="submit" id="btn-lista-filtrada" value="Buscar Empleado" class="btn btn-primary text-uppercase">
					</form>
				</div>
			</div>

		</div>
		<p>
			<i class="material-icons prefix">print</i> 
			<a class="btn-exportar-pdf link" href="#">Exportar listado a PDF</a>
		</p>
		<!-- Fin Filtro de busqueda -->
		<div class="row">
			<!-- boton nuevo empleado -->
			<?php if($_SESSION['id_rol'] == 3) { ?> <!-- Botón de agregar Empleado sólo habilitado para rol Supervisor -->
				<div class="col-xs-12">
					<p class="text-center">
						<a href="#modalNuevoEmpleado" id="btn-nuevo-lista" class="btn btn-primary text-uppercase" data-toggle="modal" data-target="#modalNuevoEmpleado">
							<i class="material-icons right">input</i>
							Agregar nuevo empleado
						</a>
					</p>
				</div>
			<?php } ?>
			<!-- Fin boton nuevo empleado -->
			<div class="col-xs-12">
				<!-- Lista Empleados --> 
				<ul class="list-group" id="lista-empleados"></ul>
				<!-- Fin Lista Empleados -->
			</div>
		</div>
	</div>
	<!-- Modal Nuevo Empleado -->
	<div class="modal fade" id="modalNuevoEmpleado" tabindex="-1" role="dialog" aria-labelledby="modalNuevoEmpleadoLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="modalNuevoEmpleadoLabel">Nuevo empleado</h4>
				</div>
				<div class="modal-body"></div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" id="btn-nuevo-empleado" class="btn btn-primary">Agregar Nuevo Empleado</button>
				</div>
			</div>
		</div>
	</div>
	<!-- Fin Modal Nuevo Empleado -->

	<!-- Modal Ver Datos de Empleado -->
	<div class="modal fade" id="modalDatosEmpleado" tabindex="-1" role="dialog" aria-labelledby="modalDatosEmpleadoLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="modalDatosEmpleadoLabel">Datos del empleado</h4>
				</div>
				<div class="modal-body"></div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
				</div>
			</div>
		</div>
	</div>
	<!-- Fin Modal Ver Datos de Empleado -->

	<!-- Modal Editar Empleado -->
	<div class="modal fade" id="modalEditarEmpleado" tabindex="-1" role="dialog" aria-labelledby="modalEditarEmpleadoLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="modalEditarEmpleadoLabel">Editar empleado</h4>
				</div>
				<div class="modal-body"></div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button"id="btn-editar-empleado" class="btn btn-primary">Actualizar Empleado</button>
				</div>
			</div>
		</div>
	</div>
	<!-- Fin Modal Editar de Empleado -->

	<!-- Modal Cargando -->
<!--
	<div class="modal fade" id="modalCargando" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<h5>Procesando datos...</h5>
				</div>
			</div>
		</div>
	</div>
-->
	<!-- Fin Modal Cargando -->

	<!-- Fin Contenido de pagina -->
	<?php
		require_once('source/views/shared/_footer.php');
		require_once('source/inc/scripts.php');
	?>

	<script type="text/javascript">
		var empleados = new Empleados();
		empleados.cargarLista();
		empleados.cargarEventoBtnFiltroEmpleado();
	</script>
</body>
</html>