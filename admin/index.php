<?php
include '../admin/views/layout/header.php';

require_once '../commons/env.php';
require_once '../commons/core.php';

require_once '../admin/controllers/ProductController.php';


require_once '../admin/models/products.php';
require_once '../admin/models/category.php';

// Route
$act = $_GET['act'] ?? '/';
$product = new ProductController();
match ($act) {

    'products' => $product->view_products(),
    'form_add_product' => $product->form_add(),
    'post_product' => $product->add_products(),
    'form_update_product' => $product->form_update($_GET['id']),
    'update_product' => $product->update_products(),
    'delete_product' => $product->delete_products(),

    'category' => $product->view_category(),
};

include '../admin/views/layout/footer.php';


?>