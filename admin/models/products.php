<?php
class Products
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getProducts()
    {
        try {
            $sql = "
                SELECT p.id, p.name_product, p.screen_size, p.quantity, p.description_1, p.description_2, p.description_3, p.description_4, p.description_5, p.description_6, p.description_7, p.img, p.price, p.sale,c.name as category_name
                FROM products p 
                JOIN categories c ON p.category_id = c.id
            ";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $products;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    public function add($category, $name_product, $screen_size, $description_1, $description_2, $description_3, $description_4, $description_5, $description_6, $description_7, $quantity, $price, $img, $sale)
    {
        try {
            $sql = "
                INSERT INTO products
                (category_id, name_product, screen_size, quantity, description_1, description_2, description_3, description_4, description_5, description_6, description_7, price, img, sale)
                VALUES
                (:category_id, :name_product, :screen_size, :quantity, :description_1, :description_2, :description_3, :description_4, :description_5, :description_6, :description_7, :price, :img, :sale)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':category_id', $category);
            $stmt->bindParam(':name_product', $name_product);
            $stmt->bindParam(':screen_size', $screen_size);
            $stmt->bindParam(':quantity', $quantity);
            $stmt->bindParam(':description_1', $description_1);
            $stmt->bindParam(':description_2', $description_2);
            $stmt->bindParam(':description_3', $description_3);
            $stmt->bindParam(':description_4', $description_4);
            $stmt->bindParam(':description_5', $description_5);
            $stmt->bindParam(':description_6', $description_6);
            $stmt->bindParam(':description_7', $description_7);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':img', $img);
            $stmt->bindParam(':sale', $sale);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    public function update($id, $category, $name_product, $screen_size, $description_1, $description_2, $description_3, $description_4, $description_5, $description_6, $description_7, $quantity, $price, $img, $sale)
    {
        try {
            $sql = "
                    UPDATE products
                    SET
                    category_id = :category_id,
                    name_product = :name_product,
                    screen_size = :screen_size,
                    quantity = :quantity,
                    description_1 = :description_1,
                    description_2 = :description_2,
                    description_3 = :description_3,
                    description_4 = :description_4,
                    description_5 = :description_5,
                    description_6 = :description_6,
                    description_7 = :description_7,
                    price = :price,
                    img = :img,
                    sale = :sale
                    WHERE id = :id
                ";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':category_id', $category);
            $stmt->bindParam(':name_product', $name_product);
            $stmt->bindParam(':screen_size', $screen_size);
            $stmt->bindParam(':quantity', $quantity);
            $stmt->bindParam(':description_1', $description_1);
            $stmt->bindParam(':description_2', $description_2);
            $stmt->bindParam(':description_3', $description_3);
            $stmt->bindParam(':description_4', $description_4);
            $stmt->bindParam(':description_5', $description_5);
            $stmt->bindParam(':description_6', $description_6);
            $stmt->bindParam(':description_7', $description_7);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':img', $img);
            $stmt->bindParam(':sale', $sale);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    public function getproductbyID($id)
    {
        try {
            $sql = "SELECT p.*, c.name AS category_name FROM products p 
                    JOIN categories c ON p.category_id = c.id
                    WHERE p.id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Failed to get product: " . $e->getMessage();
        }
    }
    public function delete($id)
    {
        try {
            $sql = "DELETE FROM products WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
        } catch (Exception $e) {
            echo "Failed to delete product: " . $e->getMessage();
        }
    }
}
