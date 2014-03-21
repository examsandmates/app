<?php	//esto va a ser un php encargado de introducir los valores pasados para un nuevo usuario

include_once('globals.php');

$nick = $_POST["CONSULTA_NICK"];
$name = $_POST["CONSULTA_NOMBRE"];
$email = $_POST["CONSULTA_MAIL"];
$pass = $_POST["CONSULTA_PASS"];
$sql1 = 'SELECT id FROM users WHERE nick = "'.$nick.'"';
$sql2 = "INSERT INTO users (nick, pass, name, email) VALUES ('$nick','$pass','$name','$email')";

$conexion = mysqli_connect(config::host(), config::user(), config::pass(), config::db());
mysqli_set_charset($conexion, "utf8");

if(!$result1 = mysqli_query($conexion, $sql1)) die("No se pudo conectar 1: " . mysqli_error($conexion));

$buffer = array();
 
   
   if($row = mysqli_fetch_array($result1))
   {
        echo '[{"status":"no","comment":"El usuario ya existe"}]';
        
   } else{
     
        if(!$result2 = mysqli_query($conexion, $sql2)) die("No se pudo conectar 2: " . mysqli_error($conexion));
        
        echo '[{"status":"si","comment":"El usuario se ha agregado"}]';
   }
   
$close = mysqli_close($conexion);

?>