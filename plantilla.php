<?php	//esto va a ser una plantilla para modificar ligeramente y conseguir los php requeridos

include_once('globals.php');

/*$q = $_POST["q"];*/
$sql = 'SELECT xxxx FROM yyyy WHERE zzzz = "'.$q.'"';

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