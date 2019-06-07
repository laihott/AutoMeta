<?php


function sendVerificationEmail($email, $token)
{
$subject = 'Verification required';
$headers = 'From: AutoMeta@autometa.com' . "\r\n" .
'X-Mailer: PHP/' . phpversion();
$message = '
Welcome to AutoMeta!
Before you can start analyzing and uploading your images with our service, you need to verify your email address.
To do that, just click on this link http://localhost/verify_email.php?token=' . $token . ' or copy it into your browsers address bar.

Greetings,
the AutoMeta team
';

    mail($email, $subject, $message, $headers);
}


?>