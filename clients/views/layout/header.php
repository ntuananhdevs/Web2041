<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?? 'Default Title'; ?></title>
    <link rel="icon" type="image/svg" href="../public/img/header-img/rog_hover.svg" />
    <link rel="stylesheet" href="../public/css/clients.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</head>
<body>
    <nav class="no-blur" >
        <div class="header-nav">
            <div class="header-logo">
                <div class="logo-header">
                    <a href="#">
                        <img src="../public/img/header-img/ROG_normal.svg" alt="">
                        <img src="../public/img/header-img/rog_hover.svg" alt="">
                    </a>
                </div>
                <div class="logo-header">
                    <a href="#">
                        <img src="../public/img/header-img/ProArt.svg" alt="">
                        <img src="../public/img/header-img/art_hover.svg" alt="">
                    </a>
                </div>
                <div class="logo-header">
                    <a href="#">
                        <img src="../public/img/header-img/ioT.svg" alt="">
                        <img src="../public/img/header-img/ioT_hover.svg" alt="">
                    </a>
                </div>
            </div>
            <div class="header-right">
                <a href="#">Sự kiện</a>
                <a href="#">Gaming</a>
                <a href="#">Doanh Nghiệp</a>
            </div>
        </div>
        <div class="nav-menu ">
            <div class="logo-nav">
                <a href="?act=/">
                    <img src="../public/img/header-img/AsusTek.png" alt="">
                </a>
            </div>
            <div class="nav-center">
                <a href="?act=laptop">Laptop</a>
                <a href="?act=phone">Thiết bị di động</a>
                <a href="#">Màn Hình / Máy Bàn</a>
                <a href="#">Bo Mạch Chủ / Linh Kiện</a>
                <a href="#">Thiết Bị Mạng / IoT / Servers</a>
                <a href="#">Phụ Kiện</a>
            </div>
            <div class="nav-right">
                <div class="text">
                    <a href="#">Mua hàng</a>
                    <a href="#">Hỗ Trợ</a>
                </div>
                <div class="icon-nav">
                    <ion-icon name="search-outline" id="searchIcon"></ion-icon>
                    <a href="#"><ion-icon name="cart-outline"></ion-icon></a>

                    <div class="search-overlay" id="searchOverlay">
                        <div class="search-nav">
                            <div class="inputsearch">
                                <ion-icon name="search-outline"></ion-icon>
                                <form method="GET" action="?act=search">
                                    <input type="text" name="search" placeholder="Tìm kiếm" value="<?php echo htmlspecialchars($_GET['search'] ?? ''); ?>">
                                    <input type="hidden" name="act" value="search">
                                </form>
                            </div>
                            <ul class="list-search">
                                <p>Liên Kết Nhanh</p>

                                <li><a href="?act=laptop"><ion-icon name="arrow-forward-outline"></ion-icon>Laptop</a></li>
                                <li><a href="?act=phone"><ion-icon name="arrow-forward-outline"></ion-icon>Dien Thoai</a></li>
                                <li><a href="#"><ion-icon name="arrow-forward-outline"></ion-icon>AirPods</a></li>
                                <li><a href="#"><ion-icon name="arrow-forward-outline"></ion-icon>AirTag</a></li>
                                <li><a href="#"><ion-icon name="arrow-forward-outline"></ion-icon>Apple Trade In</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="dropdown">
                        <a href="#" id="userIcon"><ion-icon name="person-outline"></ion-icon></a>
                        <div class="dropdown-menu">

                            <?php if (isset($_SESSION['user_id'])) : ?>
                                <div class="hi">
                                <p><ion-icon name="person-circle-outline"></ion-icon>Xin chào <?php echo $_SESSION['username']; ?></p>
                                </div>
                                <a href="?act=profile">Tài khoản của tôi</a>
                                <a href="?act=orders">Kiểm tra đơn hàng</a>
                                <a href="?act=logout">Đăng xuất</a>
                            <?php else : ?>

                                <a href="?act=login">Đăng nhập</a>
                                <a href="?act=profile">Tài khoản của tôi</a>
                                <a href="?act=orders">Kiểm tra đơn hàng</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <script src="./public/js/main.js"></script>
    <script>AOS.init();</script>