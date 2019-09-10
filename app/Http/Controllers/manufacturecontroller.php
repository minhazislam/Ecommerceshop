<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class manufacturecontroller extends Controller
{
    public function index(){

    	return view('admin.add_manufacture');
    }
    public function save_manufacture(Request $request){
    	$date=array();
    	$date['manufacture_id']=$request->manufacture_id;
    	$date['manufacture_name']=$request->manufacture_name;
    	$date['manufacture_description']=$request->manufacture_description;
    	$date['publication_status']=$request->publication_status;
       DB::table('tbl_manufacture')->insert($date);
       Session::put('message','manufacture added successfully !!');

       return response()->json(['success'=>'Data is successfully saved']);
    }
    public function all_manufacture(){

       $all_manufacture_info=DB::table('tbl_manufacture')->get();
       $message_manufacture=view('admin.all_manufacture')
       ->with('all_manufacture_info', $all_manufacture_info);
       
       return view('admin_layout')
       ->with('admin.all_manufacture',$message_manufacture);

      
    }
     public function delete_manufacture($manufacture_id){

            
            DB::table('tbl_manufacture')
             ->where('manufacture_id',$manufacture_id)
             ->delete();

              Session::get('message','manufacture deleted successfully !');

              return Redirect::to('/all-manufacture');
           }

           public function unactive_manufacture($manufacture_id){

          DB::table('tbl_manufacture')
          ->where('manufacture_id',$manufacture_id)
          ->update(['publication_status'=>0]);
           Session::put('message','manufacture unactive successfully !!');
          return Redirect::to('/all-manufacture');
      
         }
          public function active_manufacture($manufacture_id){
          DB::table('tbl_manufacture')
          ->where('manufacture_id',$manufacture_id)
          ->update(['publication_status'=>1]);
           Session::put('message','manufacture activede successfully !!');
          return Redirect::to('/all-manufacture');
         }
          public function fulfill_manufacture($manufacture_id){

          

        $manufacture_info=DB::table('tbl_manufacture')
          ->where('manufacture_id',$manufacture_id)
          ->first();
          $manufacture_info=view('admin.fulfill_manufacture')
       ->with('manufacture_info', $manufacture_info);
       
       return view('admin_layout')
       ->with('admin.fulfill_manufacture',$manufacture_info);

         }
         public function update_manufacture(Request $request,$manufacture_id){

             
              $date=array();
              $date['manufacture_name']=$request->manufacture_name;
              $date['manufacture_description']=$request->manufacture_description;

              DB::table('tbl_manufacture')
             ->where('manufacture_id',$manufacture_id)
             ->update($date);

              Session::get('message','manufacture update successfully !');

              return Redirect::to('/all-manufacture');
           }

}
