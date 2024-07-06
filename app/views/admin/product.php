<div class="container">
    <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Img</th>
                    <th>Category_id </th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                foreach ($list_products as $item) {
                    echo '<tr>';
                        foreach($item as $key => $value) {
                            if($key == 'img') {
                               "<td><img src='$value'></td>";
                            }
                            echo "<td>$value</td>";
                        }
                    echo '<td class="action">
                            <button class="edit-button">Edit</button>
                            <button class="delete-button" onclick=(return confirm("Are you sure?"))>Delete</button>
                          </td>';
                    echo '</tr>';
                }
            ?>
            </tbody>

        </table>
            <div class="btn-add">
            <a href="?act=add_user">Add User</a>
        </div>
    </div>
</div>

        

