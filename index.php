<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h1>Home page</h1>
    <a href="sign-up.php">Sign Up</a>
    <a href="log-in.php">Log in</a>
</body>
</html> -->

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
    <title>Home page</title>
</head>
<body>
    <h1>Welcome</h1>
    <?php if ($logged_in): ?>
        <p>
            Hello <?= $user->email ?> 
        </p>
        <p>
            <a href="log-out.php">Log out</a>
        </p>
    <?php else: ?>
        <p>
            <a href="log-in.php">Log In</a>
        </p>

        <p>
            <a href="sign-up.php">Sign up</a>
        </p>
    <?php endif ?>
</body>
</html>
