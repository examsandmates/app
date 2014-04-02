<?php	//esto va a ser un php encargado de introducir los valores pasados para un nuevo usuario

include_once('globals.php');

$nick = $_POST["NICK"];
$name = $_POST["NOMBRE"];
$email = $_POST["EMAIL"];
$pass = $_POST["PASSWORD"];
$sql = 'INSERT INTO users ('nick', 'pass', 'name', 'email', 'block') VALUES ("'.$nick.'", '456', 'Ambrosio Paces Manel', 'ambri@mail.com', '0')';
$sql = 'SELECT xxxx FROM yyyy WHERE zzzz = "'.$q.'"';

$conexion = mysqli_connect(config::host(), config::user(), config::pass(), config::db());
mysqli_set_charset($conexion, "utf8");

if(!$result = mysqli_query($conexion, $sql)) die("No se pudo conectar: " . mysql_error());

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