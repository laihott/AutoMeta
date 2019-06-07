<?php include '../../functions.php' ?>
<!DOCTYPE html>
<?php include '../../navbar.php' ?>		
<html>
<head>
	<title>AutoMeta - Gallery</title>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="/css/gallery.css">
</head>
<body>

<div class="w3-content w3-container w3-padding-64">
<h2 class="w3-center">Gallery</h2>

<div class="w3-center">
<input type="text" placeholder="Search images with keywords, such as 'dog'" style="padding:6px;margin:10px 20% 30px 20%; width:50%;">
</div>

<div class="row">
  <div class="column">
    <img src="img_nature.jpg" style="width:100%" onclick="openModal();currentSlide(1)" class="hover-shadow cursor">
  </div>
  <div class="column">
    <img src="img_snow_wide.jpg" style="width:100%" onclick="openModal();currentSlide(2)" class="hover-shadow cursor">
  </div>
  <div class="column">
    <img src="img_mountains.jpg" style="width:100%" onclick="openModal();currentSlide(3)" class="hover-shadow cursor">
  </div>
  <div class="column">
    <img src="img_lights.jpg" style="width:100%" onclick="openModal();currentSlide(4)" class="hover-shadow cursor">
  </div>
  <div class="column">
    <img src="img_forest.jpg" style="width:100%" onclick="openModal();currentSlide(5)" class="hover-shadow cursor">
  </div>
</div>

<div id="myModal" class="modal">
  <span class="close cursor" onclick="closeModal()">&times;</span>
  
<div class="modal-content">
  <div class="lb_container">
        <div class="mySlides">
            <div class="col_img">
            <div class="numbertext">1 / 4</div>
            <div class="col_keyword">
                <ul style="list-style-type:none">
                  <li>Username 1</li>
                  </ul>
                  <ul>
                 <li>Forest</li> 
                 <li>Rock</li>
                 <li>Tree</li>
                 <li>Keyword 4</li>
                 <li>Keyword 5</li>
                </ul>
              </div> 
            <img src="img_nature_wide.jpg" style="width:100%">
        </div>
    </div>  
    
  </div>


    <div class="mySlides">
      <div class="numbertext">2 / 4</div>
      <div class="col_keyword">
      <ul style="list-style-type:none">
                  <li>Username 1</li>
                  </ul>
                  <ul>
                 <li>Mountain</li> 
                 <li>Snow</li>
                 <li>Sky</li>
                 <li>Keyword 4</li>
                 <li>Keyword 5</li>
                </ul>
        </div> 
      <img src="img_snow_wide.jpg" style="width:100%">
    </div>
</div>

    <div class="mySlides">
      <div class="numbertext">3 / 4</div>
      <img src="img_mountains_wide.jpg" style="width:100%">
    </div>
    
    <div class="mySlides">
      <div class="numbertext">4 / 4</div>
      <img src="img_lights_wide.jpg" style="width:100%">
    </div>
    
    <div class="mySlides">
      <div class="numbertext">5 / 5</div>
      <img src="img_forest.jpg" style="width:100%">
    </div>
    
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>

    <div class="caption-container">
      <p id="caption"></p>
    </div>


    <div class="column">
      <img class="demo cursor" src="img_nature_wide.jpg" style="width:100%" onclick="currentSlide(1)" alt="Nature and sunrise">
    </div>
    <div class="column">
      <img class="demo cursor" src="img_snow_wide.jpg" style="width:100%" onclick="currentSlide(2)" alt="Snow">
    </div>
    <div class="column">
      <img class="demo cursor" src="img_mountains_wide.jpg" style="width:100%" onclick="currentSlide(3)" alt="Mountains and fjords">
    </div>
    <div class="column">
      <img class="demo cursor" src="img_lights_wide.jpg" style="width:100%" onclick="currentSlide(4)" alt="Northern Lights">
    </div>
    <div class="column">
      <img class="demo cursor" src="img_forest.jpg" style="width:100%" onclick="currentSlide(5)" alt="Forest Bridge">
    </div>
  </div>
</div>
</div>

<footer class="w3-center w3-black w3-padding-64 w3-opacity" style="margin-top:200px;">
  <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-text-green">w3.css</a></p>
</footer>

<script src="lightbox.js"></script>
</body>
</html>
