<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Users</title>
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
            <h1>Thêm Nguoi Dung</h1>
            <form action="?act=post_users" method="POST" enctype="multipart/form-data">
                <div class="thongtinsanpham">
                    <div class="form-row">
                        <label for="category">User Name</label>
                        <input type="text" name="username"  placeholder="User Name">

                        <label for="">Email</label>
                        <input type="email" name="email"  placeholder="Email">

                        <label for="">Phone Number</label>
                        <input type="text" name="phone"  placeholder="Phone Number">

                        <label for="">Password</label>
                        <input type="text" name="password"  placeholder="Password">

                        <label for="">Avatar</label>
                        <input type="file" name="avatar"  placeholder="Avatar">
                    </div>
                </div>
                    <button type="submit">Submit</button>  
            </form>
        </div>
    </div>

</body>
</html>