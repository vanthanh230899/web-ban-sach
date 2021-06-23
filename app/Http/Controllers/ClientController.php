<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// su dung cac bang model
use App\Slideshow;

use App\Banner;

use App\SanPham;

use App\LoaiSanPham;

use App\TaiKhoan;

use App\HoaDon;

use App\Carts;

use App\ChiTietHoaDon;

class ClientController extends Controller
{
   
    // function trang chu
    public function getIndex(){

        $slide = SlideShow::all(); // lấy hết dl trong bảng slide
        // print_r($slide); // in ra man hinh

        $banner = Banner::all();

        // lay sp noi bat
        $spnoibat = SanPham::where('sp_noibat', 1)->take(12)->get();

        $spmoi = SanPham::where('sp_moi', 1)->take(12)->get(); // paginate: phan trang(so sp trong 1 trang)

        $spkhuyenmai = SanPham::where('giamoi', '<>', 0)->take(12)->get(); // '<>' lay gia moi khac 0 -> dieu kien khuyen mai
 
        // dd($spnoibat); die(); // in ra man hinh

        $listloaisanpham = LoaiSanPham::all();

        return view('client.index', compact('slide', 'banner', 'spnoibat', 'spmoi', 'spkhuyenmai', 'listloaisanpham'));
    }

     // function trang san pham
     public function getSanPham($ma_SP){

        $banner = Banner::all();

        // load loai sp theo id
        $loaisanpham = LoaiSanPham::where('ma_loaiSP', $ma_SP)->first();

        $listsanpham = SanPham::where('ma_loaiSP', $loaisanpham->ma_loaiSP)->paginate(8);

        $listloaisanpham = LoaiSanPham::all();

        return view('client.sanpham', compact('banner','listloaisanpham', 'loaisanpham', 'listsanpham'));
    }

    // function trang chi tiet san pham
    public function getChiTietSanPham($ma_SP){

        $banner = Banner::all();

        // lay sp theo id
        $sanpham = SanPham::where('ma_SP', $ma_SP)->first(); // ma sp trong csdl khop voi id lay o route cua web, tro toi first de lay duy nhat 1 sp
        // dd($sanpham);
        // die();
    
        $listloaisanpham = LoaiSanPham::all();

        $listsanpham = SanPham::where('ma_loaiSP', $sanpham->ma_loaiSP)->paginate(4);

        return view('client.chitietsanpham', compact('banner','sanpham', 'listloaisanpham', 'listsanpham'));
    }

    // function trang gio hang
    public function getGioHang(){
        $banner = Banner::all();

        $data = Carts::all();
        $total = 0;
        foreach($data as $key => $val){
            $total = $total + $val->total_money;
        }
        return view('client.giohang', compact('data', 'total', 'banner'));
    }

    // function trang Bills
    public function getBill(){
        $banner = Banner::all();

        return view('client.bills', compact('banner'));
    }

    // function trang tim kiem
    public function getTimKiem(Request $req){

        $banner = Banner::all();

        $listloaisanpham = LoaiSanPham::all();

        $key = $req->key;

        // tìm kiếm sp theo tên
        $product = SanPham::where('tensp','like', '%'.$key.'%')->get();

        return view('client.timkiem', compact('product', 'listloaisanpham', 'banner', 'key'));
    }

    // function trang dang nhap
    public function getDangNhap(){
        $banner = Banner::all();

        return view('client.dangnhap', compact('banner'));
    }

    // function trang dang ky
    public function getDangKy(){
        $banner = Banner::all();

        return view('client.dangky', compact('banner'));
    }


}
