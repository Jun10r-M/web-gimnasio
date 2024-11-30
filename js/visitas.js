// Comprobar si ya existe el contador en localStorage
let visitas = localStorage.getItem("contadorVisitas");

if (visitas) {
    // Convertir el valor a número y aumentar el contador
    visitas = parseInt(visitas) + 1;
} else {
    // Si no existe, inicializar el contador en 1
    visitas = 1;
}

// Guardar el nuevo valor en localStorage
localStorage.setItem("contadorVisitas", visitas);

// Mostrar el contador en la página
document.getElementById("contador").textContent ="Número de visitas: " + visitas;

//CERRAR MODAL

const respo = document.getElementById("respo")
const modal = document.getElementById("modal")
const cerrar = document.getElementById("cerrar")
const cuerpo = document.getElementById("cuerpo")

respo.addEventListener("click", function () {
    cuerpo.style.filter="blur(10px)"
    cuerpo.style.opacity="0.5"
    modal.style.display ="flex";
});
cerrar.addEventListener("click", function () {
    modal.style.display ="none";
    cuerpo.style.filter="blur(0)"
    cuerpo.style.opacity="1"
});
