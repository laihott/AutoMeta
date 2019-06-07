<?php 
    include '../functions.php';
    include 'upload.php';

	if (!isLoggedIn()) {
        header('location: ../login.php');
  }
  elseif (isLoggedIn() && $_SESSION['verified'] == FALSE) {
    header('location: ../success.php');
  }
?>
<!DOCTYPE html>
<?php include('../navbar.php') ?>		
<html>
<head>
	<title>AutoMeta - Upload</title>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/css/formstyle.css"> <!--MUST BE INCLUDED ONLY WITH FILES THAT CONTAIN FORMS-->
    
    <style>
        .imgbox {
            border-style: dashed;
            border-radius: 10px;
            border-width: 5px;
            border-color: #a5a5a5;
            background-color: #e8e8e8;
            min-height: 10%;
            min-width: 10%;
            text-align: center;
            padding: 20px;
            margin: 100px 300px 0px;
        }
    </style>

</head>
<body>

<?php 
if (isset($display)) {

echo "<div class='imgbox'>";
echo "<p><a href='Gallerie.php'><img src='gallery/$name' width='500'></a></p>";
echo "</div>";
echo "<h5 class='w3-center'>". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded to gallery.</h5>";
}elseif (empty($display)) {
    echo "<div class='imgbox'>Your uploaded image will show here</div>";
}
?>

<div class="formheader" style="margin-top:30px;">
    <h2>Upload a new image to gallery</h2>
</div>
    
<form action="gallery_upload.php" method="post" enctype="multipart/form-data">
<hr>
    Select image to upload:<br>
    <input type="file" name="fileToUpload" id="fileToUpload"><br>
    <button type="submit" class="loginbtn" name="upload">Upload</button>
</form>






</body>
</html>
