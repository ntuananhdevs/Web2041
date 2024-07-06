<?php
class products {
    public $conn;

    public function __construct() {
        $this->conn = connectDB();
    }

    public function getAll() {
        try{
            $sql = 'SELECT * FROM product';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();   
        }catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function getProduct($id) {
        try{
            $sql = 'SELECT * FROM product WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetchAll();
        }catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function addProduct($name, $price, $image) {
        try{
            $sql = 'INSERT INTO product(name, price, image) VALUES(:name, :price, :image)';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':image', $image);
            $stmt->execute();
            return $stmt->fetchAll();
        }catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function updateProduct($id, $name, $price, $image) {
        try{
            $sql = 'UPDATE product SET name = :name, price = :price, image = :image WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':image', $image);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetchAll();
        }catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function deleteProduct($id) {
        try{
            $sql = 'DELETE FROM product WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetchAll();
        }catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
}