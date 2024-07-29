<?php
class Auth
{
    public $conn;
    public function __construct() {
        $this->conn = connectDB();
    }

    public function login($email, $password) {
        try {
            $sql = "SELECT * FROM users WHERE email = :email AND password = :password";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $stmt->execute();
            return $stmt->fetch();
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    public function register($username, $email, $phone, $password) {
        try {
            $defaultAvatar = './public/img/avt-default.png	';
    
            $sql = "INSERT INTO users (username, email, phone, password, avatar) 
                    VALUES (:username, :email, :phone, :password, :avatar)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':avatar', $defaultAvatar);
            return $stmt->execute();
        } catch(PDOException $e) {
            $_SESSION['error'] = "SQL Error: " . $e->getMessage();
            return false;
        }
    }
    public function forgotPassword($email) {
        try {
            $sql = "SELECT * FROM users WHERE email = :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            return $stmt->fetch();
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}