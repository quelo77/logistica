<?php
    session_start();
    include '../../database/DBManager.php';
    if (empty($_SESSION['usuario'])) header("Location: login.php");
    $db = new DBManager();
 
    $cargos = $db->obtenerCargos();
    $roles = $db->obtenerRoles();
?>

<form id="formNuevoEmpleado">
    <!--<input type="hidden" name="ACTIVO" value="">-->
    <div class="row">
        <div class="col-xs-12 col-sm-6">
            <label for="nombre">Nombre</label>
            <input id="nombre" name="NOMBRE" type="text" class="form-control" required>
        </div>
        <div class="col-xs-12 col-sm-6">
            <label for="apellido">Apellido</label>
            <input id="apellido" name="APELLIDO" type="text" class="form-control" required>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-6">
            <label for="DNI">Número de documento</label>
            <input name="DNI" type="number" class="form-control">
        </div>
        <div class="col-xs-12 col-sm-6">
            <label for="SUELDO">Sueldo</label>
            <input name="SUELDO" type="number" class="form-control">
        </div>                                                
    </div>
    <div class="row">
        <div class="col-xs-6">
            <input id="radioMasculino" name="SEXO" type="radio" value="M" checked/>
            <label for="radioMasculino">Masculino</label>                                                
        </div>
        <div class="col-xs-6">
            <input id="radioFemenino" name="SEXO" type="radio" value="F"/>
            <label for="radioFemenino">Femenino</label>
        </div>                                                
    </div>                                            
    <div class="row">
        <div class="col-xs-12 col-sm-6">
			<label for="FECHA_NACIMIENTO">Fecha de nacimiento</label>
            <input placeholder="Fecha de nacimiento" type="date" name="FECHA_NACIMIENTO" class="form-control">
        </div>
        <div class="col-xs-12 col-sm-6">
			<label for="FECHA_INGRESO">Fecha de Ingreso</label>
            <input placeholder="Fecha de Ingreso" type="date" name="FECHA_INGRESO" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
			<label for="CARGO" class="sr-only">Cargo</label>
            <select name="CARGO" class="form-control" required>
                <option value="" disabled selected>Seleccione el Cargo</option>
                <?php foreach($cargos as $cargo): ?>
                    <option value="<?php echo $cargo["ID"]; ?>">
                        <?php echo $cargo["DESCRIPCION"]; ?>
                    </option>
                <?php endforeach; ?>
            </select>                   
        </div>
        <div class="col-xs-12">
			<label for="ROL" class="sr-only">Rol</label>
            <select name="ROL" class="form-control" required>
                <option value="" disabled selected>Seleccione el Rol</option>
                <?php foreach($roles as $rol): ?>
                    <option value="<?php echo $rol["ID"]; ?>">
                        <?php echo $rol["DESCRIPCION"]; ?>
                    </option>                                                                
                <?php endforeach; ?>
            </select>                                                
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-6">
            <label for="USUARIO">Usuario</label>
            <input name="USUARIO" type="text" class="form-control">
        </div>
        <div class="col-xs-12 col-sm-6">
            <label for="PASSWORD">Password</label>
            <input name="PASSWORD" type="password" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <label for="Avatar">AVATAR</label>
            <input id="avatar" name="AVATAR" type="text" class="form-control">
        </div>
    </div>    
    <!--<div class="row">
        <div class="col-xs-12">
            <a href="#!" id="btn-nuevo-empleado" class="modal-action modal-close btn btn-primary text-uppercase">Agregar Nuevo Empleado</a>
        </div>
    </div>-->
</form>