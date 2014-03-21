<?php	

include_once('globals.php');

$user = $_POST["CONSULTA_USUARIO"];
$sql1 = 'SELECT name, email FROM users WHERE nick = "'.$user.'"';
$sql2 = 'SELECT subj FROM subjects WHERE user = "'.$user.'"';

$conexion = mysqli_connect(config::host(), config::user(), config::pass(), config::db());
mysqli_set_charset($conexion, "utf8");

if(!$result1 = mysqli_query($conexion, $sql1)) die("No se pudo conectar: " . mysql_error());

$buffer = array();
 
$i = 0;

while($row = mysqli_fetch_array($result1))
   {
        $buffer[$i] = $row;
        $i++;
   }
   
if(!$result2 = mysqli_query($conexion, $sql2)) die("No se pudo reconectar: " . mysql_error());

$j = count($buffer);

while($row = mysqli_fetch_array($result2))
	{
			$buffer[$j]=$row;	
			$j++;
	}
   
$close = mysqli_close($conexion);

echo json_encode($buffer);

?>