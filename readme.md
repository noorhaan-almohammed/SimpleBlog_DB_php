Simple Blog Database :
This site displays posts with the ability to edit, delete, add (CRUD operations) and add a like or dislike.
 Add or change an image to the post with a default image if no image is added with the ability to preview before saving or deleting it.


#Requirements :
1 . php 7 or more .
2 . MySQL .
3 . Apache or Nginx .
4 . Browser

#Setting :
1 . create database with `blog_db.sql` file .
2 . copy folders to "\xampp\htdocs" .
3 . start xampp or wampp (MySQL and apache) .
4 . open your browser "localhost/task2/post/list_posts.php" .

  $stmt = $this->conn->prepare($query);
Prepared Statements protect against SQL injection attacks because the queries are not directly interpreted as SQL code. Instead, the query is first sent to the database for examination and preparation, and then the actual data is sent. This means that even if an attacker tries to inject SQL code, it will be treated as normal data and not as a SQL command.

Notes:
Prepared Statements work on all types of databases when using PDO.
It is always recommended to use Prepared Statements when dealing with user-entered data to ensure security and prevent SQL injection attacks.
