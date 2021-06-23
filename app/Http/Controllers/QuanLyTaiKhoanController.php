<?php

namespace App\Http\Controllers;
use App\TaiKhoan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class QuanLyTaiKhoanController extends Controller
{
    //
    public function loadTaiKhoan(){
        $data = TaiKhoan::all();
        return view('admin.danhsachtaikhoan', compact('data'));
    }

    public function themTaiKhoan(Request $req){
        if($req->name != null && $req->email != null &&  $req->password != null && $req->hoten != null && $req->diachi != null && $req->ngaysinh != null  ){
            $user = new TaiKhoan();
            $user->name = $req->name;
            $user->email= $req->email;
            $user->ma_TK= strtoupper(substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 5)), 0,5));
            $user->password = Hash::make($req->password) ;
            $user->loaitaikhoan= 1;
            $user->hoten= $req->hoten;
            $user->diachi= $req->diachi;
            $user->ngaysinh= $req->ngaysinh;
            $user->save();
            return redirect('admin/danh-sach-tai-khoan');
        }else{
            return redirect('admin/danh-sach-tai-khoan')->with('thongbao', 'sai');
        }


    }
}
