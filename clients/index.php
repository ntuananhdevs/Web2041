<?php
session_start();

require_once '../commons/env.php';
require_once '../commons/core.php';

require_once '../clients/controllers/HomeController.php';

require_once '../clients/models/home.php';
require_once '../clients/models/products.php';
include '../clients/views/layout/header.php';

// Route
$act = $_GET['act'] ?? '/';
$home = new HomeController();
match ($act) {
    '/' => $home->view_home(),
    'product_detail' => $home->product_detail(),

    'laptop' => $home->view_laptop(),

    'phone' => $home->view_phone(),
    'search' => $home->view_result(),

    
}; 

include '../clients/views/layout/footer.php';
