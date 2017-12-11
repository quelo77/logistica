function mostrar_chofer2(id_chofer, idform)
{
    $(idform+" #idChofer2").find('option').not(':first').remove();

    if(id_chofer != '')
    {
        $.ajax({
            url: 'get_segundoChofer_ajax.php',
            type: 'GET',
            dataType: 'json',
            data: {id_chofer:id_chofer},
        })
        .done(function(data) {

            for(var i=0; i<data.length; i++)  // En editar no funciona porque tienen el mismo ID que agregar.
            {
                $(idform+" #idChofer2 option:first").after("<option value='"+data[i].id+"'>"+data[i].nombre+' '+data[i].apellido+"</option>");
            }

        })
        .fail(function(xhr, status, error) {
            console.log(xhr.responseText);
        });
    }
}

$(function(){

    $('.btn-modal-visualizar-viaje').on('click',function(){

        // gett all data
        let id = $(this).data('id');
        let descripcion = $(this).data('descripcion');
        let origen = $(this).data('origen');
        let destino = $(this).data('destino');
        let fecha_inicio = $(this).data('fecha_inicio');
        let tiempo_estimado = $(this).data('tiempo_estimado');
        let tiempo_real = $(this).data('tiempo_real');
        let combustible_estimado = $(this).data('combustible_estimado');
        let kilometro_estimado = $(this).data('kilometro_estimado');
        let nombre_cliente = $(this).data('nombre_cliente');
        let apellido_cliente = $(this).data('apellido_cliente');
        let nombre_chofer = $(this).data('nombre_chofer');
        let apellido_chofer = $(this).data('apellido_chofer');
        let nombre_chofer2 = $(this).data('nombre_chofer2');
        let apellido_chofer2 = $(this).data('apellido_chofer2');
        let patente = $(this).data('patente');
        let patenteAcoplado = $(this).data('patente_acoplado');

        // set all data in form
        $('#form-visualizar #descripcion').val(descripcion);
        $('#form-visualizar #origen').val(origen);
        $('#form-visualizar #destino').val(destino);
        $('#form-visualizar #fecha_inicio').val(fecha_inicio);
        $('#form-visualizar #tiempo_estimado').val(tiempo_estimado);
        $('#form-visualizar #tiempo_real').val(tiempo_real);
        $('#form-visualizar #combustible_estimado').val(combustible_estimado);
        $('#form-visualizar #kilometro_estimado').val(kilometro_estimado);
        $('#form-visualizar #id_cliente').val(nombre_cliente+' '+apellido_cliente);
        $('#form-visualizar #id_chofer').val(nombre_chofer+' '+apellido_chofer);
        $('#form-visualizar #id_chofer2').val(nombre_chofer2+' '+apellido_chofer2);
        $('#form-visualizar #id_vehiculo').val(patente);
        $('#form-visualizar #id_vehiculoAcoplado').val(patenteAcoplado);
        $('#form-visualizar #qr').attr('src','qrImages/qrViaje_' +id+'.png');

        $.ajax({
            url: 'buscarLogViajes_ajax.php',
            type: 'GET',
            dataType: 'json',
            data: {idViaje:id},
        })
        .done(function(data) {
            $('#body-log-viajes').html("");
            if (data.length == 0 ){
                console.log("no data");
            }else{
                var html;
                console.log(data);
                $.each(data, function( index, value ) {
                    console.log(value);
                    html += "<tr>";
                    html += "<td>" + value.razon + "</td>";
                    html += "<td>" + value.fecha + "</td>";
                    html += "<td>" + value.kilometros + "</td>";
                    html += "<td>" + value.precio + "</td>";
                    html += "</tr>";
                });

                $('#body-log-viajes').html(html);
            }
        })
        .fail(function(xhr, status, error) {
            console.log(xhr.responseText);
        });
    });


    $('.btn-modal-edit-viaje').on('click',function(){

        $("#form-edit #idChofer2").find('option').not(':first').remove();
        // gett all data
        let id = $(this).data('id');
        let descripcion = $(this).data('descripcion');
        let origen = $(this).data('origen');
        let destino = $(this).data('destino');
        let fecha_inicio = $(this).data('fecha_inicio');
        let tiempo_estimado = $(this).data('tiempo_estimado');
        let tiempo_real = $(this).data('tiempo_real');
        let combustible_estimado = $(this).data('combustible_estimado');
        let kilometro_estimado = $(this).data('kilometro_estimado');
        let id_cliente = $(this).data('id_cliente');
        let id_chofer = $(this).data('id_chofer');
        let id_chofer2 = $(this).data('id_chofer2');
        let nombre_chofer2 = $(this).data('nombre_chofer2');
        let apellido_chofer2 = $(this).data('apellido_chofer2');
        let id_vehiculo = $(this).data('id_vehiculo');
        let id_vehiculoAcoplado = $(this).data('id_vehiculo_acoplado');

        // set all data in form
        $('#form-edit #descripcion').val(descripcion);
        $('#form-edit #origen').val(origen);
        $('#form-edit #destino').val(destino);
        $('#form-edit #fecha_inicio').val(fecha_inicio);
        $('#form-edit #tiempo_estimado').val(tiempo_estimado);
        $('#form-edit #tiempo_real').val(tiempo_real);
        $('#form-edit #combustible_estimado').val(combustible_estimado);
        $('#form-edit #kilometro_estimado').val(kilometro_estimado);
        $('#form-edit #idViaje').val(id);

        $('#form-edit #idCliente option[value="'+id_cliente+'"]').attr('selected', 'selected');
        $('#form-edit #idVehiculo option[value="'+id_vehiculo+'"]').attr('selected', 'selected');
        $('#form-edit #idChofer option[value="'+id_chofer+'"]').attr('selected', 'selected');

        if(id_chofer2 != '')
        {
            $('#form-edit #idChofer2 option').after('<option value="'+id_chofer2+'">'+nombre_chofer2+' '+apellido_chofer2+'</option>');
            $('#form-edit #idChofer2 option[value="'+id_chofer2+'"]').attr('selected', 'selected');
        }

        $('#form-edit #idVehiculoAcoplado option[value="'+id_vehiculoAcoplado+'"]').attr('selected', 'selected');
    });


    $('.btn-modal-delete-viaje').on('click',function(){
        // gett all data
        let id = $(this).data('id');
        // set all data in form
        $('#form-delete #idViaje').val(id);

    });

});
