<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Carrito de Compras</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Carrito de Compras</h1>
    <?php
    if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
        echo "<table>";
        echo "<tr><th>Destino</th><th>Fecha Ida</th><th>Fecha Regreso</th><th>Hotel</th><th>Precio por Noche</th><th>Días</th><th>Costo Total</th></tr>";
        $costo_total_carrito = 0; // Variable para almacenar el costo total del carrito
        foreach ($_SESSION['cart'] as $item) {
            $fecha_ida = new DateTime($item['fecha_ida']);
            $fecha_regreso = new DateTime($item['fecha_regreso']);
            $interval = $fecha_ida->diff($fecha_regreso);
            $dias = $interval->days;
            $hotel_precio = floatval($item['hotel_precio']);
            $costo_total = $hotel_precio * $dias;
            echo "<tr>";
            echo "<td>" . htmlspecialchars($item['destino']) . "</td>";
            echo "<td>" . htmlspecialchars($item['fecha_ida']) . "</td>";
            echo "<td>" . htmlspecialchars($item['fecha_regreso']) . "</td>";
            echo "<td>" . htmlspecialchars($item['hotel']) . "</td>";
            echo "<td>$" . htmlspecialchars($item['hotel_precio']) . "</td>";
            echo "<td>" . htmlspecialchars($dias) . "</td>";
            echo "<td>$" . htmlspecialchars($costo_total) . "</td>";
            echo "</tr>";
            $costo_total_carrito += $costo_total; // Sumar al costo total del carrito
        }
        echo "<tr><td colspan='6'><strong>Total del Carrito</strong></td><td><strong>$" . htmlspecialchars($costo_total_carrito) . "</strong></td></tr>";
        echo "</table>";
    } else {
        echo "<p>El carrito está vacío.</p>";
    }
    ?>
    <br>
    <a href="index.php">Volver a seleccionar más hoteles</a>
    <br>
    <a href="limpiar_carrito.php">Limpiar carrito</a>
</body>
</html>
