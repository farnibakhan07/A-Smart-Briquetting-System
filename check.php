

<?php
if(isset($_POST['submit']))
{
$username=$_POST['usname'];
$password=$_POST['pass'];
$server="localhost";
$uname="root";
$pass="";
$database="humidex";
$table_name="login";
$con=mysqli_connect("$server","$uname","$pass","$database");
if(!$con)
{
die("server not connected".mysqli_connect_error());
}
else
{
//mysql_select_db($database,$con);
$sql="SELECT * FROM $table_name";
$result=mysqli_query($con,$sql);

while($row=mysqli_fetch_assoc($result))
{
$usname[]=$row['name'];
$pass[]=$row['password'];

}
for($i=0;$i<1;$i++)
{
if($usname[$i]==$username && $pass[$i]==$password)
{
	header('location:index.php');
}
else
	header('location:admin1.php');
}

}
}
?>
