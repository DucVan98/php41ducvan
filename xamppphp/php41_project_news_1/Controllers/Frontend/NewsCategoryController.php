<?php 
	include "Models/Frontend/NewsModel.php";
	class NewsCategoryController extends Controller{
		use NewsModel;
		public function index(){
			//so ban ghi tren mot trang
			$pageSize = 15;
			//tinh tong so ban ghi
			$totalRecord = $this->totalRecord();//ham trong model
			//tinh so trang
			//ham ceil su dung de lay tran. VD: ceil(2.1)=3
			$numPage = ceil($totalRecord/$pageSize);
			//lay bien p truyen tren url
			$p = isset($_GET["p"])&&is_numeric($_GET["p"])&&$_GET["p"]>0 ? ($_GET["p"]-1) : 0;
			//lay tu ban ghi nao
			$from = $p * $pageSize;
			//lay cac ban ghi
			$data = $this->fetchAll($from,$pageSize);
			//goi view, truyen du lieu ra view
			$this->renderHTML("Views/Frontend/NewsCategoryView.php",array("data"=>$data,"numPage"=>$numPage));
		}
	}
 ?>