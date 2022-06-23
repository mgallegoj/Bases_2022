<?php
 
// Create connection
require('../configuraciones/conexion.php');

$cedula = $_POST["codigo"];

//query
if($cedula<0){
	echo "El código debe ser positivo";
}
else{
	$query="INSERT INTO `contrato`(`codigo`,`fecha_de_inicio`, `fecha_de_terminacion`, `valor`, `fiador`, `empeno`)
 	VALUES ('$_POST[codigo]','$_POST[fechai]','$_POST[fechat]','$_POST[valor]','$_POST[fiador]','$_POST[empeno]')";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

 	if($result){
        header ("Location: contrato.php");
 	}else{
 		echo "Ha ocurrido un error al ingresar el contrato";
 	}


}

?>
