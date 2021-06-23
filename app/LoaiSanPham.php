<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiSanPham extends Model
{
    // ket noi voi bang loai san pham trong csdl
    protected $table = "db_loaisp";
    protected $primaryKey = "ma_loaiSP";

    //Thêm 2 dòng bắt buộc trong laravel 5.7.15
    protected $keyType = 'string';
    public $incrementing = false;

    // ket noi quan he thong qua khoa ngoai
    public function sanpham(){
        return $this->hasMany('App\SanPham', 'ma_loaiSP', 'ma_loaiSP'); // day la quan he 1 nhieu: 1 loai san pham chua nhieu san pham khac nhau. truyen vao 3 tham so: 1: duong dan vao file, 2: khoa ngoai (khoa chung giua 2 bang), 3: khoa chinh, day la khoa chinh cua bang do
    }
}
