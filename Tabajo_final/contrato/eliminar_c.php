<?php
 
// Create connection
require('../configuraciones/conexion.php');

//query
$query="delete FROM contrato where codigo='$_POST[d]'";
$result = mysqli_query($conn, $query) or 
die(mysqli_error($conn));
 
if($result){
    header ("Location: contrato.php");
 }else{
     echo "Ha ocurrido un error al eliminar el contrato";
 }
 
mysqli_close($conn);



?>