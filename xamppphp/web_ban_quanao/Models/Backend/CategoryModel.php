<?php 
	trait CategoryModel
	{
		//totalRecord
		public function totalRecord()
		{
			$conn = Connection::getInstance();
			$query = $conn->query("select id from category");
			return $query->rowCount();
		}
		// fetchAll
		public function fetchAll($from,$pageSize)
		{
			$conn = Connection::getInstance();
			$query = $conn->query("select * from category order by id desc limit $from,$pageSize");
			return $query->fetchAll();
		}
		public function insert()
		{
			$name= $_POST["name"];
			$conn = Connection::getInstance();
			$query = $conn->prepare("insert into category set name=:name");
			$query->execute(array("name"=>$name));
		}
		public function deleteCategory($id)
		{
			$conn = Connection::getInstance();
			$query = $conn->prepare("delete from category where id=:id");
			$query->execute(array("id"=>$id));
		}
		public function fetch($id)
		{
			$conn = Connection::getInstance();
			$query = $conn->prepare("select * from category where id=:id");
			$query->execute(array("id"=>$id));
			return $query->fetch();
		}
		public function update($id)
		{
			$name= $_POST["name"];
			$conn = Connection::getInstance();
			$query = $conn->prepare("update category set name=:name where id=:id");
			$query->execute(array("name"=>$name,"id"=>$id));
		}
	}
 ?>
