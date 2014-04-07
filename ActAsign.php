<?php	//php encargado de recibir asignaturas a guardar en nuestro servidor MySQL

include_once('globals.php');

$json = $_POST["Mensaje"];
$json = urldecode($json);
$json = str_replace("\\", "", $json);


$conexion = mysqli_connect(config::host(), config::user(), config::pass(), config::db());
mysqli_set_charset($conexion, "utf8");


$jsonf = json_decode($json, TRUE);

$user = $jsonf[0]["user"];

if(!$result = mysqli_query($conexion, 'DELETE FROM subjects WHERE user = "'.$user.'"'))
		die("No se pudo conectar : " . mysqli_error($conexion));


for($i=1;$i<count($jsonf);$i++)
{
	$asign = $jsonf[$i]["asign"];
	$id_asign = $jsonf[$i]["id_asign"];
	
	if(!$result2 = mysqli_query($conexion, "INSERT INTO subjects (user, id_subj, subj) VALUES ('$user','$id_asign', '$asign')")) 
			{
				echo '[{"status":"no","comment":"Ha habido un problema con la base de datos"}]';
				die("No se pudo conectar $i: " . mysqli_error($conexion));
			}
		
 //sleep(0.1);
 
}

echo '[{"status":"si","comment":"Se ha actualizado la base de datos correctamente"}]';


/*$mensaje = '[{"user":"santapol"},{"asign":"Ing. del transporte","id_asign":"TRA"},{"asign":"Teoría de estructuras","id_asign":"EST"}]';

$mensaje = $_POST["Mensaje"];

$mensaje = urldecode($mensaje);

$mensaje = str_replace("\\", "", $mensaje);

//$mensaje = str_replace(" ", "", $mensaje);
$jsonf = json_decode($mensaje, TRUE);

echo $mensaje;

echo "_________";

var_dump ($jsonf);

//echo $jsonf["user"];
echo $jsonf[0]["user"];
echo $jsonf[1]["id_asign"];
/*$ar=fopen("texto.txt", "a");
fputs($ar, $mensaje);
fputs($ar, $jsonf[0]['user']);
fclose($ar);

//echo $jsonf[0]['user'];

var_dump($jsonf);*/

?>