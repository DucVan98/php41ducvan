<?php 
	trait HotNewsModel{
		//lay nhieu ban ghi
		public function fetchAll(){
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			//chuan bi truy van
			$query = $conn->query("select * from tbl_news  where hotnews=1 order by id desc limit 0,4");
			//tra ve tong so luong ban ghi
			return $query->fetchAll();
		}
	}
 ?>