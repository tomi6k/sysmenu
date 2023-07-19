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

        .submit-button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 8px 12px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="card">
        <h1 class="header-title">Pedidos</h1>

        <?php
        include("dbconnect.php");

        $consultaResto = "SELECT * FROM restaurant";
        $resultResto = mysqli_query($conn, $consultaResto);

        while ($row = mysqli_fetch_assoc($resultResto)) {
            echo "<p>" . $row['nombre-resto'] . " " . $row['dir-resto'] . "</p>";
        }

        echo "<h2>Pedidos Realizados para la Mesa $mesa_id:</h2>";

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $pedido = $_POST['plato'];
            $precio = $_POST['precio'];

            if (!empty($pedido) && !empty($precio)) {
                // Almacenar el pedido en la base de datos asociado al ID de la mesa
                $insertarPedido = "INSERT INTO pedidos (mesa_id, plato, precio) VALUES ('$mesa_id', '$pedido', '$precio')";
                mysqli_query($conn, $insertarPedido);

                // Mostrar los pedidos realizados por la mesa correspondiente
                $consultaPedidos = "SELECT * FROM pedidos WHERE mesa_id = '$mesa_id'";
                $resultPedidos = mysqli_query($conn, $consultaPedidos);

                $total = 0; // Variable para almacenar la sumatoria del precio de todo el pedido

                echo "<ul>";
                while ($row = mysqli_fetch_assoc($resultPedidos)) {
                    echo "<li>" . $row['plato'] . " - $" . $row['precio'] . "</li>";
                    $total += $row['precio']; // Sumar el precio de cada plato al total
                }
                echo "</ul>";

                echo "<p>Total: $" . $total . "</p>"; // Mostrar el total del pedido

                echo "<form action='comanda.php' method='post'>";
                echo "<input type='hidden' name='mesa_id' value='" . $mesa_id . "'>";
                echo "<input type='hidden' name='total' value='" . $total . "'>";
                echo "<button class='submit-button' type='submit'>Realizar pedido</button>";
                echo "</form>";
            }
        }
        ?>

        <a href="menu.php">Volver al Menú</a>

    </div>
</body>
</html>
Realizado por tomi6k