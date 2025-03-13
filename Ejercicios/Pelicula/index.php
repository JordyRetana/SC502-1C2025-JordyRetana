<?php
include "conexion.php";

$sql = "SELECT * FROM peliculas";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Películas</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <h1>Catálogo de Películas</h1>
    <div class="catalogo">
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="pelicula">
                <img src="<?php echo htmlspecialchars($row['foto']); ?>" alt="<?php echo htmlspecialchars($row['titulo']); ?>">
                <h2><?php echo $row['titulo']; ?></h2>
                <p><strong>Protagonista:</strong> <?php echo $row['protagonista']; ?></p>
                <p><strong>Año de estreno:</strong> <?php echo $row['anio_estreno']; ?></p>
                <p><?php echo $row['sinopsis']; ?></p>
            </div>
        <?php endwhile; ?>
    </div>

</body>
</html>