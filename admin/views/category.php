<div class="container">
    <div class="row">
        <table class="table">
            <h2>Category</h2>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Product Count</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($list_category as $category) : ?>
                <tr>
                    <td><?php echo $category['id']; ?></td>
                    <td><?php echo $category['name']; ?></td>
                    <td><?php echo $category['description']; ?></td>
                    <td><?php echo $category['product_count'] ; ?></td>
                    <td class="action">
                        <div class="btn-action">
                            <div class="edit">
                                <a href="./?act=form_update_category&id=<?php echo $category['id']; ?>"><button class="edit-button"><ion-icon name="create-outline"></ion-icon></button></a>
                            </div>
                            <div class="delete">
                                <a href="./?act=delete_category&id=<?php echo $category['id']; ?>"><button class="delete-button" onclick="return confirm('Delete this category?')"><ion-icon name="trash-outline"></ion-icon></button></a>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <div class="btn-add">
            <a href="?act=form_add_category">Add</a>
            <a href="?act=add_product">Read</a>
        </div>
    </div>
</div>
