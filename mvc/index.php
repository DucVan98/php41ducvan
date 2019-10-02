<?php 
	//ket noi csdl
	class Connection{
		//ham ket noi csdl, tra ve bien ket noi
		public static function getInstance(){
			//ket noi csdl, tra ve bien ket noi
			$conn = new PDO("mysql:host=localhost;dbname=php41_database","root","");
			//set charset de lay du lieu theo kieu unicode
			$conn->exec("set names 'utf8'");
			//dat che do lay du lieu mac dinh: object hoac array hoac assoc
			$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
			return $conn;
		}
	}
	//Connection::getInstance();
 ?>
 <?php 
 	//Controller su dung de dieu phoi view
 	class Controller{
 		public function renderHTML($fileName, $data = NULL){
 			//neu $data khong bang null thi extract du lieu
 			if($data != NULL)
 				extract($data);
 			//neu ton tai duong dan $fileName thi include no
 			if(file_exists($fileName))
 				include $fileName;
 		}
 	}
 ?>
 <?php 
 	// //load MVC phongban -> chi can load file controller va khoi tao object tu class controller
 	// include "Controllers/PhongbanController.php";
 	// //khoi tao doi tuong cho class PhongbanController
 	// $obj = new PhongbanController();
 	// //goi ham trong class PhongbanController
 	// $obj->index();
 	//lay bien action truyen tu url, neu khong co thi gan mac dinh la index
 	$action = isset($_GET["action"]) ? $_GET["action"]:"index";
 	//lay bien controller truyen tu url, neu khong co thi gan mac dinh la PhongbanController
 	$controller = isset($_GET["controller"]) ? $_GET["controller"]:"PhongbanController";
 	//duong dan cua fileController
 	$fileController = "Controllers/$controller.php";
 	//kiem tra xem file co ton tai khong, neu co ton tai thi include file
 	if(file_exists($fileController)){
 		include $fileController;
 		//kiem tra xem class co ton tai khong, neu co ton tai thi khoi tao object
 		if(class_exists($controller)){
 			$obj = new $controller();
 			$obj->$action();
 		}else
 			die("class does not exists");
 	}
  ?>