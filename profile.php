<?php 

session_start();

include_once "user.php";
include_once "db.php";
$conn = connect();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include_once "navbar-logged.php" ?>

    <div class="container text-center">
        <h1>Posts made by <?= $user->email ?></h1>

        <!-- helpful message to tell user when they've deleted a post -->
        <?php if(isset($_GET["msg"]) && $_GET["msg"]=="del-success"): ?>
            <br />
            <h4 class="success">Successfully deleted a post</h4>
        <?php endif ?>
        
        <br />

        <?php 
        // desc means that the most recent post is shown at the top
        // gets all posts made by current user
        $sql = "SELECT * FROM posts 
                WHERE user = '{$user->email}'
                ORDER BY time DESC";
        $result = $conn->query($sql); 
        
        // shows all the posts by the user
        include "view-posts.php";

        $result->free_result();
        $conn->close();
    ?>

    </div>

</body>
</html>
