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

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        th, td {
            text-align: center;
            padding: 10px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #007BFF;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #e9e9e9;
        }

        img {
            display: block;
            max-height: 100%;
            max-width: 100%;
            margin: 0 auto;
        }

        a {
            text-decoration: none;
            color: #007BFF;
            font-weight: bold;
            margin: 0 5px;
        }

        a:hover {
            color: #0056b3;
        }

        .navigation {
            text-align: center;
            margin-top: 20px;
        }

        .navigation a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .navigation a:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <!-- 1. Tiêu đề trang -->
    <h3>Trang Danh Sách</h3>

    <!-- 2. Khu vực bảng dữ liệu -->
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên </th>
                <th>gia</th>
                <th>IMG</th>
                <th>edit</th>


            </tr>
        </thead>

        <tbody>
            <?php foreach ($danhSach as $product) { ?>
                <tr>
                    <td> <?= $product->id ?> </td>
                    <td> <?= $product->name ?></td>
                    
                    <td> <?= $product->price ?> </td>
                    <td>
                        <div style="height: 200px; width: 200px">
                            <img style="max-height:100%; max-width:100%;" src="<?= $product->img ?>">
                        </div>
                    </td>
                    <td>
                        <a href="?act=product-update&id=<?= $product->id ?>">Sửa</a>
                        <a href="?act=product-delete&id=<?= $product->id ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</a>
                        <a href="?act=product-detail&id=<?= $product->id ?>">chi tiet</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <!-- Khu vực điều hướng -->
    <div>
        <a href="?act=product-create">Trang tạo mới</a>
    </div>





</body>

</html>