<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Users</title>
    <link rel="stylesheet" href="../public/css/form.css">
    <style>
        .content-form {
            width: 500px;
            margin: auto;
        }
        button{
            width: 300px;
        }
        label{
            margin-left: 0;
        }
        input{
           
        }
    </style>
</head>
<body>
    <div class="content-form">
        <div class="form-container">
            <h1>Cap Nhat Nguoi Dung</h1>
            <form action="?act=update_users" method="POST" enctype="multipart/form-data">
                <div class="thongtinsanpham">
                    <div class="form-row">
                        <input type="hidden" name="id" value="<?php echo $user_value['id']; ?>">
                        <label for="category">User Name</label>
                        <input type="text" name="username"  placeholder="User Name" value="<?php echo $user_value['username']; ?>">

                        <label for="">Email</label>
                        <input type="email" name="email"  placeholder="Email" value="<?php echo $user_value['email']; ?>">

                        <label for="">Phone Number</label>
                        <input type="text" name="phone"  placeholder="Phone Number" value="<?php echo $user_value['phone']; ?>">

                        <label for="">Password</label>
                        <input type="text" name="password"  placeholder="Password" value="<?php echo $user_value['password']; ?>">

                        <label for="">Avatar</label>
                        <input type="file" name="avatar"  placeholder="Avatar" value="<?php echo $user_value['avatar']; ?>">
                        <input type="hidden" name="old_avatar" value="<?php echo $user_value['avatar']; ?>">
                    </div>
                </div>
                    <button type="submit">Submit</button>  
            </form>
        </div>
    </div>

</body>
</html>