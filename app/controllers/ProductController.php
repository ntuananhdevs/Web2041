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
    }