<?php
    session_start();
    include_once dirname(__FILE__) . '/source/database/DBManager.php';

    if (empty($_SESSION['usuario'])) {
        header("Location: login.php");
    }
?>

<!doctype html>
<html lang="es">

<?php require_once('source/inc/head.php'); ?>

<body>
    <?php require_once('source/inc/ga.php'); ?>
    <?php require_once('source/views/shared/_header.php'); ?>
    <div class="container">
        <div class="row">
			<div class="col-xs-12">
        		<h2 class="text-center">Mantenimientos</h2>
			</div>
        <!-- Contenido de pagina -->
            <!-- boton nuevo mantenimiento -->
            <?php if($_SESSION['id_rol'] == 3) { ?> <!-- Botón de agregar mantenimiento sólo habilitado para rol Supervisor -->
                <div class="col-xs-12">
                    <p class="text-center">
                        <a href ="#modalNuevoMantenimiento" id="btn-nuevo-lista" class="light-blue darken-1 waves-effect waves-light btn btn-primary text-uppercase modal-trigger"><i class="material-icons right">input</i> agregar nuevo</a>
                    </p>
                </div>
            <?php } ?>
            <!-- Fin boton nuevo mantenimiento -->
            <div class="col-xs-12">
                <!-- Lista Mantenimientos -->
                <ul class="list-group" id="lista-mantenimientos"></ul>
                <!-- Fin Lista mantenimientos -->
            </div>
        </div>        
    </div>
    <!-- Modal Nuevo mantenimiento -->
    <div id="modalNuevoMantenimiento" class="modal">
        <div class="modal-content text-center"></div>
    </div>
    <!-- Fin Modal Nuevo mantenimiento -->

    <!-- Modal Ver Datos de mantenimiento -->
    <div id="modalDatosMantenimiento" class="modal modal-fixed-footer">
        <div class="modal-content text-center"></div>
        <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-blue btn-flat">Aceptar</a>
        </div>
    </div>
    <!-- Fin Modal Ver Datos de mantenimiento -->

    <!-- Fin Modal Editar de mantenimiento -->    
    <!-- Fin Contenido de pagina -->
    <?php
        require_once('source/views/shared/_footer.php');
        require_once('source/inc/scripts.php');
    ?>
</body>
</html>