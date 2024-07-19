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
            $users = $stmt->fetchAll();
            return $users;
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function auth($email, $password) {
        try {
            $sql = "SELECT * FROM users WHERE email = ? AND role = 'admin'";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $email); 
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if ($user && password_verify($password, $user['password'])) {
                return $user;
            }
            return false;
    
        } catch(PDOException $e) {
            error_log("Database query error: " . $e->getMessage()); // Ghi lỗi vào log
            return false; 
        }
    }
    
}