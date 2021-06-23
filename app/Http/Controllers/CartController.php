<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use Cart;

use Auth;

use App\Carts;

class CartController extends Controller
{
    public function add(Request $req){

        $cart = new Carts;

        $cart->ma_SP =  $req->ma_SP;

        $cart->tensp = $req->product_name;

        $cart->user_code = Auth::user()->name;

        $cart->product_amount = $req->qty;

        $cart->product_price = $req->price;

        $cart->hinhanh = $req->image;

        $cart->total_money = $req->total;

        if($cart->save()){
            return redirect('giohang');
        }
    }

    public function destroy(Request $req){

        if(DB::table('db_cart')->where('ma_SP', $req->id)->delete()){

            return redirect('giohang');
        }
    }

    public function Updates(Request $req){

        $product = Carts::find($req->id);

        $product->product_amount = $req->amount;
        $product->total_money = $req->amount * $product->product_price;
        if($product->save()){
            return redirect('giohang');
        }
    }


    public function buyBill(Request $req){

        $date = getdate();

        $getdate = $date['year']."/".$date['mon']."/".$date['mday'];

        $code = strtoupper(substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 5)), 0, 5));

        
        
        $data = DB::table('db_cart')->where('user_code', Auth::user()->name)->get();
        $total_bill  = 0;
            foreach($data as $key => $values){
                $total_bill  = $total_bill + (int)$values->total_money;
                $databilldetail = array(
                    
                    'ma_HD' => $code, 

                    'ma_SP' => $values->ma_SP, 

                    'tongtien' => $values->total_money,

                    'isdelete' => 1,

                    'giaban'=> $values->product_price, 

                    'soluong'=>$values->product_amount, 
                );

                DB::table('db_chitiethoadon')->insert($databilldetail);
                $data_bill = array(
                    'bill_code' => $code, 

                    'ma_SP' => $values->ma_SP,

                    'tensp' =>  $values->tensp,

                    'user_code' => $values->user_code,

                    'hinhanh' => $values->hinhanh, 

                    'product_price'=> $values->product_price, 

                    'product_amount'=>$values->product_amount, 

                    'bill_date'=>$getdate
                );
                DB::table('db_bill')->insert($data_bill);
                DB::table('db_cart')->where('ma_SP', $values->ma_SP)->delete();
               
            }

            
            $databill = array(

                'ma_HD' => $code, 
    
                'ma_KH' =>Auth::user()->name,
    
                'ngaylap'=>$getdate,
    
                'diachi' => str_replace(",","",Auth::user()->diachi),
    
                'trangthai' => 0,
    
                'isdelete' => 1,
    
                'tongtien' => $total_bill,
            );
            DB::table('db_hoadon')->insert($databill);

            return redirect('bills');
        }

       
}
