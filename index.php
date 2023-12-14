<?php 
include_once "db.php";
include_once "user.php";

session_start();

$logged_in = false;
if (isset($_SESSION["user"])) {
    $logged_in = true;
    $user = unserialize($_SESSION["user"]);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <!-- if the user has a session logged into -->
    <?php if ($logged_in): ?>
        <?php include_once "navbar-logged.php" ?>

        <div class="container text-center">
            <h1>Welcome <?= $user->email ?></h1>
            <br />

            <div class="row">
                <div class="col info">
                    <h3 class="hashtag"><a href="message.php">Chat with people</a></h3>
                    <h4>Click the Chat button above to begin</h4>
                </div>
                <div class="col info">
                    <h3 class="hashtag"><a href="tags.php">Explore hashtags</a></h3>
                    <h4>Or make your own</h4>
                    </div>
                <div class="col info">
                    <h3 class="hashtag"><a href="#">Recent updates</a></h3>
                    <h4>
                        <ul>
                            <li>Update: Multiple hashtags now work properly</li>
                            <li>New feature: hashtags</li>
                            <li>Update: security</li>
                            <li>New feature: verify email</li>
                            <li>New feature: delete posts</li>
                        </ul>
                    </h4>
                </div>
            </div>
        </div>

    <!-- if the user does not have a session -->
    <?php else: ?>
        <div class="container text-center">
            <h1>Welcome</h1>
            <h2>Please log in or sign up to continue<h2>
            <br />
            <div class="row">
                <div class="col">
                    <button><a href="log-in.php" class="link-button">Log In</a></button>
                </div>
                <div class="col">
                    <button><a href="sign-up.php" class="link-button">Sign Up</a></button>
                </div>
            </div>

            <?php if(isset($_GET["msg"]) && $_GET["msg"]=="verify"): ?>
                <br />
                <h4 class="success">Successfully signed up, don't forget to verify your email</h4>
            <?php endif ?>
        </div>
    <?php endif ?>

</body>
</html>
