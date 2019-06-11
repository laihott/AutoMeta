<link rel="stylesheet" type="text/css" href="/css/w3.css">
<link rel="stylesheet" type="text/css" href="/css/main.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="/js/navbar.js"></script> <!--JavaScript for the navigation bar-->

<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar" id="myNavbar">
    <a class="w3-bar-item w3-button w3-hover-black w3-hide-medium w3-hide-large w3-right" href="javascript:void(0);" onclick="toggleFunction()" title="Toggle Navigation Menu">
    <i class="fa fa-bars"></i></a>
    <a href="/#main" class="w3-bar-item w3-button w3-hide-small">MAIN</a>
    <a href="/#help" class="w3-bar-item w3-button w3-hide-small">HELP</a>
    <a href="/gallery/gallery_upload.php" class="w3-bar-item w3-button w3-hide-small">UPLOAD</a>
    <a href="/#about" class="w3-bar-item w3-button w3-hide-small"></i>ABOUT</a>
    <a href="/gallery/Gallerie.php" class="w3-bar-item w3-button w3-hide-small"></i>GALLERY</a>
    <img src="/images/autometalogo_small.png" style="margin:3px 0% 0% 30%">
    <a href="#" class="w3-bar-item w3-button w3-hide-small w3-right w3-hover-teal">Language</a>
    <a href="/register.php" class="w3-bar-item w3-button w3-hide-small w3-right w3-hover-green">Sign up</a>
    <a href="/login.php" class="w3-bar-item w3-button w3-hide-small w3-right w3-hover-red">Login</a>
    <?php usradmn()?> <!--Calls the function to check if ADMIN/USER button is displayed or not-->
  </div>

  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium">
    <a href="/#main" class="w3-bar-item w3-button" onclick="toggleFunction()">MAIN</a>
    <a href="/#help" class="w3-bar-item w3-button" onclick="toggleFunction()">HELP</a>
    <a href="/analyze.php" class="w3-bar-item w3-button" onclick="toggleFunction()">UPLOAD</a>
    <a href="/#about" class="w3-bar-item w3-button" onclick="toggleFunction()">ABOUT</a>
    <a href="/gallery/Gallerie.php" class="w3-bar-item w3-button" onclick="toggleFunction()">GALLERY</a>
    <a href="/login.php" class="w3-bar-item w3-button">Login</a>
    <a href="/register.php" class="w3-bar-item w3-button" onclick="toggleFunction()">Sign up</a>
    <a href="#" class="w3-bar-item w3-button">Language</a>
  </div>
</div>