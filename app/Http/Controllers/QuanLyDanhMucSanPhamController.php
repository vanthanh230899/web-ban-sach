<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiSanPham;

class QuanLyDanhMucSanPhamController
{
    //Quanh_Load danh muc san pham
    public function loaddanhmucsanpham(){
        $danhmucsanpham = LoaiSanPham::where('isdelete', 1)->paginate(5);

        return view('admin.danhmucsanpham', compact('danhmucsanpham'));
    }

    //Quanh_Xoa danh muc san pham
    public function xoadanhmucsanpham($ma_loaiSP){
        $xoadanhmucsanpham = LoaiSanPham::find($ma_loaiSP);

        $xoadanhmucsanpham->delete();

        return redirect('admin/danh-muc-san-pham')->with('thongbao','Bạn đã xóa thành công');
    }

    // Sửa danh mục sản phẩm (Quanh)
    public function suadanhmucsanpham(Request $request){
        $suadanhmucsanpham = LoaiSanPham::find($request->maloaiSP);
        $suadanhmucsanpham->ma_loaiSP = $request->maloaiSP;
        $suadanhmucsanpham->tenloaisp = $request->tenloaiSP;
        $suadanhmucsanpham->save();

        return redirect('admin/danh-muc-san-pham')->with('thongbao', 'Bạn đã thêm thành công');
    }

    // Thêm danh mục sản phẩm (Quanh)
    public function themdanhmucsanpham(Request $request){
        $themdanhmucsanpham = new LoaiSanPham();

        $themdanhmucsanpham->ma_loaiSP = $request->maloaiSP;
        $themdanhmucsanpham->tenloaisp = $request->tenloaiSP;
        $themdanhmucsanpham->isdelete = 1;

        $themdanhmucsanpham->save();

        return redirect('admin/danh-muc-san-pham')->with('thongbao', 'Bạn đã thêm thành công');
    }
}
