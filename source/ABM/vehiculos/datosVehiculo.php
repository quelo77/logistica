<?php
	session_start();
    include '../../database/DBManager.php';
    include '../../lib/phpqrcode/qrlib.php';
	if (empty($_SESSION['usuario'])) header("Location: login.php");
    $db = new DBManager();

	 
    $dominioVehiculo = $_POST["dominio"];
	$vehiculo = $db->ObtenerVehiculoPorDominio($dominioVehiculo); 
	$avatar = empty($vehiculo["AVATAR"]) ? "default" : $vehiculo["AVATAR"];

?>

<h4>Ficha del Vehículo</h4>
    <div class="center-align">
        <img class="avatar-perfil-usuario" src="assets/imagenes/avatares/vehiculos/<?php echo $avatar; ?>.jpg" alt="<?php echo $avatar; ?>">     
    </div>
<h5 class="text-muted"><?php echo $vehiculo["DOMINIO"]; ?></h5>
<div class="row">
	<div class="col-xs-12 col-md-6">
		<ul class="list-group">
			<li class="list-group-item">DOMINIO: <?php echo $vehiculo["DOMINIO"]; ?></li>
			<li class="list-group-item">Marca: <?php echo $vehiculo["MARCA"]; ?></li>
			<li class="list-group-item">Nro.Chasis: <?php echo $vehiculo["NRO_CHASIS"]; ?></li>
		</ul>		
	</div>
	<div class="col-xs-12 col-md-6">
		<ul class="list-group">
			<li class="list-group-item">Año: <?php echo $vehiculo["ANO"]; ?></li>
			<li class="list-group-item">Modelo: <?php echo $vehiculo["MODELO"]; ?></li>
			<li class="list-group-item">Nro.Motor: <?php echo $vehiculo["NRO_MOTOR"]; ?></li>
			<!--<li class="list-group-item">Usuario Activo:</li>-->
		</ul>		
	</div>
</div>