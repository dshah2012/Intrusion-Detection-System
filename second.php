<?php
$con=mysqli_connect("localhost","root","","");
if (mysqli_connect_errno($con))
{
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$id = $_GET['id'];
$count=$_GET['count'];

$i = 1;
$imageToEcho="";
$result1= mysqli_query($con,"SELECT id FROM login where email='$id'");
$row1=mysqli_fetch_array($result1);
$id1=$row1['id'];
$result = mysqli_query($con,"SELECT * FROM imagedata where id='$id1'");
while(($row = mysqli_fetch_array($result)) && ($i<=$count))
{
	$imageToEcho = base64_encode($row['Image']);
	$i=$i+1;
}

echo $imageToEcho;
mysqli_close($con);

?>
