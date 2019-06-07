<?php

$host = 'localhost';
$username = 'admin';
$passwd = 'Q2werty1234';
$dbname = 'autometa';
$conn = new mysqli($host, $username, $passwd, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


if (isset($_POST['searchbtn'])) {   //Check if search button has been pressed 
    $kwd = $_POST['kwd'];           //Grabs the keyword entered in the search field
    $query = "SELECT * FROM testi WHERE keyword LIKE '%$kwd%'";   //Checks the database for images with that keyword
    $result = mysqli_query($conn, $query);

    if (empty($kwd)) {              //If the search field is empty
        $msg = 'Please specify a keyword';
    }

    elseif (isset($kwd)) {
        while ($row = mysqli_fetch_array($result)) {
            foreach ($row as $msg) {
            $loc = $row['location'];
            $img = $row['imgname'];
            $msg = "$loc$img"; }
        }
    }
}





?>