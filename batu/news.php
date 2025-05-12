<?php
include('components/connect.php');
$query = "SELECT * FROM news ORDER BY created_at DESC";
$stmt = $conn->prepare($query);
$stmt->execute();
$newsArticles = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Portal</title>
    <link rel="stylesheet" href="sss.css"> <!-- Your custom CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .btn-primary {
            background-color: #1f7e2f;
            border: none;
        }
        .btn-primary:hover
        {
            background-color: #1f7e2f;
        }
    </style>
</head>

<body>

    <nav class="bg-light text-dark text-center">
        <a href="index.php"><img src="images/logo1.png.png" alt="logo"></a>
        <div class="nav-links" id="navLinks">
          <i class="fa fa-times" onclick="hideMenu()"></i>
          <ul>
            <style>
              
            </style>
            <li><a class="text-dark" href="index.php">HOME</a></li>
            <li><a class="text-dark" href="#programs">PROGRAMS</a></li>
            <li><a class="text-dark" href="blog.html">NEWS</a></li>
            <li><a class="text-dark" href="#cta">Admissions</a></li>
            <li><a class="text-dark" href="admin/index.php">User Portal</a></li>
          </ul>
        </div>
        <i class="fa fa-bars" onclick="showMenu()"></i>
      </nav>
      <script>
      var navLinks = document.getElementById("navLinks");
      function showMenu() {
        navLinks.style.right = "0";
      }
      function hideMenu() {
        navLinks.style.right = "-200px";
      }
    </script>    <div class="container mt-5">
        <div class="row">
                            <div class="col-md-4 mb-4">
                    <div class="card" data-bs-toggle="tooltip" data-bs-original-title="Read the full news">
                        <img src="images/33.jpeg" ?php echo htmlspecialchars($news['image']); ?>
                        <div class="card-body">
                            <h5 class="card-title">جامعة برج العرب التكنولوجية تشارك في افتتاح معمل كهروميكانيكية البحرية بالأكاديمية العربية للعلوم والتكنولوجيا</h5>
                            <p class="card-text">شاركت جامعة برج العرب التكنولوجية برئاسة الأستاذ الدكتور محمد مرسي الجوهري في فعاليات زيارة الأستاذ الدكتور إسماعيل عبد الغفار إسماعيل فرج رئيس الأكاديمية العربية للعلوم والتكنولوجيا والنقل البحري إلى معهد الدراسات التأهيلية البحرية، وذلك يوم الأحد الموافق 4 مايو 2025 بمقر الأكاديمية الرئيسي بأبوقير.<br>
                            </p>
                            <a href="https://www.facebook.com/share/p/166ikRK9sP/?mibextid=wwXIfr" class="btn btn-primary" target="_blank">Read the full article</a>
                        </div>
                    </div>
                </div>
                            <div class="col-md-4 mb-4">
                    <div class="card" data-bs-toggle="tooltip" data-bs-original-title="Read the full news">
                        <img src="images/55.jpg" ?php echo htmlspecialchars($news['image']); ?>
                        <div class="card-body">
                            <h5 class="card-title">جامعة برج العرب التكنولوجية تنظم ندوة توعوية حول أهمية التطوع والتبرع بالدم بالتعاون مع الهلال الأحمر المصري.</h5>
                            <p class="card-text">تحت رعاية الأستاذ الدكتور محمد مرسي الجوهري،رئيس الجامعة، في إطار حرص جامعة برج العرب التكنولوجية على تعزيز الوعي المجتمعي وتنمية روح المسؤولية لدى طلابها، نظّمت كلية تكنولوجيا الصناعة والطاقة ندوة تثقيفية متميزة بعنوان: “أهمية التطوع والتبرع بالدم”، وذلك تحت إشراف الأستاذ الدكتور علاء عرفة – عميد الكلية، وبالتعاون مع مؤسسة الهلال الأحمر المصري.</p>
                            <a href="https://www.facebook.com/share/p/18qdNbAqVw/?mibextid=wwXIfr" class="btn btn-primary" target="_blank">Read the full article</a>
                        </div>
                    </div>
                </div>
              </div>
     </div>

   <section class="footer">
      <div class="icons">
        <i class="fa fa-facebook"><a href="https://www.facebook.com/october.technological.university/"></a></i>
      </div>
      <p>Made  by loay TEAM</p>
    </section>    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    </script>



</body>
</html>
