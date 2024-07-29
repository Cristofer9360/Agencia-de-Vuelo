<?php
$ofertas = [
    "¡Oferta especial! Descuento del 20% en viajes a Perú.",
    "¡Promoción! 2x1 en paquetes turísticos a Brasil.",
    "¡Nueva oferta! Viaja a Chile con un 15% de descuento.",
    "¡Oferta de verano! Hasta un 30% de descuento en todos los destinos."];
?>
<div id="notificacion" class="notificacion"></div>
<script>
let ofertas = <?php echo json_encode($ofertas); ?>;
function mostrarNotificacion() {
    let notificacion = document.getElementById('notificacion');
    let ofertaIndex = Math.floor(Math.random() * ofertas.length);
    notificacion.innerHTML = ofertas[ofertaIndex];
    notificacion.style.display = 'block';
    setTimeout(() => {
        notificacion.style.display = 'none';
    }, 5000);}
mostrarNotificacion(); 
setInterval(mostrarNotificacion, 10000); 
</script>
