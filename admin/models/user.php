<?php
class User
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getUsers()
    {
        try {
            $sql = "SELECT * FROM users Where role = 'Customer'";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $users = $stmt->fetchAll();
            return $users;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    public function get_userbyid($id)
    {
        try {
            $sql = "SELECT * FROM users WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $user = $stmt->fetchAll();
            return $user;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    public function add($username, $email, $phone, $img, $password)
    {
        try {
            $sql = "INSERT INTO users (username, email, phone, avatar,password ) VALUES (:username, :email, :phone, :avatar, :password)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':avatar', $img);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    public function update($id, $username, $email, $phone, $img, $password)
    {
        try {
            $sql = "UPDATE users SET username = :username, email = :email, phone = :phone,  avatar = :avatar, password = :password WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':avatar', $img);
            $stmt->bindParam(':password', $password);

            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function delete($id)
    {
        try {
            $sql = "DELETE FROM users WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    public function auth($email, $password)
    {
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
