<?php 
	//include model
	include "Models/PhongbanModel.php";
	class PhongbanController extends Controller{
		//ket thua class PhongbanModel
		use PhongbanModel;
		public function index(){
			//goi ham trong class model de lay du lieu
			$data = $this->modelFetchAll();//ham nay tu class PhongbanModel
			//goi view, truyen du lieu ra view
			$this->renderHTML("Views/PhongbanView.php",array("data"=>$data));//ham nay tu class Controller
		}
		public function addPhongban(){
			//tao bien $formAction de xuat bien nay vao thuoc tinh action cua form
			$formAction = "index.php?controller=PhongbanController&action=doAdd";
			//goi view, xuat du lieu ra view
			$this->renderHTML("Views/AddEditPhongbanView.php",array("formAction"=>$formAction));
		}
		public function doAdd(){
			//goi ham modelDoAdd de insert du lieu
			$this->modelDoAdd();//ham nay nam trong class PhongbanModel
			//quay tro lai trang index.php
			header("location:index.php");
		}
		//edit
		public function edit(){
			$maphongban = isset($_GET["maphongban"])&&is_numeric($_GET["maphongban"])?$_GET["maphongban"]:0;
			$formAction = "index.php?controller=PhongbanController&action=doEdit&maphongban=$maphongban";
			//lay mot ban ghi
			$record = $this->modelFetch();
			//goi view, xuat du lieu ra view
			$this->renderHTML("Views/AddEditPhongbanView.php",array("formAction"=>$formAction,"record"=>$record));
		}
		//doEdit
		public function doEdit(){
			//goi ham modelDoEdit de insert du lieu
			$this->modelDoEdit();//ham nay nam trong class PhongbanModel
			//quay tro lai trang index.php
			header("location:index.php");
		}
		//delete
		public function delete(){
			//goi ham modelDelete de insert du lieu
			$this->modelDelete();//ham nay nam trong class PhongbanModel
			//quay tro lai trang index.php
			header("location:index.php");
		}
	}
 ?>