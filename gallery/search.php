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
    $query = "SELECT imgname FROM testi WHERE keyword LIKE '%$kwd%'";   //Checks the database for images with that keyword
    $result = mysqli_query($conn, $query);



if (isset($kwd)) {
$msg = 1;
    }
}





?>