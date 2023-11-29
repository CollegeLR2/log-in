<?php 

function connect() {
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "test-login";

    $conn = mysqli_connect($hostname, $username, $password, $dbname) or die("Connection not established");

    return $conn;
}
