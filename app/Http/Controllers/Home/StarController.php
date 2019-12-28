<?php

namespace App\Http\Controllers\Home;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class StarController extends BaseController
{
   
	  function  starList(Request $request){
		 $postdata=$request->input();
		 if($star_info=M('star')->get_star($postdata)){
			 $this->assign('star_info',$star_info);
			 $son_list=M('star')->get_starList_son($postdata);
			 $this->assign('son_list',$son_list);
			 return  $this->display("home.indexs.starList");
		 }else{
			 echo "<script>alert('没有课程信息'); history.go(-1)</script>"; die;
		 }
	 }
	
}
