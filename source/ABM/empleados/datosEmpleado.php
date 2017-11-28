<?php
	session_start();
    include '../../database/DBManager.php';
    include '../../lib/phpqrcode/qrlib.php';
    if (empty($_SESSION['usuario'])) header("Location: login.php");
    $db = new DBManager();

    $idUsuario = $_POST["id"];

    $empleado = $db->ObtenerEmpleadoPorId($idUsuario); 
    $cargos = $db->obtenerCargos();
    $roles = $db->obtenerRoles();
    $avatar = empty($empleado["AVATAR"]) ? "default" : $empleado["AVATAR"];
?>

<h4>Perfil de <?php echo $empleado["NOMBRE"]; echo " "; echo $empleado["APELLIDO"];?></h4>
    <div class="text-center">
        <img class="avatar-perfil-usuario" src="assets/imagenes/avatares/empleados/<?php echo $avatar; ?>.jpg" alt="<?php echo $avatar; ?>">
    </div>
<h5 class="text-muted"><?php echo $empleado["CARGO"]; ?></h5>
<div class="row">
	<div class="col-xs-12 col-sm-6">
		<ul class="list-group left-align">
			<li class="list-group-item">ID: <?php echo $empleado["ID"]; ?></li>
			<li class="list-group-item">Nombre: <?php echo $empleado["NOMBRE"]; ?></li>
			<li class="list-group-item">Apellido: <?php echo $empleado["APELLIDO"]; ?></li>
			<li class="list-group-item">N° Documento: <?php echo $empleado["DNI"]; ?></li>
			<li class="list-group-item">Sexo: <?php echo $empleado["SEXO"]; ?></li>
			<li class="list-group-item">Fecha de nacimiento: <?php echo $empleado["FECHA_NACIMIENTO"]; ?></li>
			<li class="list-group-item">Fecha de ingreso: <?php echo $empleado["FECHA_INGRESO"]; ?></li>
		</ul>		
	</div>
	<div class="col-xs-12 col-sm-6">
		<ul class="list-group left-align">
			<li class="list-group-item">Suedo: $<?php echo $empleado["SUELDO"]; ?>.-</li>
			<li class="list-group-item">Cargo: <?php echo $empleado["CARGO"]; ?></li>
			<li class="list-group-item">Nombre de Usuario: <?php echo $empleado["USUARIO"]; ?></li>
			<li class="list-group-item">Password: <?php echo $empleado["PASSWORD"]; ?></li>
			<li class="list-group-item">Rol de Usuario: <?php echo $empleado["ROL"]; ?></li>
			<!--<li class="list-group-item">Usuario Activo:</li>-->
		</ul>		
	</div>
</div>