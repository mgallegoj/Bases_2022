<?php
 
// Create connection
require('../configuraciones/conexion.php');

//query
$celular = intval($_POST["telefono"]);
$correo = $_POST["correo"];


if ($celular<0)  {
	header ("Location: fiador.php");
} elseif ($correo == ""){
    $query="UPDATE fiador SET nombre='$_POST[nombre]',direccion='$_POST[direccion]',numero_de_celular=$_POST[telefono],correo_electronico=NULL WHERE numero_de_cedula='$_POST[cedula]'";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    if($result){
        header ("Location: fiador.php");
    }else{
        echo "Ha ocurrido un error al modificar al fiador";
    }
    mysqli_close($conn);
} else {
    $query="UPDATE fiador SET nombre='$_POST[nombre]',direccion='$_POST[direccion]',numero_de_celular=$_POST[telefono],correo_electronico='$_POST[correo]' WHERE numero_de_cedula='$_POST[cedula]'";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    if($result){
        header ("Location: fiador.php");
    }else{
        echo "Ha ocurrido un error al modificar al fiador";
    }
    mysqli_close($conn);

}    
?>