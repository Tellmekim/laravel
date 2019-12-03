<?php
namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;


class BaseController extends Controller
{
	public $viewdata=[];
	   public function __construct()
    {
        $this->assign('sysconfig',M('config')->get_system());	
    }
	public function  assign($key,$value){
		$this->viewdata[$key]=$value;
	}
	public function display($view){
		//var_dump($this->viewdata); die;
		
		return view($view,$this->viewdata);
	}
	public function is_login(){
		
	}
}
