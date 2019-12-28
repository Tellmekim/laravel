<?php
namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;


class BaseController extends Controller
{
	  public $viewdata=[];
	   public function __construct(Request $request)
    {
		//$request=new Request();
        $this->assign('sysconfig',M('config')->get_system());
		
    }
	public function  assign($key,$value){
		$this->viewdata[$key]=$value;
	}
	public function display($view){
		//var_dump($this->viewdata); die;
		if($userinfo=session("userinfo")){
			if(gettype($userinfo)=='object'){
				$userinfo=$userinfo->toArray();
			}
			$userinfo['updated_at']=date('Y-m-d',(int)$userinfo['updated_at']);
			$this->assign('userinfo',$userinfo);
		}
		return view($view,$this->viewdata);
	}
	public function is_login(){
		if($userinfo=session("userinfo")){
			if(gettype($userinfo)=='object'){
				$userinfo=$userinfo->toArray();
			}
			$this->assign('userinfo',$userinfo);
		}
		return $userinfo;
	}
	public function is_login_back(){
		if(!($userinfo=session("userinfo"))){
			return redirect()->route('index');
		}
		return $userinfo;
	}
}
