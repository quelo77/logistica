<?php
	session_start();
	include '../../database/DBManager.php';
	if (empty($_SESSION['usuario'])) header("Location: login.php");
    $db = new DBManager();

    $idUsuario = $_POST["id"];

    $mantenimiento = $db->obtenerMantenimientoPorID($idUsuario); 
?>

<div class="row">
	<div class="col-12 col-sm-6">
		<ul class="list-group">
			<li class="list-group-item">ID: <?php echo $mantenimiento["ID"]; ?></li>
			<li class="list-group-item">Dominio: <?php echo $mantenimiento["DOMINIO_VEHICULO"]; ?></li>
			<li class="list-group-item">Fecha: <?php echo $mantenimiento["FECHA"]; ?></li>
		</ul>		
	</div>
	<div class="col-12 col-sm-6">
		<ul class="list-group">
			<li class="list-group-item">Costo: $<?php echo $mantenimiento["COSTO"]; ?>.-</li>
			<li class="list-group-item">Kilometros: <?php echo $mantenimiento["KM_VEHICULO"]; ?></li>
		    <li class="list-group-item">Mecanico encargado: <?php echo $mantenimiento["NOMBRE"]; ?>&nbsp;<?php echo $mantenimiento["APELLIDO"]; ?></li>	
		</ul>		
	</div>
</div>
<div class="row">
	<div class="col-12">
		<ul class="list-group">
	   		<li class="list-group-item">Trabajo realizado: <?php echo $mantenimiento["COMENTARIO"]; ?></li>
		</ul>
	</div>
</div>