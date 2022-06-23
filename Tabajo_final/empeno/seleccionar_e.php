<?php
 
// Create connection
require('../configuraciones/conexion.php');

//query
$query="SELECT * FROM empeno";
$result = mysqli_query($conn, $query) or 
die(mysqli_error($conn));
 

 
mysqli_close($conn);



?>
