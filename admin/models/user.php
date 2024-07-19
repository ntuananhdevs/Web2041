<?php
class User {
    public $conn;

    public function __construct() {
        $this->conn = connectDB();
    }
    public function getUsers() {
        try {
            $sql = "SELECT * FROM users";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $users;
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}