<?php

// uses PHPMailer
require "./src/PHPMailer/src/PHPMailer.php";
require "./src/PHPMailer/src/SMTP.php";
require "./src/PHPMailer/src/Exception.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer();
$mail->isSMTP();

$mail->SMTPDebug = SMTP::DEBUG_SERVER;

// mail details from John
$mail->Host = "mail.smtp2go.com";
$mail->Port = 587;
$mail->SMTPSecure = "tls";// PHPMailer::ENCRYPTION_SMTPS;
$mail->SMTPAuth = true;
$mail->Username = "LR2";
// password is stored in .gitignore as an encoded password
// it is called from the hidden file and then decoded before using it
$mail->Password = base64_decode(file_get_contents("password.txt"));

// address the email is sent from
$mail->setFrom("er339467@truro-penwith.ac.uk", "L Rogers"); //"johng@truro-penwith.ac.uk", "John"
$mail->addReplyTo("er339467@truro-penwith.ac.uk", "L Rogers");
// address email is sent to
$mail->addAddress($user->email, "New user");
// $mail->addAddress("er339467@truro-penwith.ac.uk", "L Rogers");
$mail->Subject = "PHPMailer SMTP Test";

// anything in email.php is sent as the email content
// $mail->msgHTML(file_get_contents("email.php"));
$mail->isHTML(true);
$mail->Body="<a href='log-in.localhost/verify-email.php?token={$user->token}'>Verification link</a>"; //"Thank you for signing up. Here is your token " . $user->token
$mail->AltBody = "Thanks for signing up to the site!";

if ( !$mail->send() ) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Email has been sent";
    // header("Location: index.php");
}

?>
