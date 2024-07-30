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
                                <img src=".<?php echo $comment['avatar']; ?>" alt="avatar">
                            </div>
                            <div class="name-date">
                                <div class="header-comment">
                                    <div class="name-user">
                                        <p><?php echo ($comment['username']); ?></p>
                                    </div>
                                    <div class="date">
                                        <p><?php echo htmlspecialchars($comment['created_date'], ENT_QUOTES, 'UTF-8'); ?></p>
                                    </div>
                                </div>
                                <div class="contents">
                                    <p><?php echo ($comment['content']); ?></p>
                                </div>
                                <div class="icon">
                                    <div class="comment__operate">
                                        <i class="comment__operate__icon like fas fa-thumbs-up"></i>
                                    </div>
                                    <div class="comment__operate">
                                        <i class="comment__operate__icon reply fas fa-reply"></i>
                                        <p>Reply</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="description">
                <span class="text-detail">Thông số kỹ thuật</span>
                <div class="specifications">
                    <div class="spec-item">
                        <div class="spec-label">Hệ điều hành:</div>
                        <div class="spec-value"><?php echo $product['description_1']; ?></div>
                    </div>
                    <div class="spec-item">
                        <div class="spec-label">Kích thước màn hình:</div>
                        <div class="spec-value"><?php echo $product['screen_size']; ?> inch</div>
                    </div>
                    <div class="spec-item">
                        <div class="spec-label">CPU:</div>
                        <div class="spec-value"><?php echo $product['description_2']; ?></div>
                    </div>
                    <div class="spec-item">
                        <div class="spec-label">Ram:</div>
                        <div class="spec-value"><?php echo $product['description_3']; ?></div>
                    </div>
                    <div class="spec-item">
                        <div class="spec-label">Dung lượng:</div>
                        <div class="spec-value"><?php echo $product['description_4']; ?></div>
                    </div>
                    <div class="spec-item">
                        <div class="spec-label">Camera:</div>
                        <div class="spec-value"><?php echo $product['description_5']; ?></div>
                    </div>
                    <div class="spec-item">
                        <div class="spec-label">Pin:</div>
                        <div class="spec-value"><?php echo $product['description_6']; ?></div>
                    </div>
                    <div class="spec-item">
                        <div class="spec-label">Trọng lượng:</div>
                        <div class="spec-value"><?php echo $product['description_7']; ?></div>
                    </div>
                </div>
            </div>



        </div>
    </div>
    <div id="myModal" class="modal">
        <div class="modal-content" data-aos="fade-down" data-aos-delay="100" data-aos-duration="1000">
            <span class="close">&times;</span>
            <h2>Đăng nhập</h2>

            <div class="login-fb">
                <div class="comment__operate" id="fb-login-btn">
                    <i class="comment__operate__icon fab fa-facebook"></i>
                    <span>Đăng nhập bằng Facebook</span>
                </div>
            </div>
            <div class="login-gg">
                <div class="comment__operate">
                    <i class="comment__operate__icon gg -google"></i>
                    <span>Đăng nhập bằng Google</span>
                </div>
            </div>
            <a href="?act=login"><button>Đăng nhập</button></a>

            <div class="register">
                <p>Bạn chưa có tài khoản?</p>
                <a href="?act=register">register</a>
            </div>
        </div>
    </div>
    <script>
        //modal
        var modal = document.getElementById("myModal");

        var btn = document.getElementById("btn");

        var span = document.getElementsByClassName("close")[0];

        btn.onclick = function() {
            modal.style.display = "block";
        }
        span.onclick = function() {
            modal.style.display = "none";
        }
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                appId      : '849025356764898',
                cookie     : true,
                xfbml      : true,
                version    : 'v20.0'
            });

            FB.AppEvents.logPageView();

            document.getElementById('fb-login-btn').onclick = function() {
                FB.login(function(response) {
                    if (response.status === 'connected') {
                        // Người dùng đã đăng nhập thành công
                        var accessToken = response.authResponse.accessToken;
                        console.log('Access Token:', accessToken);

                        // Gọi API Facebook để lấy thông tin người dùng
                        FB.api('/me', {fields: 'name,email,picture'}, function(response) {
                            console.log('Successful login for: ' + response.name);
                            console.log('Email: ' + response.email);
                            console.log('Profile picture: ' + response.picture.data.url);
                            
                            // Gửi thông tin người dùng đến server để xử lý đăng nhập
                            fetch('/your-backend-endpoint', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json'
                                },
                                body: JSON.stringify({
                                    name: response.name,
                                    email: response.email,
                                    picture: response.picture.data.url,
                                    accessToken: accessToken
                                })
                            }).then(res => res.json()).then(data => {
                                console.log('Server response:', data);
                                // Xử lý dữ liệu từ server, ví dụ: chuyển hướng, lưu thông tin người dùng, vv.
                            }).catch(error => console.error('Error:', error));
                        });
                    } else {
                        console.log('User cancelled login or did not fully authorize.');
                    }
                }, {scope: 'public_profile,email'});
            };
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "https://connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
</body>

</html>