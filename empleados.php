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
		<h2 class="text-center">Empleados</h2>
		<!-- Contenido de pagina -->
		<!-- Filtro de busqueda -->
		<div class="row">
			<div class="col-xs-12">
				<div class="well">
					<form id="formularioListaFiltrada" class="form-inline">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon"><i class="material-icons prefix">search</i></div>
								<input id="icon_prefix" type="text" class="form-control validate" name="NOMBREEMPLEADO">
							</div>
						</div>
						<label for="icon_prefix"><a href="#!" id="btn-lista-filtrada" class="btn btn-primary text-uppercase">Buscar Empleado</a></label>
					</form>
				</div>
			</div>

		</div>
		<p>
			<i class="material-icons prefix">print</i> 
			<a class="btn-exportar-pdf link margin-bottom-10" href="#">Exportar listado a PDF</a>
		</p>
		<!-- Fin Filtro de busqueda -->
		<div class="row">
			<!-- boton nuevo empleado -->
			<?php if($_SESSION['id_rol'] == 3) { ?> <!-- Botón de agregar Empleado sólo habilitado para rol Supervisor -->
				<div class="col-xs-12 margin-top-10 margin-bottom-10">
					<div class="text-center">
						<a href ="#modalNuevoEmpleado" id="btn-nuevo-lista" class="light-blue darken-1 waves-effect waves-light btn btn-primary text-uppercase modal-trigger"><i class="material-icons right">input</i>Agregar nuevo empleado</a>
					</div>
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
	<div class="modal fade" id="modalNuevoEmpleado" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-body"></div>
			</div>
		</div>
	</div>
	<!-- Fin Modal Nuevo Empleado -->

	<!-- Modal Ver Datos de Empleado -->
	<div class="modal fade" id="modalDatosEmpleado" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-body"></div>
				<div class="modal-footer">
					<a href="#!" class="modal-action modal-close waves-effect waves-blue btn-flat">Aceptar</a>
				</div>
			</div>
		</div>
	</div>
	<!-- Fin Modal Ver Datos de Empleado -->

	<!-- Modal Editar Empleado -->
	<div class="modal fade" id="modalEditarEmpleado" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-body"></div>
			</div>
		</div>
	</div>
	<!-- Fin Modal Editar de Empleado -->

	<!-- Modal Cargando -->
	<div class="modal fade" id="modalCargando" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<h5>Procesando datos...</h5>
				</div>
			</div>
		</div>
	</div>
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