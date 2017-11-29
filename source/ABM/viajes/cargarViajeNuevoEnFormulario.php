<?php
    session_start();
    include '../../database/DBManager.php';
    if (empty($_SESSION['usuario'])) header("Location: login.php");
    $db = new DBManager();
 
    $vehiculos = $db->obtenerVehiculos();
    $destinos = $db->obtenerDestinos();
    $clientes = $db->obtenerClientes();
    $acoplados = $db->obtenerAcoplados();
    $choferes = $db->obtenerChoferes();
?>

<form id="formNuevoViaje">
    <!--<input type="hidden" name="ACTIVO" value="">-->
    <div class="row">
        <div class="col-xs-12">
            <select name="DOMINIO_VEHICULO" class="form-control" required>
                <option value="" disabled selected>Seleccione el Vehículo</option>
                <?php foreach($vehiculos as $vehiculo): ?>
                    <option value="<?php echo $vehiculo["DOMINIO"]; ?>">
                        <?php echo $vehiculo["MARCA"]; echo " "; echo $vehiculo["MODELO"];?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <select name="ID_EMPLEADO" class="form-control" required>
                <option value="" disabled selected>Seleccione el Chofer</option>
                <?php foreach($choferes as $chofer): ?>
                    <option value="<?php echo $chofer["ID"]; ?>">
                        <?php echo $chofer["NOMBRE"]; echo " "; echo $chofer["APELLIDO"];?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>        
    </div>    
    <div class="row">
        <div class="col-xs-12">
            <select name="ID_DESTINO" class="form-control" required>
                <option value="" disabled selected>Seleccione el Destino</option>
                <?php foreach($destinos as $destino): ?>
                    <option value="<?php echo $destino["ID"]; ?>">
                        <?php echo $destino["DIRECCION"]; echo " "; echo $destino["NUMERO"]; echo ", "; echo $destino["LOCALIDAD"]; echo ", "; echo $destino["PROVINCIA"]; echo ", "; echo $destino["PAIS"];?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <select name="ID_CLIENTE" class="form-control" required>
                <option value="" disabled selected>Seleccione el Cliente</option>
                <?php foreach($clientes as $cliente): ?>
                    <option value="<?php echo $cliente["ID"]; ?>">
                        <?php echo $cliente["RAZON_SOCIAL"];?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <p class="text-center">Ingrese Fecha Programada</p>
            <input type="date" name="FECHA_PROGRAMADA" class="form-control">
        </div>        
    </div>
    <div class="row">
        <div class="col-xs-12">
            <p class="text-center">Ingrese Fecha Inicio</p>
            <input type="date" name="FECHA_INICIO" class="form-control">
        </div>        
    </div>
    <div class="row">
        <div class="col-xs-12">
            <p class="text-center">Ingrese Fecha Fin</p>
            <input type="date" name="FECHA_FIN" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-6">
			<label for="CANT_KILOMETROS" class="sr-only">Cantidad de Kilometros</label>
            <input  placeholder="Cantidad de Kilometros" type="text" name="CANT_KILOMETROS" class="form-control">
        </div>
        <div class="col-xs-12 col-sm-6">
			<label for="ID_ACOPLADO" class="sr-only">Acoplado</label>
            <select name="ID_ACOPLADO" class="form-control" required>
                <option value="" disabled selected>Seleccione el Acoplado</option>
                <?php foreach($acoplados as $acoplado): ?>
                    <option value="<?php echo $acoplado["ID"]; ?>">
                        <?php echo $acoplado["DESCRIPCION"];?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <!--<div class="row">
        <div class="col-xs-12">
            <a href="#!" id="btn-nuevo-viaje" class="modal-action modal-close btn btn-primary text-uppercase">Agregar Nuevo Viaje</a>
        </div>
    </div>-->
</form>