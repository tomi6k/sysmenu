<?php
// Iniciar sesión
session_start();

// Verificar si el ID de mesa está configurado
if (isset($_SESSION['mesa_id'])) {
    $mesa_id = $_SESSION['mesa_id'];
} else {
    // Redirigir a la página de selección de mesa si no hay un ID de mesa
    header("Location: seleccionar_mesa.php");
    exit;
}
?>


<html>
<head>
    <style>
        .card {
            background-color: #f2f2f2;
            border-radius: 5px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .header-title {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        .order-button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 8px 12px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="card">
        <h1 class="header-title">SysMenu</h1>

        <?php
        include("dbconnect.php");

        $consultaResto = "SELECT * FROM restaurant";
        $resultResto = mysqli_query($conn, $consultaResto);

        while ($row = mysqli_fetch_assoc($resultResto)) {
            echo "<p>" . $row['nombre-resto'] . " " . $row['dir-resto'] . "</p>";
        }

        // echo "<h2>Pedidos Realizados para la Mesa $mesa_id:</h2>";

        // // Obtener los pedidos realizados por la mesa actual desde la base de datos
        // $consultaPedidos = "SELECT * FROM pedidos WHERE mesa_id = '$mesa_id'";
        // $resultPedidos = mysqli_query($conn, $consultaPedidos);

        // if (mysqli_num_rows($resultPedidos) > 0) {
        //     echo "<ul>";
        //     while ($row = mysqli_fetch_assoc($resultPedidos)) {
        //         echo "<li>" . $row['plato'] . "</li>";
        //     }
        //     echo "</ul>";
        // } else {
        //     echo "<p>No se han realizado pedidos para esta mesa.</p>";
        // }

        $consultaMenu = "SELECT * FROM menu";
        $resultMenu = mysqli_query($conn, $consultaMenu);

        echo "<table>";
        echo "<tr><th>Nombre</th><th>Precio</th><th></th></tr>";

        while ($row = mysqli_fetch_assoc($resultMenu)) {
            echo "<tr>";
            echo "<td>" . $row['nombre-plato'] . "</td>";
            echo "<td>$" . $row['precio-plato'] . "</td>";
            echo "<td><form action='pedido.php' method='post'><input type='hidden' name='plato' value='" . $row['nombre-plato'] . "'><input type='hidden' name='precio' value='" . $row['precio-plato'] . "'><button class='order-button' type='submit'>Pedir</button></form></td>";            echo "</tr>";
        }

        echo "</table>";

        ?>

    </div>
</body>
</html>
