<?php 

// destroys the session and takes them to the index page
// this will ask them to log in or sign up, because it doesn't know who they are anymore
session_start();
session_destroy();

header("Location: index.php");

?>
