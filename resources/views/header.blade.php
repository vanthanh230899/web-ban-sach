<!--header-->
<!-- Menu trang chủ và nội dung trang chủ -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="menu pt-3 pb-3 d-flex justify-content-between">
                <div class="d-flex">
                <a href="{{url('/')}}" class="item-link pr-2 d-md-inline d-none">Fahasha.com</a>
                <span class="d-md-inline d-none">Hotline: 1900636467 </span>
                <span class="ml-2 d-md-inline d-none">Email: info@fahasa.com</span>
                </div>
               <div>
               @guest
               <a href="{{url('/dangky')}}" class="item-link pr-2">Tạo Tài Khoản</a>
               
               <a href="{{url('/dangnhap')}}" class="item-link">Đăng Nhập</a>
               @else
                   <li class="dropdown">
                       <div class="dropdown-toggle" data-toggle="dropdown">Xin chào <a href="" class="tit-login"> <span class="namestyle">{{ Auth::user()->hoten }} !</span> <b class="caret"></b></a></div>
                       <ul class="dropdown-menu dropdown-menu-custom p-2">
                           <li>
                               <a class="tit-login" href="thong-tin-khach-hang/{{Auth::user()->name}}" >Thông Tin Khách Hàng</a>
                           </li>
                           <li>
                               <a class="tit-login" href="{{url('bills')}}">Đơn hàng của bạn</a>
                           </li>
                           <li>
                               <a class="tit-login" href="{{ route('logout') }}" style="text-decoration: none !important;"
                                       onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                   {{ __('Đăng Xuất') }}
                               </a>

                               <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                   @csrf
                               </form>
                           </li>
                       </ul>
                   </li>
               @endguest
                </div> 
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3 d-md-block d-none">
            <div class="hinh-anh-logo">
                <a href="{{url('/')}}"><img src="public/images/hinh-anh-trang-chu/logo-fahasha.png" alt="" class="pb-2"></a>
            </div>
        </div>
        <div class="d-md-none col-12">
            <div class="row d-flex justify-content-between">
                <div class="hinh-anh-logo col-8">
                    <a href="{{url('/')}}"><img src="public/images/hinh-anh-trang-chu/logo-fahasha.png" alt="" class="pb-2"></a>
                </div>
                <div class="gio-hang align-self-center col-4 p-0 d-flex justify-content-center">
                    <a href="{{url( isset(Auth::user()->hoten) ? '/giohang' : '/dangnhap' )}}">
                        <i class="fa fa-shopping-bag mb-2"></i>
                        <span class="cart">Giỏ Hàng</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-7 col-12">
            <form role="search" method="get" id="search" class="form-tim-kiem" action="{{url('/timkiem')}}">
                <input type="text" id="tim-kiem" class="tim-kiem" style="position: relative;" name="key" placeholder="Tìm kiếm sản phẩm mong muốn...">
                <button type="submit" id="searchsubmit" class="fa fa-search icon-timkiem btn btn-outline"></button>
            </form>
        </div>
        <div class="col-md-2 d-md-block d-none text-center">
            <div class="gio-hang">
                <a href="{{url( isset(Auth::user()->hoten) ? '/giohang' : '/dangnhap' )}}" style="text-decoration: none;">
                    <i class="fa fa-shopping-bag"></i>
                    <span class="d-lg-inline d-none cart">Giỏ Hàng</span>
                    <!-- @if(isset(Auth::user()->hoten))
                        <span>(1)</span>
                        @endif -->
                </a>

        </div>
    </div>
</div>
</div>
<!--end-header-->