<?php 
require_once("ConfigGlobal.php");

class Charts
{
 
    private static $instancia;
    private $dbo;

    private function __construct()
    {
        $this->dbo = ConfigGlobal::singleton_conexion();
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
    public function dataCharts()    {
        $anioActual = date("Y");
        $query =
        ' 
            select acoplado.DESCRIPCION DESCRIPCION, count(*) VECES
            from viaje
            join acoplado on viaje.ID_TIPO_ACOPLADO = acoplado.ID
            where YEAR(viaje.FECHA_INICIO) = :anioActual
            group by viaje.ID_TIPO_ACOPLADO
        ';
        try {
            $column = $this->dbo->prepare($query);
            $column->bindParam(':anioActual', $anioActual, PDO::PARAM_STR);
            $column->execute();
            $column->setFetchMode(PDO::FETCH_ASSOC);
            // $pie = $this->dbo->prepare('select pais, visitas from area_pie');
            // $pie->execute();
            
            $dataColumn = $column->fetchAll();
            // $dataPie = $pie->fetchAll();

            return array("column" => $dataColumn, "pie" => $dataPie);
            $this->dbo = null;

        }catch (PDOException $ex) {

            $ex->getMessage();

        }
 
    }

       // Evita que el objeto se pueda clonar
    public function __clone()
    {
 
        trigger_error('La clonación de este objeto no está permitida', E_USER_ERROR);
 
    }
}