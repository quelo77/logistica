<!--
<header>
	<nav class="light-blue darken-1">
		<div class="nav-wrapper">
			<div class="container">
				<a href="index.php" class="brand-logo">Logistica S.A.</a>
				<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
				<ul class="right hide-on-med-and-down">
					<li>
						<i class="material-icons">perm_identity</i>
					</li>
					<li>
						<a href="#!">
							<strong>
								Bienvenido, <?php echo $_SESSION['nombre']; ?>
							</strong>
						</a>
					</li>
					<li>
						<a href="salir.php" class="tooltipped" data-position="bottom" data-tooltip="Salir">
							<i class="material-icons">settings_power</i>
						</a>
					</li>
				</ul>
				<ul class="side-nav" id="mobile-demo">
					<li>
						<a href="#!">
							<strong>
								<?php echo $_SESSION['nombre']; ?>
							</strong>
						</a>
					</li>
					<li>
						<a href="#!">Mi Perfil</a>
					</li>
					<li>
						<a href="#!">Configuración</a>
					</li>
					<li>
						<a href="#!">Salir</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
</header>
-->
<nav class="navbar navbar-inverse navbar-static-top navbar-logistica">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbarContenido" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">Logística S.A.</a>
		</div>
		<div class="collapse navbar-collapse" id="navbarContenido">
			<p class="navbar-text">
				<i class="material-icons">perm_identity</i> Bienvenido, <?php echo $_SESSION['nombre']; ?>
			</p>
			<ul class="nav navbar-nav navbar-right">
				<li>
					<a href="#!"><strong><?php echo $_SESSION['nombre']; ?></strong></a>
				</li>
				<li>
					<a href="#!">Mi Perfil</a>
				</li>
				<li>
					<a href="#!">Configuración</a>
				</li>
				<li>
					<a href="salir.php"><i class="material-icons">settings_power</i> Salir</a>
				</li>
			</ul>
		</div>
	</div>
</nav>
