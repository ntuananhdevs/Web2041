<?php
require_once '../commons/env.php';
require_once '../commons/core.php';

require_once '../admin/controllers/HomeController.php';
require_once '../admin/controllers/ProductController.php';
require_once '../admin/controllers/UserController.php';
require_once '../admin/controllers/AuthController.php';

require_once '../admin/models/products.php';
require_once '../admin/models/category.php';
require_once '../admin/models/user.php';

$home = new HomeController();
$user = new UserController();
$product = new ProductController();
$auth = new AuthController();

// Route
$act = $_GET['act'] ?? '/'; 

if ($act === 'login') {
    $auth->login(); 
}
else {
    $auth->checkLogin(); 
    include '../admin/views/layout/header.php';
    match ($act) {
        '/' => $home->views_home(),   
        'products' => $product->view_products(),
        'form_add_product' => $product->form_add(),
        'post_product' => $product->add_products(),
        'form_update_product' => $product->form_update($_GET['id']),
        'update_product' => $product->update_products(),
        'delete_product' => $product->delete_products(),
        'category' => $product->view_category(),
        'users' => $user->view_users(),
        default => $home->views_home()
    };

    include '../admin/views/layout/footer.php';
}
?>
