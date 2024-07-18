
<div class="container">
    <div class="row">
        <table class="table">
            <h2>Products</h2>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Category</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Screen_size</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Sale</th>
                    <th>description 1</th>
                    <th>description 2</th>
                    <th>description 3</th>
                    <th>description 4</th>
                    <th>description 5</th>
                    <th>description 6</th>
                    <th>description 7</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($list_products as $key => $value) :?>
                <tr>
                    <td><?php echo $value['id'] ?></td>
                    <td><?php echo $value['category_name'] ?></td>
                    <td><img src=".<?php echo $value['img'] ?>" alt="img" width="100" height="70" object-fit="cover"></td>
                    <td><?php echo $value['name_product'] ?></td>
                    <td><?php echo $value['screen_size'] ?></td>
                    <td><?php echo $value['quantity'] ?></td>
                    <td><?php echo $value['price'] ?></td>
                    <td><?php echo $value['sale'] ?></td>
                    <td><?php echo $value['description_1'] ?></td>
                    <td><?php echo $value['description_2'] ?></td>
                    <td><?php echo $value['description_3'] ?></td>
                    <td><?php echo $value['description_4'] ?></td>
                    <td><?php echo $value['description_5'] ?></td>
                    <td><?php echo $value['description_6'] ?></td>
                    <td><?php echo $value['description_7'] ?></td>
                    <td class="action">
                        <div class="btn-action">
                            <div class="sua">
                                <a href="./?act=form_update_product&id=<?php echo $value['id'] ?>"><button class="edit-button"><ion-icon name="create-outline"></ion-icon></button></a>
                            </div>
                            <div class="xoa">
                                <a href="./?act=delete_product&id=<?php echo $value['id'] ?>"><button class="delete-button" onclick="return confirm('Xóa sản phẩm này')"><ion-icon name="trash-outline"></ion-icon></button></a>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php endforeach ;?>
            </tbody>
        </table>
        <div class="btn-add">
            <a href="?act=form_add_product">Add</a>
            <a href="?act=add_product">Read</a>
        </div>
    </div>
</div>

