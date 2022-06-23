<?php
 
// Create connection
require('../configuraciones/conexion.php');

$cedula = intval($_POST["cedula"]);
$celular = intval($_POST["telefono"]);
$correo = $_POST["correo"];


//query
if ($cedula<0)  {
	header ("Location: fiador.php");
} elseif ($celular<0){
	header ("Location: fiador.php");
} elseif ($correo == ""){
	$query="INSERT INTO `fiador`(`numero_de_cedula`,`nombre`, `direccion`, `numero_de_celular`, `correo_electronico`)
 	VALUES ('$_POST[cedula]','$_POST[name]','$_POST[direccion]',$_POST[telefono],NULL)";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

 	if($result){
        header ("Location: fiador.php");
 	}else{
 		echo "Ha ocurrido un error al ingresar al fiador";
 	}
} else{
	$query="INSERT INTO `fiador`(`numero_de_cedula`,`nombre`, `direccion`, `numero_de_celular`, `correo_electronico`)
 	VALUES ('$_POST[cedula]','$_POST[name]','$_POST[direccion]',$_POST[telefono],'$correo')";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

 	if($result){
        header ("Location: fiador.php");
 	}else{
 		echo "Ha ocurrido un error al ingresar al fiador";
 	}
}

?>
