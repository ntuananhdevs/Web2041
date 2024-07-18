<?php
session_start();
include '../clients/views/layout/header.php';

require_once '../commons/env.php';
require_once '../commons/core.php';

require_once '../clients/controllers/HomeController.php';

require_once '../clients/models/home.php';

// Route
$act = $_GET['act'] ?? '/';
$home = new HomeController();
match ($act) {
    '/' => $home->view_home(),
    'product_detail' => $home->product_detail(),
}; 

include '../clients/views/layout/footer.php';
