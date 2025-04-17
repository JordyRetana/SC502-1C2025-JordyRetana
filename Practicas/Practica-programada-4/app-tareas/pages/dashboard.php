<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
  header("Location: login.php");
  exit;
}

$pageTitle = "Panel de Tareas";
$cssFile = "../assets/css/pages/dashboard.css";

require_once 'C:/xampp/htdocs/APP-TAREAS/includes/header.php';
require_once 'C:/xampp/htdocs/APP-TAREAS/includes/nav.php';
?>

<section class="dashboard-section">
  <div class="container">
    <h2>Panel de Tareas</h2>

    <div class="nueva-tarea">
      <h3>Nueva Tarea</h3>
      <form onsubmit="crearTarea(); return false;">
        <input type="text" id="titulo" placeholder="Título de la tarea" required>
        <textarea id="descripcion" placeholder="Descripción"></textarea>
        <button type="submit">Agregar</button>
      </form>
    </div>

    <div class="mis-tareas">
      <h3>Mis Tareas</h3>
      <ul id="listaTareas"></ul>
    </div>

    <div class="comentarios" style="display:none;" id="seccionComentarios">
      <h3>Comentarios</h3>
      <form onsubmit="agregarComentario(); return false;">
        <textarea id="nuevoComentario" placeholder="Nuevo comentario"></textarea>
        <button type="submit">Agregar comentario</button>
      </form>
      <ul id="listaComentarios"></ul>
    </div>

  </div>
</section>

<script src="../assets/js/dashboard.js"></script>

<?php require_once 'C:/xampp/htdocs/APP-TAREAS/includes/footer.php'; ?>
