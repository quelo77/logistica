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
    <div class="container margin-top-20">
        <h2 class="center-align">Empleados</h2>
        <!-- Contenido de pagina -->
        <!-- Filtro de busqueda -->
        <div class="card-panel grey lighten-5">
            <div class="row">
                <form id="formularioListaFiltrada">
                    <div class="col-xs-12 col-md-10">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">search</i>
                            <input id="icon_prefix" type="text" class="validate" name="NOMBREEMPLEADO">
                            <label for="icon_prefix">Buscar Empleado</label>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-2">
                        <div class="input-field center-align">
                            <a id="btn-lista-filtrada" class="light-blue darken-1 waves-effect waves-light btn-large">Buscar</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <p>
            <i class="material-icons prefix">print</i> 
            <a class="btn-exportar-pdf link margin-bottom-10" href="#">Exportar listado a PDF</a>
        </p>
        <!-- Fin Filtro de busqueda -->
        <div class="row">
            <!-- boton nuevo empleado -->
            <?php if($_SESSION['id_rol'] == 3) { ?> <!-- Botón de agregar Empleado sólo habilitado para rol Supervisor -->
                <div class="col-xs-12 margin-top-10 margin-bottom-10">
                    <div class="center-align">
                        <a href ="#modalNuevoEmpleado" id="btn-nuevo-lista" class="light-blue darken-1 waves-effect waves-light btn-large modal-trigger"><i class="material-icons right">input</i>agregar nuevo</a>
                    </div>
                </div>
            <?php } ?>
            <!-- Fin boton nuevo empleado -->
            <div class="col-xs-12">
                <!-- Lista Empleados -->
                <ul class="list-group" id="lista-empleados"></ul>
                <!-- Fin Lista Empleados -->
            </div>
        </div>        
    </div>
    <!-- Modal Nuevo Empleado -->
    <div id="modalNuevoEmpleado" class="modal">
        <div class="modal-content center-align"></div>
    </div>
    <!-- Fin Modal Nuevo Empleado -->

    <!-- Modal Ver Datos de Empleado -->
    <div id="modalDatosEmpleado" class="modal modal-fixed-footer">
        <div class="modal-content center-align"></div>
        <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-blue btn-flat">Aceptar</a>
        </div>
    </div>
    <!-- Fin Modal Ver Datos de Empleado -->

    <!-- Modal Editar Empleado -->
    <div id="modalEditarEmpleado" class="modal">
        <div class="modal-content center-align"></div>
    </div>
    <!-- Fin Modal Editar de Empleado -->

    <!-- Modal Cargando -->
    <div id="modalCargando" class="modal">
        <div class="modal-content center-align">
            <h5>Procesando datos...</h5>
        </div>
    </div>
    <!-- Fin Modal Cargando -->

    <!-- Fin Contenido de pagina -->
    <?php
        require_once('source/views/shared/_footer.php');
        require_once('source/inc/scripts.php');
    ?>

    <script type="text/javascript">
        var empleados = new Empleados();
        empleados.cargarLista();
        empleados.cargarEventoBtnFiltroEmpleado();
    </script>
</body>
</html>