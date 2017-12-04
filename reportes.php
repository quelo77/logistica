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
                <p class="text-center">
                    <img class="responsive-img" src="source/generadorGraficas/camiones.php" alt="">
                </p>
                <p class="text-center">
                    <img class="responsive-img" src="source/generadorGraficas/clientes.php" alt="">
                </p>
                <p class="text-center">
                    <img class="responsive-img" src="source/generadorGraficas/choferes.php" alt="">
                </p>
                <p class="text-center">
                    <img class="responsive-img" src="source/generadorGraficas/acoplados.php" alt="">
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