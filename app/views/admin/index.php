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
    // '/' => include '../views/users.php',
    'user' => $user->users(),
    // 'category' => include 'category.php',
    'products' => $product->products(),
    // 'comments' => include 'comments.php',
};

include '../../layout/footer.php';
