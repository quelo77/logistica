google.load("visualization", "1", {packages:["corechart"]}); 

//obtenemos datos dependiendo de la gráfica y la devolvemos
function getData(type) 
{
      var scriptUrl = "instance.php?chart="+type;
      $.ajax({
          url: scriptUrl,
          type: 'get',
          dataType: 'json',
          async: false,
          success: function(data) {
              info = data;
          } 
      });
      return info;
}

//gráfica column
google.setOnLoadCallback(drawColumnChart);
function drawColumnChart() 
{

    var data = new google.visualization.arrayToDataTable(
          getData("column")//llamamos a getData y le pasamos el array con la info
    );

    var options = {
          title: 'Rendimiento de la empresa',
          hAxis: {title: 'Año', titleTextStyle: {color: 'red'}}
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('columnchart'));
        chart.draw(data, options);
}


//gráfica area
google.setOnLoadCallback(drawAreaChart);
function drawAreaChart() 
{
    var data = google.visualization.arrayToDataTable(
        getData("column")//llamamos a getData y le pasamos el array con la info
    );

    var options = {
        title: 'Rendimiento de la empresa',
        hAxis: {title: 'Año',  titleTextStyle: {color: '#333'}},
        vAxis: {minValue: 0}
    };

    var chart = new google.visualization.AreaChart(document.getElementById('areachart'));
    chart.draw(data, options);
}

//gráfica pie
google.setOnLoadCallback(drawPieChart);
function drawPieChart() 
{
    var data = google.visualization.arrayToDataTable(
      getData("pie")//llamamos a getData y le pasamos el array con la info
    );

    var options = {
        title: 'Estadisticas de visitantes',
        is3D: true,
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
    chart.draw(data, options);
}

//gráfica donut
google.setOnLoadCallback(drawDonutChart);
function drawDonutChart() 
{
    var data = google.visualization.arrayToDataTable(
      getData("pie")//llamamos a getData y le pasamos el array con la info
    );

    var options = {
      title: 'Estadisticas de visitantes',
      pieHole: 0.4,
    };

    var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
    chart.draw(data, options);
}