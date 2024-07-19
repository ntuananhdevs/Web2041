<?php
include '../admin/views/layout/header.php';

require_once '../commons/env.php';
require_once '../commons/core.php';

require_once '../admin/controllers/ProductController.php';
require_once '../admin/controllers/UserController.php';


require_once '../admin/models/products.php';
require_once '../admin/models/category.php';
require_once '../admin/models/user.php';

// Route
$act = $_GET['act'] ?? '/';
$users = new UserController();
$product = new ProductController();
match ($act) {
    //products
    'products' => $product->view_products(),
    'form_add_product' => $product->form_add(),
    'post_product' => $product->add_products(),
    'form_update_product' => $product->form_update($_GET['id']),
    'update_product' => $product->update_products(),
    'delete_product' => $product->delete_products(),

    //category
    'category' => $product->view_category(),

    //users
    'user' => $users->view_users(),
};

include '../admin/views/layout/footer.php';


?>