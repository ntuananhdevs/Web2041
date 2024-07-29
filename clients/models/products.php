<?php

class Products
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getLapTop()
    {
        try {
            $sql = "SELECT * FROM products WHERE category_id = 1";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $products = $stmt->fetchAll();
            return $products;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    public function getPhone()
    {
        try {
            $sql = "SELECT * FROM products WHERE category_id = 2";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $products = $stmt->fetchAll();
            return $products;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function searchProducts($search)
    {
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

    public function add_comment($product_id, $user_id, $content)
{
    try {
        $sql = "INSERT INTO comments (product_id, user_id, content, created_at) VALUES (:product_id, :user_id, :content, NOW())";
        $stmt = $this->conn->prepare($sql);
        $content = trim($content);
        $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindParam(':content', $content, PDO::PARAM_STR);
        if ($stmt->execute()) {
            return true;
        } else {
            $errorInfo = $stmt->errorInfo();
            error_log("Error adding comment: " . $errorInfo[2]);
            return false;
        }
    } catch (PDOException $e) {
        error_log("PDOException: " . $e->getMessage());
        return false;
    }
}


    public function get_comment($product_id)
    {
        $sql = "
            SELECT c.*, u.username, u.avatar, DATE_FORMAT(c.created_at, '%d-%m-%Y') AS created_date
            FROM comments AS c
            JOIN users AS u ON c.user_id = u.id
            WHERE c.product_id = :product_id
            ORDER BY c.created_at DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':product_id', $product_id);
        $stmt->execute();
        $comments = $stmt->fetchAll();
        return $comments;
    }
}
