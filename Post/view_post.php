<?php
require '../Sql/Post.php';

if (isset($_GET['id'])) {

    $post = new Post();
    $result = $post->read($_GET['id'])->fetch(PDO::FETCH_ASSOC);
    if (!$result) { echo "Post not found.";}
    // if ($result) {
    //     print_r($result);
    //     echo "<h1>" . $result['title'] . "</h1>";
    //     echo "<p><strong>Author:</strong> " . $result['author'] . "</p>";
    //     echo "<p>" . $result['content'] . "</p>";
    //     echo "<p><strong>Created at:</strong> " . $result['created_at'] . "</p>";
    // } else {
    //     echo "Post not found.";
    // }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View</title>
<style>
html{
    height: 900px;
}
body{
    height: 100%;
}
.container {
    height: 100%;
    display: grid;
    grid-template-columns: auto auto auto;
}
.header {
    background-size: cover;
    background-position: center;
    display: flex;
    align-items: center;
    justify-content: center;
    grid-column: 1 / span 3;
}
h1 {
    font-size: 5rem;
    color: #E0F7FA;
    text-shadow: 0 0 8px white;
    font-family: cursive;
}
.body {
    grid-column: 2/span 2;
    padding: 1% 5%;
}
.side {
    padding: 10% 0%;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}
.datas p {
    font-family: system-ui;
}
span {
    color: #00ACC1;
    font-family: cursive;
    font-size: 14px;
}
</style>
</head>

<body>
    <div class="container">
        <div class="header" style="background-image: url(<?= $result['image'] ?>);">
            <div class="title">
                <h1> <?= $result['title'] ?> </h1>
            </div>
        </div>
        <div class="side">
            <div class="author">
                By <span> <?=  $result['author'] ?> </span>
            </div>
            <div class="datas">
                <p class="create">Created at : <br><span> <?=  $result['created_at']?></span></p>
                <p class="uodate">Last Update :<br><span> <?=  $result['updated_at']?></span></p>
            </div>
        </div>
        <div class="body">
            <p class="cont">
                <?= $result['content'] ?>
            </p>
        </div>
       
    </div>
</body>

</html>