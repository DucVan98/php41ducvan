<?php

namespace App\Http\Controllers;
use App\Slide;
use App\Product;
use App\ProductType;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function getIndex(){
    	$slide = Slide::all();
    	$new_product = Product::where('new',1)->paginate(4);
    	$sanpham_khuyenmai = Product::where('promotion_price','<>',0)->paginate(8,['*'],'pag');
    	return view('page.trangchu',compact('slide','new_product','sanpham_khuyenmai'));
    	//giá trị l=mà slide trả về sẽ là 1 mảng dữ liệu
    }
    //truyền vào tham số ID loại sản phẩm cần lấy,để controller hiểu được id: type thì bên router phải truyền vào id tương ứng
    public function getLoaiSp($type){
        $sp_theoloai = Product::where('id_type',$type)->get();
        $sp_khac = Product::where('id_type','<>',$type)->paginate(3);
        $loai = ProductType::all();
        $loai_spp= ProductType::where('id',$type)->first();
    	return view('page.loai_sanpham',compact('sp_theoloai','sp_khac','loai','loai_spp'));
    }
    public function getChiTietSp(Request $req){
        $sanpham =Product::where('id',$req->id)->first();
        $sp_tuongtu = Product::where('id_type',$sanpham->id_type)->paginate(3);
    	return view('page.chitiet_sanpham',compact('sanpham','sp_tuongtu'));
    }
     public function getLienHe(){
    	return view('page.lienhe');
    }
     public function getGioiThieu(){
    	return view('page.gioithieu');
    }

}
