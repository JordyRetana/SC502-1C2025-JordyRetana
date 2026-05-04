function verificarEdad() {
    const edad = parseInt(document.getElementById('edad').value);

    if (isNaN(edad)) {
        alert("Por favor, ingresa una edad válida.");
        return;
    }

    const resultado = document.getElementById('resultado');

    if (edad >= 18) {
        resultado.textContent = "Eres mayor de edad.";
    } else {
        resultado.textContent = "Eres menor de edad.";
    }
}