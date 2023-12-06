<?php

session_start();

include "db.php";
include "user.php";

$conn = connect();

newPost($conn);

header("Location: view.php?msg=newPost")

?>
