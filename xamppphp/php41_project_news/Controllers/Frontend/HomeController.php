<?php 
	include "Models/Frontend/HomeModel.php";
	class HomeController extends Controller{
		use HomeModel;
		public function index(){			
			//goi view
			$this->renderHTML("Views/Frontend/HomeView.php");
		}
	}
 ?>