<?php
// Iniciar sesión
session_start();

// Verificar si el ID de mesa está configurado
if (isset($_POST['mesa_id'])) {
    $mesa_id = $_POST['mesa_id'];
} else {
    // Redirigir a la página de selección de mesa si no hay un ID de mesa
    header("Location: seleccionar_mesa.php");
    exit;
}

// Verificar si el total está configurado
if (isset($_POST['total'])) {
    $total = $_POST['total'];
} else {
    // Redirigir a la página de selección de mesa si no hay un total configurado
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
    </style>
</head>
<body>
    <div class="card">
        <h1 class="header-title">Comanda</h1>

        <?php
        include("dbconnect.php");

        $consultaResto = "SELECT * FROM restaurant";
        $resultResto = mysqli_query($conn, $consultaResto);

        while ($row = mysqli_fetch_assoc($resultResto)) {
            echo "<p>" . $row['nombre-resto'] . " " . $row['dir-resto'] . "</p>";
        }

        echo "<h2>Comanda para la Mesa $mesa_id:</h2>";

        $consultaPedidos = "SELECT * FROM pedidos WHERE mesa_id = '$mesa_id'";
        $resultPedidos = mysqli_query($conn, $consultaPedidos);

        echo "<table>";
        echo "<tr><th>ID Mesa</th><th>Pedido</th></tr>";

        while ($row = mysqli_fetch_assoc($resultPedidos)) {
            echo "<tr>";
            echo "<td>" . $row['mesa_id'] . "</td>";
            echo "<td>" . $row['plato'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";

        echo "<p>Total: $" . $total . "</p>";
        ?>

        <a href="menu.php">Volver al Menú</a>

    </div>
</body>
</html>
