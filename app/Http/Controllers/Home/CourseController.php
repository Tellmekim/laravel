<?php

namespace App\Http\Controllers\Home;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CourseController extends BaseController
{
     function  courseLise(Request $request){
		$postdata=$request->input();
		$info=M('star')->get_star($postdata);
		//var_dump($star_info);die;
		$star_info=M('star')->get_star_items($info['parent_id']);
		$this->assign('star_info',$star_info);
		$page=M('Course')->get_page($postdata);
	    $this->assign('page',$page);
		return  $this->display("home.indexs.checkpoint");
	 }
	 function courseDeatail(Request $request){
		$postdata=$request->input();
		if($courseinfo=M('Course')->get_detail($postdata)){
			if($star_info=M('star')->get_star_items($courseinfo['star_id'])){
				$star_info['parent']=M('star')->get_star_items($star_info['parent_id']);
			}
			$this->assign('star_info',$star_info);
			$info=M('Course')->get_info($courseinfo['course_id']);
			$this->assign('info',$info);
			$this->assign('courseinfo',$courseinfo);
			return  $this->display("home.indexs.study");
		}
	 }
}
