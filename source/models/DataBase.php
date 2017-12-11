<?php

class DataBase
{

    CONST DB_HOST = "localhost";  //192.168.10.10
    CONST DB_NAME = "logistica";  //logistica
    CONST DB_USER = "root";  // ?
    CONST DB_PASSWORD = "";  //123

    private $_db;



    /* SINGLETON */
    private static $instancia;
    public static function getInstance()
    {
        if (  !self::$instancia instanceof self) {
            self::$instancia = new self;
        }
        return self::$instancia;
    }
    /* SINGLETON */


    private function __construct()
    {
        $this->_connect();
    }


    /**
    * Ejecuta una consulta en la base de datos y retorna información
    * Notas:
    * trim sive para limpiar espacios en blanco al principio y al final de la cadena ( String )
    * strtolower sirve para pasar una cadena a minuscula
    **/
    public function query($query)
    {
        $this->_connect();

        // AGARRO LA PRIMERA PALABRA DE LA LA QUERY: SELECT / UPDATE / DELETE
        $type = explode(" ", trim($query) );
        // DEPENDE DE CUAL SEA LA PRIMERA PALABRA HAGO ALGO DISTINTO....
        switch ( strtolower($type[0]) ){
            case 'select':
                return $this->_select($query);
                break;
            case 'insert':
                return $this->_insert($query);
                break;
            case 'update':
                return $this->_update($query);
                break;
            case 'delete':
                return $this->_delete($query);
                break;
        }

        $this->_close();


    }

    /**
    * Si la consulta es un select, ejecuta la query y devuelve un array.
    * @param $query String
    * @return $res  Array | Boolean
    **/
    private function _select($query)
    {
        $res = $this->_execQuery($query);

        if ( !$res )
            return false;

        $rows = [];
        while( $reg = $res->fetch_object() ) {
            $rows[] = $reg;
        }

        return $rows;
    }

    private function _update($query)
    {
        $res = $this->_execQuery($query);

        if( !$res )
            return false;

        return $res;
    }

    /**
    * Si la consulta es un insert, guardo el campo y devuelvo el id del registro ingresado.
    * @param $query String
    * @return $res  Boolean | int
    **/
    private function _insert($query)
    {
        $res = $this->_execQuery($query);
        if( !$res )
            return false;

        return $this->_db->insert_id;
    }

    /**
    * Si la consulta es un delete, devuelvo verdadero o falso dependiendo la respuesta.
    * @param $query String
    * @return $res  Boolean
    **/
    private function _delete($query)
    {
        $res = $this->_execQuery($query);
        if ( !$res )
            return false;

        return true;
    }

    /**
    * Ejecuto la query
    * @param $query String
    * @return $res  Object
    **/
    private function _execQuery($query)
    {
        // SANITIZAR QUERY
        // https://diego.com.es/ataques-sql-injection-en-php  ----> explicacion de q trata injeccion SQL
        // http://php.net/manual/en/filter.filters.sanitize.php --> posible solucion para limpiar la cadena!
        $res = $this->_db->query($query);
        return $res;
    }

    private function _connect()
    {
        $this->_db = mysqli_connect( self::DB_HOST, self::DB_USER, self::DB_PASSWORD, self::DB_NAME );
    	$this->_db->set_charset('utf8');
    }

    private function _close()
    {
        $this->_db->close();
    }

}
