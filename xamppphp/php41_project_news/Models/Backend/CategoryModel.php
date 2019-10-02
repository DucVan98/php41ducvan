<?php 
	trait CategoryModel
	{
		//totalRecord
		public function totalRecord()
		{
			$conn = Connection::getInstance();
			$query = $conn->query("select id from tbl_category");
			return $query->rowCount();
		}
		// fetchAll
		public function fetchAll($from,$pageSize)
		{
			$conn = Connection::getInstance();
			$query = $conn->query("select * from tbl_category order by id desc limit $from,$pageSize");
			return $query->fetchAll();
		}
		public function insert()
		{
			$name= $_POST["name"];
			$conn = Connection::getInstance();
			$query = $conn->prepare("insert into tbl_category set name=:name");
			$query->execute(array("name"=>$name));
		}
		public function deleteCategory($id)
		{
			$conn = Connection::getInstance();
			$query = $conn->prepare("delete from tbl_category where id=:id");
			$query->execute(array("id"=>$id));
		}
		public function fetch($id)
		{
			$conn = Connection::getInstance();
			$query = $conn->prepare("select * from tbl_category where id=:id");
			$query->execute(array("id"=>$id));
			return $query->fetch();
		}
		public function update($id)
		{
			$name= $_POST["name"];
			$conn = Connection::getInstance();
			$query = $conn->prepare("update tbl_category set name=:name where id=:id");
			$query->execute(array("name"=>$name,"id"=>$id));
		}
	}
 ?>
