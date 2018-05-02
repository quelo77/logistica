<?php
    session_start();

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
        <!-- Lista de Reportes -->
        <div class="row">
            <div class="col-12">
        		<h2 class="text-center">Reportes</h2>
                
                <!--column chart-->
                <div id="columnchart" style="width: 900px; height: 500px;"></div>
                <!-- <p class="text-center">
                    <img id="columnchart" class="responsive-img" src="source/generadorGraficas/camiones.php" alt="">
                </p> -->
                <p class="text-center">
                    <img id="areachart" class="responsive-img" src="source/generadorGraficas/clientes.php" alt="">
                </p>
                <?php   
                    require_once "source/models/Vehiculo_model.php";
                    require_once "Graficos_view.php";
                ?>
                <p class="text-center">
                    <img id="piechart_3d" class="responsive-img" src="source/generadorGraficas/choferes.php" alt="">
                </p>
                <p class="text-center">
                    <img id="donutchart" class="responsive-img" src="source/generadorGraficas/acoplados.php" alt="">
                </p>                 
            </div>
        </div>         
        <!-- Fin Lista de Reportes -->
    </div>
    <?php
        require_once('source/views/shared/_footer.php');
        require_once('source/inc/scripts.php');
    ?>
</body>
</html>