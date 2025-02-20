const estudiantes = [
    { nombre: "Juan", apellido: "Pérez", nota: 85 },
    { nombre: "Ana", apellido: "Gómez", nota: 90 },
    { nombre: "Luis", apellido: "Martínez", nota: 78 },
    { nombre: "María", apellido: "López", nota: 92 },
    { nombre: "Carlos", apellido: "Rodríguez", nota: 88 }
];

const listaEstudiantes = document.getElementById('listaEstudiantes');

const promedioNotas = document.getElementById('promedioNotas');

let sumaNotas = 0;

estudiantes.forEach(estudiante => {
    const parrafo = document.createElement('p');
    parrafo.textContent = `${estudiante.nombre} ${estudiante.apellido} - Nota: ${estudiante.nota}`;
    listaEstudiantes.appendChild(parrafo);

    sumaNotas += estudiante.nota;
});

const promedio = sumaNotas / estudiantes.length;

promedioNotas.textContent = `El promedio de las notas es: ${promedio.toFixed(2)}`;