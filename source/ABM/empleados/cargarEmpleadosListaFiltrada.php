<?php
session_start();
include '../../database/DBManager.php';
if (empty($_SESSION['usuario'])) header("Location: login.php");
$db = new DBManager();

if(empty($_POST["NOMBREEMPLEADO"])) {
    $empleados = $db->obtenerEmpleados();
} else {
    $empleados = $db->obtenerEmpleadosFiltrados($_POST["NOMBREEMPLEADO"]);
}
?>

<?php foreach($empleados as $empleado): ?>

    <?php $avatar = empty($empleado["AVATAR"]) ? "default" : $empleado["AVATAR"]; ?>

    <li class="list-group-item avatar">
		<div class="media">
			<div class="media-left">
        		<img src="assets/imagenes/avatares/empleados/<?php echo $avatar; ?>.jpg" alt="<?php echo $avatar; ?>" class="img-circle">
			</div>
			<div class="media-body">
				<h4 class="media-heading"><?php echo $empleado["NOMBRE"]; ?>&nbsp;<?php echo $empleado["APELLIDO"]; ?></h4>
				<p class="text-muted"><?php echo $empleado["CARGO"]; ?> <span class="badge"><?php echo $empleado["ROL"]; ?></span>
				</p>
				<p><a class="btn-datos-empleado link" data-id="<?php echo $empleado["ID"]; ?>" href="#modalDatosEmpleado" data-toggle="modal" data-target="#modalDatosEmpleado">Ver perfil completo</a></p>
			</div>
			<?php if($_SESSION['id_rol'] == 3) { ?>
			<div class="media-right">
				<!-- Eliminar -->
				<a href="#!" data-id-eliminar="<?php echo $empleado["ID"]; ?>" class="btn-baja-empleado btn btn-primary" data-toggle="tooltip" data-placement="right" title="Eliminar">
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