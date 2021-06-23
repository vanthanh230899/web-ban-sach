@extends('masterpage') @section('body')
<div class="navigation mb-3 mt-3">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 pb-3">
            @include('danhmucsp')
        </div>

        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 p-0 pl-md-3 pr-md-3">
            @include('slide-home')
        </div>
    </div>
</div>

<!--  Sản phẩm nổi bật -->
<div class="san-pham mb-3">
    <div class="tieu-de-san-pham text-center text-uppercase">Sản phẩm nổi bật: {{count($spnoibat)}}</div>
    <div class="d-flex justify-content-center">
        <div class="bot"></div>
    </div>
    <div class="bao-quat-san-pham">
        <div class="row">
            @foreach($spnoibat as $spnb)
            <div class="col-6 col-md-2 col-lg-2">
                <a href="{{url('chitietsanpham/'. $spnb->ma_SP)}}" class="product">
                    <div class="san-pham-hinh">
                        <img src="public/images/hinh-anh-trang-chu/{{$spnb->hinhanh}}" alt="">
                        <div class="ten-sach text-dark">{{$spnb->tensp}}</div>
                        @if($spnb->giamoi == 0)
                        <div class="gia-moi mb-2">{{number_format($spnb->giacu)}}đ</div>
                        @else($spnb->giamoi != 0)
                        <div class="gia-moi">{{number_format($spnb->giamoi)}}đ</div>
                        <div class="gia-cu text-dark"><strike>{{number_format($spnb->giacu)}}đ</strike></div>
                        @endif()
                    </div>
                </a>
                @if($spnb->giamoi != 0)
                <div class="sale">
                    Sale
                </div>
                @endif()
            </div>
            @endforeach
        </div>
    </div>

</div>

<!--  Sản phẩm mới -->
<div class="san-pham mb-3">
    <div class="tieu-de-san-pham text-center text-uppercase">Sản phẩm mới: {{count($spmoi)}}</div>
    <div class="d-flex justify-content-center">
        <div class="bot"></div>
    </div>
    <div class="bao-quat-san-pham">
        <div class="row">
            @foreach($spmoi as $spm)
            <div class="col-6 col-md-2 col-lg-2">
                <a href="{{url('chitietsanpham/'.$spm->ma_SP)}}" class="product">
                    <div class="san-pham-hinh">
                        <img src="public/images/hinh-anh-trang-chu/{{$spm->hinhanh}}" alt="">
                        <div class="ten-sach text-dark">{{$spm->tensp}}</div>

                        @if($spm->giamoi == 0)
                        <div class="gia-moi mb-2">{{number_format($spm->giacu)}}đ</div>
                        @else($spm->giamoi != 0)
                        <div class="gia-moi">{{number_format($spm->giamoi)}}đ</div>
                        <div class="gia-cu text-dark"><strike>{{number_format($spm->giacu)}}đ</strike></div>
                        @endif()

                    </div>
                </a>
                @if($spm->giamoi != 0)
                <div class="sale">
                    Sale
                </div>
                @endif()
            </div>
            @endforeach
        </div>
    </div>

</div>

<!--san pham khuyen mai-->
<div class="san-pham mb-3">
    <div class="tieu-de-san-pham text-center text-uppercase">Sản phẩm khuyến mãi: {{count($spkhuyenmai)}}</div>
    <div class="d-flex justify-content-center">
        <div class="bot"></div>
    </div>
    <div class="bao-quat-san-pham">
        <div class="row">
            @foreach($spkhuyenmai as $spkm)
            <div class="col-6 col-md-2 col-lg-2">
                <a href="{{url('chitietsanpham/'. $spkm->ma_SP)}}" class="product">
                    <div class="san-pham-hinh">
                        <img src="public/images/hinh-anh-trang-chu/{{$spkm->hinhanh}}" alt="">
                        <div class="ten-sach text-dark">{{$spkm->tensp}}</div>

                        <div class="gia-moi">{{number_format($spkm->giamoi)}}đ</div>
                        <div class="gia-cu text-dark"><strike>{{number_format($spkm->giacu)}}đ</strike></div>

                    </div>
                </a>
                @if($spkm->giamoi != 0)
                <div class="sale">
                    Sale
                </div>
                @endif()
            </div>
            @endforeach
        </div>
    </div>

</div>

<!-- Logo đối tác -->
<div class="logo-doi-tac">
    <div class="list-anh-doi-tac">
        <div class="row mb-2">
            <div class="col-6 col-md-2 col-lg-2 mb-md-2 mb-3">
                <img src="public/images/hinh-anh-trang-chu/logo-doi-tac/logo-cambridge.jpg" alt="">
            </div>

            <div class="col-6 col-md-2 col-lg-2 mb-md-2 mb-3">
                <img src="public/images/hinh-anh-trang-chu/logo-doi-tac/logo-cengage.jpg" alt="">
            </div>

            <div class="col-6 col-md-2 col-lg-2 mb-md-2 mb-3">
                <img src="public/images/hinh-anh-trang-chu/logo-doi-tac/logo-hachette.jpg" alt="">
            </div>

            <div class="col-6 col-md-2 col-lg-2 mb-md-2 mb-3">
                <img src="public/images/hinh-anh-trang-chu/logo-doi-tac/logo-Harper-Collins.jpg" alt="">
            </div>

            <div class="col-6 col-md-2 col-lg-2 mb-md-2 mb-3">
                <img src="public/images/hinh-anh-trang-chu/logo-doi-tac/logo-macgrawhill.jpg" alt="">
            </div>

            <div class="col-6 col-md-2 col-lg-2 mb-md-2 mb-3">
                <img src="public/images/hinh-anh-trang-chu/logo-doi-tac/logo-macmillan.jpg" alt="">
            </div>
        </div>
    </div>

    <div class="list-anh-doi-tac">
        <div class="row mb-2">
            <div class="col-6 col-md-2 col-lg-2 mb-md-2 mb-3">
                <img src="public/images/hinh-anh-trang-chu/logo-doi-tac/logo-oxford.jpg" alt="">
            </div>

            <div class="col-6 col-md-2 col-lg-2 mb-md-2 mb-3">
                <img src="public/images/hinh-anh-trang-chu/logo-doi-tac/logo-paragon.jpg" alt="">
            </div>

            <div class="col-6 col-md-2 col-lg-2 mb-md-2 mb-3">
                <img src="public/images/hinh-anh-trang-chu/logo-doi-tac/logo-pearson-longman.jpg" alt="">
            </div>

            <div class="col-6 col-md-2 col-lg-2 mb-md-2 mb-3">
                <img src="public/images/hinh-anh-trang-chu/logo-doi-tac/logo-penguin.jpg" alt="">
            </div>

            <div class="col-6 col-md-2 col-lg-2 mb-md-2 mb-3">
                <img src="public/images/hinh-anh-trang-chu/logo-doi-tac/logo-sterling.jpg" alt="">
            </div>

            <div class="col-6 col-md-2 col-lg-2 mb-md-2 mb-3">
                <img src="public/images/hinh-anh-trang-chu/logo-doi-tac/logo-usborn.jpg" alt="">
            </div>
        </div>
    </div>
</div>

<!-- Phần cuối trang -->
@endsection
