@extends('masterpage') @section('body')

<script>
    function plus() {
        let a = Number(document.getElementById('amount').value);
        document.getElementById('amount').value = a + 1;
        let b = Number(document.getElementById('price').value)
        document.getElementById('total').value = b * (a + 1);
    }

    function minus() {
        let a = Number(document.getElementById('amount').value);
        if (a <= 1) {
            document.getElementById('amount').value = 1;
            let b = Number(document.getElementById('price').value)
            document.getElementById('total').value = b;
        } else {
            document.getElementById('amount').value = a - 1;
            let b = Number(document.getElementById('price').value)
            document.getElementById('total').value = b * (a - 1);
        }
    }
</script>

<div class="navigation mb-3 mt-3">
    <div class="row m-0">
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 pb-3 pl-0 pr-0 pr-md-4">
            @include('danhmucsp')
        </div>

        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 pl-md-4">
            <form method="POST" action="{{url('add')}}">
                <!-- <form method="POST" action="{{url( isset(Auth::user()->hoten) ? 'add' : '/dangnhap' )}}"> -->
                <div class="row thong-tin-bao-quat pt-3 pb-3">
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <div class="hinh-chi-tiet-san-pham">
                            <img src="public/images/hinh-anh-trang-chu/{{$sanpham->hinhanh}}" alt="">
                        </div>
                        <input type="hidden" name="product_name" value="{{$sanpham->tensp}}">
                        <input type="hidden" name="image" value="{{$sanpham->hinhanh}}">
                        <input id="total" type="hidden" name="total" value=" <?php if($sanpham->giamoi == 0){echo $sanpham->giacu;}else if($sanpham->giamoi != 0){echo $sanpham->giamoi;}?>">
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 mt-3 mt-md-0">
                        <div class="noi-dung-chi-tiet">
                            <div class="ten-sach-1 text-justify">{{$sanpham->tensp}}</div>
                            <div class="">
                                <div class="d-flex ">
                                    <!-- <div class="gia-moi-1" style="background: #fff;">{{$sanpham->giamoi}}</div>
											<div class="gia-cu align-self-end ml-3"><strike>{{$sanpham->giacu}}</strike></div> -->
                                    @if($sanpham->giamoi == 0)
                                    <div class="gia-moi-1" style="background: #fff;">{{number_format($sanpham->giacu)}}đ</div>
                                    @else($sanpham->giamoi != 0)
                                    <div class="gia-moi-1" style="background: #fff;">{{number_format($sanpham->giamoi)}}đ</div>
                                    <div class="gia-cu align-self-end ml-3"><strike>{{number_format($sanpham->giacu)}}đ</strike></div>
                                    @endif()
                                </div>
                                @if($sanpham->giamoi != 0)
                                <div class="mb-3 ml-3">
                                    Giảm giá:
                                    <span class="sale-1 font-weight-bold" style="color: orange; font-size: 22px">15%</span>
                                </div>
                                @endif()
                            </div>

                            <div class="amount d-flex align-items-center">
                                <span onclick="minus()" class="btn-amount btn btn-outline-danger mr-2 font-weight-bold">-</span>
                                <input id="amount" type="text" name="qty" value="1" class="text-center w-25" style="height: 38px">
                                <span onclick="plus()" class="btn-amount btn btn-outline-danger ml-2 font-weight-bold">+</span>
                            </div>

                            <div class="mo-ta text-justify">
                                <span class="font-weight-bold">Nội dung:</span>
                                <span>{{$sanpham->mota}}</span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end pt-3 align-items-center">
                            <div class="p-2 mr-2">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="ma_SP" value="{{$sanpham->ma_SP}}">
                                <input id="price" type="hidden" name="price" value=" <?php if($sanpham->giamoi == 0){echo $sanpham->giacu;}else if($sanpham->giamoi != 0){echo $sanpham->giamoi;}?>">
                                <!-- <button type="submit" class="nut-mua-hang p-2 mr-2" style="border: none !important">
                                    <i class="fa fa-shopping-cart"></i> Mua ngay
                                </button> -->
                            </div>
                            @if(isset(Auth::user()->hoten))
                                @if( count($check) > 0)
                                <span>Sản phẩm đã có trong giỏ hàng &nbsp;</span>
                                <a class="text-white nut-mua-hang p-2" href="{{url('/giohang')}}" style="text-decoration: none;">
                                    Đi đến giỏ hàng>>
                                </a>
                                    @else  
                                    <button type="submit" class="nut-mua-hang p-2 mr-2 " style="border: none !important"><i class="mr-1 fa fa-shopping-cart"></i>Đặt hàng</button>
                                @endif
                                @else
                                <a class="text-white nut-mua-hang p-2" href="{{url('/dangnhap')}}" style="text-decoration: none;">
                                    <i class="mr-1 fa fa-shopping-cart"></i>Đặt hàng
                                </a>
                           @endif
                        </div>
                    </div>

                </div>
		 </form>
        </div>
       
    </div>
</div>

<!-- Sản phẩm liên quan -->
<div class="container mb-4">
    <div class="san-pham">
        <div class="tieu-de-san-pham text-center">Sản Phẩm Liên Quan</div>
        <div class="d-flex justify-content-center">
            <div class="bot"></div>
        </div>

        <div class="bao-quat-san-pham">
            <div class="row m-0 w-100">
                @foreach($listsanpham as $sp) @if ($sp->ma_loaiSP == $sanpham->ma_loaiSP && $sp->ma_SP != $sanpham->ma_SP)
                <div class="col-6 col-md-3">
                    <a href="{{url('/chitietsanpham/'. $sp->ma_SP)}}" class="product">
                        <div class="san-pham-hinh">
                            <img src="public/images/hinh-anh-trang-chu/{{$sp->hinhanh}}" alt="">
                            <div class="ten-sach text-dark">{{$sp->tensp}}</div>
                            @if($sp->giamoi == 0)
                            <div class="gia-moi mb-2">{{number_format($sp->giacu)}}đ</div>
                            @else($sp->giamoi != 0)
                            <div class="gia-moi">{{number_format($sp->giamoi)}}đ</div>
                            <div class="gia-cu text-dark"><strike>{{number_format($sp->giacu)}}đ</strike></div>
                            @endif()
                        </div>
                    </a>
                </div>
                @endif @endforeach
            </div>
            <div class=" mt-3">
                <div class="row m-0">
                    <div class="col-12 d-flex justify-content-end">
                        <div class="phan-trang ">
                            {{$listsanpham->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Phần cuối trang -->
@endsection