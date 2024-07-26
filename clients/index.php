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

if($act == 'login'){
    $auth->login();
}else if($act == 'register'){
    $auth->register();
}else if($act == 'logout'){
    $auth->logout();
}else{
include '../clients/views/layout/header.php';
match ($act) {
    '/' => $home->view_home(),
    'product_detail' => $home->product_detail(),
    'laptop' => $home->view_laptop(),
    'phone' => $home->view_phone(),
    'search' => $home->view_result(),
    default => $home->view_home(),
}; 

include '../clients/views/layout/footer.php';
}