<?php
//<!-- if the message has a # anywhere in it -->
if (str_contains($row["post"], "#")) {
    $post_words = array();

    // gets the hashtags used in the post
    // wordwrap separates the words into new lines
    // $words = array(wordwrap($row["post"], 1, "<br />"));
    $words = explode(" ", wordwrap($row["post"], 1, " "));
    for ($i = 0; $i <= count($words) - 1; $i++) {
        // echo $words[$i];
        if (str_contains($words[$i], "#")) {
            $tag_used = $words[$i];
            $post_words[$i] = $words[$i];
            $tag_used_html = htmlspecialchars($tag_used);
            // turns the #value to be %23value as that is 
            // correctly used in the a tag
            $tag_used_encoded = str_replace("#", "%23", $tag_used_html);
            // replace the hashtag in the post for a link 
            $replace = str_replace($tag_used_html, "<a href='tags.php?tag={$tag_used_encoded}'>$tag_used_html</a>", $tag_used); 
            // echo "<h4 class='hashtag card-text'>" . $replace . "</h4>";
            $post_words[$i] = $replace;
        // words in a post containing a hashtag, 
        // but the word being looked at is not the hashtag
        } else {
            $post_words[$i] = $words[$i];
        }
    }
    // echo each word from the words array, whether or not theyre hashtags or not
    echo "<h4 class='hashtag card-text'>";
    foreach ($post_words as $value) {
        // adds a space after the value 
        // else all the words become one word
        echo $value . " ";
    } 
    echo "</h4>";

// if the post is normal (no hashtags)
} else {
    echo "<h4 class='card-text'>" . $row["post"] . "</h4>";
}
