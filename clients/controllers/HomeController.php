<?php 
class HomeController{
    public $home;

    public function __construct(){
        $this->home = new Home();
    }
    public function view_home(){
        $top_products = $this->home->getTopProduct();
        require_once '../clients/views/home.php';
    }

    public function product_detail() {
        if (isset($_GET['id'])) {
            $product_id = $_GET['id'];

            $this->home->incrementViews($product_id);

            $product = $this->home->getProductById($product_id);

            if ($product) {
                // Gọi view để hiển thị chi tiết sản phẩm
                require_once '../clients/views/product_detail.php';
            } else {
                echo "Product not found.";
            }
        } else {
            echo "Product ID is missing.";
        }
    }

}