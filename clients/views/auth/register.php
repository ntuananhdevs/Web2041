<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../public/css/login.css">
    <style>
        .form-container{
            padding-bottom: 20px;
        }
        .error {
            color: red;
            margin-left: 70px;
            font-size: 0.9em;
            margin-top: 5px;
        }

        .form-container{
            width: 550px;
            height: 600px;
        }
        .text-register{
            display: flex;
            align-items: center;
            gap:5px;
            margin-left: 70px;
        }
        label{
            margin: 10px 0 0 70px;
        }
    </style>
</head>
<body>
    <div class="content-form">
        <div class="form-container">
            <div class="logo">
                <img src="../public/img/logo2.png" alt="Logo">
                <p>Register</p>
            </div>
            <form action="?act=register" method="post">
                <div class="form-row">
                    <label for="username">User Name</label>
                    <input type="text" name="username" id="username" placeholder="User Name" value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>">
                    <?php if (isset($_SESSION['errors']['username'])) : ?>
                        <div class="error"><?php echo htmlspecialchars($_SESSION['errors']['username']); ?></div>
                    <?php endif; ?>

                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
                    <?php if (isset($_SESSION['errors']['email'])) : ?>
                        <div class="error"><?php echo htmlspecialchars($_SESSION['errors']['email']); ?></div>
                    <?php endif; ?>

                    <label for="phone">Phone Number</label>
                    <input type="text" name="phone" id="phone" placeholder="Phone Number" value="<?php echo isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : ''; ?>">
                    <?php if (isset($_SESSION['errors']['phone'])) : ?>
                        <div class="error"><?php echo htmlspecialchars($_SESSION['errors']['phone']); ?></div>
                    <?php endif; ?>

                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Password">
                    <?php if (isset($_SESSION['errors']['password'])) : ?>
                        <div class="error"><?php echo htmlspecialchars($_SESSION['errors']['password']); ?></div>
                    <?php endif; ?>

                    <label for="repassword">Repassword</label>
                    <input type="password" name="repassword" id="repassword" placeholder="Repassword">
                    <?php if (isset($_SESSION['errors']['repassword'])) : ?>
                        <div class="error"><?php echo htmlspecialchars($_SESSION['errors']['repassword']); ?></div>
                    <?php endif; ?>

                    <?php if (isset($_SESSION['errors']['general'])) : ?>
                        <div class="error"><?php echo htmlspecialchars($_SESSION['errors']['general']); ?></div>
                    <?php endif; ?>

                    <button type="submit" name="submit">Register</button>
                </div>
                <div class="text-register">
                    <p>You already have an account?</p>
                    <a href="?act=login">Login</a>
                </div>
            </form>
        </div>
    </div> 
    <?php unset($_SESSION['errors']); ?>
</body>
</html>
