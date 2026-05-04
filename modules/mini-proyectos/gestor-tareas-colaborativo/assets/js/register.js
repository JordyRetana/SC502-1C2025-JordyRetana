function registrar() {
    const data = {
      nombre: document.getElementById("nombre").value,
      correo: document.getElementById("correo").value,
      contrasena: document.getElementById("contrasena").value
    };
  
    fetch("/APP-TAREAS/api/usuarios/registro.php", {
        method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify(data)
    })
    .then(response => response.json()) 
    .then(data => {
      console.log(data);
      if (data.status === 'success') {
        alert(data.message);
      } else {
        alert("Error: " + data.message);
      }
    })
    .catch(error => {
      console.error('Error:', error);
    });
  }
  