<nav class="bg-light text-dark text-center">
        <a href="index.php"><img src="images/logo1.png.png" alt="logo" /></a>
        <div class="nav-links" id="navLinks">
          <i class="fa fa-times" onclick="hideMenu()"></i>
          <ul>
            <style>
              
            </style>
            <li><a class="text-dark" href="index.php">HOME</a></li>
            <li><a class="text-dark" href="#programs">PROGRAMS</a></li>
            <li><a class="text-dark" href="blog.html">NEWS</a></li>
            <li><a  class="text-dark" href="#cta">Admissions</a></li>
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
    </script>