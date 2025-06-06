<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Task Manager</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="logout()">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container my-4">
        <h1 class="text-center mb-4" >Your tasks </h1>
        <h5 class="text-center mb-4">Welcome, <?php echo $_SESSION['first_name'] . ' ' . $_SESSION['last_name']; ?></h5>
        <div class="d-flex justify-content-center mb-4" >
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#taskModal">Add New Task</button>
        </div>
        <div class="row" id="task-list">
        </div>
    </div>

    <div class="modal fade" id="taskModal" tabindex="-1" aria-labelledby="taskModalLabel" aria-hidden="true" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="taskModalLabel">Add Task</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
                </div>
                <div class="modal-body">
                    <form id="task-form">
                        <input type="hidden" id="task-id">
                        <div class="mb-3">
                            <label for="task-title" class="form-label">Task Title</label>
                            <input type="text" class="form-control" id="task-title" required> 
                        </div>
                        <div class="mb-3">   
                            <label for="task-desc" class="form-label">Task Description</label>
                            <textarea class="form-control" id="task-desc" rows="3" required></textarea>                         
                        </div>
                        <div class="mb-3">      
                            <label for="due-date" class="form-label">Due Date</label>
                            <input type="date" class="form-control" id="due-date" required>                      
                        </div>
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">Save Task</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/dashboard.js"></script>

    <script>
        function logout() {
            fetch('api/logout.php') 
                .then(() => {
                    window.location.href = 'index.php';
                })
                .catch(err => {
                    console.error('Error al cerrar sesión:', err);
                });
        }
    </script>

</body>
</html>