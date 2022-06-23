<?php
 
// Create connection
require('../configuraciones/conexion.php');

//query
$query="SELECT * FROM fiador WHERE fiador.numero_de_cedula NOT IN (SELECT  fiador FROM empeno WHERE fiador IS NOT NULL )";
$result = mysqli_query($conn, $query) or 
die(mysqli_error($conn));
 

 
mysqli_close($conn);



?>
