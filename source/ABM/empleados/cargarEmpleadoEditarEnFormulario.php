<?php
    session_start();    
    include '../../database/DBManager.php';
    if (empty($_SESSION['usuario'])) header("Location: login.php");
    
    $db = new DBManager();

    $idUsuario = $_POST["id"];

    $empleado = $db->ObtenerEmpleadoPorId($idUsuario); 
    $cargos = $db->obtenerCargos();
    $roles = $db->obtenerRoles();
?>

<form id="formEditarEmpleado"> 
    <h4>Editar el perfil de <?php echo $empleado["NOMBRE"]; echo " "; echo $empleado["APELLIDO"];?></h4>
    <input type="hidden" name="ID" value="<?php echo $empleado["ID"]; ?>">
    <!--<input type="hidden" name="ACTIVO" value="">-->
    <div class="row">
        <div class="col-xs-12 col-sm-6">
            <label for="nombre">Nombre</label>
            <input id="nombre" placeholder="Ingrese nombre" name="NOMBRE" type="text" class="form-control" value="<?php echo $empleado["NOMBRE"];?>" required>
        </div>
        <div class="col-xs-12 col-sm-6">
            <label for="apellido">Apellido</label>
            <input id="apellido" placeholder="Ingrese apellido" name="APELLIDO" type="text" class="form-control" value="<?php echo $empleado["APELLIDO"];?>" required>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-6">
            <label for="DNI">Número de documento</label>
            <input id="dni" placeholder="Ingrese DNI" name="DNI" type="number" class="form-control" value="<?php echo $empleado["DNI"];?>">
        </div>
        <div class="col-xs-12 col-sm-6">
            <label for="SUELDO">Sueldo</label>
            <input id="sueldo" placeholder="Ingrese sueldo" name="SUELDO" type="number" class="form-control" value="<?php echo $empleado["SUELDO"];?>">
        </div>                                                
    </div>
    <div class="row">
        <div class="col-xs-6">
            <input name="SEXO" id="radioMasculino" type="radio" value="M" <?php if ($empleado["SEXO"] == 'M') echo "checked"; ?>/>
			<label for="radioMasculino">Masculino</label>
        </div>
        <div class="col-xs-6">
            <input name="SEXO" id="radioFemenino" type="radio" value="F" <?php if ($empleado["SEXO"] == 'F') echo "checked"; ?>/>
			<label for="radioFemenino">Femenino</label>
        </div>                                                
    </div>                                            
    <div class="row">
        <div class="col-xs-12 col-sm-6">
			<label for="FECHA_NACIMIENTO">Fecha de nacimiento</label>
            <input placeholder="Fecha de nacimiento" type="date" name="FECHA_NACIMIENTO" value="<?php echo $empleado["FECHA_NACIMIENTO"];?>" class="form-control">
        </div>
        <div class="col-xs-12 col-sm-6">
			<label for="FECHA_INGRESO">Fecha de Ingreso</label>
            <input placeholder="Fecha de ingreso" type="date" name="FECHA_INGRESO" value="<?php echo $empleado["FECHA_INGRESO"];?>" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
			<label for="CARGO" class="sr-only">Cargo</label>
            <select name="CARGO" class="form-control" required>
                <option value="" disabled selected>Seleccione el Cargo</option>
                <?php foreach($cargos as $cargo):
                    if($empleado["CARGO"] == $cargo["DESCRIPCION"]) {
                ?>
                        <option value="<?php echo $cargo["ID"];?>" <?php echo "selected";?>>
                            <?php echo $cargo["DESCRIPCION"]; ?>
                        </option>                                                            
                <?php    } else { ?>
                        <option value="<?php echo $cargo["ID"]; ?>">
                            <?php echo $cargo["DESCRIPCION"]; ?>
                        </option>
                <?php    } ?>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-xs-12">
			<label for="ROL" class="sr-only">Rol</label>
            <select name="ROL" class="form-control" required>
                <option value="" disabled selected>Seleccione el Rol</option>
                <?php foreach($roles as $rol):
                    if ($empleado["ROL"] == $rol["DESCRIPCION"]) {
                ?>
                        <option value="<?php echo $rol["ID"]; ?>" <?php echo "selected";?>>
                            <?php echo $rol["DESCRIPCION"]; ?>
                        </option>                                                                
                <?php } else { ?>
                    <option value="<?php echo $rol["ID"]; ?>">
                        <?php echo $rol["DESCRIPCION"]; ?>
                    </option>
                <?php } ?>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-6">
            <label for="USUARIO">Usuario</label>
            <input id="usuario" placeholder="Ingrese usuario" name="USUARIO" type="text" class="form-control" value="<?php echo $empleado["USUARIO"];?>">
        </div>
        <div class="col-xs-12 col-sm-6">
            <label for="PASSWORD">Password</label>
            <input id="password" placeholder="Ingrese clave" name="PASSWORD" type="password" class="form-control" value="<?php echo $empleado["PASSWORD"];?>">
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <label for="Avatar">AVATAR</label>
            <input id="avatar" placeholder="Ingrese nombre de avatar" name="AVATAR" type="text" class="form-control" value="<?php echo $empleado["AVATAR"];?>">
        </div>
    </div>    
    <div class="row">
        <div class="col-xs-12">
            <a href="#!" id="btn-editar-empleado" class="modal-action light-blue darken-1 waves-effect waves-light btn-large">Actualizar Empleado</a>
        </div>
    </div>
</form>