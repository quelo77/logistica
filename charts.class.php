<?php
require_once("conexion.class.php");

class Charts
{
 
    private static $instancia;
    private $dbh;

    private function __construct()
    {
        $this->dbh = Conexion::singleton_conexion();
    }

    public static function singleton_charts()
    {
 
        if (!isset(self::$instancia)) {
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
 
        }
 
        return self::$instancia;
        
    }
 
    //obtenemos un array con la información para area y column, y otro para pie y donut
    public function dataCharts()
    {
        
        try {
            $column = $this->dbh->prepare('select year,pagos,ganancias, financiacion from area_column');
            $column->execute();
            $pie = $this->dbh->prepare('select pais, visitas from area_pie');
            $pie->execute();
            
            $dataColumn = $column->fetchAll();
            $dataPie = $pie->fetchAll();

            return array("column" => $dataColumn, "pie" => $dataPie);
            $this->dbh = null;

        }catch (PDOException $e) {

            $e->getMessage();

        }
 
    }

       // Evita que el objeto se pueda clonar
    public function __clone()
    {
 
        trigger_error('La clonación de este objeto no está permitida', E_USER_ERROR);
 
    }
}