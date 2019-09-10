<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
class homecontroller extends Controller
{
   public function index(){

$all_published_products=DB::table('tbl_products')
                 ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
                 ->join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.manufacture_id')
                 ->select('tbl_products.*','tbl_category.category_name','tbl_manufacture.manufacture_name')
                 ->where('tbl_products.publication_status',1)
                 ->limit(9)
                 ->get();
       $message_published_products=view('pages.home_content')
       ->with('all_published_products', $all_published_products);
       
       return view('layout')
       ->with('pages.home_content',$message_published_products);

   	// return view('pages.home_content');
   } 
   public function show_products_by_category($category_id){
      

$products_by_category=DB::table('tbl_products')
                 ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
                 ->select('tbl_products.*','tbl_category.category_name')
                 ->where('tbl_category.category_id',$category_id)
                 ->where('tbl_products.publication_status',1)
                 ->limit(18)
                 ->get();
       $message_products_by_category=view('pages.category_by_products')
       ->with('products_by_category', $products_by_category);
       
       return view('layout')
       ->with('pages.category_by_products',$message_products_by_category);

   }

   public function show_products_by_manufacture($manufacture_id){
      
  $products_by_manufacture=DB::table('tbl_products')
                 ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
                 ->join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.manufacture_id')
                 ->select('tbl_products.*','tbl_category.category_name','tbl_manufacture.manufacture_name')
                 ->where('tbl_manufacture.manufacture_id',$manufacture_id)
                 ->where('tbl_products.publication_status',1)
                 ->limit(15)
                 ->get();
       $message_published_manufacture=view('pages.manufacture_by_products')
       ->with('products_by_manufacture', $products_by_manufacture);
       
       return view('layout')
       ->with('pages.manufacture_by_products',$message_published_manufacture);



   }

   public function products_by_details_id($products_id){

   
$products_by_details=DB::table('tbl_products')
                 ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
                 ->join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.manufacture_id')
                 ->select('tbl_products.*','tbl_category.category_name','tbl_manufacture.manufacture_name')
                 ->where('tbl_products.products_id',$products_id)
                 ->where('tbl_products.publication_status',1)
                 ->first();
       $menage_products_by_details=view('pages.products_details')
       ->with('products_by_details', $products_by_details);
       
       return view('layout')
       ->with('pages.products_details',$menage_products_by_details);

   }
}
