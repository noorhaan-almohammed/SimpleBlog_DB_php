<?php
require '../Sql/Post.php';
require '../Validate/Validator.php';
use Validate\validate;

$validator = new validate();
$post = new Post();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 
    $title = $_POST['title'];
    $content = $_POST['content'];
    $author = $_POST['author'] ;
    $target_file = $_POST['image'] ;
    $type_of_process = $_POST['type_of_process'];
    // التحقق من صحة الحقول
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0 ) {
   
        $target_dir = "../uploads/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $allowed_types = ['jpg', 'jpeg','png','gif'];
        
        // Check if the file type is allowed
        $validator->allowed_image('image',$allowed_types, $imageFileType);
        // Move the uploaded file to the target directory
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $post->image  = $target_file;
        }
    } 
    $validator->required('author', $author);
    $validator->maxLength('content', $content, 225);
    $validator->minLength('content', $content, 50);
    $validator->required('content', $content);
    $validator->maxLength('title', $title, 15);
    $validator->minLength('title', $title, 5);
    $validator->required('title', $title); 

    $post->image  = $target_file;
    $post->title = $title ;
    $post->content = $content;
    $post->author = $author;

    if($type_of_process == "edit"){
        $result = $post->read($_GET['id'])->fetch(PDO::FETCH_ASSOC);
        if (!($validator->hasErrors())) {
            $post->id = $_POST['id'];
            $post->update();
        } 
    }elseif($type_of_process == "create"){
        if (!($validator->hasErrors())) {
            $post->create();
        }
    }

    }
    elseif (isset($_GET['id'])) {
    $result = $post->read($_GET['id'])->fetch(PDO::FETCH_ASSOC);
    }