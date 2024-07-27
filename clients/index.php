<?php

require_once '../commons/env.php';
require_once '../commons/core.php';

require_once '../clients/controllers/HomeController.php';
require_once '../clients/controllers/AuthController.php';

require_once '../clients/models/home.php';
require_once '../clients/models/products.php';
require_once '../clients/models/auth.php';

// Route
$act = $_GET['act'] ?? '/';
$home = new HomeController();
$auth = new AuthController();

$title = match ($act) {
    'login' => 'Login',
    'register' => 'Register',
    'logout' => 'Logout',
    '/' => 'Home',
    'product_detail' => 'Product Details',
    'laptop' => 'Laptops',
    'phone' => 'Phones',
    'search' => 'Search Results',
    'add_comment' => 'Add Comment',
    default => 'Home',
};

if ($act == 'login') {
    $auth->login();
} elseif ($act == 'register') {
    $auth->register();
} elseif ($act == 'logout') {
    $auth->logout();
} else {
    include '../clients/views/layout/header.php'; // Include header with dynamic title
    match ($act) {
        '/' => $home->view_home(),
        'product_detail' => $home->product_detail(),
        'laptop' => $home->view_laptop(),
        'phone' => $home->view_phone(),
        'search' => $home->view_result(),
        'add_comment' => $home->add_comment(),
        default => $home->view_home(),
    };
    include '../clients/views/layout/footer.php';
}
