<?php
session_start();
ob_start();

class HomeController
{
    public $home;
    public $products;
    public function __construct(){
        $this->home = new Home();
        $this->products = new Products();
    }

    public function view_home()
    {

        $top_products = $this->home->getTopProduct();
        require_once '../clients/views/home.php';
    }

    public function product_detail()
    {
        if (isset($_GET['id'])) {
            $product_id = $_GET['id'];

            $this->home->incrementViews($product_id);

            $product = $this->home->getProductById($product_id);
  
            $comments = $this->products->get_comment($_GET['id']);

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

    function view_laptop()
    {
        $list_laptop = $this->products->getLapTop();
        require_once '../clients/views/laptop.php';
    }
    function view_phone()
    {
        $list_phone = $this->products->getPhone();
        require_once '../clients/views/phone.php';
    }
    public function search()
    {
        if (isset($_GET['search'])) {
            $searchTerm = $_GET['search'];

            $results = $this->products->searchProducts($searchTerm);
            header('Location: ../clients/views/result.php?search=' . urlencode($searchTerm));
            exit;
        } else {
            $results = [];
        }
    }
    public function view_result()
    {
        $results = $this->products->searchProducts($_GET['search']);
        require_once '../clients/views/result.php';
    }

    public function add_comment()
    {
        $product_id = $_POST['product_id'];
        $user_id = $_SESSION['user_id'];
        $content = $_POST['content'];

        if($this->products->add_comment($product_id, $user_id, $content)){
            header('Location: ?act=product_detail&id=' . $product_id);
        
        };
        // Nếu không phải POST, yêu cầu trang chi tiết sản phẩm
    }
}
