<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Nhà Sách Trực Tuyến Fahasah.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="text/css" href="public/images/hinh-anh-trang-chu/icon-favicon-fahasha.ico" type="image/x-icon">

    <!--gọi đường dẫn tương đối cho public-->
    <base href="{{asset('')}}">

    <!-- <link rel="stylesheet" type="text/css" href="public/font-awesome-4.7.0/css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- <link rel="stylesheet" type="text/css" href="public/css/bootstrap.min.css"> -->
    <link rel="stylesheet" type="text/css" href="public/css/bootstrap4.3/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="public/css/index.css">
    <link rel="stylesheet" type="text/css" href="public/css/sanpham.css">
    <link rel="stylesheet" type="text/css" href="public/css/chitietsanpham.css">
    <link rel="stylesheet" type="text/css" href="public/css/dangnhap.css">
    <link rel="stylesheet" type="text/css" href="public/css/dangky.css">
    <link rel="stylesheet" type="text/css" href="public/css/giohang.css">
    <!-- <link rel="stylesheet" type="text/css" href="public/css/giohangtrong.css"> -->
    <link rel="stylesheet" type="text/css" href="public/css/timkiem.css">
    <link rel="stylesheet" type="text/css" href="public/css/timkiemtrong.css">
    <link rel="stylesheet" type="text/css" href="public/css/thongtinkhachhang.css">


    <!-- <script type="text/javascript" src="public/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="public/js/bootstrap.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>

<body>

    <!--banner quang cao-->
    @include('banner')

    <!--header-->
    @include('header')

    <!--end-header-->

    <!--content-->
    <div class="container">
        @yield('body')
    </div>
    <!--end-content-->

    <!-- footer -->
    @include('footer')
    <!--end-footer-->
</body>

</html>
