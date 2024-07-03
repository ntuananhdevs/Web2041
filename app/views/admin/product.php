<div class="container">
    <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Phone</th>` 
                    <th>Email</th>
                    <th>Address</th>
                    <th>Date</th>
                    <th>Pass</th>
                    <th>Action</th> 
                </tr>
            </thead>
            <tbody>
            <?php 
                foreach ($list_account as $user) {
                    echo '<tr>';
                        foreach($user as $key => $value) {
                            if($key == 'pass') {
                                $value = '******';
                            }else{
                                echo "<td>$value</td>";
                            }
                        }
                    echo '<td class="action">
                            <button class="edit-button">Edit</button>
                            <button class="delete-button">Delete</button>
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

        
