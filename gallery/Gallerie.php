<?php include('../functions.php') ?>
<?php include 'search.php' ?>
<!DOCTYPE html>
<?php include('../navbar.php') ?>		
<html>
<head>
	<title>AutoMeta - Gallery</title>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="gallerystyle.css">
</head>
<body>


<div class="w3-content w3-container w3-padding-64">
  <div class="w3-center">
<h2 class="w3-center">Gallery</h2>
<div class="w3-center">
All the images in the gallery are shown by default.<br>
Enter a keyword into the field to search images with that keyword assigned to it.<br>
To look at all the images in the gallery after a search, press "Clear search".</div>

<form action="Gallerie.php" method="post">
<input style="width:50%; margin-top:20px; margin-bottom:40px;" type="text" placeholder="Keyword you want to find images with" name="kwd" id="kwd">
<input type="submit" value="Search" name="searchbtn">
<input type="submit" value="Clear search" name="clearsearch">
</form>

<div class="w3-content w3-container w3-padding-64 w3-center" name="Search Results">
<?php
if (isset($msg)) {
echo "<hr>";
echo $msg;
echo "<hr>";
}
?>
</div>

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
    global $fileNameList, $msg; 
    
    if (empty($msg)) {
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
    }}
    

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
</div>
  </div>
<script type="text/javascript" src="lightbox.js"></script>
</body>
</html>
