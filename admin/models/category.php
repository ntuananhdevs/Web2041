<?php
class Category {
    public $conn;

    public function __construct(){
        $this->conn = connectDB();
    }

    public function getCategories() {
        try {
            $sql = "SELECT * FROM categories";
            $stmt = $this->conn->prepare($sql);
            $stmt -> execute();
            return $stmt-> fetchAll();
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    public function categorybyid($id) {
        try {
            $sql = "SELECT * FROM categories WHERE id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$id]);
            return $stmt-> fetch();
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}