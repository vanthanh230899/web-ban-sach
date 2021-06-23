<?php

namespace App\Http\Controllers;

use App\Banner;
use Illuminate\Http\Request;

use App\TaiKhoan;

use Auth;

use App\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    // Phần Đăng Nhập, Đăng Xuất, Thông Tin Khách Hàng (Mai Thị Quanh)
    public function login(Request $request){
        if (Auth::attempt([

            'name' => $request->TaiKhoan,
            'password' => $request->MatKhau

        ]))
        {
            $user = User::where('name', $request->TaiKhoan)->first();

            if ($user->is_admin()){
                return redirect()->route('admin/danh-sach-san-pham');

            }else{
                return redirect()->route('home');
            }

        }

        return redirect()->back();
    }

    public function loadthongtinkhachhang($name){
        $banner = Banner::all();
        $thongtin = User::where("name", $name)->first();

        return view('client.thongtinkhachhang', compact('thongtin', 'banner'));

    }

    public function suathongtinkhachhang($name, Request $request){
        $thongtin = User::where("name", $name)->first();

        $thongtin->hoten = $request->hoten;
        $thongtin->ngaysinh = $request->ngaysinh;
        $thongtin->diachi = $request->diachi;
        $thongtin->email = $request->email;

        $thongtin->save();

        return redirect('thong-tin-khach-hang/'.$thongtin->name)->with('thongbao', 'Bạn đã cập nhật thành công');

    }

   public function doimatkhau(Request $request){
        $this->validate($request, [
            'oldpassword' => 'required',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required|string|min:6'
        ]);

       $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword, $hashedPassword)){
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect('/dangnhap')->with('successMsg', "Mật khẩu đã đổi thành công!");
        }
        else{
            return redirect()->back()->with('errorMsg', "Mật khẩu không hợp lệ!");
        }
   }


}
