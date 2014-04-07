<?php	//php encargado de crear grupos de estudio

include_once('globals.php');

$name = $_POST["CONSULTA_NOMBRE"];
$subj = $_POST["CONSULTA_ASIGN"];
$creator = $_POST["CONSULTA_CREADOR"];
$time = $_POST["CONSULTA_HORA"];
$place = $_POST["CONSULTA_LUGAR"];
$date = $_POST["CONSULTA_FECHA"];
$sql = "INSERT INTO groups (name, subj, creator, time, place, date) VALUES ('$name','$subj','$creator','$time','$place','$date')";

$conexion = mysqli_connect(config::host(), config::user(), config::pass(), config::db());
mysqli_set_charset($conexion, "utf8");

if(!$result = mysqli_query($conexion, $sql)) 
{
	echo 	'[{"status":"no","comment":"Ha habido un problema creando el grupo"}]';
	die("No se pudo conectar: " . mysqli_error($conexion));
}

echo '[{"status":"si","comment":"Se ha creado el grupo correctamente"}]';
   
$close = mysqli_close($conexion);


?>