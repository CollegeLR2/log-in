<!-- displays each post in its own card -->
<?php while ($row = $result->fetch_array(MYSQLI_ASSOC)): ?>
    <div class="card text-bg-dark mb-3 mx-auto">
    <div class="card-body">
        <p class="card-title"><?= $row["user"] ?></p>
        <!-- <h4 class="card-text"> //$row["post"] </h4> -->

        <!-- if the message has a # anywhere in it -->
        <?php if (str_contains($row["post"], "#")):
            //<!-- <a href="/tags.php">This post contains a #hashtag</a>
            //<br /> -->

            // gets the hashtags used in the post
            // wordwrap separates the words into new lines
            // $words = array(wordwrap($row["post"], 1, "<br />"));
            $words = explode(" ", wordwrap($row["post"], 1, " "));
            for ($i = 0; $i <= count($words) - 1; $i++) {
                // echo $words[$i];
                if (str_contains($words[$i], "#")) {
                    $tag_used = $words[$i];
                    // turns the #value to be %23value as that is 
                    // correctly used in the a tag
                    $tag_used_html = htmlspecialchars($tag_used);
                    $tag_used_encoded = str_replace("#", "%23", $tag_used_html);
                    // echo "<a href='tags.php?tag={$tag_used_encoded}'>{$tag_used_html}</a>";
                    // replace the hashtag in the post for a link 
                    $replace = str_replace($words[$i], "<a href='tags.php?tag={$tag_used_encoded}'>$tag_used_html</a>", $row["post"]);
                    // echo $replace;
                    echo "<h4 class='card-text'>" . $replace . "</h4>";
                }
             } ?>
        <?php else: ?>
            <h4 class='card-text'><?= $row["post"] ?></h4>
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
