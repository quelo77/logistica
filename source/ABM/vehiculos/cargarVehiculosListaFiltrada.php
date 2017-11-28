<?php
session_start();
include '../../database/DBManager.php';
if (empty($_SESSION['usuario'])) header("Location: login.php");
$db = new DBManager();

if(empty($_POST["DOMINIO"])) {
    $vehiculos = $db->obtenerVehiculos();
} else {
    $vehiculos = $db->obtenerVehiculosFiltrados($_POST["DOMINIO"]);
}

?>

<?php foreach($vehiculos as $vehiculo): ?>
    
    <?php $avatar = empty($vehiculo["AVATAR"]) ? "default" : $vehiculo["AVATAR"]; ?>

    <li class="list-group-item avatar">
		<div class="media-left">
        	<img src="assets/imagenes/avatares/vehiculos/<?php echo $avatar; ?>.jpg" alt="<?php echo $avatar; ?>" class="img-circle">
		</div>
		<div class="media-body">
			<h4 class="media-heading"><?php echo $vehiculo["DOMINIO"]; ?></h4>
			<p><a class="btn-datos-vehiculo modal-trigger link margin-bottom-10" data-id="<?php echo $vehiculo["DOMINIO"]; ?>" href="#modalDatosVehiculo">Ver ficha completa</a></p>
		</div>
        <!-- 
            Los botones de de Editar y Eliminar Vehiculo solo estan disponibles si el usuario
            que esta navegando la aplicación tiene rol de Supervisor 
        -->
        <!-- Eliminar -->
        <?php if($_SESSION['id_rol'] == 3) { ?>
		<div class="media-right">
            <!-- Eliminar -->
            <a href ="#!" data-id-eliminar="<?php echo $vehiculo["DOMINIO"]; ?>" class="btn-baja-vehiculo secondary-content light-blue lighten-1 waves-effect waves-light btn btn-primary " data-toggle="tooltip" data-placement="right" title="Eliminar">
                <i class="material-icons">delete</i>
            </a>
            <!-- Editar -->
            <a href ="#modalEditarVehiculo" data-id="<?php echo $vehiculo["DOMINIO"]; ?>" class="btn-editar-lista secondary-content light-blue lighten-1 waves-effect waves-light btn btn-primary btn-empleado-editar  modal-trigger" data-toggle="tooltip" data-placement="left" title="Editar">
                <i class="material-icons">playlist_add</i>
            </a>
		</div>
        <?php } ?>
    </li>
<?php endforeach; ?>