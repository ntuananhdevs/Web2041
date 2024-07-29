<?php

require_once './commons/env.php';
require_once './commons/core.php';

// Kiểm tra xem biến 'act' có tồn tại và có giá trị là '/' không
if(!isset($_GET['act']) || $_GET['act'] == '/') {
    header("Location: ./clients/index.php");
} else {
    header("Location: ./admin/index.php");
}