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
echo $jason;
								}
?>

<script>
    var jason=<?php echo $jason; ?>;
	var answer = JSON.stringify(jason);
	console.log(answer);
	document.write("<br />"+answer);
	var obj = JSON.parse(answer);
	document.write(obj[0].id+ obj[0].humitime);
</script>


