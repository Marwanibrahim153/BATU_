<?php
// Include the authentication check for the super admin (to ensure they are logged in)
session_start();

// Check if the user is a super admin, assuming 'role' is stored in session (this depends on your authentication system)
if (!isset($_SESSION['admin_id']) || $_SESSION['admin_role'] != 'super_admin') {
    header('Location: index.php'); // Redirect to the login page if not logged in or not a super admin
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Admin Dashboard</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .dashboard-btn {
            margin: 10px;
            font-size: 1.2rem;
        }
    </style>
</head>

<body>

    <!-- Admin Panel Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Super Admin Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h2>Welcome, Super Admin</h2>
        <p>Select a page to navigate to:</p>

        <!-- Navigation Buttons -->
        <div class="d-flex flex-column">
            <a href="admission.php" class="btn btn-primary dashboard-btn">Admission</a>
            <a href="news_add.php" class="btn btn-primary dashboard-btn">Add News</a>
            <a href="news_list.php" class="btn btn-primary dashboard-btn">View News</a>
            <a href="manage_users.php" class="btn btn-primary dashboard-btn">Manage Users</a>
            <a href="settings.php" class="btn btn-primary dashboard-btn">Settings</a>
            <!-- Add more buttons as needed -->
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3 mt-5">
        <p>&copy; 2025 Super Admin Panel. All rights reserved.</p>
    </footer>

    <!-- Bootstrap JS, Popper.js (for tooltips and navbar) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>

</html>
