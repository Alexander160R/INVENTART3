<?php
// Incluir la clase de conexión
require_once "../db/cone.php"; // Asegúrate de que la ruta sea correcta

// Crear una instancia de la clase
$conexion = new basedatos();
$conn = $conexion->conectarBD(); // Llamar a la función de conexión

// Verificar la conexión
if (!$conn) {
    die(json_encode(["error" => "Error de conexión a la base de datos"])); // Responder con un mensaje de error JSON
}

// Obtener los datos del formulario
$tipo_transaccion = isset($_POST['tipo_transaccion']) ? $_POST['tipo_transaccion'] : '';
$fecha = isset($_POST['fecha']) ? $_POST['fecha'] : '';

// Preparar la consulta SQL según los parámetros recibidos
if ($tipo_transaccion == 'entrada') {
    $query = "SELECT e.id_entrada AS id_transaccion, e.id_producto, e.cantidad, e.fecha, p.nombre AS proveedor
              FROM entrada e
              INNER JOIN producto p ON e.id_producto = p.id_producto
              WHERE e.fecha = ?";
} elseif ($tipo_transaccion == 'salida') {
    $query = "SELECT s.id_salida AS id_transaccion, s.id_producto, s.cantidad, s.fecha, p.nombre AS proveedor
              FROM salida s
              INNER JOIN producto p ON s.id_producto = p.id_producto
              WHERE s.fecha = ?";
} else {
    echo json_encode([]); // Si no se ha seleccionado tipo de transacción, devolver vacío
    exit;
}

// Ejecutar la consulta
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $fecha); // Vinculamos la fecha a la consulta
$stmt->execute();
$result = $stmt->get_result();

// Recoger los resultados
$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

// Devolver los resultados en formato JSON
echo json_encode($data);

// Cerrar la conexión
$stmt->close();
$conn->close();
?>
