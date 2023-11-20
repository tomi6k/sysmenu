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
    </style>
</head>
<body>
<script>
        function confirmarEliminacion() {
            return confirm("¿Estás seguro de eliminar los pedidos de esta mesa?");
        }
    </script>
    <div class="container">
        <h1>Modificacion de Menu</h1>

        <div class="container">

        <?php
        include("dbconnect.php");

        $consultaResto = "SELECT * FROM restaurant";
        $resultResto = mysqli_query($conn, $consultaResto);

        while ($row = mysqli_fetch_assoc($resultResto)) {
            echo "<p>" . $row['nombre-resto'] . " " . $row['dir-resto'] . "</p>";
        }

        
        $consultaMenu = "SELECT * FROM menu";
        $resultMenu = mysqli_query($conn, $consultaMenu);

        echo "<table>";
        echo "<tr><th>ID</th><th>Nombre</th><th>Precio</th><th></th></tr>";

        while ($row = mysqli_fetch_assoc($resultMenu)) {
            echo "<tr>";
            echo "<td>" . $row['id-plato'] . "</td>";
            echo "<td>" . $row['nombre-plato'] . "</td>";
            echo "<td>$" . $row['precio-plato'] . "</td>";
            echo "<td><form action='editMenu.php' method='post'><input type='hidden' name='id' value='" . $row['id-plato'] . "'><input type='hidden' name='precio' value='" . $row['nombre-plato'] . "'><input type='hidden' name='precio' value='" . $row['precio-plato'] . "'><button class='order-button' type='submit'>Editar</button></form></td>";     
            echo "</tr>";
        }
        echo "</table>";
        ?>

        </div>

        <a href="index.php">Volver al inicio</a>
        <a href="adminMenu.php">Atrás</a>
    </div>
</body>
</html>
