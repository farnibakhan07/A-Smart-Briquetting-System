<?php
if((isset($_POST['sensor']) && isset($_POST['sensor']))=="temp")
{
	include_once('try.php');
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
								
								
								echo"</tr>";
                              
								while($row=mysqli_fetch_assoc($result))
								{
								echo "<tr>";
								echo "<td>".$row['id']."</td>";
								echo "<td>".$row['humitime']."</td>";
								echo "<td>".$row['temperature']."</td>";
                                echo "</tr>";
								if($row['temperature']>=80)
								{
	
									include("alarm.html");
	
								}
		
                                }
                                echo "</table>";
                                }
								echo "<html><head><link rel='stylesheet' href='slider.css' type='text/css' />";
								
								echo "</head>";
								echo "<body><div id='slidecontainer'>
  <input type='range' min='1' max='100' value='50' class='slider' id='myRange'>
  <p>Value: <span id='demo'></span></p>
</div>";
echo "<script>
                                var slider = document.getElementById('myRange');
                                var output = document.getElementById('demo');
                                output.innerHTML = slider.value;

                                 slider.oninput = function() {
                                 output.innerHTML = this.value;
                                  }
                                </script>";
 echo "</body></html>";
								
								
}

?>