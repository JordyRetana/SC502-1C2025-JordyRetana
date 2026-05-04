document.addEventListener("DOMContentLoaded", () => {
    cargarTareas();
  });
  
  let tareaSeleccionada = null;
  
  function crearTarea() {
    const titulo = document.getElementById("titulo").value;
    const descripcion = document.getElementById("descripcion").value;
  
    fetch("/APP-TAREAS/api/tareas/crear.php", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({ titulo, descripcion })
    })
      .then(res => res.json())
      .then(data => {
        if (data.success) {
          cargarTareas();
          document.getElementById("titulo").value = "";
          document.getElementById("descripcion").value = "";
        } else {
          alert("Error al crear tarea.");
        }
      });
  }
  
  function cargarTareas() {
    fetch("/APP-TAREAS/api/tareas/listar.php")
      .then(res => res.json())
      .then(data => {
        const lista = document.getElementById("listaTareas");
        lista.innerHTML = "";
  
        if (data.tareas) {
          data.tareas.forEach(t => {
            const li = document.createElement("li");
            li.innerHTML = `
              <strong>${t.tarea}</strong>: ${t.descripcion}
              <button onclick="mostrarComentarios(${t.id})">💬 Comentarios</button>
              <button onclick="mostrarEdicion(${t.id}, '${t.tarea}', '${t.descripcion}')">✏️ Editar</button>
              <button onclick="eliminarTarea(${t.id})">🗑️ Eliminar</button>
            `;
            lista.appendChild(li);
          });
        }
      });
  }
  
  function mostrarEdicion(id, titulo, descripcion) {
    const nuevoTitulo = prompt("Editar título:", titulo);
    const nuevaDescripcion = prompt("Editar descripción:", descripcion);
  
    if (nuevoTitulo !== null && nuevaDescripcion !== null) {
      fetch("/APP-TAREAS/api/tareas/editar.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ id, titulo: nuevoTitulo, descripcion: nuevaDescripcion })
      })
        .then(res => res.json())
        .then(data => {
          if (data.success) {
            cargarTareas();
          } else {
            alert("Error al editar tarea.");
          }
        });
    }
  }
  
  function eliminarTarea(id) {
    if (confirm("¿Eliminar esta tarea?")) {
      fetch("/APP-TAREAS/api/tareas/eliminar.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ id })
      })
        .then(res => res.json())
        .then(data => {
          if (data.success) {
            cargarTareas();
            document.getElementById("seccionComentarios").style.display = "none";
          } else {
            alert("Error al eliminar tarea.");
          }
        });
    }
  }
  
  function mostrarComentarios(tareaId) {
    tareaSeleccionada = tareaId;
    document.getElementById("seccionComentarios").style.display = "block";
    cargarComentarios();
  }
  
  function agregarComentario() {
    const comentario = document.getElementById("nuevoComentario").value;
  
    fetch("/APP-TAREAS/api/comentarios/agregar.php", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({ tarea_id: tareaSeleccionada, comentario })
    })
      .then(res => res.json())
      .then(data => {
        if (data.success) {
          document.getElementById("nuevoComentario").value = "";
          cargarComentarios();
        } else {
          alert("Error al agregar comentario.");
        }
      });
  }
  
  function cargarComentarios() {
    fetch(`/APP-TAREAS/api/comentarios/listar.php?tarea_id=${tareaSeleccionada}`)
      .then(res => res.json())
      .then(data => {
        const lista = document.getElementById("listaComentarios");
        lista.innerHTML = "";
  
        if (data.comentarios) {
          data.comentarios.forEach(c => {
            const li = document.createElement("li");
            li.innerHTML = `
              ${c.comentario}
              <button onclick="editarComentario(${c.id}, '${c.comentario}')">✏️</button>
              <button onclick="eliminarComentario(${c.id})">🗑️</button>
            `;
            lista.appendChild(li);
          });
        }
      });
  }
  
  function editarComentario(id, actual) {
    const nuevo = prompt("Editar comentario:", actual);
    if (nuevo !== null) {
      fetch("/APP-TAREAS/api/comentarios/editar.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ id, comentario: nuevo })
      })
        .then(res => res.json())
        .then(data => {
          if (data.success) {
            cargarComentarios();
          } else {
            alert("Error al editar comentario.");
          }
        });
    }
  }
  
  function eliminarComentario(id) {
    if (confirm("¿Eliminar comentario?")) {
      fetch("/APP-TAREAS/api/comentarios/eliminar.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ id })
      })
        .then(res => res.json())
        .then(data => {
          if (data.success) {
            cargarComentarios();
          } else {
            alert("Error al eliminar comentario.");
          }
        });
    }
  }
  