<?php  

//comprobamos que sea una petición ajax
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') 
{

    require_once("charts.class.php");

    //creamos una instancia de chart
    $charts = Charts::singleton_charts();

    //asignamos a data el método dataCharts
    $data = $charts->dataCharts();

    //si existe get chart y es column, es que queremos obtener datos para
    //column chart o areachart
    if(isset($_GET['chart']) && $_GET["chart"] == "column")
    {
        //creamos la cabecera de la gráfica
        $chart[] = array('DESCRIPCION', 'VECES');
        foreach($data["column"] as $value)
        {
            //vamos insertando en chart los datos de la base de datos
            //especificando de forma explicita el tipo de datos, int, string etc
            $chart[] =  array(
                            (string)$value["acoplado.DESCRIPCION"], 
                            (int)$value["count(*)"]
                        );
        }

    //en otro caso, queremos obtener datos para piechart o donutchart
    }else{

        $chart[] = array('pais', 'visitas');
        foreach($data["pie"] as $value)
        {
              $chart[] =  array(
                            (string)$value["pais"], 
                            (int)$value["visitas"]
                         );
        }
    }

    echo json_encode($chart);

 }else{
    throw new Exception("Error Processing Request", 1);
 }