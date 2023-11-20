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
        <h1>Panel de Administrador</h1>

        <table>
            <tr>
                <th>Mesa</th>
                <th>Pedido</th>
                <th>Precio Total</th>
            </tr>

            <?php
            // Realizar la conexión a la base de datos
            include("dbconnect.php");

            // Consultar los datos de la tabla "pedidos"
            $consultaPedidos = "SELECT * FROM pedidos";
            $resultPedidos = mysqli_query($conn, $consultaPedidos);

            // Array asociativo para agrupar los pedidos por el ID de mesa
            $pedidos_por_mesa = array();

            while ($row = mysqli_fetch_assoc($resultPedidos)) {
                $mesa_id = $row['mesa_id'];
                $comanda = $row['plato'];
                $platos = $row['precio'];

                // Si el ID de mesa ya existe en el array, agregar el pedido a la mesa existente
                if (array_key_exists($mesa_id, $pedidos_por_mesa)) {
                    $pedidos_por_mesa[$mesa_id]['plato'][] = $comanda;
                    $pedidos_por_mesa[$mesa_id]['precio'][] = $platos;
                } else {
                    // Si el ID de mesa no existe, crear una nueva entrada en el array
                    $pedidos_por_mesa[$mesa_id] = array(
                        'plato' => array($comanda),
                        'precio' => array($platos)
                    );
                }
            }

            // Mostrar los datos agrupados en la tabla
            foreach ($pedidos_por_mesa as $mesa_id => $pedido) {
                echo "<tr>";
                echo "<td>" . $mesa_id . "</td>";
                echo "<td>" . implode(", ", $pedido['plato']) . "</td>";
                // Calcular la sumatoria total de los precios de los platos
                $total_pedido = array_sum($pedido['precio']);
                echo "<td>" . $total_pedido . "</td>";
                echo "<td><form action='eliminar_pedido.php' method='post' onsubmit='return confirmarEliminacion()' ><input type='hidden' name='mesa_id' value='" . $mesa_id . "'><button class='delete-button' type='submit'>Eliminar</button></form></td>";
                echo "</tr>";
            }
            ?>

        </table>
        <a href="index.php">Volver al inicio</a>
        <a href="gestMenu.php">Modificar Menu</a>
    </div>
</body>
</html>
