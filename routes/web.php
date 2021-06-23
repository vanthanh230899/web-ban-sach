<?php
use Symfony\Component\Routing\Router;
use Illuminate\Support\Facades\Route;
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

/**
 * Diem
 * Client
 */
// trang chu
// Route::get('/index', 'HomeController@getIndex')->name('home');
Route::get('/', 'HomeController@getIndex')->name('home');

// Route::get('/', ['as'=>'trang-chu','uses'=>'HomeController@getIndex'])->name('home');

// loai san pham
Route::get('danhmucsp', [
    'as'=>'danh-muc-san-pham',
    'uses'=>'HomeController@getLoaiSanPham'
]);


// trang san pham
Route::get('sanpham/{ma_SP}', [
    'as'=>'san-pham',
    'uses'=>'HomeController@getSanPham'
]);

// trang chi tiet san pham
Route::get('chitietsanpham/{ma_SP}', [
    'as'=>'chi-tiet-san-pham',
    'uses'=>'HomeController@getChiTietSanPham'
]);

// trang dang nhap
Route::get('dangnhap', [
    'as'=>'dang-nhap',
    'uses'=>'HomeController@getDangNhap'
]);

// trang dang ky
Route::get('dangky', [
    'as'=>'dang-ky',
    'uses'=>'HomeController@getDangKy'
]);

// trang giohang
Route::get('giohang', [
    'as'=>'gio-hang',
    'uses'=>'HomeController@getGioHang'
]);

// trang bills
Route::get('bills', [
    'as'=>'bills',
    'uses'=>'HomeController@getBill'
]);

// trang timkiem
Route::get('timkiem', [
    'as'=>'tim-kiem',
    'uses'=>'HomeController@getTimKiem'
]);

Route::get('test/{id}', [
    'as'=>'test',
    'uses'=>'HomeController@test'
]);

/**
 * end Diem
 */

/** *************************************************************************** */

/**
 * Hoang Anh
 * Cart
 */


/*shopping cart */
Route::post('add', 'CartController@add');

Route::post('update/{id}', 'CartController@Updates');

Route::get('delete/{id}', 'CartController@destroy');

route::get('thanhtoan', 'CartController@buyBill');
/**
 * End Hoang Anh
 */

/** *************************************************************************** */

/**
 * Quanh
 * Login - Register (Client)
 */

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Quanh (login) đăng nhập
Route::post('/login/custom', [
    'uses' => 'LoginController@login',
    'as' => 'login.custom'
]);

// Load thông tin khách hàng (Quanh)
Route::get('thong-tin-khach-hang/{name}', 'LoginController@loadthongtinkhachhang');

// Đổi mật khẩu (Quanh)
Route::post('thong-tin-khach-hang/doimatkhau', 'LoginController@doimatkhau')->name('password.update');
/*
 * Admin - danh mục sản phẩm (Quanh)
 * */

//Danh muc san pham
Route::get('admin/danh-muc-san-pham','QuanLyDanhMucSanPhamController@loaddanhmucsanpham');

// Sử danh mục sản phẩm
Route::post('admin/sua', 'QuanLyDanhMucSanPhamController@suadanhmucsanpham');

//Xóa danh muc san pham
Route::get('admin/xoadanhmuc{ma_loaiSP}', 'QuanLyDanhMucSanPhamController@xoadanhmucsanpham');

//Thêm danh mục sản phẩm
Route::post('admin/themdanhmuc', 'QuanLyDanhMucSanPhamController@themdanhmucsanpham');
/**
 * End Quanh
 */

/** *************************************************************************** */

 /**
  * Tuyết
  * admin
  */

  // Load sản phẩm lên
Route::get('admin/danh-sach-san-pham', 'QuanLySanPhamController@loadSanPham')->name('admin/danh-sach-san-pham');

//Xóa sản phẩm
Route::get('admin/xoasp{ma_SP}', 'QuanLySanPhamController@xoaSanPham');

//Thêm sản phẩm
Route::post('admin/them', 'QuanLySanPhamController@themSanPham');

//Sửa sản phẩm postSua
Route::post('admin/suasp', 'QuanLySanPhamController@suaSanPham');

/*
 *  Danh sách đơn hàng
 * */

// Load hóa đơn lên
Route::get('admin/danh-sach-hoa-don', 'QuanLyHoaDonController@loadHoaDon');

// Load chi tiết hóa đơn mà khách hàng đã mua
Route::get('admin/chi-tiet-hoa-don/{ma_HD}', 'QuanLyHoaDonController@loadCTHoaDon');

// Cập nhật trạng thái hóa đơn
Route::get('admin/capnhattrangthai/{ma_HD}', 'QuanLyHoaDonController@capnhattrangthaiHoaDon');

// Load khách hàng theo ma_TK
Route::get('admin/khach-hang/{ma_TK}', 'QuanLyHoaDonController@getKhachHangByMaKH');

Route::group(['middleware' => 'auth'], function (){

});

// Cập nhật thông tin khách hàng
Route::post('thong-tin-khach-hang/sua/{name}', 'LoginController@suathongtinkhachhang');

Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.request');

/*
 * Danh Sách Tài Khoản*/

Route::get('admin/danh-sach-tai-khoan', 'QuanLyTaiKhoanController@loadTaiKhoan');
Route::post('admin/danh-sach-tai-khoan/them', 'QuanLyTaiKhoanController@themTaiKhoan');

/**
 * end Tuyết
 */

