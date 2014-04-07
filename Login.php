<?php	//php encargado de comprobar si el usuario existe y usa la contraseña correcta

include_once('globals.php');

$nick = $_POST["CONSULTA_USUARIO"];
$pass = $_POST["CONSULTA_PASS"];
$sql = 'SELECT id FROM users WHERE nick = "'.$nick.'" AND pass = "'.$pass.'"';

$conexion = mysqli_connect(config::host(), config::user(), config::pass(), config::db());
mysqli_set_charset($conexion, "utf8");

if(!$result = mysqli_query($conexion, $sql)) die("No se pudo conectar: " . mysqli_error($conexion));
 
 
if($row = mysqli_fetch_array($result))
   {
        echo '[{"status":"si","comment":"Bienvenido"}]';
   } else{
   	echo '[{"status":"no","comment":"No has dicho la palabra mágica"}]';
   }
   
$close = mysqli_close($conexion);


?>