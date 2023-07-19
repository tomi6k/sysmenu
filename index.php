<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mesa = $_POST['mesa'];

    if (!empty($mesa)) {
        $_SESSION['mesa_id'] = $mesa;
        header("Location: menu.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SysMenu - Carta Online</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="card">
        <h1 class="header-title">SysMenu</h1>
        <form method="post" action="">
            <label for="mesa">Numero de Mesa:</label>
            <input type="number" id="mesa" name="mesa" min="1" required> <br> <br>
            <button type="submit" class="large-button">Seleccionar</button>
        </form>
        <p>SysMenu por <a href="https://www.tomi6k.github.io">tomi6k</a></p>
    </div>
</body>
</html>
Realizado por tomi6k