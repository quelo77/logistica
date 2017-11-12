<footer class="footer-descripcion">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-md-6">
				<h5 class="white-text">Logistica</h5>
				<p class="grey-text text-lighten-4">Empresa ficticia de logística de camiones</p>
<!-- 				<p class="text-lighten-4"><a class="white-text link" href="https://github.com" target="_blank">Ver código en Github</a></p>
 -->			</div>
        <?php if($_SESSION['id_rol'] == 3) { ?>
			<div class="col-xs-12 col-md-6">
				<h5 class="white-text">Mapa del sitio</h5>
				<ul>
					<li><a class="grey-text text-lighten-3" href="empleados.php">Empleados</a></li>
					<li><a class="grey-text text-lighten-3" href="vehiculos	.php">Vehiculos</a></li>
					<li><a class="grey-text text-lighten-3" href="viajes.php">Viajes</a></li>
					<li><a class="grey-text text-lighten-3" href="reportes.php">Reportes</a></li>
					<li><a class="grey-text text-lighten-3" href="seguimientos.php">Seguimiento</a></li>
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
					<span class="grey-text text-lighten-4 right">Trabajo práctico final - Programación Web II UNLaM ~ 2017</span>
				</div>
			</div>
		</div>
	</div>
</footer>