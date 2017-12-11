<?php
class ConfigGlobal {

	public function ObtenerConfig() {

		if($_SERVER["SERVER_ADDR"] == "::1" || $_SERVER["SERVER_ADDR"] == "127.0.01") {
			// Entorno Local
			$entorno =  array(
				"db" => array(
					"nombre"    	=> "logistica",
					"usuario"   	=> "root",
					"password"  	=> "",
					"host"			=> "localhost"
				)
			);
		}return $entorno;
	}

	public function normalizarTexto($input) {
		if(!empty($input)) {
			$texto = ucwords(strtolower($input));
			return $texto;
		}
	}	

    public function prepare($sql)
    {
 
        return $this->dbo->prepare($sql);
 
    }
 
    public static function singleton_conexion()
    {
 
        if (!isset(self::$instancia)) {
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
 
        }
 
        return self::$instancia;
        
    }
 
 
     // Evita que el objeto se pueda clonar
    public function __clone()
    {
 
        trigger_error('La clonación de este objeto no está permitida', E_USER_ERROR);
 
    }
}