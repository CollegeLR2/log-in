<?php 

// session_start();

include_once "db.php";
$conn = connect();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> -->
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include_once "navbar-logged.php" ?>

    <div class="container text-center">
        <!-- <?php if(isset($_GET["msg"]) && $_GET["msg"]=="newPost"): ?>
            <br />
            <h4 class="success">New post created successfully</h4>
        <?php endif ?> -->

        <!-- <h1>Explore New Posts</h1> -->
        <br />

        <?php 
        // desc means that the most recent post is shown at the top (descending)
        $sql = "SELECT * FROM posts ORDER BY time DESC";
        $result = $conn->query($sql); 
        
        // shows all the posts
        include "view-posts.php";

        $result->free_result();
        $conn->close();
    ?>

    </div>

</body>
</html>
