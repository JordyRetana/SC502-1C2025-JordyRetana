<?php
$pageTitle = "Registro";
$cssFile = "/APP-TAREAS/assets/css/pages/registro.css";
require_once 'C:/xampp/htdocs/APP-TAREAS/includes/header.php';
?>

<section class="registro-section">
  <div class="form-container">
    <p class="title">Crear cuenta</p>
    <form onsubmit="registrar(); return false;">
      <div class="input-group">
        <label for="nombre">Nombre completo</label>
        <input type="text" id="nombre" placeholder="Nombre completo" required>
      </div>
      <div class="input-group">
        <label for="correo">Correo electrónico</label>
        <input type="email" id="correo" placeholder="Correo electrónico" required>
      </div>
      <div class="input-group">
        <label for="contrasena">Contraseña</label>
        <input type="password" id="contrasena" placeholder="Contraseña" required>
      </div>
      <button type="submit" class="sign">Registrarse</button>
    </form>

   
    <p class="signup">¿Ya tienes cuenta? <a href="../pages/login.php">Inicia sesión aquí</a></p>
  </div>
</section>

<script src="../assets/js/register.js"></script>

<?php ?>
