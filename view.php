<?php 

session_start();
// include_once "db.php";
// include_once "user.php";
// $logged_in = false;
// if (isset($_SESSION["user"])) {
//     $logged_in = true;
//     $user = unserialize($_SESSION["user"]);
// } 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include_once "navbar-logged.php" ?>

    <div class="container text-center">
        <h1>Explore posts</h1>
        <h4>SHOW SOME OF THE POSTS HERE IN ASCENDING ORDER OF TIME</h4>
    </div>

</body>
</html>
