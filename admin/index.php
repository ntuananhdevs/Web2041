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

if ($act == 'login') {
    $auth->login(); 
} else {
    $auth->check_login();
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
        'form_add_category' => $product->form_add_category(),
        'post_category'=> $product->add_category(),
        'delete_category'=> $product->delete_category(),
        'form_update_category'=> $product->form_update_category($_GET['id']),
        'update_category'=> $product->update_category(),


        'users' => $user->view_users(),
        'form_add_user' => $user->form_add_user(),
        'post_users' => $user->add_users(),

        'form_update_user' => $user->form_update_user($_GET['id']),
        'update_users' => $user->update_users(),
        'delete_user' => $user->delete_users(),
        'logout' => $auth->logout(),
        default => $home->views_home()
    };

    include '../admin/views/layout/footer.php';
}
?>
