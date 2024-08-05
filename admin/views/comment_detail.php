<div class="container">
    <div class="row">
    <h2>Comments For <?php echo htmlspecialchars($comments[0]['name_product']); ?></h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User Name</th>
                    <th>Content</th>
                    <th>Create at</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($comments as $comment) : ?>
                <tr>
                    <td><?php echo htmlspecialchars($comment['id']); ?></td>
                    <td><?php echo htmlspecialchars($comment['username']); ?></td>
                    <td><?php echo htmlspecialchars($comment['content']); ?></td>
                    <td><?php echo htmlspecialchars($comment['created_date']); ?></td>
                    <td class="action">
                        <div class="xoa">
                            <a href="?act=delete_comment&id=<?php echo $comment['id'] ?>"><button class="delete-button" onclick="return confirm('Xóa binh luan')"><ion-icon name="trash-outline"></ion-icon></button></a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
