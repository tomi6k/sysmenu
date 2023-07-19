<html>
    <title>SysMenu - Carta Online</title>
    <link rel="stylesheet" href="assets/css/style.css">
</html>

<?php

$servername = "localhost";
$database = "sysmenu-db";
$username = "root";
$password = "";

$conn = mysqli_connect($servername,$username,$password,$database);

if(!$conn){
    die("No se conecto". mysqli_connect_error());
} # echo "<h1>Conectado correctamente</h1>";

?>
Realizado por tomi6k