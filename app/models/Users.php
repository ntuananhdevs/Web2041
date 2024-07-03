<?php 
class users {
    public $conn;

    public function __construct() {
        $this->conn = connectDB();
    }

    public function getAll() {
        try{
            $sql = 'SELECT * FROM customers';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        }catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getUser($id) {
        try{
            $sql = 'SELECT * FROM customers WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetchAll();
        }catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function addUser($full_name, $phone, $email, $address, $pass) {
        try{
            $sql = 'INSERT INTO customers(name, phone, email, address, pass) VALUES(:name, :phone, :email, :address, :pass)';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':address', $address);
            $stmt->bindParam(':pass', $pass);
            $stmt->execute();
            return $stmt->fetchAll();
        }catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function updateUser($id, $full_name, $phone, $email, $address, $pass) {
        try{
            $sql = 'UPDATE customers SET name = :name, phone = :phone, email = :email, address = :address, pass = :pass WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':address', $address);
            $stmt->bindParam(':pass', $pass);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetchAll();
        }catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function deleteUser($id) {
        try{
            $sql = 'DELETE FROM customers WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetchAll();
        }catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
}