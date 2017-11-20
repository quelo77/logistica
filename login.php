<!doctype html>
<html lang="es">

<?php
    session_start();
    require_once('source/inc/head.php');
    unset($_SESSION['logueado']);
?>

<body>
    <?php require_once('source/inc/ga.php'); ?>
    <?php if(isset($_GET['error'])) { ?>
            <script>alert('Su clave o contraseña es incorrecta o no existe el usuario')</script>
    <?php } ?>

    <div class="container">
        <div class="center-align">
            <h1 class="login">Dirty Trucks Inc.</h1>
            <img src="assets/imagenes/camion-login.png" alt="Camión" class="responsive-img logo-camion">
            <h2 class="margin-top-0 login">Sistema de gestión</h2>
        </div>

        <!-- Contenido de pagina -->
		<div class="form-login margin-bottom-10">
			<form action="source/validarLogin.php" method="post" class="form-horizontal">
				<div class="form-group">
					<label for="user" class="col-sm-3 control-label" data-success="">Usuario</label> 
					<div class="col-sm-9">
						<input id="user" type="text" name="usuario" autocomplete="off" class="form-control" required>
					</div>
				</div>
				<div class="form-group">
					<label for="password" class="col-sm-3 control-label" data-success="">Clave</label>
					<div class="col-sm-9">
						<input id="password" type="password" name="password" class="form-control" required>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-3 col-sm-10">
						<input type="submit" class="btn btn-primary" value="entrar">
					</div>
				</div>
			</form>
		</div>
    </div>

    <?php require_once('source/inc/scripts.php'); ?>
</body>
</html>
