<?php 

include "db.php";

$conn = connect();

deletePost($_POST["post_id"], $conn);

header("Location: profile.php?msg=del-success")

?>
