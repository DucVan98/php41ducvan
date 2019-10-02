<?php 
	include "Models/Backend/CategoryModel.php";
	class CategoryController extends Controller
	{
		use CategoryModel;
		public function __construct()
		{
			$this->authentication();
		}
		public function index()
		{
			$pageSize=4;
			$totalRecord=$this->totalRecord();
			$numberPage=ceil($totalRecord/$pageSize);
			$p = isset($_GET["p"]) && is_numeric($_GET["p"]) ? ($_GET["p"]-1):0;
			$from = $p * $pageSize;
			$data = $this->fetchAll($from,$pageSize);
			$this->renderHTML("Views/Backend/CategoryView.php",array("data"=>$data,"numberPage"=>$numberPage));
		}
		public function add()
		{
			$formAction = "index.php?area=Backend&controller=Category&action=doAdd";
			$this->renderHTML("Views/Backend/AddEditCategoryView.php",array("formAction"=>$formAction));
		}
		public function doAdd()
		{
			$this->insert();
			header("location:index.php?area=Backend&controller=Category");
		}
		public function delete()
		{
			$id= isset($_GET["id"]) && is_numeric($_GET["id"]) ? $_GET["id"]:0;
			$this->deleteCategory($id);
			header("location:index.php?area=Backend&controller=Category");
		}
		public function edit()
		{
			$id= isset($_GET["id"]) && is_numeric($_GET["id"]) ? $_GET["id"]:0;
			$record = $this->fetch($id);
			$formAction = "index.php?area=Backend&controller=Category&action=doEdit&id=$id";
			$this->renderHTML("Views/Backend/AddEditCategoryView.php",array("formAction"=>$formAction,"record"=>$record));
		}
		public function doEdit()
		{
			$id= isset($_GET["id"]) && is_numeric($_GET["id"]) ? $_GET["id"]:0;
			$this->update($id);
			header("location:index.php?area=Backend&controller=Category");
		}
	}
 ?>


