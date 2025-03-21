<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estado de Cuenta</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="container">
        <form action="procesar.php" method="POST" class="form">
            <div class="title">Registro de Transacciones<br><span>Ingrese los detalles</span></div>
            <input class="input" type="text" name="descripcion" placeholder="Descripción" required>
            <input class="input" type="number" name="monto" placeholder="Monto" step="0.01" required>
            <button class="button-confirm" type="submit">Registrar →</button>
        </form>

        <a href="procesar.php?generar=true" class="button-confirm">Generar Estado de Cuenta</a>
    </div>
</body>
</html>
