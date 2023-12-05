<?php

session_start();

include "db.php";
include "user.php";

$conn = connect();

newPost($conn);

header("Location: index.php?msg=newPost")

?>
