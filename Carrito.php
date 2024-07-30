<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Ver Carrito</title>
</head>
<body>
    <h1>Tu Carrito</h1>
    <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0): ?>
        <table border="1">
            <tr>
                <th>Destino</th>
                <th>Fecha de Ida</th>
                <th>Fecha de Regreso</th>
                <th>Hotel</th>
                <th>Precio por Noche</th>
            </tr>
            <?php foreach ($_SESSION['cart'] as $item): ?>
                <tr>
                    <td><?php echo htmlspecialchars($item['destino']); ?></td>
                    <td><?php echo htmlspecialchars($item['fecha_ida']); ?></td>
                    <td><?php echo htmlspecialchars($item['fecha_regreso']); ?></td>
                    <td><?php echo htmlspecialchars($item['hotel']); ?></td>
                    <td><?php echo htmlspecialchars($item['hotel_precio']); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>Tu carrito está vacío.</p>
    <?php endif; ?>
    <br>
    <a href="index.php">Volver a seleccionar más hoteles</a>
</body>
</html>
