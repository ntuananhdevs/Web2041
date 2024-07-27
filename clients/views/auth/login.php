<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" type="image/svg" href="../public/img/header-img/rog_hover.svg" />
    <link rel="stylesheet" href="../public/css/login.css">
    <style>
        .form-container {
            padding: 40px 70px 40px 50px;
        }

        .login-row {
            width: 400px;
            display: flex;
            gap: 40px;
            align-items: center;
            padding: 10px 0;
        }

        .for-gotpw {
            margin: 0;
            color: #333;

        }

        .for-gotpw a {
            color: #007bff;
            text-decoration: none;
            transition: color 0.3s ease;
            font-size: 14px;
        }

        .for-gotpw p {
            font-size: 14px;
        }

        .for-gotpw a:hover {
            color: #0056b3;
            text-decoration: underline;
        }

        input[type="email"],
        input[type="password"] {
            width: 350px;
        }

        label {
            margin: 20px 0 0 0;
            font-size: 14px;
        }

        button[type="submit"] {
            width: 350px;
        }

        p {
            font-size: 14px;
            margin: 10px 0 0 0 ;
        }
    </style>
</head>

<body>
    <div class="content-form">
        <div class="form-container">
            <div class="logo">
                <img src="../public/img/header-img/rog_hover.svg" alt="">
                <p>Login</p>
            </div>
            <form action="?act=login" method="post" enctype="multipart/form-data">
                <div class="form-row">
                    <label for="">Email</label>
                    <input type="email" name="email" placeholder="Email">

                    <label for="password">Password</label>
                    <input type="password" name="password" placeholder="Password">
                    <div class="err">
                        <?php
                        if (isset($error)) {
                            echo '<p style="color: red;">' . $error . '</p>';
                        }
                        ?>
                    </div>

                    <button type="submit" name="submit">Login</button>
                </div>
                <div class="login-row">
                    <div class="for-gotpw">
                        <a href="?act=forgot_password">Forgot Password</a>
                    </div>
                    <div class="for-gotpw">
                        <p>Don't have an account? <a href="?act=register">Register</a></p>
                    </div>
                </div>
            </form>
        </div>
    </div>

</body>

</html>