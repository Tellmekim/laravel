<?php

namespace App\Http\Controllers\Home;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
class IndexController extends BaseController
{
     function  returndata(){
		 
		// var_dump($this->viewdata); die;
		return $this->display('home.indexs.index');
		
	 }
	 function  index(){    
		 
		 
		 return $this->display('home.indexs.canvas');
	 }
	  public function login()
    {
        return view('home.indexs.login');
    }
	 public function experience()
    {
        return view('home.indexs.tiyan_list');
    }
	 public function checkpoint()
    {
        return view('home.indexs.checkpoint');
    }
	 public function success()
    {
        return view('home.indexs.success');
    }
	public function study()
    {
        return view('home.indexs.study');
    }
}
