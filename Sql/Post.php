<?php
require '../Sql/Database.php';
class Post {
    private $table_name = "posts";
    public $id;
    public $title;
    public $content;
    public $author;
    public $image ;
    public $created_at;
    public $updated_at;
    // إنشاء مقالة جديدة
    public function create() {
        $db = new Database();
        // تنظيف المدخلات
        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->content = htmlspecialchars(strip_tags($this->content));
        $this->author = htmlspecialchars(strip_tags($this->author));
        $this->image = htmlspecialchars(strip_tags($this->image));
      
        $query = "INSERT INTO " . $this->table_name . " (title, content, author,image) VALUES (:title, :content, :author,:image)";    
        $params = [
            ':title' =>  $this->title,
            ':content' => $this->content,
            ':author' => $this->author,
            ':image' => $this->image,
        ];
            // تنفيذ الاستعلام
        $result = $db->executeQuery($query, $params);
        if ($result) {
            header("Location: ./list_posts.php");
            exit;
        } else {
            echo "Failed to create post.";
        }
    }

    // قراءة مقالة حسب المعرف
    public function read($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = :id";
        $params = [
            ':id' =>  $id
        ];
        $db = new Database();
        $result = $db->executeQuery($query, $params);
        return $result;
    }

    // تحديث مقالة
    public function update() {
        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->content = htmlspecialchars(strip_tags($this->content));
        $this->author = htmlspecialchars(strip_tags($this->author));
       
        $db = new Database();

        $query = "UPDATE " . $this->table_name . " SET title = :title, content = :content, author = :author , image = :image WHERE id = :id";

        $params = [
            ':title' =>  $this->title,
            ':content' => $this->content,
            ':author' => $this->author,
            ':image' => $this->image,
            ':id' => $this->id
        ];
        $result = $db->executeQuery($query, $params);
        if ($result) {
            header("Location: ./list_posts.php");
            exit;
        } else {
            echo "Failed to create post.";
        }
    }

    // حذف مقالة
    public function delete($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $db = new Database();
        $params = [
            ':id' => $id
        ];
        $result = $db->executeQuery($query, $params);
        if ($result) {
            return true;
        }

        return false;
    }

    // عرض جميع المقالات
    public function listAll() {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY created_at DESC";
        $db = new Database();
        $result = $db->executeQuery($query);
        return $result;
    }
    public function update_like($id , $type){
        if ($type == "like"){
            $query = "UPDATE " . $this->table_name . " SET likes = !likes ,dislikes = 0 WHERE id = :id";
        }elseif($type == "dislike"){
            $query = "UPDATE " . $this->table_name . " SET dislikes = !dislikes ,likes = 0 WHERE id = :id";
        }
        // $query = "UPDATE " . $this->table_name . " SET likes = likes+1 WHERE id = $id";
        $db = new Database();
        $params = [
            ':id' => $id
        ];
        $result = $db->executeQuery($query,$params);
        return $result;
    }
    }