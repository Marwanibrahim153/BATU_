<?php
// components/connect.php
// Example connection file (you already have this set up)
// $conn = new PDO("mysql:host=localhost;dbname=yourdbname", 'root', '');

session_start();
include '../components/connect.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM admins WHERE username = ?");
    $stmt->execute([$username]);
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($admin && password_verify($password, $admin['password'])) {
        $_SESSION['admin_id'] = $admin['id'];
        $_SESSION['admin_role'] = $admin['role'];

        // Redirect based on role
        switch ($admin['role']) {
            case 'constructor':
                header('Location: constructor_dashboard.php');
                break;
            case 'admission':
                header('Location: admission.php');
                break;
            case 'doctor':
                header('Location: doctor.php');
                break;
            case 'admin':
                header('Location: admin.php');
                break;
            case 'super_admin':
                header('Location: superadmin.php');
                break;
            default:
                echo "<div class='alert alert-danger'>Role not recognized.</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Invalid credentials.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-form {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 400px;
        }
    </style>
</head>
<body>
    <form class="login-form" method="POST">
        <h3 class="mb-4 text-center">Admin Login</h3>
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" name="username" id="username" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="password" required>
        </div>
        <button type="submit" name="login" class="btn btn-primary w-100">Login</button>
    </form>
</body>
</html>
