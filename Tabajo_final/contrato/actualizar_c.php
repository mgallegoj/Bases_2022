<?php
 
// Create connection
require('../configuraciones/conexion.php');

//query
$query="UPDATE contrato SET fecha_de_inicio='$_POST[fechai]',fecha_de_terminacion='$_POST[fechat]',valor='$_POST[valor]',fiador='$_POST[fiador]',empeno='$_POST[empeno]' WHERE codigo='$_POST[codigo]'";
$result = mysqli_query($conn, $query) or 
die(mysqli_error($conn));
 
if($result){
    header ("Location: contrato.php");
    
     
 }else{
     echo "Ha ocurrido un error al modificar el contrato";
 }
 
mysqli_close($conn);



?>