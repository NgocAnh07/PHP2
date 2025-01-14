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

        h3 {
            text-align: center;
            color: #333;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        div {
            margin-bottom: 16px;
        }

        span {
            display: inline-block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"],
        input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
        }

        button:hover {
            background-color: #0056b3;
        }

        a {
            text-decoration: none;
            color: #007BFF;
            margin-right: 16px;
        }

        a:hover {
            color: #0056b3;
        }

        .error {
            color: red;
            font-weight: bold;
        }

        .success {
            color: green;
            font-weight: bold;
        }
    </style>
</head>

<body>
   
    <h3>Trang update</h3>

   
    <form action="" method="POST" enctype="multipart/form-data">
      
        <div style="margin-bottom: 16px;">
            <span>Nhập tên  :</span>
            <input type="text" name="name" value="<?= $product->name ?>">
        </div>
        <div style="margin-bottom: 16px;">
            <span>Nhập gia :</span>
            <input type="number" name="price" value="<?= $product->price ?>">
        </div>
        
        <div style="margin-bottom: 16px;">
            <!-- Chọn ảnh -->
            <div>
                <span>Chọn ảnh:</span>
                <input type="file" name="file_anh_upload">
            </div>


        </div>

       
        <div style="margin-bottom: 16px;">
            <a href="?act=product-list">Quay Lại</a>
            <button type="submit" name="submitForm">update</button>
        </div>


        <!-- Khu vực thông báo lỗi -->
        <div style="color: red;">
            <?= $thongBaoLoi ?>
        </div>
        <div style="color: red;">
            <?= $thongBaoLoiUploadFile ?>
        </div>

        <!-- Khu vực thông báo thành công -->
        <div style="color: green;">
            <?= $thongBaoThanhCong ?>
        </div>

    </form>


</body>

</html>