<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChiTietHoaDon extends Model
{
    // ket noi voi bang chi tiet hoa don trong csdl
    protected $table = "db_chitiethoadon";
    protected $primaryKey = "ma_HD";

    // ket noi quan he thong qua khoa ngoai
    // trong loai chi tiet hoa don chua nhieu san pham
    public function sanpham(){
        return $this->belongsTo('App\SanPham', 'ma_SP', 'ma_SP'); // day la 1 san pham thuoc ve 1 san pham khac: 1 loai san pham chua nhieu san pham khac nhau. truyen vao 3 tham so: 1: duong dan vao file, 2: khoa ngoai (khoa chung giua 2 bang), 3: khoa chinh, day la khoa chinh cua bang do
    }

    // trong hoa don chua nhieu chi tiet hoa don
    public function hoadon(){
        return $this->belongsTo('App\HoaDon', 'ma_HD', 'ID'); //  1 hoa don chua nhieu chi tiet hoa don khac nhau. truyen vao 3 tham so: 1: duong dan vao file, 2: khoa ngoai (khoa chung giua 2 bang), 3: khoa chinh, day la khoa chinh cua bang do
    }
}
