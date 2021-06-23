@extends('masterpage') @section('body')
<div class=" container">
        {{--  Câu thông báo của phần đổi mật khẩu (Quanh)  --}}
    @if(session('successMsg'))
        <div class="alert alert-success" role="alert">
            {{session('successMsg')}}
        </div>
    @endif
    <div class="box-login pt-3 pb-3">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8 col-12 p-0 pl-md-2 pr-md-2">
                <div class="login">
                    <div class="text-center mt-3">
                        <h3 class="text-uppercase text-white">Đăng nhập</h3>
                    </div>

                    <div id="dangnhap">
                        <form action="{{ route('login.custom')}}" class="form" method="POST">
                            @csrf
                            <div class="text-white">Nhập mail:</div>
                            <input type="text" name="TaiKhoan" placeholder="Nhập mail..." class="w-50">
                            <br>
                            <div class="text-white">Mật khẩu:</div>
                            <input type="password" name="MatKhau" placeholder="Mật Khẩu..." class="w-50">

                            <a href="{{url('/dangky')}}" style="text-decoration: none;">
                                <div class="but-dangnhap ml-4">
                                    Bạn chưa có tài khoản? <span class="text-font-weight">Đăng ký</span>
                                </div>
                            </a>

                            <button type="submit" class="nut-dang-ky pt-2 pb-2 mt-2 mb-3" style="border: none !important">ĐĂNG NHẬP</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- Phần cuối trang -->
@endsection
