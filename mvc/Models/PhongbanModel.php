<?php 
	trait PhongbanModel{
		//ham lay tat ca cac ban ghi
		public function modelFetchAll(){
			//lay bien ket noi de thao tac csdl
			$conn = Connection::getInstance();
			//thuc hien truy van, tra ket qua ve mot object
			$query = $conn->query("select * from phongban");
			//tra ve tat ca cac ban ghi
			return $query->fetchAll();
		}
		//ham lay mot ban ghi
		public function modelFetch(){
			$maphongban = isset($_GET["maphongban"])&&is_numeric($_GET["maphongban"])?$_GET["maphongban"]:0;
			//lay bien ket noi de thao tac csdl
			$conn = Connection::getInstance();
			//thuc hien truy van, tra ket qua ve mot object
			$query = $conn->query("select * from phongban where maphongban=$maphongban");
			//tra ve mot ban ghi
			return $query->fetch();
		}
		//chuc nang add: khi an nut submit
		public function modelDoAdd(){
			$tenphongban = $_POST["tenphongban"];
			//lay bien ket noi de thao tac csdl
			$conn = Connection::getInstance();
			//chuan bi truy van
			$query = $conn->prepare("insert into phongban set tenphongban=:ten");
			$query->execute(array("ten"=>$tenphongban));
		}
		//chuc nang edit: khi an nut submit
		public function modelDoEdit(){
			$maphongban = isset($_GET["maphongban"])&&is_numeric($_GET["maphongban"])?$_GET["maphongban"]:0;
			$tenphongban = $_POST["tenphongban"];
			//lay bien ket noi de thao tac csdl
			$conn = Connection::getInstance();
			//chuan bi truy van
			$query = $conn->prepare("update phongban set tenphongban=:ten where maphongban=:ma");
			$query->execute(array("ten"=>$tenphongban,"ma"=>$maphongban));
		}
		//delete
		public function modelDelete(){
			$maphongban = isset($_GET["maphongban"])&&is_numeric($_GET["maphongban"])?$_GET["maphongban"]:0;
			//lay bien ket noi de thao tac csdl
			$conn = Connection::getInstance();
			//chuan bi truy van
			$query = $conn->query("delete from phongban where maphongban=$maphongban");
		}
	}
 ?>