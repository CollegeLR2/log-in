<?php

// uses PHPMailer
require "./src/PHPMailer/src/PHPMailer.php";
require "./src/PHPMailer/src/SMTP.php";
require "./src/PHPMailer/src/Exception.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer();
$mail->isSMTP();

// $mail->SMTPDebug = SMTP::DEBUG_SERVER;
$mail->SMTPDebug = 0;

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
$mail->Subject = "Thanks for signing up";

// anything in email.php is sent as the email content
// $mail->msgHTML(file_get_contents("email.php"));
$mail->isHTML(true);
$mail->Body="<p>Thank you for signing up. Use this link to verify your account and start chatting!<br />
            <a href='10.32.240.143/log-in/verify-email.php?token={$user->token}'>Verification link</a>";
// $mail->AltBody = "Thanks for signing up to the site!";

if ( !$mail->send() ) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    // echo "Email has been sent";
    header("Location: index.php?msg=verify");
}

?>
