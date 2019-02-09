<!DOCTYPE HTML>
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
<?php
$table1="control";
$sql1="select * from $table1";
$result1=mysqli_query($con,$sql1);
$to_encode1 = array();
while($row1 = mysqli_fetch_assoc($result1)) {
$to_encode1[] = $row1;
}
$jason1=json_encode($to_encode1);
//echo $jason1;
?>
<html>
	<head>
		<title>Arctic Challenge: Smart Briquetting</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<script src="js/amcharts.js"></script>
		<script src="js/serial.js"></script>
		<script src="js/dark.js"></script>
		<script src="js/black.js"></script>
		<script src="js/lightblue.js"></script>
		<script src="js/gauge.js"></script>
		<script src="js/stat.js"></script>
	    <script src="js/humidity.js"></script>
		<script src="js/inp.js"></script>
		<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
		<script src="js/java.js"></script>
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
	"balloon": {
        "borderThickness": 1,
        "shadowAlpha": 0
    },
    "graphs": [{
        "id": "g1",
        "balloon":{
          "drop":true,
          "adjustBorderColor":false,
          "color":"#ffffff"
        },
        "bullet": "round",
        "bulletBorderAlpha": 1,
        "bulletColor": "#FFFFFF",
        "bulletSize": 5,
        "hideBulletsCount": 50,
        "lineThickness": 2,
        "title": "red line",
        "useLineColorForBulletBorder": true,
        "valueField": "value",
        "balloonText": "<span style='font-size:18px;'>[[value]]</span>"
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
<script>
var humid_chart = generateHumiData();

var humidchart= AmCharts.makeChart("humiddiv", {
    "type": "serial",
    "theme": "black",
     "marginRight": 40,
    "marginLeft": 40,
    "autoMarginOffset": 20,
    "dataProvider": humid_chart,
    "valueAxes": [{
        "position": "left",
        //"title": "Unique visitors"
    }],
	"balloon": {
        "borderThickness": 1,
        "shadowAlpha": 0
    },
    "graphs": [{
        "id": "g1",
        "balloon":{
          "drop":true,
          "adjustBorderColor":false,
          "color":"#ffffff"
        },
        "bullet": "round",
        "bulletBorderAlpha": 1,
        "bulletColor": "#FFFFFF",
        "bulletSize": 5,
        "hideBulletsCount": 50,
        "lineThickness": 2,
        "title": "red line",
        "useLineColorForBulletBorder": true,
        "valueField": "value",
        "balloonText": "<span style='font-size:18px;'>[[value]]</span>"
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

humidchart.addListener("dataUpdated", zoomChart);
// when we apply theme, the dataUpdated event is fired even before we add listener, so
// we need to call zoomChart here
zoomChart();
// this method is called when chart is first inited as we listen for "dataUpdated" event
function zoomChart() {
    // different zoom methods can be used - zoomToIndexes, zoomToDates, zoomToCategoryValues
    humidchart.zoomToIndexes(humid_chart.length - 250, humid_chart.length - 100);
}

function generateHumiData() {
    var humid_chart = [];
   
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
		var visits=obj[i].humidity;
		//alert(visits);
		//console.log(newDate);
		  //console.log(visits);

    // and generate 500 data items
    
        //var newDate = new Date(firstDate);
        // each time we add one minute
      //  newDate.setMinutes(newDate.getMinutes() + i);
	
		
       humid_chart.push({
            date: newDate,
            value: visits
        });
    }
    return humid_chart;
}
</script>


		

	</head>
	<body >

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header" class="alt">
						<span class="logo"><img src="images/main_logo.jpg" alt="" /></span>
						<h1>Smart Briquetting</h1>
						
					</header>

				<!-- Nav -->
					<nav id="nav">
						<ul>
							<li><a href="#intro" class="active">Introduction</a></li>
							<li><a href="#first">Monitor & Control</a></li>
							
							<li><a href="#cta">About us</a></li>
						</ul>
					</nav>

				<!-- Main -->
					<div id="main">

						<!-- Introduction -->
							<section id="intro" class="main">
								<div class="spotlight">
									<div class="content">
										<header class="major">
											<h2>Introduction</h2>
										</header>
										<p style="text-align:justify">The purpose is to enable unmanned operation of a smaller and simpler biothermic process in which monitoring and possibly adjustment of the process can be done via mobile phone and this APP. An example of a biothermic plant can be a briquetting or pellets machine with peripherals adapted to the biomass at farm level.

<ul>The app should handle the following:

<ul><span style="font-weight:bold">Monitoring:</span>
<li>temperature sensors (show actual value.)</li>
<li>15 alarm signals / fault indicators with 2 different priority levels (e.g. level sensors, fire detectors, motor protection, etc.)</li></ul>
<ul>
<span style="font-weight:bold">Steering:</span>
<li>10 control signals On / Off (e.g. Stop / boot of the entire system and stop / start of subsystem)</li>
<li>Analogue control signals (e.g. raise and lower temperature).</li></ul></ul></p>
										<ul class="actions">
											<li><a href="#" class="button">Learn More</a></li>
										</ul>
									</div>
									<span class="image"><img src="images/Duo-Set_new.jpg" alt="" /></span>
								</div>
							</section>

						<!-- First Section -->
							<section id="first" class="main special" >
							<header class="major">
									<h2>Monitor & Control</h2>
								</header>
								<header class="major">
									<div> <select name="category" id="category" onchange="show_function(this.value)" style="color:#000000"><option value="cp">---Choose Options---</option>
  <option value="temp">Temperature Sensor</option>
  <option value="humidity">Humidity Sensor</option>
  <option value="radiator">Radiator</option>
  <option value="fan">Fan Heater</option>
  <option value="bucket">Bucket Level</option>
  <option value="conveyor">Conveyor</option>
  
  </select></div>
								</header>
								<div id="sensor">
								<ul class="statistics">
								<li style='text-align:center'>
								
								 <div style=" font-family: Calibri, sans-serif; font-size:24px; text-align:center; color:#000000;">Temperature</div>
    <div id="chartdiv" style="width	: 440px; height	: 260px; background-color:#30303d"></div>
								 </li>
								 <li>
								 <div style="font-family: Calibri, sans-serif; font-size:24px; text-align:center; color:#000000;">Humidity</div>
    <div id="humiddiv" style="width	: 440px; height	: 260px; background-color:#30303d"></div>
								 </li>
								 </ul>
								 <ul class="statistics">
								 <li>
								  <div style="width:440px; font-family: Calibri, sans-serif; font-size:24px; text-align:center; color:#000000;">Radiator Status</div>
    <div id="lightdiv" style="width	: 440px; height	: 260px;background-color:#30303d"></div>
								 </li>
								 <li>
								 <div style=" font-family: Calibri, sans-serif; font-size:24px; text-align:center; color:#000000;">Fan Heater Status</div>
    <div id="humidexdiv" style="width: 440px; height: 260px;background-color:#30303d"></div>
								 </li>
								 </ul>
								
								 <ul class="statistics">
								 <li>
								 <div style="font-family: Calibri, sans-serif; font-size:24px; text-align:center; color:#000000;">Sensor Readings</div>
								 <div id='humidex_table' style=" font-family: Calibri, sans-serif; font-size:14px; text-align:center; height:400px; color:#000000;overflow:scroll;">
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

								$sql="select * from $table order by humitime desc" ;
								$result=mysqli_query($con,$sql);
								echo "<table width='800' border='1' cellspacing='0' style='text-align:center'>";
								echo "<tr>";
								echo "<td>Serial NO.</td>";
								echo "<td>Date/Time</td>";
								echo "<td>Temperature</td>";
								echo "<td>Humidity</td>";
								
								echo"</tr>";
  
								while($row=mysqli_fetch_assoc($result))
								{
								echo "<tr>";
								echo "<td>".$row['id']."</td>";
								echo "<td>".$row['humitime']."</td>";
								echo "<td>".$row['temperature']."</td>";
								echo "<td>".$row['humidity']."</td>";
								
                                echo "</tr>";
                                }
                                echo "</table>";
                                }
								 ?>
								 
								 </div>
								 </li>
								 </ul>
								  </div>
							</section>

						<!-- Second Section --
							<section id="second" class="main special">
								<header class="major">
									<h2>SysML</h2>
									<p>Donec imperdiet consequat consequat. Suspendisse feugiat congue<br />
									posuere. Nulla massa urna, fermentum eget quam aliquet.</p>
								</header>
								<ul class="statistics">
									<li class="style1">
										<span class="icon fa-code-fork"></span>
										<strong>5,120</strong> Etiam
									</li>
									<li class="style2">
										<span class="icon fa-folder-open-o"></span>
										<strong>8,192</strong> Magna
									</li>
									<li class="style3">
										<span class="icon fa-signal"></span>
										<strong>2,048</strong> Tempus
									</li>
									<li class="style4">
										<span class="icon fa-laptop"></span>
										<strong>4,096</strong> Aliquam
									</li>
									<li class="style5">
										<span class="icon fa-diamond"></span>
										<strong>1,024</strong> Nullam
									</li>
								</ul>
								<p class="content">Nam elementum nisl et mi a commodo porttitor. Morbi sit amet nisl eu arcu faucibus hendrerit vel a risus. Nam a orci mi, elementum ac arcu sit amet, fermentum pellentesque et purus. Integer maximus varius lorem, sed convallis diam accumsan sed. Etiam porttitor placerat sapien, sed eleifend a enim pulvinar faucibus semper quis ut arcu. Ut non nisl a mollis est efficitur vestibulum. Integer eget purus nec nulla mattis et accumsan ut magna libero. Morbi auctor iaculis porttitor. Sed ut magna ac risus et hendrerit scelerisque. Praesent eleifend lacus in lectus aliquam porta. Cras eu ornare dui curabitur lacinia.</p>
								
							</section>

						<!-- Get Started -->
							<section id="cta" class="main special">
								<header class="major">
									<h2>About us</h2>
									<p style="text-align:justify; font-size:20px">An air quality monitoring system is to be developed that monitors the air quality in the Room 108 of AIPL building so 
									that people in the room feel comfortable at any temperature (either cold or warm) in normal cloth. Moreover, the safety of 
									the people has to be ensured from fire by monitoring air and temperature of the room. For that, a monitor system needs to be 
									established that displays and calculates indices of comfort at work particularly in room number 108. </p>
								</header>
								
							</section>

					</div>

				<!-- Footer -->
					<footer id="footer">
						<section>
							<img src="images/sponsors.jpg" />
						</section>
						<section>
							<h2>Contact Us</h2>
							<dl class="alt">
								<dt>Address</dt>
								<dd>The Great Northern, Skelleftea</dd>
								<dt>Phone</dt>
								<dd>070 – 606 23 25</dd>
								<dt>Email</dt>
								<dd><a href="#">hackathon@arctic.northern.se</a></dd>
							</dl>
							<ul class="icons">
								<li><a href="#" class="icon fa-twitter alt"><span class="label">Twitter</span></a></li>
								<li><a href="#" class="icon fa-facebook alt"><span class="label">Facebook</span></a></li>
								<li><a href="#" class="icon fa-instagram alt"><span class="label">Instagram</span></a></li>
								<li><a href="#" class="icon fa-github alt"><span class="label">GitHub</span></a></li>
								<li><a href="#" class="icon fa-dribbble alt"><span class="label">Dribbble</span></a></li>
							</ul>
						</section>
						<p class="copyright">&copy; Cohort 4, PERCCOM. Designed & Developed By: <a href="#">PERCCOM 3</a>.</p>
					</footer>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>