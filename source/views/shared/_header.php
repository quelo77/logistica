<nav class="navbar navbar-expand-sm navbar-dark bg-primary navbar-static-top">
	<div class="container">
		<a href="index.php" class="navbar-brand">Logistica S.A.</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContenido" aria-controls="navbarContenido" aria-expanded="false" aria-label="Abrir navegación">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div id="navbarContenido" class="collapse navbar-collapse">
			<div class="navbar-text mr-auto">
				<i class="material-icons">perm_identity</i>
				<strong>Bienvenido, <?php echo $_SESSION['nombre']; ?></strong>
			</div>
			<ul class="nav navbar-nav">
				<li class="nav-item"><a href="#!" class="nav-link">Mi Perfil</a></li>
				<li class="nav-item"><a href="salir.php" class="nav-link"><i class="material-icons">settings_power</i>Salir</a></li>
			</ul>
		</div>
	</div>
</nav>