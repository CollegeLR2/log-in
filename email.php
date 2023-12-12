<?php 
// the email sent to the user when signing up

include_once "user.php";
// $sql = "SELECT token FROM users WHERE email = " .  $_POST['email'];
?>

<h1>Welcome to the site!</h1>
<br />

<!-- <a href="log-in.localhost/verify-email.php?token={ $user->token }">Verify your email</a> -->
<!-- VM IP address for other people to be able to use this -->
<a href="10.32.240.143/log-in/verify-email.php">Verify your email</a>

<br />
<!-- <p>Above is (hopefully) your email and a token you need to activate your account</p> -->
<p>This message has been sent because you signed up to log-in.localhost</p>
