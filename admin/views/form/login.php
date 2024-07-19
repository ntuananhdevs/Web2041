<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <style>
body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    font-family: Arial, sans-serif;
    background-color: #f4f4f9;
}

.content-form {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    height: 100%;
}

.form-container {
    background-color: #ffffff;
    padding: 2rem;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    width: 350px;
}


.logo img {
    width: 40px;
    height: auto;
}

.logo p {
    font-size: 25px;
    font-weight: bold;
    margin: 0.5rem 0 1rem 0;
    color: #333333;
}

.form-row {
    display: flex;
    flex-direction: column;
}

label {
    font-weight: bold;
    color: #333333;
    font-family: TTNormsProMedium, MyriadSemibold, "Segoe UI", Arial, "PingFang TC", "Microsoft JhengHei", sans-serif;
    margin-left: 45px;
    margin-top: 10px;
}

input[type="email"],
input[type="password"] {
    padding: 0.75rem;
    margin-bottom: 1rem;
    border: 1px solid #cccccc;
    border-radius: 5px;
    font-size: 1rem;
    width: 75%;
    box-sizing: border-box;
    margin: auto;
    margin-top: 10px;
}

button[type="submit"] {
    padding: 0.75rem;
    border: none;
    border-radius: 5px;
    background-color: #007BFF;
    color: white;
    font-size: 1rem;
    cursor: pointer;
    transition: background-color 0.3s ease;
    width: 75%;
    margin: auto;
    margin-top: 40px;
}

button[type="submit"]:hover {
    background-color: #0056b3;
}
.logo{
    display: flex;
    align-items: center;
    margin: auto;
    justify-content: center;
    gap: 15px;
}

    </style>
</head>
<body>
    <div class="content-form">
        <div class="form-container">
            <div class="logo">
                <img src="../../../public/img/logo2.png" alt="">
                <p>Login</p>
            </div>
            <form action="?act=login" method="POST">

                <div class="form-row">
                    <label for="">Email</label>
                    <input type="email" name="email"  placeholder="Email">

                    <label for="password">Password</label>
                     <input type="password" name="password" placeholder="Password">

                    <button type="submit">Login</button>
                </div>
                    
            </form>
        </div>
    </div>  
</body>
</html>