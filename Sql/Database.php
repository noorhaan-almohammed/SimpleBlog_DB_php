<?php

class Database {
    private $host = "localhost";
    private $db_name = "blog_db";
    private $username = "root";
    private $password = "";
    public $conn;

    // الاتصال بقاعدة البيانات
        public function __construct(){
            $this->getConnection();
        }
    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }
    public function executeQuery($query, $params = []) {
        // تأكد من أن الاتصال بقاعدة البيانات موجود
        if ($this->conn === null) {
            $this->getConnection();
        }

        try {
            // تجهيز الاستعلام
            $stmt = $this->conn->prepare($query);
            // تنفيذ الاستعلام مع المتغيرات
            $stmt->execute($params);
            return $stmt;
        } catch(PDOException $exception) {
            echo "Query failed: " . $exception->getMessage();
            return false;
        }
    }
}
