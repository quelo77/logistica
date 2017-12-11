$(function(){

    $('.btn-modal-edit-vehiculo').on('click',function(){
        // gett all data
        let id = $(this).data('id');
        let patente = $(this).data('patente');
        let id_tipo = $(this).data('id_tipo');
        let id_estado = $(this).data('id_estado');
        let marca = $(this).data('marca');
        let nro_chasis = $(this).data('nro_chasis');
        let nro_motor = $(this).data('nro_motor');
        let fecha_fabricacion = $(this).data('fecha_fabricacion');

        // set all data in form
        $('#form-edit #idVehiculo').val(id);
        $('#form-edit #patente').val(patente);
        $('#form-edit #marca').val(marca);
        $('#form-edit #nro_chasis').val(nro_chasis);
        $('#form-edit #nro_motor').val(nro_motor);
        $('#form-edit #fecha_fabricacion').val(fecha_fabricacion);

        $('#form-edit #tipo option[value="'+id_tipo+'"]').attr('selected', 'selected');
        $('#form-edit #estado option[value="'+id_estado+'"]').attr('selected', 'selected');
    });

    $('.btn-modal-delete-vehiculo').on('click',function(){
        // gett all data
        let id = $(this).data('id');
        let patente = $(this).data('patente');
        // set all data in form
        $('#form-delete #idVehiculo').val(id);
        $('#form-delete #patente').html(patente);

    });

});