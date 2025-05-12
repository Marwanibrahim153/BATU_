<?php
session_start();
if (!isset($_SESSION['admin_id']) || !in_array($_SESSION['admin_role'], ['super_admin'])) {
    header("Location: index.php");
    exit();
}

// Include the database connection file using PDO
include('../components/connect.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $title = $_POST['title'];
    $short_content = $_POST['short_content'];
    $facebook_link = $_POST['facebook_link'];
    
    // Handle file upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        // Define the upload directory
        $uploadDir = '../uploads/news_images/';
        $uploadFile = $uploadDir . basename($_FILES['image']['name']);
        
        // Move the uploaded file to the target directory
        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
            // Prepare the query to insert the news into the database
            $query = "INSERT INTO news (title, short_content, facebook_link, image, created_at, admin_id) VALUES (:title, :short_content, :facebook_link, :image, NOW(), :admin_id)";
            
            // Get the admin ID (assuming the admin is logged in and session contains their ID)
            session_start(); // Make sure to start the session to access session variables
            $admin_id = $_SESSION['admin_id'];
            
            // Prepare and execute the query
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':short_content', $short_content);
            $stmt->bindParam(':facebook_link', $facebook_link);
            $stmt->bindParam(':image', $_FILES['image']['name']);
            $stmt->bindParam(':admin_id', $admin_id);
            
            if ($stmt->execute()) {
                echo "News article added successfully!";
            } else {
                echo "Error adding news article.";
            }
        } else {
            echo "Error uploading image.";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add News - Admin Panel</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <!-- Admin Panel Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Admin Panel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="admin_dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="news_add.php">Add News</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h2>Add News Article</h2>

        <!-- News Form -->
        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="mb-3">
                <label for="short_content" class="form-label">Short Content</label>
                <textarea class="form-control" id="short_content" name="short_content" rows="4" required></textarea>
            </div>
            <div class="mb-3">
                <label for="facebook_link" class="form-label">Facebook Link</label>
                <input type="url" class="form-control" id="facebook_link" name="facebook_link" required>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">News Image</label>
                <input type="file" class="form-control" id="image" name="image" required>
            </div>
            <button type="submit" class="btn btn-primary">Add News</button>
        </form>
    </div>

    <!-- Bootstrap JS, Popper.js (for tooltips and navbar) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>

</html>
