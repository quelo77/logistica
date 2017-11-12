<?php
	session_start();
	include '../../database/DBManager.php';
	if (empty($_SESSION['usuario'])) header("Location: login.php");
    $db = new DBManager();

    $idUsuario = $_POST["id"];

    $mantenimiento = $db->obtenerMantenimientoPorID($idUsuario); 
?>

<h4>Ficha del Mantenimiento</h4>
<div class="row">
	<div class="col-xs-12 col-md-6">
		<ul class="list-group left-align">
			<li class="list-group-item">ID: <?php echo $mantenimiento["ID"]; ?></li>
			<li class="list-group-item">Dominio: <?php echo $mantenimiento["DOMINIO_VEHICULO"]; ?></li>
			<li class="list-group-item">Fecha: <?php echo $mantenimiento["FECHA"]; ?></li>
		</ul>		
	</div>
	<div class="col-xs-12 col-md-6">
		<ul class="list-group left-align">
			<li class="list-group-item">Costo: $<?php echo $mantenimiento["COSTO"]; ?>.-</li>
			<li class="list-group-item">Kilometros: <?php echo $mantenimiento["KM_VEHICULO"]; ?></li>
		    <li class="list-group-item">Mecanico encargado: <?php echo $mantenimiento["NOMBRE"]; ?>&nbsp;<?php echo $mantenimiento["APELLIDO"]; ?></li>	
		</ul>		
	</div>
	<div class="col-xs-12">
		<ul class="list-group left-align">
	   		<li class="list-group-item">Trabajo realizado: <?php echo $mantenimiento["COMENTARIO"]; ?></li>
		</ul>
	</div>
</div>