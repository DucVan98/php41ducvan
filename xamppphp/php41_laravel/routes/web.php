<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//--------------------------------
// url: php41
Route::get("php41",function(){
	echo "<h1>Hello PHP41</h1>";
});
// truyền biến theo cách truyền thống
// test url: truyenbien1?bien1=hello&bien2=2019
Route::get("truyenbien1",function(){
	// đối dượng request::get("tenbien") có thể lấy giá trị kiểu GET hoặc POST
	$bien1 = Request::get("bien1");
	$bien2 = Request::get("bien2");
	echo "<h1>$bien1</h1>";
	echo "<h1>$bien2</h1>";

});
// truyền biên theo kiểu rewrite url
// truyenbien2/hello/php41
Route::get("truyenbien2/{bien1}/{bien2}",function($bien1,$bien2){
	echo "<h1>$bien1</h1>";
	echo "<h1>$bien2</h1>";

});
// group url theo tag chung
// vd: admin/user, admin/category, admin/news
// đâu là frontend, đâu là backend
Route::group(array("prefix"=>"admin"),function(){
	Route::get("user",function(){
		echo "<h1>user page</h1>";

	});
	Route::get("category",function(){
		echo "<h1>Category page</h1>";

	});
	Route::get("news",function(){
		echo "<h1>News page</h1>";

	});
});
// goi view
// url: goiview1
Route::get("goiview1",function(){
	return view("php41.view1");
});
// truyền dữ liệu ra view
// url: goiview2
Route::get("goiview2",function(){
	return view("php41.view2",array("hoten"=>"Phạm Đức Văn","email"=>"phamducvan98@gmail.com"));
});
// blade engine
// url: echo
Route::get("echo",function(){
	return view("php41.view3");
});
// url:if
Route::get("if",function(){
	
	return view("php41.view3");
});
// url:for
Route::get("for",function(){
	
	return view("php41.view3");
});
/*
- trạng thái của trang sẽ là GET, khi đó dẽ dùng Route::get
- khi ấn nut submit thì trang thái của trang là POST, khi đó để sử dụng Route::post
-chú ý : phải dùng hàm $csrf thì laravel mới có thể bắt được dữ liệu
 */
// url: goiform1
Route::get("goiform1",function(){
	return view("php41.form1");
});
// thuc hien submit moi bat vao post
Route::post("goiform1",function(){
	
		$txt = Request::get("txt");
	echo "<h1>$txt</h1>";
	return view("php41.form1");
});
// goiform2
Route::get("goiform2",function(){
	return view("php41.form2");
});
// khi an submit thi trang o trang thai post -> vi vay phia bat theo kieu post
Route::post("goiform2",function(){
	return view("php41.form2");
});