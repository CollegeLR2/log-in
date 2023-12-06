<?php 

include_once "db.php";
include_once "user.php";

$conn = connect();

$user = new User($conn, $_POST["email"], $_POST["password"]);

// checks user is in db
$user->auth();

// if user gets email + password right
if ($user->is_logged_in()) {
    // set sessions
    session_start();
    $_SESSION["user"] = serialize($user);

    header("Location: index.php");
// incorrect email or password
} else {
    // echo "Could not log in with these credentials :(";
    // echo "<br />";
    // echo "<a href='index.php'>Home</a>";
    
    // takes user to log in page with helpful message
    header("Location: log-in.php?msg=incorrect");
}
