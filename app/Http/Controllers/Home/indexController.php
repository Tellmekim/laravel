<?php

namespace App\Http\Controllers\Home;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
class IndexController extends Controller
{
     function  index(){
	      return view('home.indexs.index');
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
