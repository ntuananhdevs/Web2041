<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link rel="stylesheet" href="../public/css/form.css">
</head>
<body>
    <div class="content-form">
        <div class="form-container">
            <div class="logo">
                <img src="../public/img/logo2.png" alt="">
                <p>Login</p>
            </div>
            <form action="?act=login" method="post" enctype="multipart/form-data">
            <div class="form-row">
                    <label for="">Email</label>
                    <input type="email" name="email"  placeholder="Email">

                    <label for="password">Password</label>
                     <input type="password" name="password" placeholder="Password">
                    <a href="?act=submit"><button type="submit">Login</button></a>
                </div>
                    
            </form>
        </div>
    </div> 
    <?php if (isset($error)) : ?>
                <div class="error"><?php echo htmlspecialchars($error); ?></div>
    <?php endif; ?>
</body>
</html>