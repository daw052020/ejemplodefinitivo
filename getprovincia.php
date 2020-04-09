<!DOCTYPE html>
<html>
<head>

</head>
<body>

<?php

$q = $_GET['q'];

$con = mysqli_connect('localhost','root','','test');
if (!$con) {
    die('No se puede conectar a la base de datos - Error: ' . mysqli_error($con));
}
mysqli_select_db($con,"test");

$sql="SELECT * FROM poblaciones WHERE provincia_id = (SELECT idprovincia FROM provincia WHERE provincia ='".$q."')";
$result = mysqli_query($con,$sql);
    
echo "<h4>Poblaciones de la Provincia de ".$q."</h4>";
echo "<ul>";
while($row = mysqli_fetch_array($result)) {
   
    echo "<li>" . $row['poblacion'] . "</li>";
}
echo "</ul>";
mysqli_close($con);
?>
</body>
</html>