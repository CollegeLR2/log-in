<!-- displays each post in its own card -->
<?php while ($row = $result->fetch_array(MYSQLI_ASSOC)): ?>
    <div class="card text-bg-dark mb-3 mx-auto">
    <div class="card-body">
        <p class="card-title"><?= $row["user"] ?></p>
        <h4 class="card-text"><?= $row["post"] ?></h4>

        <!-- if the message has a # anywhere in it -->
        <?php if (str_contains($row["post"], "#")): ?>
            <a href="">You have used a hashtag</a>
        <?php endif; ?>

        <!-- Show delete button only on posts in profile.php
             $_SERVER["PHP_SELF"] gets the name of the current file being used -->
        <?php if ($_SERVER["PHP_SELF"] === "/profile.php"): ?>
            <!-- the onsubmit creates a confirmation as an alert. 
            The user can either confirm or cancel the deletion from there -->
            <form action="delete-post.php" method="post" onsubmit="return confirm('Are you sure you want to delete this post?');">
            <!-- Posts the post id, even though the user never sees it -->
                <input type="hidden" name="post_id" value="<?= $row["post_id"] ?>">
                <button class="delete" type="submit">Delete</button>
            </form>
        <?php endif; ?>

    </div>
    </div>
<?php endwhile; ?>
