<?php
								 $db="humidex";
								 $table="humidata";
							     $con=mysqli_connect("localhost","root","",$db);
								 if(!$con)
                                 {
                                 die("Connection not established".mysqli_connect_error());
                                 }
								 else
								{

								$sql="select * from $table";
								$result=mysqli_query($con,$sql);

$to_encode = array();
while($row = mysqli_fetch_assoc($result)) {
$to_encode[] = $row;
}


$jason=json_encode($to_encode);
//echo $jason;

								}
?>
<html>
<head>
	<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<script src="js/amcharts.js"></script>
		<script src="js/serial.js"></script>

<script src="js/lightblue.js"></script>
		
<style type='text/css'>
#chartdiv {
	width	: 100%;
	height	: 500px;
}												
</style>
<script type="text/javascript">
var chartData = generateChartData();

var chart = AmCharts.makeChart("chartdiv", {
    "type": "serial",
    "theme": "light",
     "marginRight": 40,
    "marginLeft": 40,
    "autoMarginOffset": 20,
    "dataProvider": chartData,
    "valueAxes": [{
        "position": "left",
        //"title": "Unique visitors"
    }],
    "graphs": [{
        "id": "g1",
        "fillAlphas": 0.4,
        "valueField": "value",
         "balloonText": "<div style='margin:5px; font-size:19px;'><b>[[value]]</b>°C</div>"
    }],
    "chartScrollbar": {
        "graph": "g1",
        "scrollbarHeight": 80,
        "backgroundAlpha": 0,
        "selectedBackgroundAlpha": 0.1,
        "selectedBackgroundColor": "#000000",
        "graphFillAlpha": 0,
        "graphLineAlpha": 0.5,
        "selectedGraphFillAlpha": 0,
        "selectedGraphLineAlpha": 1,
        "autoGridCount": true,
        "color": "#AAAAAA"
    },
    "chartCursor": {
        "categoryBalloonDateFormat": "JJ:NN, DD MMMM",
        "cursorPosition": "mouse"
	
    },
    "categoryField": "date",
    "categoryAxis": {
        "minPeriod": "mm",
        "parseDates": true
    },
    "export": {
        "enabled": true,
         "dateFormat": "YYYY-MM-DD HH:NN:SS"
    }
});

chart.addListener("dataUpdated", zoomChart);
// when we apply theme, the dataUpdated event is fired even before we add listener, so
// we need to call zoomChart here
zoomChart();
// this method is called when chart is first inited as we listen for "dataUpdated" event
function zoomChart() {
    // different zoom methods can be used - zoomToIndexes, zoomToDates, zoomToCategoryValues
    chart.zoomToIndexes(chartData.length - 250, chartData.length - 100);
}

// generate some random data, quite different range
/*function generateChartData() {
    var chartData = [];
    // current date
    var firstDate = new Date();
    // now set 500 minutes back
    firstDate.setMinutes(firstDate.getDate() - 1000);

    // and generate 500 data items
    for (var i = 0; i < 500; i++) {
        var newDate = new Date(firstDate);
        // each time we add one minute
        newDate.setMinutes(newDate.getMinutes() + i);
        // some random number
        var visits = Math.round(Math.random() * 40 + 10 + i + Math.random() * i / 5);
        // add data item to the array
        chartData.push({
            date: newDate,
            value: visits
        });
    }
    return chartData;
}*/
function generateChartData() {
    var chartData = [];
   
	var jason=<?php echo $jason; ?>;

	
	var answer = JSON.stringify(jason);
	console.log(answer);
	var obj = JSON.parse(answer);
	var length = Object.keys(obj).length;
	console.log(length);
	//var firstDate = new Date();
    // now set 500 minutes back
   // firstDate.setMinutes(firstDate.getDate() - 1000);
		  for (var i = 0; i < length; i++) {
		var newDate=obj[i].humitime;
		var visits=obj[i].temperature;
		//alert(visits);
		//console.log(newDate);
		  //console.log(visits);

    // and generate 500 data items
    
        //var newDate = new Date(firstDate);
        // each time we add one minute
      //  newDate.setMinutes(newDate.getMinutes() + i);
	
		
        chartData.push({
            date: newDate,
            value: visits
        });
    }
    return chartData;
}
</script>

</head>
<body>
<div id="chartdiv"></div>	
</body>
</html>												