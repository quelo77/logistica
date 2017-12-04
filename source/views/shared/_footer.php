<footer class="text-light bg-primary">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-6">
				<h2 class="h4">Logistica</h2>
				<p>Empresa ficticia de logística de camiones</p>
<!-- 				<p class="text-lighten-4"><a class="white-text link" href="https://github.com" target="_blank">Ver código en Github</a></p>
 -->			</div>
        <?php if($_SESSION['id_rol'] == 3) { ?>
				<div class="col-xs-12 col-sm-4 col-sm-offset-2">
					<h2 class="h4">Mapa del sitio</h2>
					<ul class="list-unstyled">
						<li><a href="empleados.php" class="text-light">Empleados</a></li>
						<li><a href="vehiculos.php" class="text-light">Vehiculos</a></li>
						<li><a href="viajes.php" class="text-light">Viajes</a></li>
						<li><a href="reportes.php" class="text-light">Reportes</a></li>
						<li><a href="seguimientos.php" class="text-light">Seguimiento</a></li>
					</ul>
				</div>
        <?php } ?>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-6">
				<p>Logistica S.A. © <?php echo date("Y"); ?> Todos los derechos reservados.</p>
			</div>
			<div class="col-xs-12 col-sm-6">
				<p class="text-right">Trabajo práctico final - Programación Web II UNLaM ~ 2017</p>
			</div>
		</div>
	</div>
</footer>