<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Sản Phẩm</title>
    <link rel="stylesheet" href="../public/css/form.css">
    <style>
        
    </style>
</head>
<body>
    <div class="content-form">
        <div class="form-container">
            <h1>Cập Nhật Sản Phẩm</h1>

            <form action="?act=update_product" method="POST" enctype="multipart/form-data">

            <input type="hidden" name="id" value="<?php echo $product_value['id'];?>">

                <div class="thongtinsanpham">
                    <div class="form-row">
                        <label for="category">Category</label>
                        <select name="category" id="category">
                            <?php foreach ($list_category as $category): ?>
                            <option value="<?php echo $category['id']; ?>" <?php echo ($category['id'] == $product_value['category_id']) ? 'selected' : ''; ?>>
                                <?php echo $category['name']; ?>
                             </option>
                             <?php endforeach; ?>
                        </select>

                    </div>
                    <div class="form-row">
                        <label for="name_product">Tên Sản Phẩm</label>
                        <input type="text" name="name_product" id="name_product" placeholder="Tên Sản Phẩm" value="<?php echo $product_value['name_product'];?>">
                    </div>
                    <div class="form-row">
                        <label for="gia">Giá</label>
                        <input type="text" name="price" id="gia" placeholder="Giá Gốc" value="<?php echo $product_value['price'];?>">
                    </div>
                    
                    <div class="form-row">
                        <label for="sale">Giá Khuyến Mãi</label>
                        <input type="text" name="sale" id="sale" placeholder="Giá Khuyến Mãi" value="<?php echo $product_value['sale'];?>">
                    </div>
                    
                    <div class="form-row">
                        <label for="quantity">Số Lượng</label>
                        <input type="number" name="quantity" id="quantity" placeholder="Số Lượng" value="<?php echo $product_value['quantity'];?>">
                    </div>
                    
                    <div class="form-row">
                        <label for="hedieuhanh">Hệ Điều Hành</label>
                        <input type="text" name="description_1" id="hedieuhanh" placeholder="Hệ Điều Hành" value="<?php echo $product_value['description_1'];?>">
                    </div>
                   
                    <div class="form-row">
                        <label for="cpu">CPU</label>
                        <input type="text" name="description_2" id="cpu" placeholder="CPU" value="<?php echo $product_value['description_2'];?>">
                    </div>
                    
                    <div class="form-row">
                        <label for="gpu">GPU</label>
                        <input type="text" name="description_3" id="gpu" placeholder="GPU" value="<?php echo $product_value['description_3'];?>">
                    </div>
                    
                    <div class="form-row">
                        <label for="rom">Bộ Nhớ Trong</label>
                        <input type="text" name="description_4" id="rom" placeholder="Bộ Nhớ Trong" value="<?php echo $product_value['description_4'];?>">
                    </div>
                    
                    <div class="form-row">
                        <label for="pin">Dung Lượng Pin</label>
                        <input type="text" name="description_5" id="pin" placeholder="Dung Lượng Pin" value="<?php echo $product_value['description_5'];?>">
                    </div>
                    
                    <div class="form-row">
                        <label for="trongluong">Trọng Lượng</label>
                        <input type="text" name="description_6" id="trongluong" placeholder="Trọng Lượng" value="<?php echo $product_value['description_6'];?>">
                    </div>
                    
                    <div class="form-row">
                            <label for="manhinh">Kích Thước Màn Hình</label>
                            <input type="number" name="screen_size" id="manhinh" placeholder="Kích Thước Màn Hình" value="<?php echo $product_value['screen_size'];?>">
                        </div>
                </div>
                
                <div class="bottom">
                    <div class="img">
                        <label for="img">Ảnh Sản Phẩm</label>
                        <input type="file" name="img" id="img" onchange="previewImage(event)" value="<?php echo $product_value['img']; ?>">
                        <input type="hidden" name="old_img" value="<?php echo $product_value['img'];?>">

                        <label for="preview-img">Xem Trước</label>
                        <div class="preview-img" id="preview-img">
                            <img src=".<?php echo $product_value['img']; ?>" alt="Ảnh xem trước">
                        </div>
                    </div>
                    <div class="mota">
                        <label for="description">Mô tả chi tiết</label>
                        <textarea name="description_7" id="description" class="description" placeholder="Nhập mô tả chi tiết sản phẩm"><?php echo $product_value['description_7'];?></textarea>
                    </div>
                </div>
                
                <button type="submit">Thêm</button>
            </form>
        </div>
    </div>
    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('preview-img');
                output.innerHTML = '<img src="' + reader.result + '" alt="Ảnh xem trước">';
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</body>
</html>
