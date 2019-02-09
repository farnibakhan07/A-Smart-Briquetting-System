<html>
<head>
<!--<meta http-equiv="refresh" content="30">-->
</head>
<body>
<?php

$service_url = 'http://192.168.1.104/arduino/digital/13';
$curl = curl_init($service_url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$curl_response = curl_exec($curl);

$temp=explode("'",$curl_response);
$temp=trim($temp[0]);
$temp=trim($temp);
//$tem=$temp[0];
echo $temp;

$random = rand(3,5);

$humidity=$temp-$random;
$timestamp = date('Y-m-d G:i:s');
$server_name="localhost";
$db_name="humidex";
$user_name="root";
$password="";
$con=mysqli_connect($server_name,$user_name,$password,$db_name);

   if(!$con)
   {
    die("Connection failed: " . mysqli_connect_error());
   }
  
//$sql = "INSERT INTO humidata(humitime,temperature,humidity) values('$timestamp','$temp','$humidity')";
$result= mysqli_query($con,$sql);
if($result)
{
	echo "yes";
}
else
{
	echo "no";
}
var_dump($result);

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


while($row = mysqli_fetch_assoc($result)) {
if($row["temperature"]>=80)
{
	include("alarm.php");
	echo "<script>playSound();</script>";
}
}

?>
</body>
</html>