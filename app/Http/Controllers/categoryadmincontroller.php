<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class categoryadmincontroller extends Controller
{
    public function myadd(){
       $this->adminauthcheck();
    	return view('admin.add_category');
    }
    public function all_category(){
        $this->adminauthcheck();

       $all_category_info=DB::table('tbl_category')->get();
       $message_category=view('admin.all_category')
       ->with('all_category_info', $all_category_info);
       
       return view('admin_layout')
       ->with('admin.all_category',$message_category);

    	
    }
    public function save_category(Request $request){
    	$date=array();
    	$date['category_id']=$request->category_id;
    	$date['category_name']=$request->category_name;
    	$date['category_description']=$request->category_description;
    	$date['publication_status']=$request->publication_status;
       DB::table('tbl_category')->insert($date);
       Session::put('message','category added successfully !!');

       return Redirect::to('/add-category');

         }

         public function unactive_category($category_id){

         	DB::table('tbl_category')
         	->where('category_id',$category_id)
         	->update(['publication_status'=>0]);
         	 Session::put('message','category unactive successfully !!');
         	return Redirect::to('/all-category');
      
         }

         public function active_category($category_id){
         	DB::table('tbl_category')
         	->where('category_id',$category_id)
         	->update(['publication_status'=>1]);
         	 Session::put('message','category activede successfully !!');
         	return Redirect::to('/all-category');
         }

         public function fulfill_category($category_id){

                  $this->adminauthcheck();
        $category_info=DB::table('tbl_category')
          ->where('category_id',$category_id)
          ->first();
          $category_info=view('pages.fulfill_category')
          ->with('category_info', $category_info);
       
           return view('admin_layout')
           ->with('pages.fulfill_category',$category_info);

         }

           public function update_category(Request $request,$category_id){

             
              $date=array();
              $date['category_name']=$request->category_name;
              $date['category_description']=$request->category_description;

              DB::table('tbl_category')
             ->where('category_id',$category_id)
             ->update($date);

              Session::get('message','category update successfully !');

              return Redirect::to('/all-category');
           }

           public function delete_category($category_id){

              $this->adminauthcheck();
              DB::table('tbl_category')
             ->where('category_id',$category_id)
             ->delete();

              Session::get('message','category deleted successfully !');

              return Redirect::to('/all-category');
           }


    public function adminauthcheck(){
   $admin_id=Session::get('admin_id');
   if ($admin_id) {
    return;
   }else{
    return Redirect::to('/admin')->send();
   }

    }

}
