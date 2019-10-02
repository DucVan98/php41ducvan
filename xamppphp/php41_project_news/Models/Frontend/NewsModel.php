<?php 
	trait NewsModel{
		//lay mot ban ghi
		public function fetch($id){
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			//chuan bi truy van
			$query = $conn->prepare("select * from tbl_news where id=:id");
			//thuc thi truy van
			$query->execute(array("id"=>$id));
			//tra ve tong so luong ban ghi
			return $query->fetch();
		}
		//lay danh sach cac ban ghi: tu ban ghi nao den ban ghi nao
		public function fetchAll($from, $pageSize){
			$id = isset($_GET["id"])&&is_numeric($_GET["id"])?$_GET["id"]:0;
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			//thuc thi truy van
			$query = $conn->query("select * from tbl_news where category_id=$id order by id desc limit $from, $pageSize");
			//lay tat ca ket qua tra ve
			return $query->fetchAll();
		}
		//tinh tong so luong ban ghi
		public function totalRecord(){
			$id = isset($_GET["id"])&&is_numeric($_GET["id"])?$_GET["id"]:0;
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			//thuc thi truy van
			$query = $conn->query("select id from tbl_news where category_id=$id");
			//tra ve tong so luong ban ghi
			return $query->rowCount();
		}
	}
 ?>