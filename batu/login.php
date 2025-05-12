<?php
session_start();
include 'components/connect.php';
if(isset($_SESSION['user_id'])){
   header('location:profile.php');

}
$success = $_SESSION['success'] ?? '';
$error = $_SESSION['error'] ?? '';
unset($_SESSION['success'], $_SESSION['error']);
if(isset($_POST['submit'])){

   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $password = $_POST["pass"];
   $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ?");
   $select_user->execute([$email]);
   $row = $select_user->fetch(PDO::FETCH_ASSOC);
   if($row && sha1($password) == $row["password"]){
      $_SESSION["user_id"] = $row["id"];
      header('location:profile.php');
   }else{
      $_SESSION['error'] = "Invalid Email / Password ! .";
      }

 }

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>OTU - Login</title>
   <link rel="stylesheet" href="login.css">
   <link href="login.head.css" rel="stylesheet">
   <link rel="stylesheet" href="sss.css">

</head>
<body>

<?php include 'components/nav.php'; ?>

<section class="form-container d-flex justify-content-center align-items-center min-vh-100">
  <div class="container border p-4 rounded shadow-sm">
    <form action="" method="post" enctype="multipart/form-data" class="login">
    <?php if ($success): ?>
        <div class="alert alert-success"><?= $success ?></div>
        <?php elseif ($error): ?>
        <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>
      <h3 class="text-center"></h3>
      
      <div class="mb-3">
        <label for="email" class="form-label">Your Email <span class="text-danger">*</span></label>
        <input type="email" name="email" id="email" placeholder="Enter your email" maxlength="50" required class="form-control">
      </div>

      <div class="mb-3">
        <label for="password" class="form-label">Your Password <span class="text-danger">*</span></label>
        <input type="password" name="pass" id="password" placeholder="Enter your password" maxlength="20" required class="form-control">
      </div>
      
      <p class="link text-center">Don't have an account? <a href="register.php">Register now</a></p>
      
      <div class="d-flex justify-content-center">
        <input type="submit" name="submit" value="Login Now" class="btn btn-primary btn-block">
      </div>

      <div class="d-flex justify-content-center mt-3">
        <a href="admin/" class="btn btn-secondary">Admin Login</a>
      </div>
    </form>
  </div>
</section>




<?php 
include "components/footer.php"
?>
   
</body>
</html>