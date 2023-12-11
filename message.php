<?php 

session_start();
// include_once "db.php";
include_once "user.php";
$logged_in = false;
if (isset($_SESSION["user"])) {
    $logged_in = true;
    $user = unserialize($_SESSION["user"]);
} 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- this page refreshes on its own every 5 seconds to keep up with new messages -->
    <!-- <meta http-equiv="refresh" content="5"> -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Create Post</title> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include_once "navbar-logged.php" ?>

    <div class="container text-center">
        <!-- <h1>Create a new post</h1> -->
        <?php if(isset($_GET["msg"]) && $_GET["msg"]=="newPost"): ?>
            <br />
            <h4 class="success">Message sent successfully</h4>
        <?php endif ?>
        <br />
        <form action="message-action.php" method="post">
            <!-- <input type="text" name="post" class="post"> -->
            <!--these hidden inputs will not be shown to the user
            they will send to the action page to be added to the db -->
            <input type="hidden" name="user" value="<?= $user->email ?>">
            <input type="hidden" name="time" value="<?= time() ?>">
            <textarea name="post" class="post" placeholder="Type a message" required></textarea>
            <!-- <div class="col"> -->
            <button type="submit">Send</button>
            <!-- </div> -->
        </form>
    </div>

    <?php include "view.php" ?>

</body>
</html>
