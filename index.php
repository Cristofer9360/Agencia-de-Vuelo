<!DOCTYPE html>
<html>
<head>
    <title>Agencia de Viajes</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Selecciona tu Destino</h1>
    <form id="viajeForm" action="seleccionar_hotel.php" method="GET">
        <label for="destino">Destino:</label>
        <select name="destino" id="destino">
            <option value="Chile">Chile</option>
            <option value="Perú">Perú</option>
            <option value="Brasil">Brasil</option>
        </select><br><br>
        <label for="fecha_ida">Fecha de Ida:</label>
        <input type="date" name="fecha_ida" id="fecha_ida"><br><br>
        <label for="fecha_regreso">Fecha de Regreso:</label>
        <input type="date" name="fecha_regreso" id="fecha_regreso"><br><br>
        <button type="submit">Siguiente</button>
    </form>
    <?php include 'notificaciones.php'; ?>
</body>
</html>
