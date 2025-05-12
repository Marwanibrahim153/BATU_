<?php
session_start();

include 'components/connect.php';
$success = $_SESSION['success'] ?? '';
$error = $_SESSION['error'] ?? '';
unset($_SESSION['success'], $_SESSION['error']);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $phone = trim($_POST['phone']);
        $college = $_POST['college'];
        $program = $_POST['program'];
        if (!preg_match('/^01[0125][0-9]{8}$/', $phone)) {
            $_SESSION['error'] = "Please enter a valid Egyptian phone number.";
            header("Location: admission.php");
            exit();
        }
        $stmt = $conn->prepare("SELECT * FROM applications WHERE email = ? OR phone = ?");
        $stmt->execute([$email, $phone]);
        $existingApplication = $stmt->fetch();

        if ($existingApplication) {
            $_SESSION['error'] = "An application has already been submitted with this email or phone number.";
            header("Location: admission.php");
            exit();
        }

        $stmt = $conn->prepare("INSERT INTO applications (name, email, phone, college, program) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$name, $email, $phone, $college, $program]);
        $application_id = $conn->lastInsertId();
        $application_number = "APP-" . str_pad($application_id, 5, "0", STR_PAD_LEFT); // Format as APP-00001, APP-00002, etc.
        $_SESSION['success'] = "Your application was submitted successfully! Your application number is: " . $application_number;
        header("Location: admission.php");
        exit();

    } catch (PDOException $e) {
        $_SESSION['error'] = "Database error: " . $e->getMessage();
        header("Location: admission.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admission Form</title>
    <link href="admin.css" rel="stylesheet">
    <link rel="stylesheet" href="sss.css">
</head>

<body class="bg-light">

<?php
    include "components/nav.php" 
    ?>

    <div class="container mt-5">
        <?php if ($success): ?>
        <div class="alert alert-success"><?= $success ?></div>
        <?php elseif ($error): ?>
        <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>

        <div class="card p-4 shadow rounded">
            <h3 class="mb-3 text-center">Apply for Admission</h3>
            <form method="POST">
                <div class="mb-3">
                    <label class="form-label">Full Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Phone</label>
                    <input type="text" name="phone" class="form-control" placeholder="Eg. 01012345678" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">College</label>
                    <select name="college" class="form-select" required>
                        <option value="">-- Select College --</option>
                        <option value="Industrial and Energy Technology">College of Industrial and Energy Technology</option>
                        <option value="Health Sciences">College of Health Sciences</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Program</label>
                    <select name="program" class="form-select" required>
                        <option value="">-- Select Program --</option>
                        <option value="Textile Machinery">Textile Machinery Operation & Maintenance</option>
                        <option value="Information Technology">Information Technology</option>
                        <option value="Food Manufacturing">Food Manufacturing Technology</option>
                        <option value="Railway Technology">Railway Technology</option>
                        <option value="Pharmaceutical Technology">Pharmaceutical Industries Technology</option>
                        <option value="Dental Prosthetics">Dental Prosthetics Technology</option>
                        <option value="Medical Informatics">Medical Informatics Management</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary w-100">Submit Application</button>
            </form>
        </div>
    </div>
    <?php
    include "components/footer.php" 
    ?>


</body>

</html>
