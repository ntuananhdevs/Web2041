<header>
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
        <div class="text-sukien">
            <h1>Chương trình và Sự kiện</h1>
        </div>
            <div class="box-sukien">
                <div class="box">
                    <img src="../public/img/sukien1.png" alt="">
                    <div class="text-box">
                        <span>Review sản phẩm - Nhận quà liền tay</span>
                    </div>
                </div>
                <div class="box">
                    <img src="../public/img/sukien2.png" alt="">
                    <div class="text-box">
                        <span>Ưu đãi ASUS Education</span>
                    </div>
                </div>
                <div class="box">
                    <img src="../public/img/sukien3.png" alt="">
                    <div class="text-box">
                        <span>Mua Laptop ASUS nhận ngay gói Adobe Creative Cloud</span>
                    </div>
                </div>
            </div>

    </header>
    <article>
        <div class="content">
            <div class="sanphamnoibat">
                <h2>Sản Phẩm Nổi Bật</h2>
            </div>
            <div class="products">
            <?php foreach ($top_products as $product): ?>
                <div class="box-product">
                    <div class="header-box">
                        <div class="deal">
                            <p>DEAL</p>
                        </div>
                        <div class="img-product">
                            <img src=".<?php echo $product['img']; ?>" alt="">
                        </div>                        
                        <div class="text-box">
                            <div class="name-sanpham">
                                <p><?php echo $product['screen_size']; ?>"</p>
                                <a href="?act=product_detail&id=<?php echo $product['id']; ?>"><?php echo $product['name_product']; ?></a>
                            </div>
                            <div class="viewsp">
                            <ion-icon name="eye-outline"></ion-icon>
                            <p><?php echo $product['views'];?></p>
                            </div>
                        </div>
                    </div>
                    <div class="price">
                        <span>Giá khuyến Mãi </span>
                        <p><?php echo $product['sale']; ?>đ</p>
                        <div class="underline">
                            <p><?php echo $product['price']; ?>đ</p>
                            <span>TIET KIEM xx%</span>
                        </div>
                    </div>
                    <div class="description-box">
                        <ul>
                            <?php if (!empty($product['description_1'])): ?>
                                <li><?php echo $product['description_1']; ?></li>
                            <?php endif; ?>
                            <?php if (!empty($product['description_2'])): ?>
                                <li><?php echo $product['description_2']; ?></li>
                            <?php endif; ?>
                            <?php if (!empty($product['description_3'])): ?>
                                <li><?php echo $product['description_3']; ?></li>
                            <?php endif; ?>
                            <?php if (!empty($product['description_4'])): ?>
                                <li><?php echo $product['description_4']; ?></li>
                            <?php endif; ?>
                            <?php if (!empty($product['description_5'])): ?>
                                <li><?php echo $product['description_5']; ?></li>
                            <?php endif; ?>
                            <?php if (!empty($product['description_6'])): ?>
                                <li><?php echo $product['description_6']; ?></li>
                            <?php endif; ?>
                            <?php if (!empty($product['description_7'])): ?>
                                <li><?php echo $product['description_7']; ?></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <div class="btn-box">
                        <div class="mua">
                            <a href="#"><button>Mua ngay</button></a>
                        </div>
                        <div class="chitiet">
                            <a href="?act=product_detail&id=<?php echo $product['id']; ?>"><button>Xem chi tiết</button></a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </article>