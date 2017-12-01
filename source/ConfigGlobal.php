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
}