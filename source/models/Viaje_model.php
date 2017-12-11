<?php

require_once 'ModelInterface.php';
require_once 'DataBase.php';

class Viaje_model implements ModelInterface
{
	private $_db;
	private $_id;
	private $_descripcion;
	private $_origen;
	private $_destino;
	private $_fechaInicio;
	private $_tiempoEstimado;
	private $_combustibleEstimado;
	private $_kilometroEstimado;
    private $_tiempoTotal;
    private $_combustibleTotal;
	private $_idCliente;
	private $_idChofer;
	private $_idChofer2;
	private $_idVehiculo;
	private $_idVehiculoAcoplado = null;

	public function __construct(){
		$this->_db = DataBase::getInstance();
	}

	public function get_id(){
		return $this->_id;
	}

	public function set_id($_id){
		$this->_id = $_id;
	}

	public function get_descripcion(){
		return $this->_descripcion;
	}

	public function set_descripcion($_descripcion){
		$this->_descripcion = $_descripcion;
	}

	public function get_origen(){
		return $this->_origen;
	}

	public function set_origen($_origen){
		$this->_origen = $_origen;
	}

	public function get_destino(){
		return $this->_destino;
	}

	public function set_destino($_destino){
		$this->_destino = $_destino;
	}

	public function get_fechaInicio(){
		return $this->_fechaInicio;
	}

	public function set_fechaInicio($_fechaInicio){
		$this->_fechaInicio = $_fechaInicio;
	}

	public function get_tiempoEstimado(){
		return $this->_tiempoEstimado;
	}

	public function set_tiempoEstimado($_tiempoEstimado){
		$this->_tiempoEstimado = $_tiempoEstimado;
	}

	public function get_combustibleEstimado(){
		return $this->_combustibleEstimado;
	}

	public function set_combustibleEstimado($_combustibleEstimado){
		$this->_combustibleEstimado = $_combustibleEstimado;
	}

	public function get_kilometroEstimado(){
		return $this->_kilometroEstimado;
	}

	public function set_kilometroEstimado($_kilometroEstimado){
		$this->_kilometroEstimado = $_kilometroEstimado;
	}

	public function get_idCliente(){
		return $this->_idCliente;
	}

	public function set_idCliente($_idCliente){
		$this->_idCliente = $_idCliente;
	}

	public function get_idChofer(){
		return $this->_idChofer;
	}

	public function set_idChofer($_idChofer){
		$this->_idChofer = $_idChofer;
	}

	public function get_idChofer2(){
		return $this->_idChofer2;
	}

	public function set_idChofer2($_idChofer2){
		$this->_idChofer2 = $_idChofer2;
	}

	public function get_idVehiculo(){
		return $this->_idVehiculo;
	}

	public function set_idVehiculo($_idVehiculo){
		$this->_idVehiculo = $_idVehiculo;
	}

	public function get_idVehiculoAcoplado(){
		return $this->_idVehiculoAcoplado;
	}

	public function set_idVehiculoAcoplado($_idVehiculoAcoplado){
		$this->_idVehiculoAcoplado = $_idVehiculoAcoplado;
	}

