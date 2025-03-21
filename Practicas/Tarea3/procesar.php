<?php
session_start();

function registrarTransaccion($descripcion, $monto) {
    $_SESSION['transacciones'][] = ['id' => uniqid(), 'descripcion' => $descripcion, 'monto' => $monto];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    registrarTransaccion($_POST['descripcion'], floatval($_POST['monto']));
    header("Location: index.php");
    exit();
}

function generarEstadoDeCuenta() {
    $transacciones = $_SESSION['transacciones'] ?? [];
    $totalContado = array_sum(array_column($transacciones, 'monto'));
    $interes = $totalContado * 0.026;
    $cashBack = $totalContado * 0.001;
    $montoFinal = $totalContado + $interes - $cashBack;

    $contenido = "Estado de Cuenta\n---------------------------\n";
    foreach ($transacciones as $index => $t) {
        $contenido .= "ID: " . ($index + 1) . " - {$t['descripcion']} - Monto: $" . number_format($t['monto'], 2) . "\n";
    }
    $contenido .= "---------------------------\n";
    $contenido .= "Monto Total de Contado: $" . number_format($totalContado, 2) . "\n";
    $contenido .= "Monto Total con Interés (2.6%): $" . number_format($totalContado + $interes, 2) . "\n";
    $contenido .= "Cashback (0.1%): $" . number_format($cashBack, 2) . "\n";
    $contenido .= "Monto Final a Pagar: $" . number_format($montoFinal, 2) . "\n";

    file_put_contents("estado_cuenta.txt", $contenido);

    ?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Estado de Cuenta</title>
        <link rel="stylesheet" href="assets/styles.css">
    </head>
    <body>
        <div class="card">
            <h2>Estado de Cuenta</h2>
            <?php foreach ($transacciones as $index => $t): ?>
                <p><strong>ID:</strong> <?= $index + 1 ?> - <?= $t['descripcion'] ?> - <strong>Monto:</strong> $<?= number_format($t['monto'], 2) ?></p>
            <?php endforeach; ?>
            <hr>
            <p><strong>Total Contado:</strong> $<?= number_format($totalContado, 2) ?></p>
            <p><strong>Interés (2.6%):</strong> $<?= number_format($interes, 2) ?></p>
            <p><strong>Cashback (0.1%):</strong> $<?= number_format($cashBack, 2) ?></p>
            <p><strong>Monto Final:</strong> $<?= number_format($montoFinal, 2) ?></p>
            <a href="index.php"><button>Volver</button></a>
        </div>
    </body>
    </html>
    <?php
}

if (isset($_GET['generar'])) {
    generarEstadoDeCuenta();
}

