<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Detail</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link tới file CSS -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1300px;
            margin: 0 auto;
            padding: 20px;
        }

        .product-detail {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding-left: 20px;
        }

        .product-image img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .product-info {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .product-info h4 {
            font-size: 2em;
            margin-bottom: 10px;
            color: #333;
        }

        .product-info p {
            font-size: 1.1em;
            color: #555;
            line-height: 1.6;
            margin: 5px 0;
        }

        .product-info .sale {
            font-weight: 600;
            color: rgb(199, 66, 0);
            font-family: TTNormsProMedium, MyriadSemibold, "Segoe UI", Arial, "PingFang TC", "Microsoft JhengHei", sans-serif;
            font-size: 25px;
        }

        .product-info .price {
            text-decoration: line-through;
            color: #888;
        }

        .product-info .buttons {
            margin: 20px 0;
            display: flex;
            align-items: center;
            width: 400px;
        }

        .product-info .buttons button {
            background-color: #e74c3c;
            color: #fff;
            border: none;
            padding: 10px 20px;
            margin-right: 10px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
            transition: background-color 0.3s;
        }

        .product-info .buttons button:hover {
            background-color: #c0392b;
        }

        .description h2 {
            margin-top: 20px;
            font-size: 1.8em;
            color: #333;
        }

        .description p {
            margin: 10px 0;
        }

        .comments {
            flex: 1;
        }

        .comments h2 {
            margin-top: 20px;
            font-size: 1.8em;
            color: #333;
        }

        .comments textarea {
            max-width: 600px;
            width: 600px;
            min-width: 600px;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ddd;
            font-size: 1em;
        }

        .comments .submit-comment {
            background-color: #3498db;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
            transition: background-color 0.3s;
        }

        .comments .submit-comment:hover {
            background-color: #2980b9;
        }

        .comments .comment-list {
            margin-top: 20px;
        }

        .comments .comment {
            background-color: #f1f1f1;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .comments .comment p {
            margin: 0;
            font-size: 1em;
        }

        @media (max-width: 750px) {
            .product-detail {
                grid-template-columns: 1fr;
            }

            .product-info h4 {
                font-size: 1.8em;
            }

            .product-info p {
                font-size: 1em;
            }

            .product-info .sale {
                font-size: 1.3em;
            }
        }

        .name-product {
            font-weight: bold;
            color: rgb(199, 66, 0);
            display: block;
            font-family: TTNormsProMedium, MyriadSemibold, "Segoe UI", Arial, "PingFang TC", "Microsoft JhengHei", sans-serif;
            font-size: 25px;
        }

        .bottom-detail {
            display: flex;
        }

        .bottom-detail .product-info {
            width: 50%;
        }

        .bottom-detail .comments {
            width: 50%;
        }
        .product-image, .bottom-detail, .comments, .description{
            margin-left: 70px;
        }
        .description{
            list-style: upper-alpha;
        }
        .description {
    margin-top: 20px;
}

.description h2 {
    font-size: 1.8em;
    color: #333;
}

.specifications {
    margin-left: 10px; /* Để tạo khoảng cách gạch đầu dòng */
}

.specifications p {
    text-indent: 20px; /* Định dạng dòng đầu dòng */
    margin: 5px 0;
}
.text_detail{
    font-weight: bold;
            color: #888;
            display: block;
            font-family: TTNormsProMedium, MyriadSemibold, "Segoe UI", Arial, "PingFang TC", "Microsoft JhengHei", sans-serif;
            font-size: 18px;
}
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
                    <p>Bảo hành 12 tháng</p>
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
            <div class="comments ">
                    <span class="text_detail">Binh Luận</span>
                    <textarea placeholder="Write your comment here..."></textarea>
                    <button class="submit-comment">Submit</button>
                    <!-- Hiển thị các bình luận ở đây -->
                    <div class="comment-list">
                        <!-- Ví dụ về bình luận -->
                        <div class="comment">
                            <p><strong>User1:</strong> Great product!</p>
                        </div>
                    </div>
                </div>
                <div class="description ">
                    <span class="text_detail">Thông số kỹ thuật</span>
                    <div class="specifications">
                        <p><?php echo $product['description_1']; ?></p>
                        <p class="screen-size">Screen Size: <?php echo $product['screen_size']; ?></p>
                        <p><?php echo $product['description_2']; ?></p>
                        <p><?php echo $product['description_3']; ?></p>
                        <p><?php echo $product['description_4']; ?></p>
                        <p><?php echo $product['description_5']; ?></p>
                        <p><?php echo $product['description_6']; ?></p>
                        <p><?php echo $product['description_7']; ?></p>
                    </div>
            </div>
        </div>
    </div>
</body>
</html>
