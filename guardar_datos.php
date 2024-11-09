<?php
require_once "../controller/assets/cone.php";

$bd = new basedatos();
$conn = $bd->conectarBD();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tipo = $_POST['tipo'];
    $id_producto = $_POST['id_producto'];
    $cantidad = $_POST['cantidad'];
    $fecha = $_POST['fecha'];

    if (empty($tipo) || empty($id_producto) || empty($cantidad) || empty($fecha)) {
        echo "Error: Todos los campos son obligatorios.";
        exit;
    }

    if ($tipo === 'entrada') {
        $query = "INSERT INTO entrada (id_producto, cantidad, fecha) VALUES ('$id_producto', '$cantidad', '$fecha')";
    } elseif ($tipo === 'salida') {
        $query = "INSERT INTO salida (id_producto, cantidad, fecha) VALUES ('$id_producto', '$cantidad', '$fecha')";
    } else {
        echo "Error: Tipo de movimiento no válido.";
        exit;
    }

    if (mysqli_query($conn, $query)) {
        echo "ok";
    } else {
        echo "Error al guardar los datos: " . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    echo "Método no permitido.";
}
?>
