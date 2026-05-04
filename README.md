# PortafolioWebPHP

Coleccion de aplicaciones, mini proyectos y laboratorios web con HTML, CSS, JavaScript, PHP y MySQL.

## Descripcion

Este proyecto agrupa trabajos web por tipo de solucion, usando nombres basados en lo que hace cada modulo para que se vea mas limpio dentro de un portafolio.

## Estructura

```text
PortafolioWebPHP/
  modules/
    aplicaciones/
      auth-dashboard-frontend/
      gestor-tareas-php-api/
    mini-proyectos/
      formulario-registro/
      landing-cardiologia/
      utilidades-javascript/
      gestor-tareas-colaborativo/
      estado-cuenta-php/
    laboratorios-web/
      registro-cursos-php/
      catalogo-peliculas-php/
      fundamentos-html-css/
      login-visual/
  database/
    gestor-tareas-php-api.sql
    gestor-tareas-colaborativo.sql
  archives/
    utilidades-javascript-original.zip
    paquete-app-tareas-original.zip
  docs/
    ESTRUCTURA.md
    guia-gestor-tareas-colaborativo.txt
```

## Contenido principal

### Aplicaciones

- `auth-dashboard-frontend`: paginas HTML/CSS/JS para login, registro y dashboard.
- `gestor-tareas-php-api`: aplicacion PHP con autenticacion, tareas, comentarios y conexion a base de datos.

### Mini proyectos

Incluye formularios, landing pages, utilidades JavaScript, calculadoras y pequenos flujos PHP.

### Laboratorios web

Contiene pruebas y componentes web organizados por su funcion: registro de cursos, catalogo de peliculas, fundamentos HTML/CSS y login visual.

## Tecnologias

- HTML5
- CSS3
- JavaScript
- PHP
- MySQL

## Bases de datos

Los scripts SQL se centralizaron en:

```text
database/
```

Archivos disponibles:

- `gestor-tareas-php-api.sql`
- `gestor-tareas-colaborativo.sql`

## Como ejecutar

Para archivos HTML:

1. Abrir el `index.html` correspondiente en el navegador.

Para proyectos PHP:

1. Importar el SQL correspondiente desde `database/`.
2. Revisar el archivo de conexion dentro del modulo.
3. Ejecutar con XAMPP o servidor PHP local.

Ejemplo:

```bash
php -S localhost:8000
```

## Nota de organizacion

No se agregaron imagenes nuevas. Solo se reorganizaron los archivos existentes y se agrego documentacion para que el proyecto quede mas claro.
