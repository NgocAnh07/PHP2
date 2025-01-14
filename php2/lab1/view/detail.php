<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f9f9f9;
        }

        .product {
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #fff;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .product h1 {
            font-size: 1.5rem;
            color: #333;
            margin: 0 0 10px;
        }

        .product img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
        }

        .product h1.price {
            color: #007BFF;
            font-size: 1.2rem;
        }
    </style>
</head>
<body>
<?php foreach ($danhSach as $product) { ?>
    <h1><?= $product->name ?></h1>
    <h1><?= $product->price ?></h1>
    <img src="<?=$product->img ?>" alt="">
    <?php } ?>
</body>
</html>