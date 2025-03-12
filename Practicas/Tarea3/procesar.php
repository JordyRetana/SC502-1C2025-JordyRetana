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
    $contenido .= "---------------------------\nMonto Total de Contado: $" . number_format($totalContado, 2) . "\nMonto Total con Interés (2.6%): $" . number_format($totalContado + $interes, 2) . "\nCashback (0.1%): $" . number_format($cashBack, 2) . "\nMonto Final a Pagar: $" . number_format($montoFinal, 2) . "\n";
    
    file_put_contents("estado_cuenta.txt", $contenido);
    echo nl2br($contenido) . "<br><a href='index.php'>Volver</a>";
}

if (isset($_GET['generar'])) generarEstadoDeCuenta();
