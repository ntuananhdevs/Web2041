<?php

class Products {
    public $conn;
    public function __construct() {
        $this->conn = connectDB();
    }

    public function getLapTop() {
        try {
            $sql = "SELECT * FROM products WHERE category_id = 1";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $products = $stmt->fetchAll();
            return $products;
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    public function getPhone() {
        try {
            $sql = "SELECT * FROM products WHERE category_id = 2";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $products = $stmt->fetchAll();
            return $products;
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    public function searchProducts($search) {
        $sql = "SELECT products.*, categories.name 
        FROM products 
        JOIN categories ON products.category_id = categories.id 
        WHERE products.name_product LIKE :search 
        OR products.id LIKE :search 
        OR categories.name LIKE :search";
        $stmt = $this->conn->prepare($sql);
        $searchTerm = '%' . $search . '%';
        $stmt->bindParam(':search', $searchTerm);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);


        return $results;
    }
}