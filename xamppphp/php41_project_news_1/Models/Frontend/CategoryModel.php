<?php 
	trait CategoryModel{
		//lay danh sach cac ban ghi
		public function fetchAll(){
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			//thuc thi truy van
			$query = $conn->query("select * from tbl_category order by id desc");
			//lay tat ca ket qua tra ve
			return $query->fetchAll();
		}
	}
 ?>