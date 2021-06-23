<?php

namespace App\Http\Controllers;

use App\LoaiSanPham;
use App\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class QuanLySanPhamController extends Controller
{
    //load sản phẩm admin (Tuyết)
    public function loadSanPham(){

        $dssanpham = SanPham::where('isdelete', 1)->paginate(5); //Phân trang
        $listloaisanpham = LoaiSanPham::all();

        return view('admin.danhsachsanpham', compact('dssanpham', 'listloaisanpham'));
    }

    //xóa sản phẩm admin (Tuyết)
    public function xoaSanPham($ma_SP){
        $sanphamxoa = SanPham::find($ma_SP);
        $sanphamxoa->delete();

        return redirect('admin/danh-sach-san-pham')->with('thongbao', 'Bạn đã xóa thành công');
    }

    //thêm sản phẩm admin (Tuyết)
    public function themSanPham(Request $request){
        $sanpham = new SanPham();
        $sanpham->ma_SP = $request->masanpham;
        $sanpham->ma_loaiSP = $request->maloai;
        $sanpham->tensp = $request->tensanpham;
        $sanpham->giacu = $request->giacu;
        $sanpham->giamoi = $request->giamoi;
        $sanpham->mota = $request->mota;
        $sanpham->soluong = $request->soluong;

        if ($request->hasFile('hinhanh')) {
            $fileImage = $request->hinhanh;
            $sanpham->hinhanh = $fileImage->getClientOriginalName();
            $fileImage->move('public/images/hinh-chi-tiet-san-pham', $fileImage->getClientOriginalName());
        }
        $sanpham->sp_noibat = 0;
        $sanpham->isdelete = 1;
        $sanpham->sp_moi = 0;
        $sanpham->save();

        return redirect('admin/danh-sach-san-pham')->with('thongbao', 'Bạn đã thêm thành công');
    }

    //sửa sản phẩm admin postSua (Tuyết)
    public function suaSanPham(Request $request){
        $sanphamsua = SanPham::find($request->masanpham);

        $sanphamsua->ma_loaiSP = $request->maloai;
        $sanphamsua->soluong = $request->soluong;
        $sanphamsua->tensp = $request->tensanpham;
        $sanphamsua->giacu = $request->giacu;
        $sanphamsua->giamoi = $request->giamoi;
        $sanphamsua->mota = $request->mota;


        if ($request->hasFile('hinhanh')) {
            $fileImage = $request->hinhanh;
            $sanphamsua->hinhanh = $fileImage->getClientOriginalName();
            $fileImage->move('public/images/hinh-chi-tiet-san-pham', $fileImage->getClientOriginalName());
        }

        $sanphamsua->sp_noibat = 0;
        $sanphamsua->isdelete = 1;
        $sanphamsua->sp_moi = 0;

        $sanphamsua->save();

        return redirect('admin/danh-sach-san-pham')->with('thongbao', 'Bạn đã sửa thành công');
    }

}
