$(document).on('ready', function() {
    'use strict';

    var componentesBootstrap = new ComponentesBootstrap();
    componentesBootstrap.cargar();

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