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
}
