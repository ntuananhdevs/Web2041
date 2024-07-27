<?php
class Home{
    public $conn;

    public function __construct(){
        $this->conn = connectDB();
    }
    public function getTopProduct(){
        try {
            $sql = "SELECT * FROM products ORDER BY views DESC LIMIT 3";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $products = $stmt->fetchAll();
            return $products;
        } catch (Exception $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function getProductById($product_id) {
        try {
            $sql = "SELECT p.*, c.name as category_name FROM products p JOIN categories c ON p.category_id = c.id WHERE p.id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$product_id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Failed to get product: " . $e->getMessage();
            return false;
        }
    }
    public function incrementViews($product_id) {
        if (!isset($_SESSION['viewed_products'])) {
            $_SESSION['viewed_products'] = [];
        }
    
        if (!in_array($product_id, $_SESSION['viewed_products'])) {
            try {
                $sql = "UPDATE products SET views = views + 1 WHERE id = ?";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([$product_id]);
    
                $_SESSION['viewed_products'][] = $product_id;
            } catch (Exception $e) {
                echo "Failed to update product views: " . $e->getMessage();
            }
        }
    }
    public function get_userbyid($id) {
        try {
            $sql = "SELECT * FROM users WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $user = $stmt->fetchAll();
            return $user;
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}