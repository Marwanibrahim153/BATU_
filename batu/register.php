<?php

include 'components/connect.php';
session_start();
if(isset($_SESSION["user_id"]))
{
   header('location:profile.php');

}
$success = $_SESSION['success'] ?? '';
$error = $_SESSION['error'] ?? '';
unset($_SESSION['success'], $_SESSION['error']);
if(isset($_POST['submit'])){
   $name = $_POST['name'];
   $email = $_POST['email'];
   // $pass = password_hash($_POST["pass"],PASSWORD_BCRYPT);
   // $cpass = password_hash($_POST["cpass"],PASSWORD_BCRYPT);
   $pass = $_POST["pass"];
   $cpass = $_POST["cpass"];
   $phone = $_POST["phone"];
   $student_id = $_POST["student_id"];

   $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ?");
   $select_user->execute([$email]);
   
   if($select_user->rowCount() > 0){
      $_SESSION['error'] = 'email already taken!';
   }else{
      if($pass != $cpass){
         $_SESSION['error'] = 'confirm passowrd not matched!';
      }
      if (!preg_match("/^01[0-2,5][0-9]{8}$/", $phone)) {
         $_SESSION['error'] = "Invalid phone number. It must start with 01 and be 11 digits long.";
     }
     if (!preg_match("/^\d{2}\/\d{6}$/", $student_id)) {
      $_SESSION['error'] = "Invalid student ID format. Expected format: 23/120000.";
    }
      else{
         $insert_user = $conn->prepare("INSERT INTO `users` (name, email, password, phone, student_id) VALUES (?, ?, ?, ?, ?)");
                  
         
         if($insert_user->execute([$name, $email, sha1($pass), $phone, $student_id])){
            $_SESSION["user_id"] = $conn->lastInsertId(); 
            $_SESSION['success'] = "Regiser Success !.";
            header('location:profile.php');

         }
        else{
         $_SESSION['error'] = "Error While Adding user to Database.";

        }
      }
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
   <link rel="stylesheet" href="sss.css">

</head>
<body>

<?php include 'components/nav.php'; ?>

<section class="form-container d-flex justify-content-center align-items-center min-vh-100">
  <div class="container border p-4 rounded shadow-sm">
    <form class="register" action="" method="post" enctype="multipart/form-data">
    <?php if ($success): ?>
        <div class="alert alert-success"><?= $success ?></div>
        <?php elseif ($error): ?>
        <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>
      <h3 class="text-center">Create Account</h3>
      
      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
          <input type="text" name="name" id="name" placeholder="Name" maxlength="50" required class="form-control">
        </div>

        <div class="col-md-6 mb-3">
          <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
          <input type="email" name="email" id="email" placeholder="Email" maxlength="50" required class="form-control">
        </div>

        <div class="col-md-6 mb-3">
          <label for="phone" class="form-label">Phone Number <span class="text-danger">*</span></label>
          <input type="tel" name="phone" id="phone" placeholder="Phone Number" pattern="[0-9]{11}" maxlength="50" required class="form-control">
        </div>

        <div class="col-md-6 mb-3">
          <label for="student_id" class="form-label">Student ID <span class="text-danger">*</span></label>
          <input type="text" name="student_id" id="student_id" placeholder="Student ID (Like 23/120000)" maxlength="50" pattern="\d{2}/\d{6}" required class="form-control">
        </div>

        <div class="col-md-6 mb-3">
          <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
          <input type="password" name="pass" id="password" placeholder="Enter your password" maxlength="20" required class="form-control">
        </div>

        <div class="col-md-6 mb-3">
          <label for="confirm_password" class="form-label">Confirm Password <span class="text-danger">*</span></label>
          <input type="password" name="cpass" id="confirm_password" placeholder="Confirm your password" maxlength="20" required class="form-control">
        </div>
      <p class="link text-center">Already have an account? <a href="login.php">Login now</a></p>
      
      <div class="d-flex justify-content-center">
        <input type="submit" name="submit" value="Register Now" class="btn btn-primary">
      </div>
    </form>
  </div>
</section>
<?php include 'components/footer.php'; ?>   
</body>
</html>