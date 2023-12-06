<!-- displays each post in its own card -->
<?php while ($row = $result->fetch_array(MYSQLI_ASSOC)): ?>
    <div class="card text-bg-dark mb-3 mx-auto">
    <div class="card-body">
        <p class="card-title"><?= $row["user"] ?></p>
        <h4 class="card-text"><?= $row["post"] ?></h4>

        <!-- Show delete button only on posts in profile.php
             $_SERVER["PHP_SELF"] gets the name of the current file being used -->
        <?php if ($_SERVER["PHP_SELF"] === "/profile.php"): ?>
            <form action="delete-post.php" method="post" onsubmit="return confirm('Are you sure you want to delete this post?');">
                <input type="hidden" name="post_id" value="<?= $row["post_id"] ?>">
                <button class="delete" type="submit">Delete</button>
            </form>
        <?php endif; ?>

    </div>
    </div>
<?php endwhile; ?>
