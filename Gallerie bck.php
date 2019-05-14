<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1" version="1.0">
<!-- satic gallerie responsive -->
<head>
  <link rel="stylesheet" type="text/css" href="gallerieStyle.css">
</head>
<body>

<h2 id="galleryHeading" style="text-align:center">Gallerie</h2>
<?php
echo"<div class='row'>";
  
  $dir = "gallery/";
  //open directory and read contents
  if (is_dir($dir)){
      if ($dh = opendir($dir)){
          $i=0;
          while (($file = readdir($dh)) !== false){
              $i=$i+1;
              $imagepath=$dir.$file;
              echo "<div class='column'>";
              echo "<img src=$imagepath style='width:100%' onclick='openModal();currentSlide($i)' class='hover-shadow cursor'>";
              echo "</div>";
          }
          closedir($dh);
          }
          $totalImages=$i;
      }
  
  echo "</div>";

  echo"<div id='myModal' class='modal'>";
  echo"  <span class='close cursor' onclick='closeModal()'>&times;</span>";
  echo"<div class='modal-content'>";
 
   //open directory and read contents
  if (is_dir($dir)){
      if ($dh = opendir($dir)){
          while (($file = readdir($dh)) !== false){
              $k=$k+1;
              $imagepath=$dir.$file;
              echo "<div class='mySlides'>";
              echo"<div class='numbertext'>$k/$i</div>";
              echo "<img src=$imagepath style='width:100%' >";
              echo "</div>";
          }
          closedir($dh);
          }
      }
  
        
   echo" <a class='prev' onclick='plusSlides(-1)'>&#10094;</a>";
   echo" <a class='next' onclick='plusSlides(1)'>&#10095;</a>";

    echo"<div class='caption-container'>";
    echo" <p id='caption'></p>";
    echo"</div>";
  


if (is_dir($dir)){
      if ($dh = opendir($dir)){
          while (($file = readdir($dh)) !== false){
              $k=$k+1;
              $imagepath=$dir.$file;
              echo"<div class='column'>";
              echo"<img class='demo cursor' src=$imagepath style='width:100%' onclick='currentSlide(k)' alt='decription of image k'>";
              echo"</div>";
          }
          closedir($dh);
          }
      }
  

    echo"</div>";
echo"</div>";
?>

<script>
function openModal() {
  document.getElementById('myModal').style.display = "block";
}

function closeModal() {
  document.getElementById('myModal').style.display = "none";
}

var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>
    
</body>
</html>
