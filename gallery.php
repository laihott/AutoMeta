<!DOCTYPE html>
<html>
<body>
<?php
$dir = "/gallery"

//open directory and read contents
if (is_dir($dir)){
    if ($dh = opendir($dir)){
        while (($file = readdir($dh)) !== false){
            echo "<div class='column'>";
            echo "<img src=" . $file . "style='width:100%' onclick='openModal();currentSlide(1)' class='hover-shadow cursor'>";
            echo "</div>";
        }
        closedir($dh);
        }
    }
}
?>
</body>
</html>