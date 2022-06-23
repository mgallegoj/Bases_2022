<?php
 
// Create connection
require('../configuraciones/conexion.php');

$cedula = $_POST["codigo"];

//query
if($cedula<0){
	echo "El código debe ser positivo";
}
else{
	$query="INSERT INTO `empeno`(`codigo`,`valor`, `tipo_de_objeto`, `descripcion`, `fiador`)
 	VALUES ('$_POST[codigo]','$_POST[valor]','$_POST[tipo]','$_POST[descripcion]','$_POST[fiador]')";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

 	if($result){
        header ("Location: empeno.php");
 	}else{
 		echo "Ha ocurrido un error al ingresar el empeño";
 	}


}

?>
