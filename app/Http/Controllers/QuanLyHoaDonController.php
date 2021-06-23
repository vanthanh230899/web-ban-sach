<?php

namespace App\Http\Controllers;

use App\ChiTietHoaDon;
use App\HoaDon;
use App\TaiKhoan;
use App\User;

use Illuminate\Http\Request;

class QuanLyHoaDonController extends Controller
{
    //load hóa đơn -- admin (Tuyết)
    public function loadHoaDon(){
        $dshoadon = HoaDon::where('isdelete', 1)->paginate(5);
        return view('admin.danhsachhoadon', compact('dshoadon'));
    }
    //cập nhật trạng thái hóa đơn
    public function capnhattrangthaiHoaDon($ma_HD){
        $capnhattrangthaihoadon = HoaDon::find($ma_HD);

        $capnhattrangthaihoadon->trangthai = 1;
        $capnhattrangthaihoadon->save();

        return redirect('admin/danh-sach-hoa-don');
    }

    public function getKhachHangByMaKH($ma_TK){
        $kh = User::where('name', $ma_TK)->first();
        if ($kh == null)
        {
            return response()->json([
                'value' => 'null'
            ]);
        }
        return response()->json([
            'hoten' => $kh->hoten,
            'ngaysinh' => $kh->ngaysinh,
            'diachi' => $kh->diachi,
            'email' => $kh->email
        ], 200); // 200 la OK
    }

    public function loadCTHoaDon($ma_HD){
        $ctHoaDon = ChiTietHoaDon::with("SanPham")->where("ma_HD", $ma_HD)->get();

        // chuyen mang sang json
        return json_encode($ctHoaDon, 200); // 200 la OK
    }
}
