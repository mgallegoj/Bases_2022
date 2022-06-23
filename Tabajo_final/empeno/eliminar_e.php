<?php
 
// Create connection
require('../configuraciones/conexion.php');

//query
$query="delete FROM empeno where codigo='$_POST[d]'";
$result = mysqli_query($conn, $query) or 
die(mysqli_error($conn));
 
if($result){
    header ("Location: empeno.php");
 }else{
     echo "Ha ocurrido un error al eliminar el empeño";
 }
 
mysqli_close($conn);



?>