<?php
include "components/connect.php";
session_start();
if (!isset($_SESSION["user_id"])) {
   header("Location: login.php");
   exit;
}
$user_id = $_SESSION['user_id']; 
$query = $conn->prepare("SELECT name, email, phone, student_id FROM users WHERE id = :user_id");
$query->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$query->execute();

// Fetch user data
$user_data = $query->fetch(PDO::FETCH_ASSOC);

// If no data is found, redirect to login or error page

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Profile</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="sss.css">
</head>
<body>
<?php 
include "components/nav.php";
?>
<div class="container d-flex justify-content-center align-items-center min-vh-100">
  <div class="card w-50">
    <div class="card-header text-center">
      <h3>User Profile</h3>
    </div>
    <div class="card-body">
      <form action="" method="post" enctype="multipart/form-data">
        
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($user_data['name']); ?>" class="form-control" disabled>
        </div>

        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user_data['email']); ?>" class="form-control" disabled>
        </div>

        <div class="mb-3">
          <label for="phone" class="form-label">Phone Number</label>
          <input type="tel" id="phone" name="phone" value="<?php echo htmlspecialchars($user_data['phone']); ?>" class="form-control" disabled>
        </div>

        <div class="mb-3">
          <label for="student_id" class="form-label">Student ID</label>
          <input type="text" id="student_id" name="student_id" value="<?php echo htmlspecialchars($user_data['student_id']); ?>" class="form-control" disabled>
        </div>
        <a href="logout.php" class="btn btn-danger">Logout</a>

      </form>

    </div>
  </div>
</div>
<?php 
include "components/footer.php";
?>
</body>
</html>
