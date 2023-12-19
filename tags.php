<?php 
// makes the navbar work as it relies on session
session_start();
include "db.php";
$conn = connect();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hashtags</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include_once "navbar-logged.php" ?>

    <div class="container text-center">
        <h1>Explore Hashtags</h1>
        <?php
        // gets hashtag clicked on from view-posts.php
        if (isset($_GET["tag"])) {
            $tag_used = $_GET["tag"];
            echo "<h3> {$_GET['tag']} </h3>";
            // selects all the posts that contain that specific hashtag
            $sql = "SELECT * FROM posts WHERE post LIKE '%" . mysqli_real_escape_string($conn, $tag_used) . "%' ORDER BY time DESC";
            $result = $conn->query($sql); 
            include "view-posts.php";
        } else {
            echo "<h3>Trending hashtags</h3>";
            // selects all posts that use hashtags
            $sql = "SELECT * FROM posts WHERE post LIKE '%" . mysqli_real_escape_string($conn, "#") . "%' ORDER BY time DESC";
            $result = $conn->query($sql); 
            include "view-posts.php";
        }
        ?>

    </div>
</body>
</html>
