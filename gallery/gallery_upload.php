<?php include 'upload.php' ?>
<!DOCTYPE html>
<html>
<body>

<form action="gallery_upload.php" method="post" enctype="multipart/form-data"> <!--call upload php script on submit--> 
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="upload">
</form>

</body>
</html>
