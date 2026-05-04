<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Cursos</title>
    <link rel="stylesheet" href="styles.css"> 
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="scripts.js"></script>
</head>
<body>
    <div id="app">
        <h1>Registro de Cursos</h1>
        <form id="courseForm" method="POST">
            <div id="coursesContainer">
                <div class="card">
                    <div class="title-1">Curso 1</div>
                    <div class="content">
                        <label for="courseName1">Nombre del Curso:</label>
                        <input type="text" name="courseName[]" id="courseName1" required>
                        <label for="courseCredits1">Créditos:</label>
                        <input type="number" name="courseCredits[]" id="courseCredits1" min="1" class="creditInput" required>
                    </div>
                    
                </div>
            </div>
            <button type="button" class="btn" id="addCourse">Agregar Curso</button>
            <div class="total-container">
                <label for="totalCredits">Suma de Créditos:</label>
                <input type="text" id="totalCredits" readonly value="0">
            </div>
        </form>
    </div>
</body>
</html>