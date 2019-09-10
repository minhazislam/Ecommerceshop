<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class productscontroller extends Controller
{
    public function index(){
       $this->adminauthcheck();
    	 return view('admin.add_products');
    }

    public function adminauthcheck(){    
        $admin_id=Session::get('admin_id');
        if ($admin_id) {
          return;
        }else{
          return Redirect::to('/admin')->send();
        }

    }

    public function all_products(){
      $this->adminauthcheck();
       $all_products_info = DB::table('tbl_products')
              ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
              ->join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.manufacture_id')
              ->select('tbl_products.*','tbl_category.category_name','tbl_manufacture.manufacture_name')
              ->get();

                 // echo "<pre>";
                 // print_r($all_products_info);
                 // echo "</pre>";
                 // exit();

       $message_products = view('admin.all_products')
                          ->with('all_products_info', $all_products_info);
       
       return view('admin_layout')->with('admin.all_products',$message_products);



    }

    public function save_products(Request $request){

	      $data=[];
        $data['products_name']=$request->products_name;
        $data['category_id']=$request->category_id;
        $data['manufacture_id']=$request->manufacture_id;
        $data['products_short_description']=$request->products_short_description;
  			$data['products_long_description']=$request->products_long_description;
  			$data['products_price']=$request->products_price;
  			$data['products_size']=$request->products_size;
  			$data['products_color']=$request->products_color;
  			$data['publication_status']=$request->publication_status;
    			
			
        $image=$request->file('products_image');

        if ($image) {
          	$image_name=str_random(20);
          	$ext=strtolower($image->getClientOriginalExtension());
          	$image_full_name=$image_name.'.'.$ext;
          	$upload_path='image/';
          	$image_url=$upload_path.$image_full_name;
          	$success=$image->move($upload_path,$image_full_name);
          	if ($success) {

            	$data['products_image']=$image_url;
            	DB::table('tbl_products')->insert($data);
            	Session::put('message','products added successfully!!');
            	return Redirect::to('/add-products');
 
            
          	}
      }


         $data['products_image']='';
            	DB::table('tbl_products')->insert($data);
            	Session::put('message','products added successfully without image!!');

            	return Redirect::to('/add-products');
    }
    public function unactive_products($products_id){

        DB::table('tbl_products')
          ->where('products_id',$products_id)
          ->update(['publication_status'=> 0]);
           Session::put('message','products unactive successfully !!');
          return Redirect::to('/all-products');
    }
    public function active_products($products_id){

        DB::table('tbl_products')
          ->where('products_id',$products_id)
          ->update(['publication_status'=> 1]);
           Session::put('message','products unactive successfully !!');
          return Redirect::to('/all-products');
    }

    public function delete_products($products_id){
      
            DB::table('tbl_products')
             ->where('products_id',$products_id)
             ->delete();

              Session::get('message','productsy deleted successfully !');

              return Redirect::to('/all-products');
           }

         public function fulfill_products($products_id){ 

          $products_info = DB::table('tbl_products')->where('products_id',$products_id)->first();
          $manufactures = DB::table('tbl_manufacture')->get();;

          $products_info = view('pages.fulfill_products')->with('products_info', $products_info)->with('manufactures',$manufactures);

          return view('admin_layout')->with('pages.fulfill_products',$products_info)->with('manufactures',$manufactures); 

        }
}
