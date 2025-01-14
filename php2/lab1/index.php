<?php 
require "controller/productController.php";
require "model/product.php";
require "model/productQuery.php";


$act = $_GET["act"] ?? "";
$id = $_GET["id"] ?? "";
$user_id = $_GET["userID"] ?? "";

match ($act) {
  "" => (new productController())->getAll(),
  "product-delete" =>(new productController()) -> delete($id),
  "product-list"  => (new productController())->getAll(),
  "product-create" =>(new productController()) -> create(),
  "product-update" =>(new productController()) -> update($id),
  "product-detail" =>(new productController()) ->get($id),
  }
?>