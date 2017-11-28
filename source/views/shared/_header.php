<nav class="navbar navbar-inverse navbar-global navbar-static-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbarContenido" aria-expanded="false">
				<span class="sr-only">Abrir navegación</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a href="index.php" class="navbar-brand">Logistica S.A.</a>
		</div>
		<div id="navbarContenido" class="collapse navbar-collapse">
			<div class="navbar-text">
				<i class="material-icons">perm_identity</i>
				<strong>Bienvenido, <?php echo $_SESSION['nombre']; ?></strong>
			</div>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#!">Mi Perfil</a></li>
				<li><a href="salir.php"><i class="material-icons">settings_power</i>Salir</a></li>
			</ul>
		</div>
	</div>
</nav>