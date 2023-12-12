<?php 

function connect() {
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "test-login";

    $conn = mysqli_connect($hostname, $username, $password, $dbname) or die("Connection not established");

    return $conn;
}

// adds a new post to the table
// function newPost($conn) {
//     $query = "INSERT INTO posts (user, post, time) VALUES (?, ?, ?)";
//     $stmt = $conn->prepare($query);
//     $stmt->bind_param("sss", $_POST["user"], $_POST["post"], $_POST["time"]);
//     $stmt->execute();
// }
function newPost($conn) {
    $query = "INSERT INTO posts (user, post, time) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);

    // Validate and sanitise user input
    // stops bad inputs
    $user = filter_var($_POST["user"], FILTER_SANITIZE_STRING);
    $post = filter_var($_POST["post"], FILTER_SANITIZE_STRING);
    $time = filter_var($_POST["time"], FILTER_SANITIZE_STRING);

    $stmt->bind_param("sss", $user, $post, $time);
    $stmt->execute();
}

// removes a post from the db
function deletePost($post_id, $conn) {
    $query = "DELETE FROM posts WHERE post_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $_POST["post_id"]);
    $stmt->execute();
}
