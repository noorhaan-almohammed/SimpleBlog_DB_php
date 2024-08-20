<?php
require '../Sql/Post.php';

$post = new Post();
$posts = $post->listAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/list.css">      
</head>

<body>
    <div class="container">
        <div class="add_bot">
            <a href="./create_post.php"><i class="fa-solid fa-plus"></i></a>
        </div>
        <div class="row">
            <?php
        $index = 1;
        foreach ($posts as $post) {
            // Determine the picture alignment based on odd/even index
            $isOdd = $index % 2 !== 0;
            ?>
            <div class="col-md-12">
                <div class="card">
                    <div class="row g-0">
                        <?php if ($isOdd): ?>
                        <!-- Image on the left for odd cards -->
                        <div class="col-md-4">
                            <img src=<?= $post['image'] ?> class="img-fluid rounded-start" alt="Image">
                        </div>
                        <?php endif; ?>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($post['title']); ?></h5>
                                <p class="card-text"><small class="text-muted">By
                                        <?php echo htmlspecialchars($post['author']); ?> on
                                        <?php echo date("F j, Y", strtotime($post['created_at'])); ?></small></p>
                                <p class="card-text">
                                    <?php echo htmlspecialchars(substr($post['content'], 0, 50)); ?>...</p>
                                <div class="footer">
                                    <div class="like-dislike-icons">
                                        <a href='update_likes.php?id= <?= $post['id'] ?> & action=like'>
                                            <i class="bi bi-hand-thumbs-up icon-button"
                                                <?= $post['likes'] ?  "style= color:#00BCD4;" : "" ?>
                                                id="like-<?= $post['id']; ?>"></i>
                                        </a>
                                        <a href='update_likes.php?id= <?= $post['id'] ?> & action=dislike'>
                                            <i class="bi bi-hand-thumbs-down icon-button"
                                                <?= $post['dislikes'] ?  "style= color:#00BCD4;" : "" ?>
                                                id="dislike-<?= $post['id']; ?>"></i>
                                        </a>
                                    </div>
                                    <div class="card-button">
                                        <a href='view_post.php?id= <?= $post['id'] ?>'>View</a>
                                        <a href='edit_post.php?id= <?= $post['id'] ?>'>Edit</a>
                                        <a href='delete_post.php?id=<?= $post['id'] ?>'
                                            onclick='return confirm("Are you sure to delete the post \" <?= $post['title'] ?> \" ? ")'>Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php if (!$isOdd): ?>
                        <!-- Image on the right for even cards -->
                        <div class="col-md-4">
                            <img src=<?= $post['image'] ?> class="img-fluid rounded-end" alt="Image">
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php
            $index++;
        }
        ?>
        </div>
    </div>

    <!-- Include Bootstrap JS and Icons -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css"
        rel="stylesheet">

</body>

</html>