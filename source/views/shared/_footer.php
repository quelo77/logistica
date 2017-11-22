<footer class="page-footer light-blue darken-1">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-lg-6">
				<h5 class="white-text">Logistica</h5>
				<p class="text-muted text-lighten-4">Empresa ficticia de logística de camiones</p>
<!-- 				<p class="text-lighten-4"><a class="white-text link" href="https://github.com" target="_blank">Ver código en Github</a></p>
 -->			</div>
        <?php if($_SESSION['id_rol'] == 3) { ?>
			<div class="col-xs-12 col-lg-4 col-lg-offset 2">
				<h5 class="white-text">Mapa del sitio</h5>
			<ul>
				<li><a class="text-muted text-lighten-3" href="empleados.php">Empleados</a></li>
				<li><a class="text-muted text-lighten-3" href="vehiculos	.php">Vehiculos</a></li>
				<li><a class="text-muted text-lighten-3" href="viajes.php">Viajes</a></li>
				<li><a class="text-muted text-lighten-3" href="reportes.php">Reportes</a></li>
				<li><a class="text-muted text-lighten-3" href="seguimientos.php">Seguimiento</a></li>
			</ul>
			</div>
        <?php } ?>
		</div>
	</div>
	<div class="footer-copyright">
		<div class="container">
		Logistica S.A. © <?php echo date("Y"); ?> Todos los derechos reservados.
		<h3>Trabajo práctico final - Programación Web II UNLaM ~ 2017</h3>
	</div>
	</div>
</footer>