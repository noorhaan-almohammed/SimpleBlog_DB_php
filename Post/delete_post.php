<?php
require '../Sql/Post.php';

if (isset($_GET['id'])) {
    $post = new Post();

    if ($post->delete($_GET['id'])) {
        header("location: list_posts.php");
    } else {
        echo "Failed to delete post.";
    }
}
