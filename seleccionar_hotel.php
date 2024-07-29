<?php
session_start();

$destino = $_GET['destino'];
$fecha_ida = $_GET['fecha_ida'];
$fecha_regreso = $_GET['fecha_regreso'];
$hoteles = [
    'Chile' => [
        ['nombre' => 'Hotel Novotel', 'precio' => 120],
        ['nombre' => 'Mandarin Oriental', 'precio' => 200],
        ['nombre' => 'Ladera Boutique Hotel', 'precio' => 150]
    ],
    'Perú' => [
        ['nombre' => 'Costa del Sol Wyndham', 'precio' => 110],
        ['nombre' => 'Dazzler by Wyndham', 'precio' => 130],
        ['nombre' => 'Larqa Park Rooms', 'precio' => 90]
    ],
    'Brasil' => [
        ['nombre' => 'Hotel Astoria Palace', 'precio' => 140],
        ['nombre' => 'Real Palace Hotel', 'precio' => 100],
        ['nombre' => 'Búzios Centro Hotel', 'precio' => 140]
    ]
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $destino = $_POST['destino'];
    $fecha_ida = $_POST['fecha_ida'];
    $fecha_regreso = $_POST['fecha_regreso'];
    $hotel = $_POST['hotel'];
    $hotel_precio = $_POST['hotel_precio'];

    $hotel_info = [
        'destino' => $destino,
        'fecha_ida' => $fecha_ida,
        'fecha_regreso' => $fecha_regreso,
        'hotel' => $hotel,
        'hotel_precio' => $hotel_precio
    ];

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    $_SESSION['cart'][] = $hotel_info;
    header('Location: Carrito.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Selecciona tu Hotel</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Selecciona tu Hotel en <?php echo ucfirst($destino); ?></h1>
    <form action="" method="POST">
        <input type="hidden" name="destino" value="<?php echo $destino; ?>">
        <input type="hidden" name="fecha_ida" value="<?php echo $fecha_ida; ?>">
        <input type="hidden" name="fecha_regreso" value="<?php echo $fecha_regreso; ?>">
        <label for="hotel">Hotel:</label>
        <select name="hotel" id="hotel" onchange="actualizarPrecio()">
            <?php
            foreach ($hoteles[$destino] as $hotel) {
                echo "<option value=\"{$hotel['nombre']}|{$hotel['precio']}\">{$hotel['nombre']} - \${$hotel['precio']} por noche</option>";
            }
            ?>
        </select><br><br>
        <input type="hidden" id="hotel_precio" name="hotel_precio">
        <button type="submit">Enviar</button>
    </form>
    <script>
        function actualizarPrecio() {
            var hotelSelect = document.getElementById('hotel');
            var precio = hotelSelect.value.split('|')[1];
            document.getElementById('hotel_precio').value = precio;
        }
        window.onload = actualizarPrecio;
    </script>
</body>
</html>
