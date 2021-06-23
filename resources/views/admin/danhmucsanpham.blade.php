<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - Danh Mục Sản Phẩm - FAHASA.COM</title>
    <base href="{{asset('')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="text/css" href="public/images/hinh-anh-trang-chu/icon-favicon-fahasha.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="public/css/danhmucsanpham.css">
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
                <li><a href="{{'admin/danh-sach-san-pham'}}">Sản Phẩm</a></li>
                <li><a href="{{'admin/danh-sach-hoa-don'}}">Hóa Đơn</a></li>
                <li class="active"><a href="{{'admin/danh-muc-san-pham'}}">Danh mục sản phẩm</a></li>
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
    <!-- Cau thong bao khi xoa danh muc san pham(Quanh) -->
    @if(session('thongbao'))
        <div class="alert alert-success">
            {{session('thongbao')}}
        </div>
    @endif
    <div class="danh-sach-dau">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="tieu-de-bang">
                    <span>Danh mục sản phẩm</span>
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
                <th>Mã loại</th>
                <th>Tên loại</th>
            </tr>
            </thead>
            <tbody>
            @foreach($danhmucsanpham as $motdanhmuc)
                <tr>
                    <td class="text-center">
                        <a class="btn btn-default btn-sua" data-toggle="modal" href='#modal-sua'>
                            <em class="fa fa-pencil"></em>
                        </a>
                        <a onclick="return confirm('Bạn có chắc muốn xóa ?')" class="btn btn-danger" data-toggle="modal" href='admin/xoadanhmuc{{$motdanhmuc->ma_loaiSP}}'>
                            <em class="fa fa-trash"></em>
                        </a>
                    </td>

                    <td class="text-center">{{$motdanhmuc->ma_loaiSP}}</td>

                    <td>{{$motdanhmuc->tenloaisp}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="danh-sach-cuoi">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <span class="trang-hien-tai">Trang 1 của 5</span>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 text-right">
                <ul class="pagination custom-pagination">
                    {{$danhmucsanpham->links()}}
                </ul>
            </div>
        </div>
    </div>
</div>

<!--  Phần modal mở rộng  -->

<!-- Modal thêm mới sản phẩm -->
<div class="modal fade" id="modal-them">
    <div class="modal-dialog">
        <form action="admin/themdanhmuc" method="POST">
            {{csrf_field()}}
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Thêm Danh Mục Sản Phẩm</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <div class="input-group">
                                <span class="input-group-addon">Mã loại SP</span>
                                <input name="maloaiSP" type="text" class="form-control" placeholder="Mã Loại SP">
                            </div>
                        </div>

                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <div class="input-group">
                                <span class="input-group-addon">Tên loại</span>
                                <input name="tenloaiSP" type="text" class="form-control" placeholder="Tên Loại">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal sửa sản phẩm -->
<div class="modal fade" id="modal-sua">
    <div class="modal-dialog">
        <form action="admin/sua" method="post">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Sửa Danh Mục</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <div class="input-group">
                                <span class="input-group-addon">Mã loại SP</span>
                                <input name="maloaiSP" id="txt_MaloaiSP"  class="form-control" placeholder="Mã Loại SP" readonly="true">

                            </div>
                        </div>

                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <div class="input-group">
                                <span class="input-group-addon">Tên loại</span>
                                <input name="tenloaiSP" id="txt_TenloaiSP" type="text" class="form-control" placeholder="Tên Loại">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-default" data-dismiss="modal">Làm mới</button>
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
            </div>
        </form>

    </div>
</div>
</body>
<script type="text/javascript">
    $('.table tbody').on('click', '.btn-sua', function () {

        var currow = $(this).closest('tr');
        var ma_loaiSP = currow.find('td:eq(1)').text();
        var tenloaisp = currow.find('td:eq(2)').text();

        $("#txt_MaloaiSP").val(ma_loaiSP);
        $("#txt_TenloaiSP").val(tenloaisp);


    });
</script>
</html>
