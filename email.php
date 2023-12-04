<?php 
include_once "user.php"
?>

<h1>Welcome to the site!</h1>
<br />
<!-- something wrong here -->
<a href="log-in.localhost/verify-email.php?token=<?=$user->token?>">Verify your email</a>
<br />
<p>This message has been sent because you signed up to log-in.localhost</p>
