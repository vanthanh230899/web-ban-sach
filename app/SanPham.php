<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class SanPham extends Model
{
    // ket noi voi bang san pham trong csdl
    protected $table = "db_sp";

    protected $primaryKey = "ma_SP";

    //Thêm 2 dòng bắt buộc trong laravel 5.7.15
    protected $keyType = 'string';
    public $incrementing = false;

    // ket noi quan he thong qua khoa ngoai
    // trong loai sp co nhieu san pham
    public function loaisanpham(){
        return $this->belongsTo('App\LoaiSanPham', 'ma_loaiSP', 'ma_SP'); // day la 1 san pham thuoc ve 1 san pham khac: 1 loai san pham chua nhieu san pham khac nhau. truyen vao 3 tham so: 1: duong dan vao file, 2: khoa ngoai (khoa chung giua 2 bang), 3: khoa chinh, day la khoa chinh cua bang do
    }

    // trong chi tiet hoa don co nhieu san pham
    public function chitiethoadon(){
        return $this->hasMany('App\ChiTietHoaDon', 'ma_SP', 'ma_SP'); // day la quan he 1 nhieu: 1 chi tiet hoa don chua nhieu san pham khac nhau. truyen vao 3 tham so: 1: duong dan vao file, 2: khoa ngoai (khoa chung giua 2 bang), 3: khoa chinh, day la khoa chinh cua bang do
    }
}
