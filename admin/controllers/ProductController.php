<?php
class ProductController{
    public $products;
    public $categorys;

    public function __construct(){
        $this->products = new Products();
        $this->categorys = new Category();
    }

    public function view_products(){
        $list_products = $this->products->getProducts();
        require_once './views/products.php';
    }

    public function view_category(){
        $list_category = $this->categorys->getCategories(); 
        require_once './views/category.php';
    }
    public function form_add(){
        $list_category = $this->categorys->getCategories();
        require_once './views/form/add_products.php';
    }

    public function add_products(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $category = $_POST['category'];
            $name_product = $_POST['name_product'];
            $screen_size = $_POST['screen_size'];
            $description_1 = $_POST['description_1'];
            $description_2 = $_POST['description_2'];
            $description_3 = $_POST['description_3'];
            $description_4 = $_POST['description_4'];
            $description_5 = $_POST['description_5'];
            $description_6 = $_POST['description_6'];
            $description_7 = $_POST['description_7'];
            $quantity = $_POST['quantity'];
            $price = $_POST['price'];
            $img = $_FILES['img'];
            $sale = $_POST['sale'];

            if($this->products->add($category, $name_product, $screen_size, $description_1, $description_2, $description_3, $description_4, $description_5, $description_6, $description_7, $quantity, $price, uploadFile($img, './uploads/'), $sale)){
                header('location: ?act=products');
            }else{
                echo "Lỗi";
            }
        }
    }
    public function form_update($id){
        $product_value = $this->products->getproductbyID($id);
        $list_category = $this->categorys->getCategories(); // Lấy tất cả danh mục

        if($product_value){
            $product_value = $product_value[0];
            require_once './views/form/update_product.php';
        } else {
            echo "Không tìm thấy sản phẩm";
        }
    }
    

    public function update_products(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = $_POST['id'];
            $category = $_POST['category'];
            $name_product = $_POST['name_product'];
            $screen_size = $_POST['screen_size'];
            $description_1 = $_POST['description_1'];
            $description_2 = $_POST['description_2'];
            $description_3 = $_POST['description_3'];
            $description_4 = $_POST['description_4'];
            $description_5 = $_POST['description_5'];
            $description_6 = $_POST['description_6'];
            $description_7 = $_POST['description_7'];
            $quantity = $_POST['quantity'];
            $price = $_POST['price'];
            $img = $_FILES['img'];
            $sale = $_POST['sale'];
            $new_img = $_POST['old_img'];

            if(isset($_FILES['img']) && $_FILES['img'] ['error'] == UPLOAD_ERR_OK){
                if(!empty($new_img)){
                    deleteFile($new_img);
                }
                $new_img = uploadFile($img, './uploads/');
            }
            if($this->products->update($id, $category, $name_product, $screen_size, $description_1, $description_2, $description_3, $description_4, $description_5, $description_6, $description_7, $quantity, $price, $new_img, $sale)){
                header('location: ?act=products');
                exit();
            }else{
                echo "loi";
            }
        }
    }

    public function delete_products(){
            $id =  $_GET['id'];
            if($this->products->delete($id)){
                header('location: ?act=products');
            }else{
                echo "loi";
            }
    }

    public function form_add_category(){
        require_once './views/form/add_category.php';
    }
    public function add_category(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $name = $_POST['name'];
            $description = $_POST['description']; 
            if($this->categorys->add($name, $description)){
                header('location: ?act=category');
            }else{
                echo "Lỗi";
            }
        }
    }
    public function delete_category(){
        $id =  $_GET['id'];
        if($this->categorys->delete($id)){
            header('location: ?act=category');
        }else{
            echo "loi";
        }
    }

    public function form_update_category($id){
        $id = $_GET['id'];
        $category_value = $this->categorys->getCategorybyID($id);
        if($category_value){
            $category_value = $category_value[0];
            require_once './views/form/update_category.php';
        } else {
            echo "Không tìm thấy danh mục";
        }
    }
    public function update_category(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = $_POST['id'];
            $name = $_POST['name'];
            $description = $_POST['description'];
            if($this->categorys->update($id, $name, $description)){
                header('location: ?act=category');
            }else{
                echo "loi";
            }
        }
    }
}


