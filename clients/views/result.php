<div class="content" style="margin-top: 0;">
    <div class="products">
        <?php if (empty($results)): ?>
            <img src="../public/img/404-2.png" alt="" width="1240px" >
        <?php else: ?>
            <?php foreach ($results as $product): ?>
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
                                <p><?php echo $product['views']; ?></p>
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
        <?php endif; ?>
    </div>
</div>
