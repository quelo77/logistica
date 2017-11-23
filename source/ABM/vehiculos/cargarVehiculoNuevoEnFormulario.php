<?php
    session_start();
    include '../../database/DBManager.php';
    if (empty($_SESSION['usuario'])) header("Location: login.php");
    $db = new DBManager();

?>

<form id="formNuevoVehiculo">
    <h4>Agregar nuevo Vehiculo</h4>
    <!--<input type="hidden" name="ACTIVO" value="">-->
    <div class="row">
        <div class="input-field col-xs-12 col-md-6">
		<label for="dominio">Dominio</label>
            <input id="dominio" name="DOMINIO" type="text" class="validate" required>
        </div>
        <div class="input-field col-xs-12 col-md-6">
		<label for="marca">Marca</label>
            <input id="marca" name="MARCA" type="text" class="validate" required>
        </div>
    </div>
    <div class="row">
        <div class="input-field col-xs-12 col-md-6">
		<label for="MODELO">Modelo</label>
            <input name="MODELO" type="text" class="validate">
        </div>
        <div class="input-field col-xs-12 col-md-6">
		<label for="ANO">Año</label>
            <input name="ANO" type="text" class="validate">
        </div>                                                
    </div>
    <div class="row">
        <div class="input-field col-xs-12 col-md-6">
		<label for="NRO_CHASIS">Nro.Chasis</label>
            <input name="NRO_CHASIS" type="text" class="validate">
        </div>
        <div class="input-field col-xs-12 col-md-6">
		<label for="NRO_MOTOR">Nro.Motor</label>
            <input name="NRO_MOTOR" type="text" class="validate">
        </div>                                                
    </div>     
    <div class="row">
        <div class="input-field col-xs-12">
		<label for="AVATAR">AVATAR</label>
            <input name="AVATAR" type="text" class="validate">
        </div>                                                
    </div>                                       
    <div class="row">
        <div class="input-field col-xs-12">
            <a href="#!" id="btn-nuevo-vehiculo" class="modal-action modal-close btn btn-primary btn-lg">Agregar Nuevo Vehiculo</a>
        </div>
    </div>
</form>
