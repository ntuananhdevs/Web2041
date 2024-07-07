<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Lớp</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 200px;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
            text-align: center;
        }

        label {
            display: block;
            font-size: 14px;
            margin-bottom: 5px;
            color: #555;
        }

        input[type="text"] {
            width: 90%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            display: flex; 
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Them San Pham</h1>
        <form action="?act=post_product" method="POST">
            <label for="">Name</label>
            <input type="text" name="name" id="name" required><br>

            <label for="">Description</label>
            <input type="text" name="description" id="Description" required><br>

            <label for="">Price</label>
            <input type="text" name="price" id="Price" required><br>

            <label for="">Quantity</label>
            <input type="text" name="quantity" id="Quantity" required><br>

            <label for="">Img</label>
            <input type="text" name="img" id="img" required><br>

            <label for="">Category</label>
            <input type="text" name="category" id="Category" required><br>
            <button type="submit">Thêm</button>
        </form>
    </div>
</body>
</html>
