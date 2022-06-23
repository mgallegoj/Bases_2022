<?php
 
// Create connection
require('../configuraciones/conexion.php');

$codigo = intval($_POST["codigo"]);
$valor = intval($_POST["valor"]);


//query
if ($codigo<0)  {
	header ("Location: empeno.php");
} elseif ($valor<0){
	header ("Location: empeno.php");
} else{
	$query="INSERT INTO `empeno`(`codigo`,`valor`, `tipo_de_objeto`, `descripcion`, `fiador`)
 	VALUES ($_POST[codigo],$_POST[valor],'$_POST[tipo]','$_POST[descripcion]',$_POST[fiador])";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
 	if($result){
        header ("Location: empeno.php");
 	}else{
 		echo "Ha ocurrido un error al ingresar al fiador";
 	}
}

?>






