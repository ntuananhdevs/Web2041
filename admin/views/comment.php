<div class="container">
    <div class="row">
        <table class="table">
            <h2>Comments</h2>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên Sản Phẩm</th>
                    <th>Số Comment</th>
                    <th>Cũ Nhất</th>
                    <th>Mới Nhất</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($list_comments as $comment) : ?>
                    <tr>
                        <td><?php echo $comment['product_id'] ?></td>
                        <td><?php echo $comment['name_product'] ?></td>
                        <td><?php echo $comment['comment_count'] ?></td>
                        <td>
                            <?php if ($comment['comment_count']  == null) : ?>
                                <?php echo "" ?>
                            <?php else : ?>
                                <?php echo date('H:i:s d/m/Y ', strtotime($comment['oldest_comment'])) ?>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if ($comment['comment_count']  == null) : ?>
                                <?php echo "" ?>
                            <?php else : ?>
                                <?php echo date('H:i:s d/m/Y ', strtotime($comment['newest_comment'])) ?>
                            <?php endif; ?>
                        </td>
                        <td class="action">
                            <div class="sua">
                                <a href="?act=view_comments&product_id=<?php echo $comment['product_id'] ?>"><button class="edit-button">Chi tiết</button></a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>