<?php

session_start();

include "db.php";

$conn = connect();

newPost($conn);

header("Location: message.php?msg=newPost")

?>
