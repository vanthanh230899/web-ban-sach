<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - Sản Phẩm - FAHASA.COM</title>
    <base href="{{asset('')}}">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="text/css" href="public/images/hinh-anh-trang-chu/icon-favicon-fahasha.ico"
          type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="public/css/danhsachsanpham.css">
    <link rel="stylesheet" type="text/css" href="public/font-awesome-4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="public/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="public/js/bootstrap.min.js"></script>

</head>
<body>
<!-- <div>
    <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat, minus asperiores provident ab, a facilis animi voluptate optio ducimus nulla. Fugiat tempora itaque, quasi eum recusandae quam consequuntur consectetur. Possimus.</span>
</div> -->

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
                <li class="active"><a href="{{'admin/danh-sach-san-pham'}}">Sản Phẩm</a></li>
                <li><a href="{{'admin/danh-sach-hoa-don'}}">Hóa Đơn</a></li>
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
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="tieu-de-bang">
                    <span>Danh sách sản phẩm</span>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 text-right">
                <button class="btn btn-success" data-toggle="modal" href='#modal-them'>Thêm mới</button>
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
                <th>Mã sản phẩm</th>
                <th>Mã loại</th>
                <th>Hình ảnh</th>
                <th>Tên sản phẩm</th>
                <th>Giá củ</th>
                <th>Giá mới</th>
                <th>Mô tả</th>
                <th>Số Lượng</th>
            </tr>
            </thead>
            <tbody>
            @foreach($dssanpham as $motsanpham)
            <tr>
                <td class="text-center">
                    <a class="btn btn-default btnsua" data-toggle="modal" href='#modal-sua'>
                        <em class="fa fa-pencil"></em>
                    </a>
                    <a onclick="return confirm('Bạn có chắc chắn muốn xóa!')" class="btn btn-danger" data-toggle="modal" href='admin/xoasp{{$motsanpham->ma_SP}}'>
                        <em class="fa fa-trash"></em>
                    </a>
                </td>

                <td>{{$motsanpham->ma_SP}}</td>

                <td>{{$motsanpham->ma_loaiSP}}</td>

                <td class="anh-san-pham">
                    <img src="public/images/hinh-chi-tiet-san-pham/{{$motsanpham->hinhanh}}" alt="">
                </td>

                <td class="ten-sach">{{$motsanpham->tensp}}</td>

                <td>{{$motsanpham->giacu}}</td>

                <td>{{$motsanpham->giamoi}}</td>

                <td class="mo-ta"><p>{{$motsanpham->mota}}</p></td>

                <td>{{$motsanpham->soluong}}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="danh-sach-cuoi">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4"></div>

            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 text-right">
                <ul class="pagination custom-pagination">
                    {{$dssanpham->links()}}
                </ul>
            </div>
        </div>
    </div>
</div>

<!--  Phần modal mở rộng  -->

