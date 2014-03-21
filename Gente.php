<?php

include_once('globals.php');

$user= $_POST["user"];
$sql = 'SELECT nick FROM users ORDER BY nick';   //MINUS SELECT nick FROM users WHERE user = "'$user'"

$conexion = mysqli_connect(config::host(), config::user(), config::pass(), config::db());

mysqli_set_charset($conexion, "utf8");

if(!$result = mysqli_query($conexion, $sql)) die("No se pudo conectar: " . mysqli_error($conexion));


$buffer = array();

 $i=0;

    while($row = mysqli_fetch_array($result))
    {
        $buffer[$i] = $row;
        $i++;
    }


echo json_encode($buffer); 

$close = mysqli_close($conexion);

?>