    public function getChoferes()
    {
    	$query = "SELECT id,nombre,apellido FROM Empleado WHERE id IN (SELECT id_empleado
    																		FROM Usuario
    																		WHERE estado = 'activo'
    																		AND id_rol = (SELECT id
    																						FROM Rol
    																						WHERE descripcion = 'Chofer'));";
    	$rows = $this->_db->query($query);
    	return $rows;
    }

    public function getChoferesAjax()
    {
    	$query = "SELECT id,nombre,apellido FROM Empleado WHERE id != '$this->_id' AND id IN (SELECT id_empleado
    																		FROM Usuario
    																		WHERE estado = 'activo'
    																		AND id_rol = (SELECT id
    																						FROM Rol
    																						WHERE descripcion = 'Chofer'));";
    	$rows = $this->_db->query($query);
    	return $rows;
    }

    public function getClientes()
    {
    	$query = "SELECT id,nombre,apellido,compania FROM Cliente";
    	$rows = $this->_db->query($query);
    	return $rows;
    }

    public function getVehiculos()
    {
    	$query = "SELECT id,patente FROM Vehiculo WHERE id_tipoVehiculo != (SELECT id_tipo
    																		FROM tipoVehiculo
    																		WHERE tipo = 'Acoplado')";
    	$rows = $this->_db->query($query);
    	return $rows;
    }

    public function getVehiculosAcoplado()
    {
    	$query = "SELECT id,patente FROM Vehiculo WHERE id_tipoVehiculo IN (SELECT id_tipo
    																		FROM tipoVehiculo
    																		WHERE tipo = 'Acoplado')";
    	$rows = $this->_db->query($query);
    	return $rows;
    }

	public function save (){

		if( is_null($this->_id) )
		{
			$query = sprintf("INSERT INTO Viaje(descripcion,origen,destino,fecha_inicio,tiempo_estimado,combustible_estimado,kilometro_estimado,id_cliente,id_vehiculo,id_vehiculoAcoplado,id_chofer,id_chofer2)
							VALUES ('%s','%s','%s','%s','%s','%s','%s','%s','%s',%s,%s,%s)", $this->_descripcion, $this->_origen, $this->_destino, $this->_fechaInicio ,$this->_tiempoEstimado, $this->_combustibleEstimado,$this->_kilometroEstimado,$this->_idCliente, $this->_idVehiculo, ($this->_idVehiculoAcoplado == '' ? 'NULL' : $this->_idVehiculoAcoplado), $this->_idChofer, ($this->_idChofer2 == '' ? 'NULL' : $this->_idChofer2));
		}
		else
		{
		  $query = sprintf("UPDATE Viaje SET descripcion = '%s',origen= '%s',destino= '%s',fecha_inicio= '%s',tiempo_estimado= '%s',combustible_estimado= '%s',kilometro_estimado= '%s',id_cliente= '%s',id_vehiculo= '%s',id_vehiculoAcoplado= %s,id_chofer= '%s',id_chofer2= %s WHERE id = '%s'", $this->_descripcion, $this->_origen, $this->_destino, $this->_fechaInicio, $this->_tiempoEstimado, $this->_combustibleEstimado,$this->_kilometroEstimado,$this->_idCliente, $this->_idVehiculo, ($this->_idVehiculoAcoplado == '' ? 'NULL' : $this->_idVehiculoAcoplado) ,$this->_idChofer, ($this->_idChofer2 == '' ? 'NULL' : $this->_idChofer2), $this->_id);
		}

		$rs = $this->_db->query($query);
		return $rs;
	}

    static public function finalizar($idViaje)
    {
        $db = DataBase::getInstance();
        $query = "select SUM(lv.combustible) + combustible_estimado as combustible_total, SUM(lv.kilometros) + v.kilometro_estimado as kilometros_total,TIMEDIFF( NOW() - v.fecha_inicio ) as tiempo_total from Viaje v INNER JOIN LogViaje lv ON  lv.id_viaje = v.id WHERE v.id = '$idViaje' GROUP BY v.id ";
        $res = $db->query($query);

        $combustibleTotal = 0 + $res[0]->combustible_total;
        $tiempoTotal = $res[0]->tiempo_total;
        $kilometrosTotal = $res[0]->kilometros_total;

        $query = "UPDATE Viaje v
                    INNER JOIN LogViaje lv ON v.id = lv.id_viaje
                    SET v.estado = 'finalizado',
                        v.combustible_real = '$combustibleTotal',
                        v.tiempo_real = '$tiempoTotal',
                        v.kilometro_real = '$kilometrosTotal',
                        v.fecha_fin = NOW()
                    WHERE v.id = $idViaje";

        return $db->query($query);
    }

    static public function existe($id)
    {
        $db = DataBase::getInstance();
        $query = "SELECT 1 FROM Viaje WHERE id = $id";
        return $db->query($query);
    }

    static public function activo($id)
    {
        $db = DataBase::getInstance();
        $query = "SELECT 1 FROM Viaje WHERE id = $id AND estado='activo'";
        return $db->query($query);
    }

	public function delete()
	{
		$query = sprintf("DELETE FROM Viaje WHERE id = %s", $this->_id);
		$rs =  $this->_db->query($query);
		return $rs;
	}

	public function getAll()
	{
        $query = "SELECT v.id,descripcion,origen,destino,fecha_inicio,tiempo_estimado,combustible_estimado,kilometro_estimado,id_cliente,id_vehiculo,id_vehiculoAcoplado,v.id_chofer,v.id_chofer2, c.nombre as nombre_cliente, c.apellido as apellido_cliente,e.nombre as nombre_chofer,e.apellido as apellido_chofer,e2.nombre as nombre_chofer2,e2.apellido as apellido_chofer2, vh.patente, vh2.patente as patente_acoplado, lv.razon, lv.fecha as fecha_log, lv.latitud,lv.longitud,lv.detalle as detalle_log,lv.combustible as
            combustible_log,lv.kilometros, lv.precio, v.estado
                FROM Viaje v
        		JOIN Cliente c ON c.id = v.id_cliente
        		JOIN Empleado e ON e.id = v.id_chofer
        		LEFT JOIN Empleado e2 ON e2.id = v.id_chofer2
        		JOIN Vehiculo vh ON vh.id = v.id_vehiculo
        		LEFT JOIN Vehiculo vh2 ON vh2.id = v.id_vehiculoAcoplado
                LEFT JOIN LogViaje lv ON v.id = lv.id;";

		$rows = $this->_db->query($query);
		return $rows;
	}


    static public function getById($id)
    {
        $db = DataBase::getInstance();
        $query = "SELECT v.id,descripcion,origen,destino,fecha_inicio,fecha_fin,tiempo_estimado,tiempo_real,desviacion,combustible_estimado,kilometro_estimado,id_cliente,id_vehiculo,id_vehiculoAcoplado,id_chofer ,c.nombre as nombre_cliente, c.apellido as apellido_cliente,e.nombre as nombre_chofer,e.apellido as apellido_chofer, vh.patente, vh2.patente as patente_acoplado
		FROM Viaje v
		JOIN Cliente c ON c.id = v.id_cliente
		JOIN Empleado e ON e.id = v.id_chofer
		JOIN Vehiculo vh ON vh.id = v.id_vehiculo
		LEFT JOIN Vehiculo vh2 ON vh2.id = v.id_vehiculoAcoplado where v.id = $id";
        return $db->query($query);
    }


}
