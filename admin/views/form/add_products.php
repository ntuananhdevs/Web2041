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
            <h1>Thêm Sản Phẩm</h1>

            <form action="?act=post_product" method="POST" enctype="multipart/form-data">

                <div class="thongtinsanpham">
                    <div class="form-row">
                        <label for="category">Category</label>
                        <select name="category" id="category">
                        <?php foreach ($list_category as $category): ?>
                            <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                        <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-row">
                        <label for="name_product">Tên Sản Phẩm</label>
                        <input type="text" name="name_product" id="name_product" placeholder="Tên Sản Phẩm">
                    </div>
                    <div class="form-row">
                        <label for="hedieuhanh">Hệ Điều Hành</label>
                        <input type="text" name="description_1" id="hedieuhanh" placeholder="Hệ Điều Hành">
                    </div>

                    <div class="form-row">
                        <label for="sale">Giá</label>
                        <input type="text" name="sale" id="price" placeholder="Giá Gốc">
                    </div>

                    <div class="form-row">
                            <label for="manhinh">Kích Thước Màn Hình</label>
                            <input type="text" name="screen_size" id="manhinh" placeholder="Kích Thước Màn Hình">
                        </div>
  
                        <div class="form-row">
                        <label for="cpu">CPU</label>
                        <input type="text" name="description_2" id="cpu" placeholder="CPU">
                    </div>

                    <div class="form-row">
                        <label for="gia">Giá Khuyến Mãi</label>
                        <input type="text" name="sale" id="gia" placeholder="Giá Khuyến Mãi">
                    </div>

                    
                    <div class="form-row">
                        <label for="gpu">GPU</label>
                        <input type="text" name="description_3" id="gpu" placeholder="GPU">
                    </div>
                    
                    <div class="form-row">
                        <label for="rom">Bộ Nhớ Trong</label>
                        <input type="text" name="description_4" id="rom" placeholder="Bộ Nhớ Trong">
                    </div>
                    
                    <div class="form-row">
                        <label for="pin">Số Lượng</label>
                        <input type="number" name="quantity"  placeholder="Số Lượng">
                    </div>
                    
                    <div class="form-row">
                        <label for="trongluong">Trọng Lượng</label>
                        <input type="text" name="description_6" id="trongluong" placeholder="Trọng Lượng">
                    </div>
                    
                    <div class="form-row">
                        <label for="quantity">Description 5</label>
                        <input type="number" name="description_5" id="quantity" placeholder="description 5">
                    </div>
                </div>
                
                <div class="bottom">
                    <div class="img">
                        <label for="img">Ảnh Sản Phẩm</label>
                        <input type="file" name="img" id="img" required onchange="previewImage(event)">
                
                        <label for="preview-img">Xem Trước</label>
                        <div class="preview-img" id="preview-img"></div>
                    </div>
                    <div class="mota">
                        <label for="description">Mô tả chi tiết</label>
                        <textarea name="description_7" id="description" class="description" placeholder="Nhập mô tả chi tiết sản phẩm"></textarea>
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
