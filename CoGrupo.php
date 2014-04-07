<?php	//php encargado de pasar todos los datos de un grupo

include_once('globals.php');

$group = $_POST["CONSULTA_NOMBRE"];
$sql = 'SELECT creator, subj, time, place, date FROM groups WHERE name = "'.$group.'"';

$conexion = mysqli_connect(config::host(), config::user(), config::pass(), config::db());
mysqli_set_charset($conexion, "utf8");

if(!$result = mysqli_query($conexion, $sql)) die("No se pudo conectar: " . mysqli_error($conexion));

$buffer = array();
 
$i = 0;

while($row = mysqli_fetch_array($result))
   {
        $buffer[$i] = $row;
        $i++;
   }
   
$close = mysqli_close($conexion);

echo json_encode($buffer);

?>