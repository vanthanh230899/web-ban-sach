<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HoaDon extends Model
{
    // ket noi voi bang hoa don trong csdl
    protected $table = "db_hoadon";
    protected $primaryKey = "ma_HD";

    //Thêm 2 dòng bắt buộc trong laravel 5.7.15
    protected $keyType = 'string';
    public $incrementing = false;

     // ket noi quan he thong qua khoa ngoai

    // mot hoa don chua nhieu chi tiet hoa don
    public function chitiethoadon(){
        return $this->hasMany('App\ChiTietHoaDon', 'ma_HD', 'ma_HD'); // day la quan he 1 nhieu: 1 hoa don chua nhieu chi tiet hoa don khac nhau. truyen vao 3 tham so: 1: duong dan vao file, 2: khoa ngoai (khoa chung giua 2 bang), 3: khoa chinh, day la khoa chinh cua bang do
    }

}
