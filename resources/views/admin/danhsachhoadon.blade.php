<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - Danh Sách Hóa Đơn - FAHASHA.COM</title>
    <base href="{{asset('')}}">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="text/css" href="public/images/hinh-anh-trang-chu/icon-favicon-fahasha.ico"
          type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="public/css/danhsachhoadon.css">
    <link rel="stylesheet" type="text/css" href="public/font-awesome-4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="public/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="public/js/bootstrap.min.js"></script>
</head>
<body>
<!-- Menu chọn -->
<nav class="navbar navbar-default custom-navbar" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="navbar-brand custom-brand">
                ADMIN FAHASHA.COM
            </div>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav navbar-right custom-navbar-right">
                <li><a href="{{('admin/danh-sach-san-pham')}}">Sản Phẩm</a></li>
                <li class="active"><a href="{{('admin/danh-sach-hoa-don')}}">Hóa Đơn</a></li>
                <li><a href="{{'admin/danh-muc-san-pham'}}">Danh mục sản phẩm</a></li>
                @guest
                    <li></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Xin chào <span class="namestyle">{{ Auth::user()->hoten }}</span> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="" href="{{ route('logout') }}"
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
            </ul>
        </div><!-- /.navbar-collapse -->
    </div>
</nav>

<!-- Admin - Sản Phẩm -->
<div class="container">
    {{-- Câu thông báo --}}
    @if(session('thongbao'))
        <div class="alert alert-success">
            {{session('thongbao')}}
        </div>
    @endif
    <div class="danh-sach-dau">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="tieu-de-bang">
                    <span>Danh sách hóa đơn</span>
                </div>
            </div>
        </div>
    </div>

    <div class="danh-sach-giua">
        <table class="table table-border">
            <thead class="tieu-de-dau-danh-muc">
            <tr>
                <th>
                    <em class="fa fa-cog"></em>
                </th>
                <th>Mã hoá đơn</th>
                <th>Mã khách hàng</th>
                <th>Ngày lập</th>
                <th>Địa chỉ nhận hàng</th>
                <th>Trạng thái</th>
                <th>Tổng tiền</th>
            </tr>
            </thead>
            <tbody>
            @foreach($dshoadon as $mothoadon)
                <tr>
                    <td class="text-center">
                        <a class="btn btn-default custom-btn btn-xem" data-toggle="modal" href='#modal-xem'>
                            <em class="fa fa-eye"></em>
                        </a>
                        <a class="btn btn-default custom-btn" data-toggle="modal" href='admin/capnhattrangthai/{{$mothoadon->ma_HD}}'>
                            <em class="fa fa-check"></em>
                        </a>
                    </td>

                    <td class="text-center">{{$mothoadon->ma_HD}}</td>

                    <td class="text-center">{{$mothoadon->ma_KH}}</td>

                    <td class="text-center">{{$mothoadon->ngaylap}}</td>

                    <td>{{$mothoadon->diachi}}</td>

                    @if($mothoadon->trangthai == 1)
                    <td class="da-giao text-center">Đã giao</td>
                    @elseif($mothoadon->trangthai == 0)
                        <td class="dang-cho text-center">Đang chờ</td>
                    @endif

                    <td class="text-center">{{$mothoadon->tongtien}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="danh-sach-cuoi">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4"> </div>

            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 text-right">
                <ul class="pagination custom-pagination">
                    {{$dshoadon->links()}}
                </ul>
            </div>
        </div>
    </div>
</div>

<!--  Phần modal mở rộng  -->

<!-- Modal xem hóa đơn -->
<div class="modal fade" id="modal-xem">
    <div class="modal-dialog custom-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Xem Chi Tiết Hoá Đơn</h4>
            </div>
            <div class="modal-body modal-scrollbar">
                <div class="info-bill">
                    <div class="title">Thông Tin Hóa Đơn</div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                            <div class="input-group">
                                <span class="input-group-addon">Mã HĐ</span>
                                <input type="text" class="form-control" placeholder="Mã hoá đơn" id="txtMaHoaDon" readonly>
                            </div>

                            <div class="input-group">
                                <span class="input-group-addon">Mã KH</span>
                                <input type="text" class="form-control" placeholder="Mã khách hàng" id="txtMaKhachHang" readonly>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                            <div class="input-group">
                                <span class="input-group-addon">Ngày lập</span>
                                <input type="date" class="form-control" id="dateNgayLap" readonly>
                            </div>

                            <div class="input-group">
                                <span class="input-group-addon">Đ/c nhận hàng</span>
                                <input type="text" class="form-control" placeholder="Địa chỉ" id="txtDiaChi" readonly>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                            <div class="input-group">
                                <span class="input-group-addon">Trạng thái</span>
                                <input type="text" class="form-control" placeholder="Còn hoặc hết" id="txtTrangThai" readonly>
                            </div>

                            <div class="input-group">
                                <span class="input-group-addon">Tổng tiền</span>
                                <input type="text" class="form-control" placeholder="Tổng tiền" id="numTongTien" readonly>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="info-bill">
                    <div class="title">Thông Tin Khách Hàng</div>

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="input-group">
                                <span class="input-group-addon">Họ tên</span>
                                <input id="txtHoTenKH" type="text" class="form-control" placeholder="Họ tên" readonly>
                            </div>

                            <div class="input-group">
                                <span class="input-group-addon">Ngày sinh</span>
                                <input id="dtNgaySinhKH" type="date" class="form-control" placeholder="Ngày sinh" readonly>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="input-group">
                                <span class="input-group-addon">Email</span>
                                <input id="txtEmailKH" type="email" class="form-control" placeholder="Email" readonly>
                            </div>

                            <div class="input-group">
                                <span class="input-group-addon">Địa chỉ</span>
                                <!-- <input id="txtDiaChiKH" type="text" class="form-control" placeholder="Địa chỉ" readonly> -->
                                <textarea id="txtDiaChiKH" type="text" class="form-control" placeholder="Địa chỉ" readonly></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="info-bill">
                    <table class="table table-border table-cthd">
                        <thead>
                        <div class="title">Thông Tin Sản Phẩm Đã Mua</div>
                        <tr>
                            <th>Mã sản phẩm</th>
                            <th>Hình ảnh</th>
                            <th>Tên sản phẩm</th>
                            <th>Giá bán</th>
                            <th>Số Lượng</th>
                            <th>Thành Tiền</th>
                        </tr>
                        </thead>

                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Thoát</button>
            </div>
        </div>
    </div>
</div>
</body>
<script>
    {{-- Load dữ liệu bảng thông tin hóa đơn --}}
    $('.table tbody').on('click', '.btn-xem', function () {
        var currow = $(this).closest('tr');
        var ma_HD = currow.find('td:eq(1)').text();
        var ma_KH = currow.find('td:eq(2)').text();
        var ngaylap = currow.find('td:eq(3)').text();
        var diachi = currow.find('td:eq(4)').text();
        var trangthai = currow.find('td:eq(5)').text();
        var tongtien = currow.find('td:eq(6)').text();

        $("#txtMaHoaDon").val(ma_HD);
        $("#txtMaKhachHang").val(ma_KH);
        $("#dateNgayLap").val(ngaylap);
        $("#txtDiaChi").val(diachi);
        $("#txtTrangThai").val(trangthai);
        $("#numTongTien").val(tongtien);

        // load thong tin khach hang theo ma_TK
        $.ajax({
            type: 'GET',
            url: 'admin/khach-hang/' + ma_KH,
            success: function (data) {
                $("#txtHoTenKH").val(data.hoten);
                $("#txtDiaChiKH").val(data.diachi);
                $("#txtEmailKH").val(data.email);
                $("#dtNgaySinhKH").val(data.ngaysinh);
            },
            error: function(data) {
                console.log(data);
            }
        });

        // load chi tiet hoa don theo ma_HD
        $.ajax({
            type: 'GET',
            url: 'admin/chi-tiet-hoa-don/' + ma_HD,
            success: function (data) {

                // chuyen json thanh mang
                var parsedData = $.parseJSON(data);
                $(".table-cthd tbody").html(""); // xoa du lieu cu
                $.each(parsedData, function (key, value) {
                    // them du lieu moi
                    $(".table-cthd tbody").append("<tr><td>" + value.ma_SP + "</td><td> <img src=\"public/images/hinh-chi-tiet-san-pham/" + value.san_pham.hinhanh + "\" alt=\"\" width=\"64px\" height=\"64px\"></td><td>" + value.san_pham.tensp + "</td><td>" + value.giaban + "</td><td>" + value.soluong + "</td><td>" + value.tongtien + "</td></tr>");

                });
            },
            error: function(data) {
                console.log(data);
            }
        });
    });
</script>
</html>





