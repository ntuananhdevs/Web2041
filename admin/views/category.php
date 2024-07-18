
<div class="container">
    <div class="row">
        <table class="table">
            <h2>Ctegory</h2>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($list_category as $key => $value) :?>
                <tr>
                    <td><?php echo $value['id'] ?></td>
                    <td><?php echo $value['name'] ?></td>
                    <td><?php echo $value['description'] ?></td>
                    
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

