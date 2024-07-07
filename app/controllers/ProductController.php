<?php 
    class ProductController {
        public $products;
        public function __construct() {
            $this->products = new products();
        }

        public function products() {
            $list_products = $this->products->getAll();
            require_once '../../views/admin/product.php';  
        }

        public function add_products() {
            require_once '../../views/admin/form/formadd-product.php';
        }

        public function post_products() {
            $product_name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $quantity = $_POST['quantity'];
            $img = $_POST['img'];
            $category_id = $_POST['category'];

            $this->products->addProduct($product_name, $description, $price, $quantity, $img, $category_id);

            header('Location: ?act=products');
        }   
    }