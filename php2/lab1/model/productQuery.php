<?php 
class productQuery{
    public $pdo;

    // Khai báo phương thức
    public function __construct()
    {
        try {
            // 1. Kết nối CSDL
            $this->pdo = new PDO("mysql:host=localhost; port=3306; dbname=lab1_php2", "root", "");

           
        } catch (Exception $error) {
            echo "<h1>";
            echo "Lỗi kết nối CSDL: " . $error->getMessage();
            echo "</h1>";
        }
    }
    public function __destruct()
    {
        // Đóng kết nối với CSDL
        // Code...
    }

    public function all()
    {
        // Khai báo try catch
        try {
        
            $sql = "SELECT * FROM `product`";

            // 2. Thực hiện truy vấn
            $data = $this->pdo->query($sql)->fetchAll();

        
            $danhSachObject = [];
            foreach ($data as $value) {
                
                $product = new product();

                
                $product->id = $value["id"];
                $product->name = $value["name"];
                $product->price = $value["price"];
                $product->img = $value["img"];


                array_push($danhSachObject, $product);
            }

            
            return $danhSachObject;
        } catch (Exception $error) {
            echo "<h1>";
            echo "Lỗi hàm all trong model: " . $error->getMessage();
            echo "</h1>";
        }
    } 
    public function delete($id)
    {
        // Khai báo try catch
        try {
            
            $sql = "DELETE FROM product WHERE id = $id";

            
            $data = $this->pdo->exec($sql);

          
            if ($data === 1) {
                return "success";
            }
        } catch (Exception $error) {
            echo "<h1>";
            echo "Lỗi hàm delete trong model: " . $error->getMessage();
            echo "</h1>";
        }
    }
    public function insert(Product $product)
    {
        // Khai báo try catch
        try {
            // 1. Viết câu sql
            $sql = "INSERT INTO `product` (`id`, `name`, `price`, `img`) VALUES (NULL, '$product->name', '$product->price', '$product->img');";

            // 2. Thực hiện truy vấn
            $data = $this->pdo->exec($sql);

            // 3. Return kết quả
            if ($data === 1) {
                return "success";
            }
        } catch (Exception $error) {
            echo "<h1>";
            echo "Lỗi hàm insert trong model: " . $error->getMessage();
            echo "</h1>";
        }
    }
    public function find($id)
    {
        try {
            // 1. Viết câu sql
            $sql = "SELECT * FROM product WHERE id = $id";

            // 2. Thực hiện truy vấn
            $data = $this->pdo->query($sql)->fetch();

            // 3. Convert dữ liệu từ array sang object
            if ($data !== false) {
                $product = new Product();
                $product->id = $data["id"];
                $product->name = $data["name"];
                $product->price = $data["price"];
                $product->img = $data["img"];


                // 4. Return kết quả
                return $product;
            } else {
                echo "Lỗi: ID không tồn tại. Mời bạn kiểm tra lại.";
            }
        } catch (Exception $error) {
            echo "<h1>";
            echo "Lỗi hàm find trong model: " . $error->getMessage();
            echo "</h1>";
        }
    }
    public function update($id, Product $product)
    {
        try {
            
            $sql = "UPDATE `product` SET `name` = '$product->name', `price` = '$product->price', `img` = '$product->img' WHERE `product`.`id` = $id;";

            
            $data = $this->pdo->exec($sql);

           
            if ($data === 1 || $data === 0) {
                return "success";
            }

        } catch (Exception $error) {
            echo "<h1>";
            echo "Lỗi hàm update trong model: " . $error->getMessage();
            echo "</h1>";
        }


    }
    public function get($id)
    {
        // Khai báo try catch
        try {
        
            $sql = "SELECT * FROM `product` WHERE `product`.`id` = $id; ";

            // 2. Thực hiện truy vấn
            $data = $this->pdo->query($sql)->fetchAll();

        
            $danhSachObject = [];
            foreach ($data as $value) {
                
                $product = new product();

                
                $product->id = $value["id"];
                $product->name = $value["name"];
                $product->price = $value["price"];
                $product->img = $value["img"];


                array_push($danhSachObject, $product);
            }

            
            return $danhSachObject;
        } catch (Exception $error) {
            echo "<h1>";
            echo "Lỗi hàm all trong model: " . $error->getMessage();
            echo "</h1>";
        }
    }
}

?>