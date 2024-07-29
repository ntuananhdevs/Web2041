<article>
    <div class="content">
        <div class="products-phone" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000">
            <?php foreach ($list_phone as $product) : ?>
                <div class="box-product-phone">
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
                                <a href="?act=product_detail&id=<?php echo $product['id']; ?>"><?php echo $product['name_product']; ?> | <?php echo  $product['description_4'] ?>GB</a>
                            </div>
                            <div class="viewsp">
                                <ion-icon name="eye-outline"></ion-icon>
                                <p><?php echo $product['views']; ?></p>
                            </div>

                        </div>
                    </div>
                    <div class="price">
                        <span>Giá khuyến mãi </span>
                        <p><?php echo number_format(floatval(str_replace('.', '', $product['sale'])), 0, ',', '.'); ?>đ</p>
                        <div class="underline-phone">
    
                            <p><?php echo number_format(floatval(str_replace('.', '', $product['price'])), 0, ',', '.'); ?>đ</p>
                            <?php
                            $price = floatval(str_replace('.', '', $product['price']));
                            $sale = floatval(str_replace('.', '', $product['sale']));
                            $discountPercentage = (($price - $sale) / $price) * 100;
                            ?>
                            <span>TIẾT KIỆM <?php echo round($discountPercentage, 2); ?>%</span>
                        </div>
                    </div>

                    <div class="btn-box-phone">
                        <div class="mua-phone">
                            <a href="#"><button>Mua ngay</button></a>
                        </div>
                        <div class="chitiet-phone">
                            <a href="?act=product_detail&id=<?php echo $product['id']; ?>"><button>Xem chi tiết</button></a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</article>