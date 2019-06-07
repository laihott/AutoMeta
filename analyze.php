<?php 
	include('functions.php');

	/*if (!isLoggedIn()) {
  *      header('location: login.php');
	}*/
    include('navbar.php') 
?>  
<!DOCTYPE html>
<html>

<head>
  
<title>AutoMeta</title>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/upload.css">

</head>
<body>


<!-- Container for title and info -->
<div class="w3-padding-64">
    <div class="w3-center" style="margin-bottom:50px;">
    <h1 class="w3-center">ANALYZE & UPLOAD A NEW IMAGE</h1>
    Here you can analyze and upload your images.
    </div>

<!-- Drag and drop laatikko -->
<div id="drop_file_zone" ondrop="upload.php" ondragover="return false">
        <div id="drag_upload_file">
          <p>Drop file here</p>
          <p>or</p>
          <p><input type="button" value="Select File" onclick="file_explorer();"></p> <!--Näkyvä nappi joka avaa file explorerin-->
          <input type="file" id="selectfile"> <!--Select file nappi joka on piilotetty-->
          <p>or</p>
          <input type="text" id="fileNameInput" name="imgName" value="">
        </div>
</div>

<!-- Keyword container -->
<div class="keywordbox w3-center">
    <h3>KEYWORDS:</h3>
    <div id="keywordlist">
        List the keywords in this div
    </div> <!--close keywordlist div -->
</div>
<p id="filename"> <i>Display filename here ...... </i></p>
<button class ="uploadto" type="button" onclick="anaylseVisionCall()">Analyse Image</button>
<button class="uploadto">Save XML</button>

</div>




<!-- Footer -->
<footer class="w3-center w3-black w3-padding-64 w3-opacity">
  <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-text-green">w3.css</a></p>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> <!--Drag and droppiin liittyvä-->
<script src="js/xmloutput.js"></script>
<script src="js/upload.js"></script> <!--Drag and droppiin liittyvä-->
<script src="js/visionXml.js"></script>

</body>
</html>
