<?php
class Comment
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getCommentsByID($product_id)
    {
        try {
            $sql = "SELECT 
                        c.*, 
                        u.username, 
                        u.avatar, 
                        p.name_product, 
                        DATE_FORMAT(c.created_at, '%d-%m-%Y') AS created_date
                    FROM comments AS c
                    JOIN users AS u ON c.user_id = u.id
                    JOIN products AS p ON c.product_id = p.id
                    WHERE c.product_id = :product_id
                    ORDER BY c.created_at DESC";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC); // Sửa đổi từ fetch thành fetchAll
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }



    public function get_count_comments()
    {
        try {
            $sql = "SELECT 
            c.product_id AS product_id, 
            p.name_product,
            COUNT(c.id) AS comment_count,
            MIN(c.created_at) AS oldest_comment,
            MAX(c.created_at) AS newest_comment
        FROM comments c
        JOIN products p ON c.product_id = p.id
        GROUP BY c.product_id, p.name_product";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    public function delete_comment($id)
    {
        try {
            $sql = "DELETE FROM comments WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}
