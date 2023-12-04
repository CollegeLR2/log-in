<?php

require "./src/PHPMailer/src/PHPMailer.php";
require "./src/PHPMailer/src/SMTP.php";
require "./src/PHPMailer/src/Exception.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer();
$mail->isSMTP();

$mail->SMTPDebug = SMTP::DEBUG_SERVER;

$mail->Host = "mail.smtp2go.com";
$mail->Port = 587;
$mail->SMTPSecure = "tls";// PHPMailer::ENCRYPTION_SMTPS;
$mail->SMTPAuth = true;
$mail->Username = "truro-college";
$mail->Password = base64_decode(file_get_contents("password.txt"));

$mail->setFrom("johng@truro-penwith.ac.uk", "John");
$mail->addReplyTo("johng@truro-penwith.ac.uk", "John");
$mail->addAddress("er339467@truro-penwith.ac.uk", "L Rogers");
$mail->Subject = "PHPMailer SMTP Test";

$mail->msgHTML(file_get_contents("email.php"));
$mail->AltBody = "Thanks for signing up to the site!";

if ( !$mail->send() ) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    // header("Location: index.php");
    echo "<a href='index.php'></a>";
}

?>
