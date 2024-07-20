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
            $sql = "SELECT * FROM users WHERE email = :email ";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            $hash = password_hash("admin",PASSWORD_DEFAULT);
            

            if (password_verify($password, $user['password'])) {
               return true;    
            }
            return false;
            

        } catch(PDOException $e) {
            error_log("Database query error: " . $e->getMessage());
            return false; 
        }
    }
}
