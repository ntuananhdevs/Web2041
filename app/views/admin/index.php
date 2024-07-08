<?php
include '../../layout/header.php';

require_once '../../commons/env.php';
require_once '../../commons/function.php';

require_once '../../controllers/UsersController.php';
require_once '../../controllers/ProductController.php';

require_once '../../models/products.php';
require_once '../../models/Users.php';

// Route
$act = $_GET['act'] ?? '/';
$user = new UsersController();
$product = new ProductController();
match ($act) {

    'user' => $user->users(),
    'products' => $product->products(),
    'add_product' => $product->add_products(),
    'post_product' => $product->post_products(),
    
};

include '../../layout/footer.php';
