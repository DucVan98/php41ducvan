<?php 
	include "Models/Frontend/CartModel.php";
	class CartController extends Controller{
		use CartModel;
		//ham tao de khoi tao gio hang neu gio hang chua ton tai
		public function __construct(){
			if(isset($_SESSION["cart"]) == false)
				$_SESSION["cart"] = array();
		}
		//hien thi gio hang
		public function index(){
			$this->renderHTML("Views/Frontend/CartView.php");
		}
		//them san pham vao gio hang -> them phan tu vao session array cart
		public function add(){
			$id = isset($_GET["id"])&&is_numeric($_GET["id"])?$_GET["id"]:0;
			//goi ham cart_add trong model de them phan tu vao gio hang
			$this->cartAdd($id);
			header("location:index.php?controller=Cart");
		}
		//xoa tung phan tu trong gio hang
		public function delete(){
			$id = isset($_GET["id"])&&is_numeric($_GET["id"])?$_GET["id"]:0;
			//goi ham xoa phan tu trong gio hang
			$this->cartDelete($id);
			header("location:index.php?controller=Cart");
		}
		//xoa toan bo gio hang
		public function destroy(){
			$this->cartDestroy();
			header("location:index.php?controller=Cart");
		}
		//update gio hang
		public function update(){
			//duyet cac phan tu trong session array
			foreach($_SESSION["cart"] as $product){
				$qty = "product_".$product["id"];
				$number = $_POST[$qty];
				//goi ham update de update lai phan tu
				$this->cartUpdate($product["id"],$number);
			}
			header("location:index.php?controller=Cart");
		}
		//thanh toan gio hang
		public function checkOut(){
			$this->renderHTML("Views/Frontend/CheckOutView.php");
		}
		//khi an nut submit thanh toan
		public function doCheckOut(){
			//goi ham cartCheckOut() de luu gia tri vao csdl
			$this->cartCheckOut();
			//xoa gio hang
			$this->cartDestroy();
			header("location:index.php?controller=Cart");
		}
	}
 ?>