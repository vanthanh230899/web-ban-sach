@extends('masterpage') @section('body')
<script>
    let total = parseInt(<?php echo $total;?>);

    function plus(id) {
        let a = Number(document.getElementById('amount-' + id).value);
        let price = document.getElementById('price-' + id).value.replace(/,/g, ""); //bỏ dấu , trong chuỗi
        document.getElementById('total-' + id).value = String(price * (a + 1)).replace(/(.)(?=(\d{3})+$)/g, '$1,'); // them dấu ,
        document.getElementById('amount-' + id).value = a + 1;
        total = total + parseInt(price);
        document.getElementById('total').value = String(total).replace(/(.)(?=(\d{3})+$)/g, '$1,');
        document.getElementById('total-hidden').value = total;
    }

    function minus(id) {
        let a = Number(document.getElementById('amount-' + id).value);

        if (a <= 1) {
            document.getElementById('amount-' + id).value = 1;
            document.getElementById('total-' + id).value = document.getElementById('price-' + id).value;
            // document.getElementById('total').value = <?php echo $total;?>;
        } else {
            document.getElementById('amount-' + id).value = a - 1;
            let price = document.getElementById('price-' + id).value.replace(/,/g, ""); //bỏ dấu , trong chuỗi
            document.getElementById('total-' + id).value = String(price * (a - 1)).replace(/(.)(?=(\d{3})+$)/g, '$1,'); // them dấu ,
            total = total - parseInt(price);
            // document.getElementById('total').value = total - parseInt(price);
            document.getElementById('total').value = String(total).replace(/(.)(?=(\d{3})+$)/g, '$1,');
            document.getElementById('total-hidden').value = total;
        }
    }
</script>

@if(count($data) > 0)
<!-- Giỏ hàng -->
<div class="danh-muc-gio-hang mt-3 mb-3">
    <div class="row m-0 d-flex justify-content-between">
        <div class="col-4 font-weight-bold p-0">
            <span class="title">Tên Sản Phẩm</span>
        </div>

        <div class="col-2 font-weight-bold p-0 text-justify">
            <span class="title">Đơn Giá</span>
        </div>

        <div class="col-2 font-weight-bold p-0 text-md-left">
            <span class="title">Số Lượng</span>
        </div>

        <div class="col-2 font-weight-bold p-0 text-justify">
            <span class="title">Tổng tiền</span>
        </div>

        <div class="col-2 font-weight-bold p-0 ">
            <span class="title">Thao Tác</span>
        </div>
    </div>
</div>

