<nav class="navbar navbar-inverse navbar-static-top">
		<div class="container">
			<div class="navbar-header">
				<!--insertar boton navbar toggle acá-->
				<a href="index.php" class="navbar-brand">Logistica S.A.</a>
			</div>
			<div id="navbarContenido" class="collapse navbar-collapse">
				<div class="navbar-text">
					<i class="material-icons">perm_identity</i>
					<strong>Bienvenido, <?php echo $_SESSION['nombre']; ?></strong>
				</div>
				<ul class="nav navbar-nav navbar-right">
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
						<a href="#!"><i class="material-icons">settings_power</i>Salir</a>
					</li>
				</ul>
			</div>
		</div>
</nav>