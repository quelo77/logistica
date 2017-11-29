<?php
session_start();
include '../../database/DBManager.php';
if (empty($_SESSION['usuario'])) header("Location: login.php");
$db = new DBManager();

$viajes = $db->obtenerViajes();

?>

<?php foreach($viajes as $viaje): ?>
    <li class="list-group-item">
		<div class="media">
			<div class="media-body">
				<h4 class="media-heading">
					Viaje con destino a: <?php echo $viaje["DIRECCION"]; ?> <?php echo $viaje["NUMERO"]; ?>, <?php echo $viaje["LOCALIDAD"]; ?>, <?php echo $viaje["PAIS"]; ?>
				</h4>
				<p class="text-muted">Cliente: <?php echo $viaje["CLIENTE"]; ?></p>
				<p><a class="btn-datos-viaje link" data-id="<?php echo $viaje["ID"]; ?>" href="#modalDatosViaje" data-toggle="modal" data-target="#modalDatosViaje">Ver datos de viaje</a></p>
				<!-- 
					Los botones de de Editar y Eliminar Empleado solo estan disponibles si el usuario
					que esta navegando la aplicación tiene rol de Supervisor 
				-->
			</div>
			<?php if($_SESSION['id_rol'] == 3) { ?>
			<div class="media-right">
				<!-- Eliminar -->
				<a href="#!" data-id-eliminar="<?php echo $viaje["ID"]; ?>" class="btn-baja-viaje btn btn-primary tooltipped" data-placement="right" title="Eliminar">
					<i class="material-icons">delete</i>
				</a>
				<!-- Editar -->
				<a href="#modalEditarViaje" data-id="<?php echo $viaje["ID"]; ?>" class="btn-editar-viaje-lista btn btn-primary btn-viaje-editar tooltipped" data-placement="left" title="Editar" data-toggle="modal" data-target="#modalEditarViaje">
					<i class="material-icons">playlist_add</i>
				</a>
			</div>
			<?php } ?>
		</div>
    </li>
<?php endforeach; ?>