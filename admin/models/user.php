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
            $sql = "SELECT * FROM users WHERE email = :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC); 
    
            if ($user) {
                if ($password === $user['password']) {
                    return $user;
                } else {
                    echo "Password verification failed";
                }
            } else {
                echo "User not found";
            }
            return false;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
