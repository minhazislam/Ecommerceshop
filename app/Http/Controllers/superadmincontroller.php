<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class superadmincontroller extends Controller
{
        public function index(){
        $this->adminauthcheck();
     return view('dashboard');

    }
    public function logout(){
    	
    	Session::flush();
    	return Redirect::to('/admin');
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