<?php 
class productController{
    public $productQuery;
    public function __construct()
    {

        $this->productQuery = new productQuery();

    }


    public function __destruct()
    {
        // Code...
    }
    public function getAll()
    {
      
        $danhSach = $this->productQuery->all();


        // Hiển thị file view
        include "/laragon/www/php2/lab1/view/list.php";
    } // END showList()
    public function delete($id)
    {
        
        if ($id !== "") {
          
            $ketQua = $this->productQuery->delete($id);

            
            if ($ketQua === "success") {
          
                header("Location: ?act=product-list");
            }

        } else {
            echo "<h1> Lỗi: Tham số id trống. Mời bạn kiểm tra tham số id trên đường dẫn url. </h1>";
        }
    }
    public function create()
    {
       
        $product = new Product(); 
        $thongBaoLoi = ""; 
        $thongBaoThanhCong = ""; 
        $thongBaoLoiUploadFile = "";


      
        if (isset($_POST["submitForm"])) {
            $product->name = trim($_POST["name"]);
            $product->price = trim($_POST["price"]);
            
            if ($product->name === "" || $product->price === "" || $product->img === "" || $product-> price > 0) {
                $thongBaoLoi = "thieu thong tin";
            }
            if ($_FILES["file_anh_upload"]["name"] !== "") {
               
                $thamSo1 = $_FILES["file_anh_upload"]["tmp_name"];
                $thamSo2 = "upload/" . $_FILES["file_anh_upload"]["name"];
                $ketQuaUploadFile = move_uploaded_file($thamSo1, $thamSo2);

                if ($ketQuaUploadFile) {
                  
                    $product->img = $thamSo2;

                } else {
                    
                    $thongBaoLoiUploadFile = "Upload file không thành công. Mời bạn thử lại.";
                }
            }

            if ($thongBaoLoi === "" && $thongBaoLoiUploadFile === "") {
                
                $ketQua = $this->productQuery->insert($product);

                if ($ketQua === "success") {
                  
                    $thongBaoThanhCong = "Tạo mới thành công. Mời bạn tiếp tục tạo mới hoặc quay lại danh sách.";

                  
                    $product = new Product();

                } else {
                   
                    $thongBaoLoi = "Tạo mới thất bại. Mời bạn kiểm tra lỗi và thực hiện lại.";

                }
            }
        }      
        include "view/create.php";
    }
    public function update($id)
    {
       
        $product = new Product(); 
        $thongBaoLoi = ""; 
        $thongBaoThanhCong = ""; 
        $thongBaoLoiUploadFile = "";


      
        if (isset($_POST["submitForm"])) {
            $product->name = trim($_POST["name"]);
            $product->price = trim($_POST["price"]);
            
            if ($product->name === "" || $product->price === "" || $product->img === "" || $product-> price >0) {
                $thongBaoLoi = "thieu thong tin";
            }
            if ($_FILES["file_anh_upload"]["name"] !== "") {
               
                $thamSo1 = $_FILES["file_anh_upload"]["tmp_name"];
                $thamSo2 = "upload/" . $_FILES["file_anh_upload"]["name"];
                $ketQuaUploadFile = move_uploaded_file($thamSo1, $thamSo2);

                if ($ketQuaUploadFile) {
                  
                    $product->img = $thamSo2;

                } else {
                    
                    $thongBaoLoiUploadFile = "Upload file không thành công. Mời bạn thử lại.";
                }
            }

            if ($thongBaoLoi === "" && $thongBaoLoiUploadFile === "") {
                
                $ketQua = $this->productQuery->update($id,$product);

                if ($ketQua === "success") {
                  
                    $thongBaoThanhCong = "Tạo mới thành công. Mời bạn tiếp tục tạo mới hoặc quay lại danh sách.";

                  
                    $product = new Product();

                } else {
                   
                    $thongBaoLoi = "Tạo mới thất bại. Mời bạn kiểm tra lỗi và thực hiện lại.";

                }
            }
        }      
        include "view/update.php";
    }
    public function get($id)
    {
      
        $danhSach = $this->productQuery->get($id);


        // Hiển thị file view
        include "/laragon/www/php2/lab1/view/detail.php";
    } // END showList()
}

?>