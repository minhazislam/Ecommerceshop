<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
use Illuminate\Support\Facades\Redirect;

class cartcontroller extends Controller
{
    public function add_to_cart(Request $request){
       
          $qty=$request->qty;
          $products_id=$request->products_id;

       $products_info=DB::table('tbl_products')
           ->where('products_id',$products_id)
           ->first();

          
           $data['qty']=$qty;
           $data['id']=$products_info->products_id;
           $data['name']=$products_info->products_name;
           $data['price']=$products_info->products_price;
           $data['options']['image']=$products_info->products_image;


            Cart::add($data);
            return redirect::to('/show-cart');
    }
    public function show_cart(){
 
     $all_published_category=DB::table('tbl_category')
                           ->where('publication_status',1)
                           ->get();

         $manage_published_category=view('pages.add_to_cart')
       ->with('all_published_category', $all_published_category);
       
       return view('layout')
       ->with('pages.add_to_cart',$manage_published_category);


    }
    public function delete_to_cart($rowId){
               
          Cart::update($rowId,0);
           return redirect::to('/show-cart');
    }
    public function update_cart(Request $request){

           $qty=$request->qty;
            $rowId=$request->rowId;
          
           Cart::update($rowId,$qty);
           return redirect::to('/show-cart');
    }
    
}
