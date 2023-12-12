<?php 
include_once "user.php";

$logged_in = false;
if (isset($_SESSION["user"])) {
    $logged_in = true;
    // turns the session into a string that can be echoed back to user
    $user = unserialize($_SESSION["user"]);
} 
?>

<nav class="navbar bg-dark navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
  <div class="container-fluid">
    <!-- clicking their email takes the user to their profile page -->
    <a class="navbar-brand" href="profile.php"><?= $user->email ?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link" aria-current="page" href="index.php">Home</a>
        <a class="nav-link" href="message.php">Chat</a>
        <!-- <a class="nav-link disabled" href="view.php">Explore</a> -->
        <a class="nav-link" href="tags.php">Hashtags</a>        
        <!-- the active class means this link is more bold -->
        <a class="nav-link active" href="log-out.php">Log out</a>
      </div>
    </div>
  </div>
</nav>
