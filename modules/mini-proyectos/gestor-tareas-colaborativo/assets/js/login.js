function login() {
  const correo = document.getElementById("correo").value;
  const contrasena = document.getElementById("contrasena").value;

  fetch("/APP-TAREAS/api/usuarios/login.php", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({ correo, contrasena })
  })
    .then(res => {
      if (!res.ok) {
        throw new Error('Error de red o respuesta no válida');
      }
      return res.json();
    })
    .then(data => {
      console.log(data); 
      if (data.status === 'success') {
        window.location.href = "../pages/dashboard.php";
      } else {
        alert(data.message || "Correo o contraseña incorrectos.");
      }
    })
    .catch(err => {
      console.error("Error:", err);
      alert("Hubo un error en el proceso de login.");
    });
}
