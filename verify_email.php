<?php
include 'functions.php';
include 'navbar.php';

//session_start();

$conn = new mysqli('localhost', 'admin', 'Q2werty1234', 'autometa');

if (isset($_GET['token'])) {
    $token = $_GET['token'];
    $sql = "SELECT * FROM users WHERE token='$token' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        $query = "UPDATE users SET verified=1 WHERE token='$token'";

        if (mysqli_query($conn, $query)) {
            $_SESSION['id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['verified'] = TRUE;
            $_SESSION['message'] = "Your email address has been verified successfully";
            $_SESSION['type'] = 'success';
            header('location: success.php');
            exit(0);
        }
    } else {
        echo "<div style=margin:20%;>User not found!</div>";
    }
} else {
    echo "<div style=margin:20%;>
    Please click on the link on your email again. If it's not working,
    try the reset again.<p>If the problem persists, contact support.</p></div>";
}
