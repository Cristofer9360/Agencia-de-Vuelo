<?php
$destino = $_POST['destino'];
$fecha_ida = $_POST['fecha_ida'];
$fecha_regreso = $_POST['fecha_regreso'];
list($hotel, $precio) = explode('|', $_POST['hotel']); 
$precio = (float) $precio; 
$datetime_ida = new DateTime($fecha_ida);
$datetime_regreso = new DateTime($fecha_regreso);
$interval = $datetime_ida->diff($datetime_regreso);
$dias = $interval->days;
$costo_total = $precio * $dias;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Resumen del Viaje</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="recuadro">
        <h1>Resumen del Viaje</h1>
        <p>Destino: <?php echo ucfirst($destino); ?></p>
        <p>Fecha de Ida: <?php echo $fecha_ida; ?></p>
        <p>Fecha de Regreso: <?php echo $fecha_regreso; ?></p>
        <p>Hotel: <?php echo $hotel; ?></p>
        <p>Días: <?php echo $dias; ?></p>
        <p>Costo Total: $<?php echo $costo_total; ?></p>
    </div>
    <script src="notificaciones.js"></script>
    <script>
        window.onload = function() {
            var mensajeViaje = "Destino: <?php echo ucfirst($destino); ?>\nFecha de Ida: <?php echo $fecha_ida; ?>\nFecha de Regreso: <?php echo $fecha_regreso; ?>\nHotel: <?php echo $hotel; ?>\nDías: <?php echo $dias; ?>\nCosto Total: $<?php echo $costo_total; ?>";
            mostrarNotificacion(mensajeViaje);
            iniciarNotificaciones();
        }
    </script>
</body>
</html>
