@extends('masterpage') @section('body')
<div class="navigation mb-3 mt-3">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-3 pb-3">
            @include('danhmucsp')
        </div>
        <div class="col-12 col-md-9 pt-3 pb-3 m-0 pl-3">
            <div style="font-size: 24px">
                <span class="text-uppercase m-0">Kết quả tìm kiếm cho từ khóa: </span><span class="ml-2" style="color: crimson;">{{$key}}</span>
            </div>
            @if(count($product) != 0)
            <div>Tìm thấy {{count($product)}} sản phẩm</div>
            @endif @if(count($product) == 0)
            <div class="p-2 mt-4" style="border: 1px dashed #F7941E; background: #fafafa;">
                <span style="font-weight: 600">Không có sản phẩm nào phù hợp với tìm kiếm của bạn!</span>
            </div>
            @endif @if(count($product) != 0)
            <div class="danh-sach-san-pham pt-4">
                <div class="san-pham mb-3">
                    <div class="bao-quat-san-pham">
                        <div class="row">
                            @foreach($product as $sp)
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
                        
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
<!-- Phần cuối trang -->
@endsection