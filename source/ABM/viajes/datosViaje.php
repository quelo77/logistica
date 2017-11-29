<?php
	session_start();
    include '../../database/DBManager.php';
    include '../../lib/phpqrcode/qrlib.php';
	if (empty($_SESSION['usuario'])) header("Location: login.php");
    $db = new DBManager();

    $idViaje = $_POST["id"];

    $viaje = $db->ObtenerViajePorId($idViaje);

    //INICIO DE CODIGO QR
	
	// El nombre del fichero que se generará (una imagen PNG).
	$file = '../../../assets/imagenes/qr/Camion-qr/' . time() . '.png'; 
	// La data que llevará.
	$data = 'http://localhost/web2/viajes.php?id=' . $idViaje; 

	// Y generamos la imagen.
	QRcode::png($data, $file);  

	//FIN CODIGO QR
?>

<?php
        	echo '<img  src="imagenes/qr/Camion-qr/' . $file . '" alt="" >'
 ?>
<div class="row">
	<div class="col-xs-12 col-sm-6">
		<ul class="list-group">
			<li class="list-group-item">Id viaje: <?php echo $viaje["ID"]; ?></li>
			<li class="list-group-item">Direccion: <?php echo $viaje["DIRECCION"]; ?></li>
			<li class="list-group-item">Altura: <?php echo $viaje["NUMERO"]; ?></li>
			<li class="list-group-item">Localidad: <?php echo $viaje["LOCALIDAD"]; ?></li>
			<li class="list-group-item">Pais: <?php echo $viaje["PAIS"]; ?></li>
			<li class="list-group-item">Camión: <?php echo $viaje["VEHICULO_MARCA"]; echo " "; echo $viaje["VEHICULO_MODELO"]; ?></li>
			<li class="list-group-item">Acoplado Tipo: <?php echo $viaje["ACOPLADO"]; ?></li>
		</ul>		
	</div>
	<div class="col-xs-12 col-sm-6">
		<ul class="list-group">
			<li class="list-group-item">Cantidad de Kilometros: <?php echo $viaje["CANT_KILOMETROS"]; ?></li>
			<li class="list-group-item">Chofer: <?php echo $viaje["CHOFER_NOMBRE"]; echo " "; echo $viaje["CHOFER_APELLIDO"]; ?></li>
			<li class="list-group-item">Cliente: <?php echo $viaje["CLIENTE"]; ?></li>
			<li class="list-group-item">Fecha Programada: <?php echo $viaje["FECHA_PROGRAMADA"]; ?></li>
			<li class="list-group-item">Fecha de Inicio: <?php echo $viaje["FECHA_INICIO"]; ?></li>
			<li class="list-group-item">Fecha de Fin: <?php echo $viaje["FECHA_FIN"]; ?></li>
			<!--<li class="list-group-item">Usuario Activo:</li>-->
		</ul>		
	</div>
</div>