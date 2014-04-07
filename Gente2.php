<?php //php encargado de pasar la gente con la que coincidimos en alguna asignatura

include_once('globals.php');

$user = $_POST["CONSULTA_USUARIO"];
$sql1 = 'SELECT id_subj FROM subjects WHERE user = "'.$user.'"';

$conexion = mysqli_connect(config::host(), config::user(), config::pass(), config::db());

mysqli_set_charset($conexion, "utf8");

if(!$result1 = mysqli_query($conexion, $sql1)) die("No se pudo conectar: " . mysqli_error($conexion));


$buffer = array();

 $i=0;

    while($row = mysqli_fetch_array($result1))
    {
        $buffer[$i] = $row;
        $i++;
    }

 $j=0;  
 $k=0;
	while($j<count($buffer))
	{
			$asign[$j] = $buffer[$j]['id_subj'];
			if(!$result2 = mysqli_query($conexion, 'SELECT user FROM subjects WHERE id_subj = "'.$asign[$j].'"AND NOT user = "'.$user.'"ORDER BY user')) 
			die("No se pudo conectar $j: " . mysqli_error($conexion));
			
		while($row = mysqli_fetch_array($result2)){
				$us_misma_asign[$k] = $row;
        		$k++;			
			}
		
			$j++;			
	}
//print_r($us_misma_asign);

$us_misma_asign_filtrado = array_unique($us_misma_asign, SORT_REGULAR);
$us_misma_asign_filtr_fin = array_values($us_misma_asign_filtrado);

echo json_encode($us_misma_asign_filtr_fin); 

$close = mysqli_close($conexion);

?>