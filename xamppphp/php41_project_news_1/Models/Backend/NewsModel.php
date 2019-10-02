<?php 
	trait NewsModel{
		//lay danh sach cac ban ghi: tu ban ghi nao den ban ghi nao
		public function fetchAll($from, $pageSize){
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			//thuc thi truy van
			$query = $conn->query("select * from tbl_news order by id desc limit $from, $pageSize");
			//lay tat ca ket qua tra ve
			return $query->fetchAll();
		}
		//tinh tong so luong ban ghi
		public function totalRecord(){
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			//thuc thi truy van
			$query = $conn->query("select id from tbl_news");
			//tra ve tong so luong ban ghi
			return $query->rowCount();
		}
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
		//update ban ghi
		public function update($id){
			$name = $_POST["name"];
			$category_id = $_POST["category_id"];
			$description = $_POST["description"];
			$content = $_POST["content"];
			$hotnews = isset($_POST["hotnews"]) ? 1: 0;			
			//lay doi tuong ket noi
			$conn = Connection::getInstance();
			//update ban ghi
			$query = $conn->prepare("update tbl_news set name=:name, category_id=:category_id,description=:description,content=:content,hotnews=:hotnews where id=:id");
			$query->execute(array("name"=>$name,"category_id"=>$category_id,"description"=>$description,"content"=>$content,"hotnews"=>$hotnews,"id"=>$id));
			//neu user upload anh
			if($_FILES["img"]["name"] != ""){
				//---
				//lay anh cu de xoa
				$query = $conn->prepare("select img from tbl_news where id=:id");
				$query->execute(array("id"=>$id));
				//lay mot ban ghi
				$old_img = $query->fetch();
				if(isset($old_img->img)&&$old_img->img!=""&&file_exists("Assets/upload/news/".$old_img->img))
					unlink("Assets/upload/news/".$old_img->img);
				//---
				$img = time().$_FILES["img"]["name"];
				//upload anh
				move_uploaded_file($_FILES["img"]["tmp_name"], "Assets/upload/news/$img");
				//update field img
				$query = $conn->prepare("update tbl_news set img=:img where id=:id");
				$query->execute(array("img"=>$img,"id"=>$id));
			}			
		}
		//insert ban ghi
		public function insert(){
			$name = $_POST["name"];
			$category_id = $_POST["category_id"];
			$description = $_POST["description"];
			$content = $_POST["content"];
			$hotnews = isset($_POST["hotnews"]) ? 1: 0;	
			$img = "";
			//neu user upload anh
			if($_FILES["img"]["name"] != ""){
				$img = time().$_FILES["img"]["name"];
				//upload anh
				move_uploaded_file($_FILES["img"]["tmp_name"], "Assets/upload/news/$img");				
			}		
			//lay doi tuong ket noi
			$conn = Connection::getInstance();
			//update ban ghi
			$query = $conn->prepare("insert into tbl_news set name=:name, category_id=:category_id,description=:description,content=:content,hotnews=:hotnews,img=:img");
			$query->execute(array("name"=>$name,"category_id"=>$category_id,"description"=>$description,"content"=>$content,"hotnews"=>$hotnews,"img"=>$img));		
		}
		//delete
		public function deleteNews($id){
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			//---
			//lay anh cu de xoa
			$query = $conn->prepare("select img from tbl_news where id=:id");
			$query->execute(array("id"=>$id));
			//lay mot ban ghi
			$old_img = $query->fetch();
			if(isset($old_img->img)&&$old_img->img!=""&&file_exists("Assets/upload/news/".$old_img->img))
				unlink("Assets/upload/news/".$old_img->img);
			//---
			//chuan bi truy van
			$query = $conn->prepare("delete from tbl_news where id=:id");
			//thuc thi truy van
			$query->execute(array("id"=>$id));
		}
		//lay danh muc tin tuc
		public function getCategory($category_id){
			$conn = Connection::getInstance();
			//thuc thi truy van
			$query = $conn->query("select name from tbl_category where id=$category_id");
			//tra ve mot ban ghi
			return $query->fetch();
		}
	}
 ?>