<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
    <nav>
        <div class="logo">
            <img src="../public/img/logo2.png" alt="logo">
        </div>
        <div class="search">
            <form action="">
                <input type="text" placeholder="Search">
            </form>
        </div>
        <div class="menu">
            <ul>
                <li><a href="#" class="menu-active"><ion-icon name="home-outline"></ion-icon>Home</a></li>
                <li><a href="#" class="menu-active"><ion-icon name="laptop-outline"></ion-icon>Product</a></li>
                <li><a href="#" class="menu-active"><ion-icon name="cart-outline"></ion-icon>Cart</a></li>
                <li><a href="#" class="menu-active"><ion-icon name="log-out-outline"></ion-icon>Logout</a></li>
            </ul>   
        </div>
    </nav>
    <div class="slide-show">
        <div class="list-img">
            <div class="item">
                <img src="../public/img/slidesh2.jpg" alt="">
            </div>
            <div class="item">
                <img src="../public/img/slidesh3.jpg" alt="">
            </div>
            <div class="item">
                <img src="../public/img/slidesh4.jpg" alt="">
            </div>
            <div class="item">
                <img src="../public/img/slidesh5.jpg" alt="">
            </div>
        </div>
        <div class="btn">
                <button id="prev"><ion-icon name="arrow-back-outline"></ion-icon></button>
                <button id="next"><ion-icon name="arrow-forward-outline"></ion-icon></button>
        </div>
    </div>

    <script src="../public/js/main.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>