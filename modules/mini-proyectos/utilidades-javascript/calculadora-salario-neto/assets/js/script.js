function calcularSalarioNeto() {
    const salarioBruto = parseFloat(document.getElementById('salarioBruto').value);

    if (isNaN(salarioBruto) || salarioBruto < 0) {
        alert("Por favor, ingrese un salario válido.");
        return;
    }

    const cargasSociales = salarioBruto * 0.0917;

    const exentoImpuesto = 842000;
    let impuestoRenta = 0;
    if (salarioBruto > exentoImpuesto) {
        impuestoRenta = (salarioBruto - exentoImpuesto) * 0.10;
    }

    const salarioNeto = salarioBruto - cargasSociales - impuestoRenta;

    document.getElementById('cargasSociales').textContent = cargasSociales.toFixed(2);
    document.getElementById('impuestoRenta').textContent = impuestoRenta.toFixed(2);
    document.getElementById('salarioNeto').textContent = salarioNeto.toFixed(2);
}