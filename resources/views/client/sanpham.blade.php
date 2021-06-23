@extends('masterpage') @section('body')

<div class="navigation">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 pb-3">
            @include('danhmucsp')
        </div>
        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
            <div class="demo-san-pham">

                <!-- Hình ảnh banner quảng cáo -->
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <img src="public/images/hinh-san-pham/banner-quang-cao/banner-quang-cao-top100chay-570x186.jpg" alt="">
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 mt-2 mt-md-0">
                        <img src="public/images/hinh-san-pham/banner-quang-cao/banner-quang-cao-tuyen-tap-cac-tac-gia-tre-duoc-yeu-thich-nhat570x186.jpg" alt="">
                    </div>
                </div>

                <div class="danh-sach-san-pham pt-4">
                    <!--  loại sản phẩm -->
                    <div class="san-pham mb-3">
                        <div class="tieu-de-san-pham text-center text-uppercase">{{$loaisanpham->tenloaisp}}</div>
                        <div class="d-flex justify-content-center">
                            <div class="bot"></div>
                        </div>
                        <div class="bao-quat-san-pham">
                            <div class="row">
                                @foreach($listsanpham as $sp)
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
                                @endforeach
                            </div>
                            <!--phan trang-->
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

                <!-- Hình ảnh logo  -->
                <div class="mt-4">
                    <div class="row">
                        <div class="col-6 col-md-2 col-lg-2 mb-3">
                            <img src="public/images/hinh-san-pham/logo-san-pham/logo-MinhLong.jpg" alt="">
                        </div>

                        <div class="col-6 col-md-2 col-lg-2 mb-3">
                            <img src="public/images/hinh-san-pham/logo-san-pham/logo-DinhTi.jpg" alt="">
                        </div>

                        <div class="col-6 col-md-2 col-lg-2 mb-3">
                            <img src="public/images/hinh-san-pham/logo-san-pham/logo-IPM.jpg" alt="">
                        </div>

                        <div class="col-6 col-md-2 col-lg-2 mb-3">
                            <img src="public/images/hinh-san-pham/logo-san-pham/logo-Bao.jpg" alt="">
                        </div>

                        <div class="col-6 col-md-2 col-lg-2 mb-3">
                            <img src="public/images/hinh-san-pham/logo-san-pham/logo-1980s.jpg" alt="">
                        </div>

                        <div class="col-6 col-md-2 col-lg-2 mb-3">
                            <img src="public/images/hinh-san-pham/logo-san-pham/logo-KimDong.jpg" alt="">
                        </div>
                    </div>

                    <!-- Hình ảnh logo  -->
                    <div class="row">
                        <div class="col-6 col-md-2 col-lg-2 mb-3">
                            <img src="public/images/hinh-san-pham/logo-san-pham/logo-NXBTre.jpg" alt="">
                        </div>

                        <div class="col-6 col-md-2 col-lg-2 mb-3">
                            <img src="public/images/hinh-san-pham/logo-san-pham/logo-AlphaBooks.jpg" alt="">
                        </div>

                        <div class="col-6 col-md-2 col-lg-2 mb-3">
                            <img src="public/images/hinh-san-pham/logo-san-pham/logo-FirstNews.jpg" alt="">
                        </div>

                        <div class="col-6 col-md-2 col-lg-2 mb-3">
                            <img src="public/images/hinh-san-pham/logo-san-pham/logo-XYZ.jpg" alt="">
                        </div>

                        <div class="col-6 col-md-2 col-lg-2 mb-3">
                            <img src="public/images/hinh-san-pham/logo-san-pham/logo-Thaihabooks-600x600.jpg" alt="">
                        </div>

                        <div class="col-6 col-md-2 col-lg-2 mb-3">
                            <img src="public/images/hinh-san-pham/logo-san-pham/logo-AZ.jpg" alt="">
                        </div>
                    </div>

                    <!-- Hình ảnh logo  -->
                    <div class="row">
                        <div class="col-6 col-md-2 col-lg-2 mb-3">
                            <img src="public/images/hinh-san-pham/logo-san-pham/logo-Rio-book.jpg" alt="">
                        </div>

                        <div class="col-6 col-md-2 col-lg-2 mb-3">
                            <img src="public/images/hinh-san-pham/logo-san-pham/logo-BachViet.jpg" alt="">
                        </div>

                        <div class="col-6 col-md-2 col-lg-2 mb-3">
                            <img src="public/images/hinh-san-pham/logo-san-pham/logo-TanViet.jpg" alt="">
                        </div>

                        <div class="col-6 col-md-2 col-lg-2 mb-3">
                            <img src="public/images/hinh-san-pham/logo-san-pham/logo-QuangVan.jpg" alt="">
                        </div>

                        <div class="col-6 col-md-2 col-lg-2 mb-3">
                            <img src="public/images/hinh-san-pham/logo-san-pham/logo-ChiBook.jpg" alt="">
                        </div>

                        <div class="col-6 col-md-2 col-lg-2 mb-3">
                            <img src="public/images/hinh-san-pham/logo-san-pham/logo-H2T.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Phần cuối trang -->
@endsection