<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/products_detail.css">
    <link rel="stylesheet" href="../public/css/clients.css">
    
    <style>

    </style>
</head>

<body>
    <div class="container">
        <div class="product-detail">
            <div class="product-image">
                <img src=".<?php echo $product['img']; ?>" alt="<?php echo $product['name_product']; ?>" />
            </div>
            <div class="bottom-detail">
                <div class="product-info">
                    <p class="name-product text_detail"><?php echo $product['name_product']; ?></p>
                    <div class="bao_hanh">
                        <p>Bảo hành 12 tháng</p>
                    </div>
                    <p class="sale">Deal: $<?php echo $product['sale']; ?></p>
                    <p class="price">Giá gốc: $<?php echo $product['price']; ?></p>
                    <p class="quantity">Quantity: <?php echo $product['quantity']; ?></p>
                    <p class="views">Views: <?php echo $product['views']; ?></p>
                    <div class="buttons">
                        <button class="buy-now">Mua ngay</button>
                        <button class="add-to-cart">Thêm vào giỏ hàng</button>
                    </div>
                </div>

            </div>


            <div class="comments">
                <?php if (!empty($_SESSION['user_id'])) : ?>

                    <span class="text_detail">Bình Luận</span>
                    <form method="post" action="?act=add_comment" enctype="multipart/form-data">
                        <textarea name="content" placeholder="Write your comment here..." required></textarea>
                        <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                        <input type="hidden" name="user_id">
                        <button type="submit" class="submit-comment">Submit</button>
                    </form>

                <?php else : ?>
                    <span class="text_detail">Bình Luận</span>
                    <textarea name="content" placeholder="Write your comment here..." required></textarea>
                    <button type="submit" class="submit-comment" id="btn">Submit</button>
                <?php endif; ?>

                <div class="comment-list">
                    <?php foreach ($comments as $comment) : ?>
                        <div class="comment">
                            <div class="avt">
                                <img src="<?php echo $comment['avatar']; ?>" alt="avatar">
                            </div>
                            <div class="content-comment">
                                <p><strong><?php echo ($comment['username']); ?>:</strong> <?php echo ($comment['content']); ?></p>
                                <div class="date">
                                    <span><?php echo ($comment['created_at']); ?></span>    
                                </div>
                            </div>

                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="description ">
                <span class="text_detail">Thông số kỹ thuật</span>
                <div class="specifications">
                    <p>Hệ điều hành: <?php echo $product['description_1']; ?></p>
                    <p class="screen-size">Kích thuớc màn hình: <?php echo $product['screen_size']; ?> inch</p>
                    <p>CPU: <?php echo $product['description_2']; ?></p>
                    <p>Ram: <?php echo $product['description_3']; ?></p>
                    <p>Dung Lương: <?php echo $product['description_4']; ?></p>
                    <p><?php echo $product['description_5']; ?></p>
                    <p><?php echo $product['description_6']; ?></p>
                    <p><?php echo $product['description_7']; ?></p>
                </div>
            </div>
        </div>
    </div>
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <p>Đăng nhập để bình luận</p>           
            <ion-icon name="thunderstorm-outline"></ion-icon>
            <a href="?act=login"><button>Đăng nhập</button></a>
        </div>
    </div>
    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("btn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>

</html>