<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilderad;

class LoginController extends BaseController
{
    
    public function index(Request $request)
    {
         
		return $this->display('home.indexs.login');
		
    }

   
    public function postLogin(Request $request)
    {
		
		$postdata=$request->input();
		$reslut=M('Member')->check_login($postdata);
		 return $reslut;
        //
    }
    public function getCaptcha()
    {
		M('Member')->getCaptcha();
    }
	public function  register(Request $request){
		
		return $this->display('home.indexs.register');
	}
	public function  postRegister(Request $request){
		$postdata=$request->input();
		$reslut=M('Member')->register($postdata);
		return $reslut;
		//return view('home.indexs.register');
	}
}
