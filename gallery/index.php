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

  function collect_XMLfile ($imageFileName){
    global $fileNameList;
    //take exisiting filename find postion of "."
    // file name up to "." + xml = imageFilename.xml
    //return imageFile.xmml
    $extPos = stripos($imageFileName,".") ;
    $strImageName = substr($imageFileName,0,$extPos);
    $xml_imgName = $strImageName.".xml";
    return $xml_imgName;
    
  }

  function retreiveKeywords () {
    //collect_XMLFile(imageFileName)
    //open returned imagefilename.xml
    //keyword area :
     //<lr:hierarchicalSubject>
    //<rdf:Bag>
    //<rdf:li>1 - "Who"</rdf:li>
    //<rdf:li>1 - "Who"|Age</rdf:li>
    //<rdf:li>1 - "Who"|Age|infant</rdf:li>
    //</rdf:Bag>
    //scan file for keyword area
    //extract keywords as array of array os string - to enable hierachy level keywords
   
    //return keyword array
  }
    
  function openReadDir ($dirPath) { //open and read contents of gallery directory
    global $fileNameList;  
    $isImage = "null"; // initalise $isImage to null in case first file is non image
    if (is_dir($dirPath)){ //open directory and read contents
        if ($dh = opendir($dirPath)){
            $i=0;
            while (($file = readdir($dh)) !== false){
              $imageFileType = strtolower(pathinfo($file,PATHINFO_EXTENSION));  //check fiel extension is image
              if ($imageFileType == "jpeg" || $imageFileType == "png" || $imageFileType == "jpg" || $imageFileType == "gif" || $imageFileType == "tiff") {
                $isImage = "true";
              }
                if ($isImage == "true") {
                  $fileNameList[$i]=$dirPath.$file;     
                  $i=$i+1;
                  $isImage = "false";
                } 
            }
            closedir($dh);
        }
            
      }
    } // end of openReadDir

  function generateImgType ($imgType) {
    global $fileNameList; 
    
    if ($fileNameList[0] == "null" ) {
      openReadDir ("gallery/galleryimgs/");  // set gallery image file directory here!!
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
              collect_XMLFile($fileNameList[$x]);
              echo "<div class='mySlides'>";
              echo"<div class='numbertext'>$xx/$noImages</div>";
              echo"<div class='col_keyword'><ul><li> 1st keywrod</li><li>2nd</li><li>3rd</li><li>etc etc etc</li></ul></div>"; //addition function called here to collect keywords and generate keyword lists
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
