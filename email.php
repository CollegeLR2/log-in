<?php 
include_once "user.php";
// $sql = "SELECT token FROM users WHERE email = " .  $_POST['email'];
?>

<h1>Welcome to the site!</h1>
<br />

<a href="log-in.localhost/verify-email.php?token={<?= $user->token ?>}">Verify your email</a>

<br />
<p>This message has been sent because you signed up to log-in.localhost</p>