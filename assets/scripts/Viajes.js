var Viajes = function() {
	'use strict';

	

    this.cargarLista = function() {
        cargarViajesLista();
    };

    /* Métodos privados */

    function cargarViajesLista() {
		$.ajax({
		    url: 'source/ABM/viajes/cargarViajesLista.php',
		    method: 'post',
		    dataType: 'html',
		    success: function(data) {
		        $('#lista-viajes').html(data);
		    }
		}).done(function() {
			
			cargarEventos();
//			ponerFocoEnViajeEditar();
		});    	
    }

//    function ponerFocoEnViajeEditar() {
//		// Se pone el foco en el primer campo del formulario de editar Viaje
//		$('.btn-editar-viaje-lista').on('click', function() { 
//			//$('#nombre').focus(); TODO
//		});
//    }    

    function cargarEventos() {
        btnViajeNuevoLista();
        btnDatosViaje();
        btnViajeEditarLista();
        btnViajeEliminarLista();
    };

    function btnViajeNuevoLista() {
        // Se carga evento boton editar de lista
        $('#btn-nuevo-viaje-lista').on('click', function() {
            $.ajax({
                url: 'source/ABM/viajes/cargarViajeNuevoEnFormulario.php',
                method: 'post',
                dataType: 'html',
                success: function(data){
                    $('#modalNuevoViaje .modal-body').html(data);
                }
            }).done(function(){
                
                btnViajeNuevo();
            });
        });
    }

    function btnViajeNuevo() {
        $('#btn-nuevo-viaje').on('click', function() {

            var formData = $('#formNuevoViaje').serialize();
            
            // TODO: validaciones del form con Validate.js
            $.ajax({
                url: 'source/ABM/viajes/nuevo.php',
                method: 'POST',
                data: formData,
                success: function(data){
                    swal({
                        title: 'Viaje de alta con éxito',
                        type: 'success'
                    }, function(){
                        $('#modalNuevoViaje').modal('hide');
                    });
                },
                error: function() {
                    swal({
                        title: 'Ocurrió un error al dar alta viaje',
                        type: 'error'
                    });
                }
            }).done(function(){
                cargarViajesLista();
            });
        });
    }

    function btnDatosViaje() {
        // Se carga evento boton ver Viaje
        $('.btn-datos-viaje').on('click', function() {

            var idViaje = 'id=' + $(this).data('id');

            $.ajax({
                url: 'source/ABM/viajes/datosViaje.php',
                method: 'post',
                data: idViaje,
                dataType: 'html',
                success: function(data){
                    $('#modalDatosViaje .modal-body').html(data);
                }
            });
        });
    }

    function btnViajeEditarLista() {
        $('.btn-editar-viaje-lista').on('click', function() {
            var idViaje = 'id=' + $(this).data('id');

            $.ajax({
                url: 'source/ABM/viajes/cargarViajeEditarEnFormulario.php',
                method: 'post',
                data: idViaje,
                dataType: 'html',
                success: function(data){
                    $('#modalEditarViaje .modal-body').html(data);
                }
            }).done(function(){
                btnViajeEditar();
                
            });
        });
    }

    function btnViajeEditar() {
		$('#btn-editar-viaje').on('click', function() {
	        var formData = $('#formEditarviaje').serialize();
	        // TODO: validaciones del form con Validate.js
	        $.ajax({
	            url: 'source/ABM/viajes/editar.php',
	            method: 'POST',
	            data: formData,
	            success: function(data){
	                swal({
	                    title: 'Viaje editado con éxito',
	                    type: 'success'
	                }, function(){
	                    $('#modalEditarViaje').modal('hide');
	                });
	            },
	            error: function() {
	                swal({
	                    title: 'Ocurrió un error al editar viaje',
	                    type: 'error'
	                });
	            }
	        }).done(function(){
	        	cargarViajesLista();
	        });
		});    	
    }

    function btnViajeEliminarLista() {
        // Baja Viaje
        $('.btn-baja-viaje').on('click', function(e) {
            e.preventDefault();
            var idViaje = $(this).data('id-eliminar');

            swal({
                title: '¿Está seguro que desea eliminar este viaje?',
                type: 'warning',
                showCancelButton: true,
                cancelButtonText: "Cancelar",
                confirmButtonColor: "#039be5"
            }, function() {
                eliminarViajePorId(idViaje);
            });        
        });
    }

    function eliminarViajePorId(id) {
        // TODO: validaciones del form con Validate.js
        var data = 'id=' + id;

        $.ajax({
            url: 'source/ABM/viajes/baja.php',
            method: 'POST',
            data: data,
            success: function(data) {
                swal({
                    title: 'Viaje eliminado con éxito',
                    type: 'success'
                });
            },
            error: function() {
                swal({
                    title: 'Ocurrió un error al eliminar viaje',
                    type: 'error'
                });
            }
        }).done(function(){
        	cargarViajesLista(); // Se vuelve a cargar la lista luego de confirmar borrar usuario
        });
    }             
};