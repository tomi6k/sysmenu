<?php
// Realizar la conexión a la base de datos
include("dbconnect.php");

// Verificar si se ha enviado un formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener el ID de mesa desde el formulario
    if (isset($_POST['mesa_id'])) {
        $mesa_id = $_POST['mesa_id'];

        // Preparar y ejecutar la consulta para eliminar los pedidos de la mesa seleccionada
        $consultaEliminar = "DELETE FROM pedidos WHERE mesa_id = '$mesa_id'";
        if (mysqli_query($conn, $consultaEliminar)) {
            // Redirigir a la página del panel de administrador después de eliminar
            header("Location: adminMenu.php");
            exit();
        } else {
            // Si hay un error en la consulta
            echo "Error al eliminar los pedidos: " . mysqli_error($conn);
        }
    }
}
?>
