<!doctype html>
<html lang="es">

<?php
    session_start();
    require_once('source/inc/head.php');
    unset($_SESSION['logueado']);
?>

<body class="pag-login">
    <?php require_once('source/inc/ga.php'); ?>
    <?php if(isset($_GET['error'])) { ?>
            <script>alert('Su clave o contraseña es incorrecta o no existe el usuario')</script>
    <?php } ?>

    <div class="container">
        <div class="text-center">
            <h1 class="login">Logistica S.A.</h1>
            <img src="assets/imagenes/camion-login.png" alt="Camión" class="responsive-img logo-camion">
            <h2 class="margin-top-0 login">Sistema de gestión</h2>
        </div>

        <!-- Contenido de pagina -->
        <form action="source/validarLogin.php" method="post" class="form-login form-horizontal">
            <div class="form-group">
				<label for="user" class="col-sm-3 control-label">Usuario</label> 
                <div class="col-xs-12 col-sm-9">
                    <input id="user" type="text" name="usuario" class="form-control" autocomplete="off" required>
                </div>
            </div>
            <div class="form-group">
				<label for="password" class="col-sm-3 control-label">Clave</label>
                <div class="col-xs-12 col-sm-9">
                    <input id="password" type="password" name="password" class="form-control" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                    <input type="submit" class="btn btn-primary btn-large" value="Entrar">
                </div>
            </div>
        </form>
    </div>

    <?php require_once('source/inc/scripts.php'); ?>
</body>
</html>
