<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estado de Cuenta</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2 class="text-center">Registro de Transacciones</h2>
        <form action="procesar.php" method="POST" class="form">
            <div class="form-group">
                <label for="descripcion" class="form-label">Descripción</label>
                <input type="text" class="form-control" name="descripcion" required>
            </div>
            <div class="form-group">
                <label for="monto" class="form-label">Monto</label>
                <input type="number" class="form-control" name="monto" step="0.01" required>
            </div>
            <button type="submit" class="btn">Registrar</button>
        </form>

        <h3 class="text-center my-4">Estado de Cuenta</h3>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Descripción</th>
                        <th>Monto</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    session_start();
                    if (!isset($_SESSION['transacciones'])) {
                        $_SESSION['transacciones'] = [];
                    }

                    if (empty($_SESSION['transacciones'])) {
                        echo "<tr><td colspan='3' class='text-center'>No hay transacciones registradas</td></tr>";
                    } else {
                        foreach ($_SESSION['transacciones'] as $index => $transaccion) {
                            echo "<tr>
                                    <td>" . ($index + 1) . "</td>
                                    <td>" . htmlspecialchars($transaccion['descripcion']) . "</td>
                                    <td>$" . number_format($transaccion['monto'], 2) . "</td>
                                  </tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <a href="procesar.php?generar=true" class="btn btn-success">Generar Estado de Cuenta</a>
    </div>
</body>
</html>