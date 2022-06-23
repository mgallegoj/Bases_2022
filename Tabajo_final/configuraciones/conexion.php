<?php
$host = "localhost";
$user = "root";
$pass = "";
$DB = "trabajobd";
$conn = new mysqli($host, $user, $pass, $DB) or die("Error al conectar a la DB " . mysqli_error($link));
?>