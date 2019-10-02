<?php 
	include "Models/Frontend/CartModel.php";
	class CartController extends Controller{
		use CartModel;
		public function __construct(){
			if(isset($_SESSION["cart"]) == false)
				$_SESSION["cart"] = array();
		}
			//hiển thị giỏ hàng
			public function index(){
				
				$this->renderHTML("Views/Frontend/CartView.php");
			}
		public function add(){
			$id = isset($_GET["id"]) && is_numeric($_GET["id"])?$_GET["id"]:0;
			// gọi hàm cart_add trong model để thêm phần tử vào gio hàng
			$this->cartAdd($id);
			header("location:index.php?controller=Cart");
		}
		// xóa từng phần tử trong giỏ hàng
		public function delete(){
			$id = isset($_GET['id']) &&is_numeric($_GET['id'])?$_GET['id']:0;
			// gọi hàm xóa phần tử trong giỏ hàng
			$this->cartDelete($id);
			header("location:index.php?controller=Cart");
		}
		// xóa toàn bộ giỏ hàng
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
		// thanh toán giỏ hàng
		public function checkOut(){
			$this->renderHTML("Views/Frontend/CheckOutView.php");
		}
		// khi ấn nút thanh toán
		public function doCheckOut(){
			// gọi hàm cartCheckOut() để lưu giá trị vào csdl
			$this->cartCheckOut();
			// xóa giỏ hàng đi 
			$this->cartDestroy();
			header("location:index.php?controller=Cart");

		}
	}
 ?>