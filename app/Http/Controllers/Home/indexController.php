<?php

namespace App\Http\Controllers\Home;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
class IndexController extends BaseController
{
     function  returndata(){
		 
		// var_dump($this->viewdata); die;
		return $this->display('home.indexs.index');
		
	 }
	 function  index(){  
		 return $this->display('home.indexs.canvas');
	 }
	 public function canvasData(){
		  $this->is_login();
		
		  if(!empty($this->viewdata['userinfo'])){
			 $data=M('Common')->get_index($this->viewdata['userinfo']);
		 }else{
		     $data=M('Common')->get_index();
		 }
		 return $data;
	 }
	  public function login()
    {
		 return $this->display('home.indexs.login');
       // return view('home.indexs.login');
    }
	 public function experience()
    {
		
		 return $this->display('home.indexs.tiyan_list');
     
    }
	 public function checkpoint()
    {
		return $this->display('home.indexs.checkpoint');
      
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
	public function bm()
    {
        return view('home.indexs.baoming');
    }
}
