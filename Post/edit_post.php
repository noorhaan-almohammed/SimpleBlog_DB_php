<?php
require "../Sql/create_edit.php"
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edite Post</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/edit.css">
</head>

<body>
    <form action="" method="POST" enctype="multipart/form-data" class="form">
        <input type="hidden" name="id" value="<?= $result['id']; ?>">
        <input type="hidden" name="type_of_process" value="edit">
        <div class="upload upimg">
            <img src="<?= $result['image'] ?>" id="img">
            <input type="hidden" name="image" value="<?= $result['image'] ?>">
            <div class="rightRound" id="upload">
                <input type="file" name="image" id="image">
                <i class="fa fa-camera"></i>
            </div>

            <div class="leftRound" id="cancel" style="display: none;">
                <i class="fa fa-times"></i>
            </div>
        </div>
        </div>
        <div class="upload">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="<?= $result['title']; ?>">
            <span style="color: red;"><?= $validator->getError('title'); ?></span>
        </div>

        <div class="upload">
            <label for="content">Content:</label>
            <textarea id="content" name="content" rows="10"><?= $result['content']; ?></textarea>
            <!-- <input type="text" id="content" name="content" value="<?= $result['content']; ?>"> -->
            <span style="color: red;"><?= $validator->getError('content'); ?></span>
        </div>
        <div class="upload">
            <label for="author">author:</label>
            <input type="text" id="author" name="author" value="<?= $result['author']; ?>">
            <span style="color: red;"><?= $validator->getError('author'); ?></span>
        </div>

        <button type="submit">Submit</button>
    </form>
    <script type="text/javascript">
    document.getElementById("image").onchange = function() {
        document.getElementById("img").src = URL.createObjectURL(image.files[0]); // Preview new image
        document.getElementById("cancel").style.display = "flex";
        document.getElementById("upload").style.display = "none";
    }
    var userImage = document.getElementById('img').src;
    document.getElementById("cancel").onclick = function() {
        document.getElementById("img").src = userImage; // Back to previous image
        document.getElementById("cancel").style.display = "none";
        document.getElementById("upload").style.display = "flex";
    }
    </script>
</body>

</html>