<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administrador</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f2f2f2;
        }

        .container {
            max-width: 600px;
            width: 100%;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        h1 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        .textbox-grande{
            width: 150px;
            height: 100px;
            text-align: start;
            resize: none;
            box-sizing: border-box;
            overflow: hidden;
            word-wrap: break-word; 
        }
    </style>
</head>
<div class="container">
<?php
include("dbconnect.php");

$idPlato = $_POST["id"];

$consultEdit = "SELECT * FROM menu WHERE `id-plato` = $idPlato";
$result = mysqli_query($conn, $consultEdit);

echo "<table>";
        echo "<tr><th>ID</th><th>Nombre</th><th>Precio</th><th></th></tr>";

while($row = mysqli_fetch_assoc($result)){
    echo "<tr>";
    echo "<form action='actMenu.php'>
    <td><input class='textbox-grande' type='text' value='".$row["nombre-plato"] ."'</td>
    <td><input class='textbox-grande' type='text' value='".$row["precio-plato"] ."'</td>
    <td><input class='textbox-grande' type='text' value='".$row["desc-plato"] ."'></td></form>";
}
?>
</div>

</html>