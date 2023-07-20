<?php
include("dbconnect.php");

$usuario = $_POST["usuario"];
$password = $_POST["contrasena"];

$consulta = "SELECT * FROM usuarios WHERE `nombre-usuario` = ? AND `contra-usuario` = ?";
$stmt = mysqli_prepare($conn, $consulta);
mysqli_stmt_bind_param($stmt, "ss", $usuario, $password);
mysqli_stmt_execute($stmt);

$resultado = mysqli_stmt_get_result($stmt);
$filas = mysqli_num_rows($resultado);

if ($filas > 0) {
    header("location: adminMenu.php");
} else {
    echo "Inicio de sesión incorrecto: <a href='adminLogin.php'>Intente de nuevo</a><br><br><br>";
}

?>