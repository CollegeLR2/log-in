<?php 

if (! isset($_POST["email"])) {
    // no form is posted - send user back to sign up
    header("Location: /");
    exit;
}

// run if there is data in the sign up

include "db.php";
$conn = connect();

// var_dump($_POST);
include "user.php";

// creates a new user with the email and password from the form
$user = new User($conn, $_POST["email"], $_POST["password"]);
// adds data to db
$user->insert();

include_once "sign-up-action-gmail.php";

// puts user back onto index after signing up
// header("Location: index.php")

?>
