<!-- displays each post in its own card -->
<?php 
while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
    echo "<div class='card mb-3 mx-auto'>"; //text-bg-dark
        echo "<div class='card-body'>";
            echo "<p class='card-title'>".  $row["user"] . "</p>";

            // checks for the existence of #s and shows the post to the users
            include "hashtags.php";

            // Show delete button ONLY on posts in profile.php
            // $_SERVER["PHP_SELF"] gets the name of the current file being used
            if ($_SERVER["PHP_SELF"] === "/profile.php") {
                // The onsubmit creates a confirmation as an alert. 
                // The user can either confirm or cancel the deletion from there
                echo "<form action='delete-post.php' method='post' onsubmit='return confirm(\"Are you sure you want to delete this post?\");'>";
                    // Posts the post id, even though the user never sees it
                    echo "<input type='hidden' name='post_id' value='" . $row["post_id"] . "'>";
                    echo "<button class='delete' type='submit'>Delete</button>";
                echo "</form>";
            }

        echo "</div>";
    echo "</div>";
}
?>