@foreach($data as $key =>$values)
<div class="khung-mo-ta">
    <form action="{{url('update/'.$values->id)}}" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="row m-0 justify-content-between">
            <div class="col-4 p-0 align-self-center ">
                <div class="text-wrapper mr-2">
                    <div class="row m-0">
                        <div class="col-md-3 col-12 p-0 ">
                            <div class="san-pham-check">
                                <img src="public/images/hinh-anh-trang-chu/{{$values->hinhanh}}" alt="">
                            </div>
                        </div>
                        <div class="col-md-9 col-12 p-0 align-self-center text-justify">
                            <p class="ten-san-pham mb-0" style="font-size: 15px">{{$values->tensp}}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-2 p-0 align-self-center">
                <div class="text-wrapper text-justify mr-2">
                    <span class="don-gia font-weight-bold d-md-block d-none">
								<input id="price-{{$key}}" class="don-gia" style="border: none; background: #fff; text-align: center;width: 40%;" type="text" disabled value="{{number_format($values->product_price)}}"><span>đ</span>
                    </span>
                    <span class="don-gia font-weight-bold d-block d-md-none">
								<input id="price-{{$key}}" class="don-gia" style="border: none; background: #fff; text-align: center;width: 80%;" type="text" disabled value="{{number_format($values->product_price)}}"><span>đ</span>
                    </span>
                </div>
            </div>

            <div class="col-2 p-0 align-self-center d-md-flex d-none">
                <div class="text-wrapper text-justify  d-flex align-items-center">
                    <span onclick="minus({{$key}})" class="align-self-center nut-giam mr-1"><i class="fa fa-minus"></i></span>
                    <input id='amount-{{$key}}' name="amount" type="text" class="input-soluong" value="{{$values->product_amount}}">
                    <span onclick="plus({{$key}})" class="align-self-center nut-tang ml-1"><i class="fa fa-plus"></i></span>
                </div>
            </div>

            <div class="col-2 p-0 align-self-center">
                <div class="text-wrapper text-justify d-md-block d-none">
                    <span class="don-gia font-weight-bold"><input id="total-{{$key}}" class="don-gia" style="border: none; background: #fff; text-align: center;width: 40%;" type="text" disabled value="{{number_format($values->total_money)}}"><span>đ</span></span>
                </div>
                <div class="text-wrapper text-justify d-block d-md-none">
                    <span class="don-gia font-weight-bold"><input id="total-{{$key}}" class="don-gia" style="border: none; background: #fff; text-align: center;width: 80%;" type="text" disabled value="{{number_format($values->total_money)}}"><span>đ</span></span>
                </div>
            </div>

            <div style="display: flex; justify-content: center;" class="col-2 align-self-center">
                <div class="d-flex align-items-center">
                    <!-- <a href="delete/{{$values->ma_SP}}" class="nut-xoa"><i class="fa fa-trash-o" aria-hidden="true"></i></a> {{ csrf_field() }} -->
                    <!-- <a href="delete/{{$values->ma_SP}}" class="nut-xoa">xoa</a>
                    <button type="submit" class="nut-xoa"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button> -->

                    <a href="delete/{{$values->ma_SP}}" class="nut-xoa" style="color: #333">
                        <i class="fa fa-trash-o"></i>
                    </a>
                    <button type="submit" class="nut-xoa btn" style="outline: none !important"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                </div>
            </div>

        </div>
    </form>
</div>
@endforeach

<div class="khung-tong-tien mb-3">
    <div class="row m-0 justify-content-between">

        <div class="col-md-4 col-12 align-self-center p-0">
            <div class="text-justify">
                <span>Hiện tại có ({{count($data)}}) loại sản phẩm trong giỏ hàng!</span>
            </div>
        </div>

        <div class="col-md-4 col-12 align-self-center p-0">
            <div class="text-justify">
                <span class="price" style="font-weight: 500">Thành tiền:<input id="total" class="don-gia" style="border: none; background: #fff;text-align: center;width: 25%;" type="text" disabled value="{{number_format($total)}}"><span class="don-gia">đ</span></span>
                <input id="total-hidden" type="hidden" value="{{$total}}">
            </div>
        </div>

        <div class="col-md-4 col-12 align-self-center p-0">
            <div class="text-wrapper row">

                <div class="col-6 text-left">
                    <a href="{{url('thanhtoan')}}" class="font-weight-bold " style="text-decoration: none !important; color: #c92127; font-size: 20px">Thanh toán</a>
                    <!-- <button type="submit" class="btn ">Thanh toán</button> -->
                    <!-- <a href="{{url('thanhtoan')}}"><div class="nut-mua-hang"></div></a> -->
                </div>
                <div class="col-6 ">
                    <a href="{{url('/')}}" class="text-white backhome" style="text-decoration: none;">
                        <div class="backhome">Quay lại mua hàng</div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
<!--gio hang trong-->
@if(count($data) == 0)
<div class="pt-3 pb-3 m-0 mt-3 mb-3" style="background: #fff;">
    <div class="text-center">
        <img src="public/images/hinh-gio-hang/icon-giohang.jpg" class="" width ="400px">
        <div><h5 class="align-self-center">Giỏ hàng của bạn đang trống!</h5></div>
        <div><a href="{{url('/')}}" class="backhome text-white p-1" style="text-decoration: none; font-size: 15px;">Quay về trang chủ</a></div>
    </div>

</div>
</div>
@endif
<!-- Phần cuối trang -->
@endsection