<?php
    session_start();
    include '../../database/DBManager.php';
    if (empty($_SESSION['usuario'])) header("Location: login.php");
    $db = new DBManager();
 
    $dominios = $db->obtenerDominios();
    $empleados = $db->obtenerMecanicos();

?>

<form id="formNuevoMantenimiento">
    <h4>Agregar nuevo Mantenimiento</h4>
    <div class="row">
        <div class="col-xs-12 col-sm-6">
			<label for="DOMINIO_VEHICULO" class="sr-only">Dominio</label>
            <select name="DOMINIO_VEHICULO" class="form-control" required>
                <option value="" disabled selected>Seleccione el Dominio</option>
                <?php foreach($dominios as $dominio): ?>
                    <option value="<?php echo $dominio["DOMINIO"]; ?>">
                        <?php echo $dominio["DOMINIO"]; ?>
                    </option>                                                                
                <?php endforeach; ?>
            </select>                  
        </div>
        <div class="col-xs-12 col-sm-6">
			<label for="EMPLEADO_ENCARGADO" class="sr-only">Empleado encargado</label>
            <select name="EMPLEADO_ENCARGADO" class="form-control" required>
                <option value="" disabled selected>Seleccione mecanico</option>
                <?php foreach($empleados as $empleado): ?>
                    <option value="<?php echo $empleado["ID"]; ?>">
                        <?php echo $empleado["NOMBRE"]; ?>&nbsp;<?php echo $empleado["APELLIDO"]; ?>
                    </option>
                <?php endforeach; ?>
            </select>                   
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-6">
            <label for="LABEL">Seleccione la fecha a realizarlo</label>
        </div>
        <div class="col-xs-12 col-sm-6">
            <input placeholder="Fecha" type="date" name="FECHA" class="form-control" required>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-6">
            <label for="KM_VEHICULO">Kilometros del Vehículo</label>
            <input name="KM_VEHICULO" type="number" class="form-control" required>
        </div>
        <div class="col-xs-12 col-sm-6">
            <label for="COSTO">Costo</label>
            <input name="COSTO" type="number" class="form-control" required>
        </div>                                                
	</div>
    <div class="row">
        <div class="col-xs-12">
            <label for="COMENTARIO">Trabajo realizado</label>
            <input name="COMENTARIO" type="text" class="form-control" required>
        </div>
    </div>    
    <div class="row">
        <div class="col-xs-12">
            <a href="#!" id="btn-nuevo-mantenimiento" class="modal-action modal-close light-blue darken-1 waves-effect waves-light btn btn-primary text-uppercase">Agregar Nuevo Mantenimiento</a>
        </div>
    </div>
</form>