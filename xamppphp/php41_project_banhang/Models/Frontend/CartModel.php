<?php
	trait CartModel{		
		public function cartAdd($id){
		    if(isset($_SESSION['cart'][$id])){
		        //nếu đã có sp trong giỏ hàng thì số lượng lên 1
		        $_SESSION['cart'][$id]['number']++;
		    } else {
		        //lấy thông tin sản phẩm từ CSDL và lưu vào giỏ hàng
		        //$garment = db::get_one("select * from tbl_garment where id=$id");
		        //---
		        //PDO
		        $conn = Connection::getInstance();
		        $query = $conn->prepare("select * from garment where id=:id");
		        $query->execute(array("id"=>$id));
		        $query->setFetchMode(PDO::FETCH_OBJ);
		        $garment = $query->fetch();
		        //---
		        
		        $_SESSION['cart'][$id] = array(
		            'id' => $id,
		            'name' => $garment->name,
		            'img' => $garment->img,
		            'number' => 1,
		            'price' => $garment->price
		        );
		    }
		}
		/**
		 * Cập nhật số lượng sản phẩm
		 * @param int
		 * @param int
		 */
		public function cartUpdate($id, $number){
		    if($number==0){
		        //xóa sp ra khỏi giỏ hàng
		        unset($_SESSION['cart'][$id]);
		    } else {
		        $_SESSION['cart'][$id]['number'] = $number;
		    }
		}
		/**
		 * Xóa sản phẩm ra khỏi giỏ hàng
		 * @param int
		 */
		public function cartDelete($id){
		    unset($_SESSION['cart'][$id]);
		}
		/**
		 * Tổng giá trị giỏ hàng
		 */
		public function cartTotal(){
		    $total = 0;
		    foreach($_SESSION['cart'] as $garment){
		        $total += $garment['price'] * $garment['number'];
		    }
		    return $total;
		}
		/**
		 * Số sản phẩm có trong giỏ hàng
		 */
		public function cartNumber(){
		    $number = 0;
		    foreach($_SESSION['cart'] as $garment){
		        $number += $garment['number'];
		    }
		    return $number;
		}
		/**
		 * Danh sách sản phẩm trong giỏ hàng
		 */
		public function cartList(){
		    return $_SESSION['cart'];
		}
		/**
		 * Xóa giỏ hàng
		 */
		public function cartDestroy(){
		    $_SESSION['cart'] = array();
		}
		//=============
		//checkout
		public function cartCheckOut(){
			$fullname = $_POST["fullname"];
			$email = $_POST["email"];
			$address = $_POST["address"];
			$phone = $_POST["phone"];
			//---
			$conn = Connection::getInstance();
			//---
			//insert ban ghi vao tbl_customer, lay customer_id vua moi insert
			$query = $conn->prepare("insert into tbl_customer set fullname=:fullname, email=:email, address=:address,phone=:phone");
			$query->execute(array("fullname"=>$fullname,"email"=>$email,"address"=>$address,"phone"=>$phone));
			//lay id vua moi insert
			$customer_id = $conn->lastInsertId();
			//---
			//---
			//insert ban ghi vao tbl_order, lay order_id vua moi insert
			$query = $conn->prepare("insert into tbl_order set customer_id=:customer_id, create_at=now()");
			$query->execute(array("customer_id"=>$customer_id));
			//lay id vua moi insert
			$order_id = $conn->lastInsertId();
			//---
			//duyet cac ban ghi trong session array de insert vao tbl_order_detail
			foreach($_SESSION["cart"] as $garment){
				$query = $conn->prepare("insert into tbl_order_detail set order_id=:order_id, garment_id=:garment_id, price=:price, number=:number");
				$query->execute(array("order_id"=>$order_id,"garment_id"=>$garment["id"],"price"=>$garment["price"],"number"=>$garment["number"]));
			}
			//xoa gio hang
			unset($_SESSION["cart"]);
		}
		//=============
	}	
?>