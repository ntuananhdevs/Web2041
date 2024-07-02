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
}