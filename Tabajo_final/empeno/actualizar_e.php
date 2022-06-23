<?php
 
// Create connection
require('../configuraciones/conexion.php');

//query
$query="UPDATE empeno SET valor='$_POST[valor]',tipo_de_objeto='$_POST[tipo]',descripcion='$_POST[descripcion]',fiador='$_POST[fiador]' WHERE codigo='$_POST[codigo]'";
$result = mysqli_query($conn, $query) or 
die(mysqli_error($conn));
 
if($result){
    header ("Location: empeno.php");
    
     
 }else{
     echo "Ha ocurrido un error al modificar el empeño";
 }
 
mysqli_close($conn);



?>