<!-- Modal thêm mới sản phẩm -->
<div class="modal fade" id="modal-them">
    <div class="modal-dialog">
        <form action="admin/them" method="post" enctype="multipart/form-data" id="formThem">
            {{csrf_field()}}
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Thêm Sản Phẩm Mới</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <div class="input-group">
                                <span class="input-group-addon">Tên SP</span>
                                <input name="tensanpham" type="text" class="form-control" placeholder="Tên Sản phẩm" required>
                            </div>

                            <div class="input-group">
                                <span class="input-group-addon">Mã SP</span>
                                <input name="masanpham" type="text" class="form-control" placeholder="Mã Sản phẩm" required>
                            </div>

                            <div class="input-group">
                                <span class="input-group-addon">Mã Loại</span>
                                <select name="maloai" class="form-control">
                                    @foreach($listloaisanpham as $loaisp)
                                        <option value="{{$loaisp->ma_loaiSP}}">{{$loaisp->tenloaisp}}</option>
                                    @endforeach
                                </select>
{{--                                <input name="maloai" type="text" class="form-control" placeholder="Mã Loại">--}}
                            </div>

                            <div class="input-group">
                                <span class="input-group-addon">Số lượng</span>
                                <input name="soluong" type="number" class="form-control" value="1" min="1" max="500">
                            </div>

                            <div class="input-group">
                                <span class="input-group-addon">Mô tả</span>
                                <textarea name="mota" rows="4" placeholder="Mô tả" class="form-control"></textarea>
                            </div>

                        </div>

                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <div class="input-group">
                                <span class="input-group-addon">Giá củ</span>
                                <input name="giacu" type="text" class="form-control" placeholder="Giá củ">
                            </div>

                            <div class="input-group">
                                <span class="input-group-addon">Giá mới</span>
                                <input name="giamoi" type="text" class="form-control" placeholder="Giá mới">
                            </div>

                            <div class="input-group">
                                <span class="input-group-addon">Hình ảnh</span>
                                <input id="inputImageThem" type="file" name="hinhanh" type="submit" value="" class="form-control">
                                <img id="imgHinhAnhThem" src="public/images/hinh-chi-tiet-san-pham/nopicture.jpg" alt="" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Thoát</button>
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal sửa sản phẩm -->
<div class="modal fade" id="modal-sua">
    <div class="modal-dialog">
        <form action="admin/suasp" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Sửa Sản Phẩm</h4>
                </div>
                @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $err)
                            {{$err}}<br>
                        @endforeach
                    </div>
                @endif
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <div class="input-group">
                                <span class="input-group-addon">Tên SP</span>
                                <input name="tensanpham" id="txtTenSanPham" type="text" class="form-control" placeholder="Tên Sản phẩm">
                            </div>

                            <div class="input-group">
                                <span class="input-group-addon">Mã SP</span>
                                <input name="masanpham" id="txtMaSanPham" type="text" class="form-control" placeholder="Mã Sản phẩm" required readonly="true">
                            </div>

                            <div class="input-group">
                                <span class="input-group-addon">Mã Loại</span>
                                <select id="sltMaLoai" name="maloai" class="form-control">
                                    @foreach($listloaisanpham as $loaisp)
                                    <option value="{{$loaisp->ma_loaiSP}}">{{$loaisp->tenloaisp}}</option>
                                   @endforeach
                                </select>
{{--                                <input  id="sltMaLoai" name="maloai" type="text" class="form-control" placeholder="Mã Loại">--}}
                            </div>

                            <div class="input-group">
                                <span class="input-group-addon">Số lượng</span>
                                <input name="soluong" id="numSoLuong" type="number" class="form-control" value="1" min="1" max="500">
                            </div>

                            <div class="input-group">
                                <span class="input-group-addon">Mô tả</span>
                                <textarea name="mota" id="txtMoTa" rows="4" placeholder="Mô tả" class="form-control"></textarea>
                            </div>

                        </div>

                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <div class="input-group">
                                <span class="input-group-addon">Giá củ</span>
                                <input name="giacu" id="numGiaCu" type="text" class="form-control" placeholder="Giá củ" required>
                            </div>

                            <div class="input-group">
                                <span class="input-group-addon">Giá mới</span>
                                <input name="giamoi" id="numGiaMoi" type="text" class="form-control" placeholder="Giá mới" required>
                            </div>

                            <div class="input-group">
                                <span class="input-group-addon">Hình ảnh</span>
                                <input id="inputImage" type="file" name="hinhanh" accept="image/*" class="form-control">
                                <img id="imgHinhAnh" src="public/images/hinh-chi-tiet-san-pham/nopicture.jpg" alt="" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-default" data-dismiss="modal">Làm Mới</button>
                    <button type="submit" class="btn btn-primary">Sửa</button>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
{{-- Load dữ liệu lên modal Sửa sản phẩm -- Admin (Tuyết) --}}
<script>
    $('.table tbody').on('click', '.btnsua', function () {
        var currow = $(this).closest('tr');
        var ma_SP = currow.find('td:eq(1)').text();
        var ma_loaiSP = currow.find('td:eq(2)').text();
        var hinhanh = currow.find('td:eq(3) img').attr("src");
        var tensp = currow.find('td:eq(4)').text();
        var giacu = currow.find('td:eq(5)').text();
        var giamoi = currow.find('td:eq(6)').text();
        var mota = currow.find('td:eq(7) p').text();
        var soluong = currow.find('td:eq(8)').text();

        $("#txtMaSanPham").val(ma_SP);
        $("#txtTenSanPham").val(tensp);
        $("#sltMaLoai").val(ma_loaiSP);
        $("#numSoLuong").val(soluong);
        $("#numGiaCu").val(giacu);
        $("#numGiaMoi").val(giamoi);
        $("#txtMoTa").val(mota);
        $("#imgHinhAnh").attr("src", hinhanh);
        $("#inputImage").val(hinhanh);

    });

    $("#inputImage").on("change", function (){
        var fileName = this.files[0];
        $("#imgHinhAnh").attr("src", URL.createObjectURL(fileName));
    });

    $("#inputImageThem").on("change", function (){
        var fileName = this.files[0];
        $("#imgHinhAnhThem").attr("src", URL.createObjectURL(fileName));
    });

    //show mã loại sản phẩm theo option
    $(document).ready(function () {

    });

</script>
</html>
