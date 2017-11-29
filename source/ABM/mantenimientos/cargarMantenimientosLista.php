<?php
session_start();
include '../../database/DBManager.php';
if (empty($_SESSION['usuario'])) header("Location: login.php");
$db = new DBManager();

$mantenimientos = $db->obtenerMantenimientos();

?>

<?php foreach($mantenimientos as $mantenimiento): ?>

    <li class="list-group-item avatar">
		<div class="media">
			<div class="media-body">
				<span class="title">Fecha: <?php echo $mantenimiento["FECHA"]; ?></span>
				<p class="title">Vehiculo: <?php echo $mantenimiento["DOMINIO_VEHICULO"]; echo " "; ?></p>
				<p class="title">Trabajo realizado: <?php echo $mantenimiento["COMENTARIO"]; echo " "; ?></p>
				<p><a class="btn-datos-mantenimiento modal-trigger link" data-id="<?php echo $mantenimiento["ID"]; ?>" href="#modalDatosMantenimiento">Ver ficha completa</a></p>
			</div>
			<!-- 
				Los botones de de Editar y Eliminar Mantenimiento solo estan disponibles si el usuario
				que esta navegando la aplicación tiene rol de Supervisor 
			-->
			<?php if($_SESSION['id_rol'] == 3) { ?>
			<div class="media-right">
				<!-- Eliminar -->
				<a href ="#!" data-id-eliminar="<?php echo $mantenimiento["ID"]; ?>" class="btn-baja-mantenimiento btn btn-primary" data-toggle="tooltip" data-placement="right" title="Eliminar">
					<i class="material-icons">delete</i>
				</a>
				<!-- Editar -->
				<?php if($mantenimiento["REALIZADO"] == 0) { ?>
					<a href ="#!" data-id-editar="<?php echo $mantenimiento["ID"]; ?>" class="btn-editar-mantenimiento btn btn-primary btn-empleado-editar" data-toggle="tooltip" data-placement="left" title="Marcar como realizado">
						<i class="material-icons">done</i>
					</a>
				<?php } ?>
			</div>
			<?php } ?>
		</div>
    </li>
<?php endforeach; ?>