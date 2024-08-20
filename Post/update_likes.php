<?php
require '../Sql/Post.php';
$post = new Post();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  $id = $_GET['id'];
  if( $_GET['action'] == 'like')
    {
        $post->update_like($id,'like');    
    }
    elseif( $_GET['action'] == 'dislike')
    {
        $post->update_like($id,'dislike');
    }
}
header("location: list_posts.php"); 