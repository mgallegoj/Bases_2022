<?php
 
// Create connection
require('../configuraciones/conexion.php');

//query
$query="delete FROM fiador where numero_de_cedula='$_POST[d]'";
$result = mysqli_query($conn, $query) or 
die(mysqli_error($conn));
 
if($result){
    header ("Location: fiador.php");
 }else{
     echo "Ha ocurrido un error al eliminar al fiador";
 }
 
mysqli_close($conn);



?>