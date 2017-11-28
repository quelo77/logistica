$(document).on('ready', function() {
    'use strict';
	
	$('[data-toggle="tooltip"]').tooltip();//Tooltip de Bootstrap

    var componentesMaterialize = new ComponentesMaterialize();
    componentesMaterialize.cargar();

    var viajes = new Viajes();
    viajes.cargarLista();

    var mapas = new Mapas();
    mapas.cargarEventos();

    var vehiculos = new Vehiculos();
    vehiculos.cargarLista();

    var mantenimientos = new Mantenimientos();
    mantenimientos.cargarLista();
    mantenimientos.cargarAlarmas();
    
    console.info("DOM ready");
});