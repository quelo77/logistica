<?php
session_start();
include '../../database/DBManager.php';
if (empty($_SESSION['usuario'])) header("Location: login.php");
$db = new DBManager();

$empleados = $db->obtenerEmpleados();

?>

<?php foreach($empleados as $empleado): ?>

    <?php $avatar = empty($empleado["AVATAR"]) ? "default" : $empleado["AVATAR"]; ?>

    <li class="list-group-item avatar">
		<div class="media">
			<img src="assets/imagenes/avatares/empleados/<?php echo $avatar; ?>.jpg" alt="<?php echo $avatar; ?>" class="rounded-circle mr-3">
			<div class="media-body">
				<h4 class="media-heading"><?php echo $empleado["NOMBRE"]; ?>&nbsp;<?php echo $empleado["APELLIDO"]; ?></h4>
				<p class="text-muted"><?php echo $empleado["CARGO"]; ?> <span class="badge badge-secondary"><?php echo $empleado["ROL"]; ?></span>
				</p>
				<p><a class="btn-datos-empleado link" data-id="<?php echo $empleado["ID"]; ?>" href="#modalDatosEmpleado" data-toggle="modal" data-target="#modalDatosEmpleado">Ver perfil completo</a></p>
				<!-- 
					Los botones de de Editar y Eliminar Empleado solo estan disponibles si el usuario
					que esta navegando la aplicación tiene rol de Supervisor 
				-->
			</div>
			<?php if($_SESSION['id_rol'] == 3) { ?>
			<div class="ml-3">
				<!-- Eliminar -->
				<a href="#!" data-id-eliminar="<?php echo $empleado["ID"]; ?>" class="btn-baja-empleado btn btn-primary tooltipped" data-placement="right" title="Eliminar">
					<i class="material-icons">delete</i>
				</a>
				<!-- Editar -->
				<a href="#modalEditarEmpleado" data-id="<?php echo $empleado["ID"]; ?>" class="btn-editar-lista btn btn-primary btn-empleado-editar tooltipped" data-placement="left" title="Editar" data-toggle="modal" data-target="#modalEditarEmpleado">
					<i class="material-icons">playlist_add</i>
				</a>
			</div>
			<?php } ?>
		</div>
    </li>
<?php endforeach; ?>