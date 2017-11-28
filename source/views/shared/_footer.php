<footer class="page-footer light-blue darken-1">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-md-6">
				<h2 class="h4">Logistica</h2>
				<p>Empresa ficticia de logística de camiones</p>
<!-- 				<p class="text-lighten-4"><a class="white-text link" href="https://github.com" target="_blank">Ver código en Github</a></p>
 -->			</div>
        <?php if($_SESSION['id_rol'] == 3) { ?>
				<div class="col-xs-12 col-md-4 col-md-offset-2">
					<h2 class="h4">Mapa del sitio</h2>
					<ul class="list-unstyled">
						<li><a href="empleados.php">Empleados</a></li>
						<li><a href="vehiculos	.php">Vehiculos</a></li>
						<li><a href="viajes.php">Viajes</a></li>
						<li><a href="reportes.php">Reportes</a></li>
						<li><a href="seguimientos.php">Seguimiento</a></li>
					</ul>
				</div>
        <?php } ?>
		</div>
	</div>
	<div class="footer-copyright">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-6">
					<p>Logistica S.A. © <?php echo date("Y"); ?> Todos los derechos reservados.</p>
				</div>
				<div class="col-xs-12 col-md-6">
					<p class="text-right">Trabajo práctico final - Programación Web II UNLaM ~ 2017</p>
				</div>
			</div>
		</div>
	</div>
</footer>