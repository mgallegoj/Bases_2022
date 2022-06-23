<?php
 
// Create connection
require('../configuraciones/conexion.php');

$cedula = $_POST["numero_de_cedula"];

//query
if($cedula<0){
	echo "La cédula debe ser positiva";
}
else{
	$query="INSERT INTO `fiador`(`numero_de_cedula`,`nombre`, `direccion`, `numero_de_celular`, `correo_electronico`)
 	VALUES ('$_POST[cedula]','$_POST[name]','$_POST[direccion]','$_POST[telefono]','$_POST[correo]')";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

 	if($result){
        header ("Location: fiador.php");
 	}else{
 		echo "Ha ocurrido un error al ingresar al fiador";
 	}


}

?>
