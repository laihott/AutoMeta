<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1" version="1.0">
<!-- dyanamic gallerie responsive -->
<head>
  <link rel="stylesheet" type="text/css" href="gallerieStyle.css">
</head>
<body>

<h2 id="galleryHeading" style="text-align:center">Gallerie</h2>
<?php
$fileNameList = array('null');

  function openReadDir ($dirPath) { //open and read contents of gallery directory
    global $fileNameList;  
    if (is_dir($dirPath)){ //open directory and read contents
        if ($dh = opendir($dirPath)){
            $i=0;
            while (($file = readdir($dh)) !== false){
                 $fileNameList[$i]=$dirPath.$file;     
                 $i=$i+1;
            }
            closedir($dh);
        }
            
      }
    } // end of openReadDir

  function generateImgType ($imgType) {
    global $fileNameList; 
    
    if ($fileNameList[0] == "null" ) {
      openReadDir ("gallery/");
    }

    $noImages=count($fileNameList);

    switch ($imgType) { //gallery view 
      case "galleryView" :
          for ($x=0; $x < $noImages; $x++) {
            $ii = $x+1;
            echo "<div class='column'>";
            echo "<img src=$fileNameList[$x] style='width:100%' onclick='openModal();currentSlide($ii)' class='hover-shadow cursor'>";
            echo "</div>"; 
          } 
        break;
      case "myLightboxSlides" :
          for ($x=0; $x < $noImages; $x++) {
              $xx=$x+1;
              echo "<div class='mySlides'>";
              echo"<div class='numbertext'>$xx/$noImages</div>";
              echo "<img src=$fileNameList[$x] style='width:100%' >";
              echo "</div>";
            }
        break;
      case "sliderThumbs" : 
          for ($x=0; $x < $noImages; $x++) {
              $xx=$x+1;
              echo"<div class='column'>";
              echo"<img class='demo cursor' src=$fileNameList[$x] style='width:100%' onclick='currentSlide($xx)' alt='decription of image $xx'>";
              echo"</div>";
            }
        break;
      }
    }
    

  echo"<div class='row'>";
  generateImgType("galleryView");
  echo "</div>";

  echo"<div id='myModal' class='modal'>";
  echo"  <span class='close cursor' onclick='closeModal()'>&times;</span>";
  echo"<div class='modal-content'>";
 
  generateImgType("myLightboxSlides");
     
  echo" <a class='prev' onclick='plusSlides(-1)'>&#10094;</a>";
  echo" <a class='next' onclick='plusSlides(1)'>&#10095;</a>";

  echo"<div class='caption-container'>";
  echo" <p id='caption'></p>";
  echo"</div>";
  

  generateImgType("sliderThumbs");
    echo"</div>";
echo"</div>";

?>

<script> 
var slideIndex= 1;
if (typeof slideIndex ==='undefined') {
   slideIndex =1 ;
}
showSlides(slideIndex);

function openModal() {
    document.getElementById('myModal').style.display = "block";
}
  
function closeModal() {
    document.getElementById('myModal').style.display = "none";
}
  
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
