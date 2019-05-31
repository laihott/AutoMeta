<<<<<<< HEAD
<?php 
	include('functions.php');

	/*if (!isLoggedIn()) {
  *      header('location: login.php');
	}*/
?>
<?php include('navbar.php') ?>  <!----->
<!DOCTYPE html>
=======
<!DOCTYPE html>
<?php 
/**	include('functions.php');
*
*	if (!isLoggedIn()) {
 *       header('location: login.php');
*	} */
    //include('navbar.php') 
    include ("myVision.php");
    $imageAnalysed = FALSE;
    
?> 
>>>>>>> -
<html>
<head>
    <title>AutoMeta</title>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/css/upload.css">

</head>
<body>

<!-- Container for title and info -->
<div class="w3-padding-64">
    <div class="w3-center" style="margin-bottom:50px;">
    <h3 class="w3-center">ANALYZE & UPLOAD A NEW IMAGE</h3>
    Here you can analyze and upload your images.
    </div>

<!-- Drag and drop laatikko -->
<div id="drop_file_zone" ondrop="upload.php" ondragover="return false">
        <div id="drag_upload_file">
          <p>Drop file here</p>
          <p>or</p>
          <p><input type="button" value="Select File" onclick="file_explorer();"></p> <!--Näkyvä nappi joka avaa file explorerin-->
          <input type="file" id="selectfile"> <!--Select file nappi joka on piilotetty-->
        </div>
</div>

<!-- Keyword container -->
<<<<<<< HEAD
<div class="keywordbox w3-center">
    <h3>KEYWORDS:</h3>
    <div id="keywordlist">
        List the keywords in this div
    </div>
</div>

=======
<?php if (!$imageAnalysed) : ?>
<form method="POST" action="myvisionXML.php">
            <fieldset>
                <legend> Analytical Options :</legend>
                    
                            <input type="checkbox" name="features[]" Value="label" >Labels<BR/>
                            <input type="checkbox" name="features[]" Value="face" > face dectection<BR/>
                            <input type="checkbox" name="features[]" Value="landmark" >Landmark Detection<BR/>
                            <input type="checkbox" name="features[]" Value="safe" >Safe search<BR/> 
            </fieldset>
            <input type="text" name="imgName"> : File Name <br/>
            <input type="submit"  name="Submit">
        </form>
<?php endif;
if ($imageAnalysed) : ?>
<div class="keywordbox w3-center">
    <h3>KEYWORDS:</h3>
    <div id="keywordlist">
	    xml data goes here ion list form
        List the keywords in this div
    </div>
</div>
<?php endif; ?>
>>>>>>> -
<button class="uploadto">Upload to...</button>
<button class="uploadto">Save XML</button>

</div>




<!-- Footer -->
<footer class="w3-center w3-black w3-padding-64 w3-opacity">
  <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-text-green">w3.css</a></p>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> <!--Drag and droppiin liittyvä-->
<script src="/js/upload.js"></script> <!--Drag and droppiin liittyvä-->
</body>
<<<<<<< HEAD
</html>
=======
</html>
>>>>>>> -
