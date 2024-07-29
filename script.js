class PaqueteTuristico {
    constructor(destino, fecha, precio, descripcion, disponible = true) {
        this.destino = destino;
        this.fecha = fecha;
        this.precio = precio;
        this.descripcion = descripcion;
        this.disponible = disponible;
    }
    mostrarDetalles() {
        return `
            <h3>${this.destino}</h3>
            <p>Fecha: ${this.fecha}</p>
            <p>Precio: $${this.precio}</p>
            <p>Descripción: ${this.descripcion}</p>
            <p>${this.disponible ? "Disponible" : "No disponible"}</p>
        `;
    }
}
// Simulación de datos de ejemplo utilizando la clase PaqueteTuristico
const paquetes = [
    new PaqueteTuristico("Chile", "2024-09-13", 500, "Explora Chiloé: Donde la Tradición y la Naturaleza se Encuentran."),
    new PaqueteTuristico("Perú", "2024-12-25", 700, "Descubre la Maravilla de Machu Picchu: Donde la Historia y la Naturaleza se Fusionan."),
    new PaqueteTuristico("Brasil", "2024-10-27", 800, "Explora la Belleza de Río de Janeiro: Donde la Naturaleza y la Cultura Brilla."),
];
class Notificacion {
    static mostrar(mensaje) {
        if (!("Notification" in window)) {
            alert(mensaje);
        } else if (Notification.permission === "granted") {
            new Notification(mensaje);
        } else if (Notification.permission !== "denied") {
            Notification.requestPermission().then(permission => {
                if (permission === "granted") {
                    new Notification(mensaje);
                }
            });
        }
    }
}
function search() {
    const destinationInput = document.getElementById("destination").value.toLowerCase();
    const travelDateInput = document.getElementById("travel-date").value;
    const filteredPaquetes = paquetes.filter(paquete => {
        const matchesDestination = paquete.destino.toLowerCase().includes(destinationInput);
        const matchesDate = !travelDateInput || paquete.fecha === travelDateInput;
        return matchesDestination && matchesDate;
    });
    const resultsContainer = document.getElementById("results-container");
    resultsContainer.innerHTML = "";

    if (filteredPaquetes.length > 0) {
        filteredPaquetes.forEach(paquete => {
            const resultItem = document.createElement("div");
            resultItem.classList.add("result-item");
            resultItem.innerHTML = paquete.mostrarDetalles();
            resultsContainer.appendChild(resultItem);
        });
    } else {
        resultsContainer.innerHTML = "<p>No se encontraron resultados</p>";
    }
}
function clearResults() {
    document.getElementById("destination").value = "";
    document.getElementById("travel-date").value = "";
    document.getElementById("results-container").innerHTML = "";
}
// Eventos personalizados
document.addEventListener("paqueteActualizado", (event) => {
    const { paquete } = event.detail;
    Notificacion.mostrar(`El paquete a ${paquete.destino} ha sido actualizado. ¡Nuevo precio: $${paquete.precio}!`);
});
// Ejemplo de actualización de un paquete y disparo de evento
function actualizarPaquete(destino, nuevoPrecio) {
    const paquete = paquetes.find(p => p.destino.toLowerCase() === destino.toLowerCase());
    if (paquete) {
        paquete.precio = nuevoPrecio;
        const evento = new CustomEvent("paqueteActualizado", { detail: { paquete } });
        document.dispatchEvent(evento);
    }
}
// Solicitar permiso de notificación al cargar la página
window.onload = () => {
    if (Notification.permission !== "granted" && Notification.permission !== "denied") {
        Notification.requestPermission();
    }
};
// Simulación de actualización de paquete
setTimeout(() => { actualizarPaquete("Chile", 450);}, 5000); // Actualiza el paquete Chile después de 5 segundos
setTimeout(() => { actualizarPaquete("Perú", 650);}, 10000); // Actualiza el paquete Chile después de 10 segundos
setTimeout(() => { actualizarPaquete("Brasil", 750);}, 15000); // Actualiza el paquete Chile después de 15 segundos