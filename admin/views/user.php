
<div class="container">
    <div class="row">
        <table class="table">
            <h2>Users</h2>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Avatar</th>
                    <th>username </th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($users as $key => $value) :?>
                <tr>
                    <td><?php echo $value['id'] ?></td>
                    <td><img src="../public/uploads/<?php echo $value['avatar'] ?>" alt=""></td>
                    <td><?php echo $value['username'] ?></td>
                    <td><?php echo $value['email'] ?></td>
                    <td><?php echo $value['phone'] ?></td>
                    <td><?php echo $value['role'] ?></td>
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

