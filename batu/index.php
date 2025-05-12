<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Borg El-Arab Technological University</title>
    <link rel="icon" href="images/logo1.png.png" type="image/gif">
    <link rel="stylesheet" href="sss.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
  </head>
 <body>
    <section class="header">
      <nav>
        <a href="index.php"><img(logo1.png.png) alt="logo" /></a>
        <div class="nav-links" id="navLinks">
          <i class="fa fa-times" onclick="hideMenu()"></i>
          <ul>
            <li><a href="index.php">HOME</a></li>
            <li><a href="#programs">PROGRAMS</a></li>
            <li><a href="news.php">NEWS</a></li>
            <li><a href="admission.php">ADMISSIONS</a></li>
            <li><a href="login.php">User Portal</a></li>
          </ul>
        </div>
        <i class="fa fa-bars" onclick="showMenu()"></i>
      </nav>
      <div class="text-box">
        <h1>Borg El-Arab Technological University</h1>
        <p>
        Welcome to Borg El-Arab Technological University, where innovation meets academic excellence. 
        Explore our cutting-edge programs in the College of Industry and Energy, and the College of Health Sciences.<br />
      
        </p>
        <a href="#programs" class="hero-btn">Discover Our Programs</a>
      </div>
    </section>

    <section class="course" id="programs">
      <h1>Colleges & Academic Programs</h1>
      <p>Explore our specialized programs in industrial and health sciences.</p>
      <div class="row">
        <div class="course-col">
          <h3>College of Industrial and Energy Technology</h3>
          <p>
            - Textile Machinery Operation & Maintenance Technology<br />
            - Information Technology<br />
            - Food Manufacturing Technology<br />
            - Railway Technology
          </p>
        </div>
        <div class="course-col">
          <h3>College of Health Sciences</h3>
          <p>
            - Pharmaceutical Industries Technology<br />
            - Dental Prosthetics Technology<br />
            - Medical Informatics Management Technology
          </p>
        </div>
      </div>
    </section>

    <section class="campus">
      <h1>Our Campus</h1>
      <p>Located in the heart of Borg El-Arab City, offering state-of-the-art facilities and a collaborative environment.</p>
      <div class="row">
        <div class="campus-col">
          <img src="images/london.jpg.jpeg" alt="campus1" />
          <div class="layer">
            <h3>Main Campus</h3>
          </div>
        </div>
      </div>
    </section>

    <section class="facilities">
        <h1>Student Experience & Practical Training</h1>
        <p>We emphasize real-world learning through practical, outside-the-classroom training and active engagement.</p>
        <div class="row">
          <div class="facilities-col">
            <img src="images/marwan.jpeg" alt="training" />
            <h3>Practical Training</h3>
            <p>Hands-on learning with direct exposure to industry-standard machinery and software.</p>
          </div>
          <div class="facilities-col">
            <img src="images/lgarar.jpeg" alt="field training" />
            <h3>Outside Field Training</h3>
            <p>Students participate in external training programs with our industry partners.</p>
          </div>
          <div class="facilities-col">
            <img src="images/sport.jpeg" alt="sports" />
            <h3>Sports & Wellness</h3>
            <p>On-campus areas dedicated to team sports, fitness, and student well-being.</p>
          </div>
        </div>
    </section>
      

    <section class="testimonials">
      <h1>Student Testimonials</h1>
      <p>What our students are saying about their experience at Borg El-Arab Technological University.</p>
      <div class="row">
        <div class="testimonial-col">
          <img src="images/pic-2.jpg" alt="student1" style="    width: 140px;
    height: 70px;" />
          <div>
            <p>
              The facilities are modern and the professors are very supportive. I've grown so much here!
            </p>
            <h3>Sarah Ahmed</h3>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-half-o"></i>
          </div>
        </div>
        <div class="testimonial-col">
          <img src="images/pic-1.jpg" alt="student2" style="    width: 140px;
    height: 70px;"/>
          <div>
            <p>
              The programs are highly specialized and directly connect to real-world careers. Amazing experience!
            </p>
            <h3>Mohamed El-Sayed</h3>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
          </div>
        </div>
      </div>
    </section>

    <section class="cta" id="cta">
      <h1>Enroll Today & Start Your Journey</h1>
      <a href="admission.php" class="hero-btn">Contact Admissions</a>
    </section>

    <section class="footer">
      <h4>About Us</h4>
      <p>
        Borg El-Arab Technological University is a pioneering institution focused on applied sciences and industry-relevant education. Our mission is to bridge academic knowledge with real-world expertise.
      </p>
      <div class="icons">
        <i class="fa fa-facebook"><a href="https://www.facebook.com/october.technological.university/"></a></i>
      </div>
      <p>Made With <i class="fa fa-heart-o"></i> by loay TEAM</p>
    </section>

    <script>
      var navLinks = document.getElementById("navLinks");
      function showMenu() {
        navLinks.style.right = "0";
      }
      function hideMenu() {
        navLinks.style.right = "-200px";
      }
    </script>
  </body> 
</html>