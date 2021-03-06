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

// Quanh (login) ????ng nh???p
Route::post('/login/custom', [
    'uses' => 'LoginController@login',
    'as' => 'login.custom'
]);

// Load th??ng tin kh??ch h??ng (Quanh)
Route::get('thong-tin-khach-hang/{name}', 'LoginController@loadthongtinkhachhang');

// ?????i m???t kh???u (Quanh)
Route::post('thong-tin-khach-hang/doimatkhau', 'LoginController@doimatkhau')->name('password.update');
/*
 * Admin - danh m???c s???n ph???m (Quanh)
 * */

//Danh muc san pham
Route::get('admin/danh-muc-san-pham','QuanLyDanhMucSanPhamController@loaddanhmucsanpham');

// S??? danh m???c s???n ph???m
Route::post('admin/sua', 'QuanLyDanhMucSanPhamController@suadanhmucsanpham');

//X??a danh muc san pham
Route::get('admin/xoadanhmuc{ma_loaiSP}', 'QuanLyDanhMucSanPhamController@xoadanhmucsanpham');

//Th??m danh m???c s???n ph???m
Route::post('admin/themdanhmuc', 'QuanLyDanhMucSanPhamController@themdanhmucsanpham');
/**
 * End Quanh
 */

/** *************************************************************************** */

 /**
  * Tuy???t
  * admin
  */

  // Load s???n ph???m l??n
Route::get('admin/danh-sach-san-pham', 'QuanLySanPhamController@loadSanPham')->name('admin/danh-sach-san-pham');

//X??a s???n ph???m
Route::get('admin/xoasp{ma_SP}', 'QuanLySanPhamController@xoaSanPham');

//Th??m s???n ph???m
Route::post('admin/them', 'QuanLySanPhamController@themSanPham');

//S???a s???n ph???m postSua
Route::post('admin/suasp', 'QuanLySanPhamController@suaSanPham');

/*
 *  Danh s??ch ????n h??ng
 * */

// Load h??a ????n l??n
Route::get('admin/danh-sach-hoa-don', 'QuanLyHoaDonController@loadHoaDon');

// Load chi ti???t h??a ????n m?? kh??ch h??ng ???? mua
Route::get('admin/chi-tiet-hoa-don/{ma_HD}', 'QuanLyHoaDonController@loadCTHoaDon');

// C???p nh???t tr???ng th??i h??a ????n
Route::get('admin/capnhattrangthai/{ma_HD}', 'QuanLyHoaDonController@capnhattrangthaiHoaDon');

// Load kh??ch h??ng theo ma_TK
Route::get('admin/khach-hang/{ma_TK}', 'QuanLyHoaDonController@getKhachHangByMaKH');

Route::group(['middleware' => 'auth'], function (){

});

// C???p nh???t th??ng tin kh??ch h??ng
Route::post('thong-tin-khach-hang/sua/{name}', 'LoginController@suathongtinkhachhang');

Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.request');

/*
 * Danh S??ch T??i Kho???n*/

Route::get('admin/danh-sach-tai-khoan', 'QuanLyTaiKhoanController@loadTaiKhoan');
Route::post('admin/danh-sach-tai-khoan/them', 'QuanLyTaiKhoanController@themTaiKhoan');

/**
 * end Tuy???t
 */

