<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

/**
 * App\Models\Rule
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Role[] $roles
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Rule newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Rule newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Rule public()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Rule query()
 * @mixin \Eloquent
 */

class Common extends Model
{
	protected $indexdata=array(
		array('x'=>320,'y'=>590,'img'=>'/home/image2/1_1_hide.png','link'=>'login','type'=>'img'),
		array('x'=>315,'y'=>435,'img'=>'/home/image2/1_2_hide.png','link'=>'login','type'=>'img'),
		array('x'=>105,'y'=>315,'img'=>'/home/image2/1_3_hide.png','link'=>'login','type'=>'img'),
		array('x'=>155,'y'=>120,'img'=>'/home/image2/1_4_hide.png','link'=>'login','type'=>'img'),
		array('x'=>490,'y'=>30,'img'=>'/home/image2/2_1_hide_strong.png','link'=>'login','type'=>'img'),
		
		array('x'=>550,'y'=>150,'img'=>'/home/image2/2_2_hide_strong.png','link'=>'login','type'=>'img'),
		array('x'=>720,'y'=>30,'img'=>'/home/image2/2_3_hide_strong.png','link'=>'login','type'=>'img'),
		array('x'=>920,'y'=>90,'img'=>'/home/image2/2_4_hide_strong.png','link'=>'login','type'=>'img'),
		
		array('x'=>1200,'y'=>250,'img'=>'/home/image2/3_1_hide_strong.png','link'=>'login','type'=>'img'),
		array('x'=>1100,'y'=>570,'img'=>'/home/image2/3_2_hide_strong.png','link'=>'login','type'=>'img'),
		array('x'=>80,'y'=>30,'ywidth'=>150,'yheigth'=>80,'img'=>'/home/image2/btn_login.png','link'=>'login','type'=>'img'),
		array('x'=>320,'y'=>30,'ywidth'=>150,'yheigth'=>80,'img'=>'/home/image2/btn_reg.png','link'=>'register','type'=>'img'),
	);
	protected $userinfoindexdata=array(
		array('x'=>320,'y'=>590,'img'=>'/home/image2/1_1_hide.png','link'=>'starList?id=1','type'=>'img'),
		//array('x'=>315,'y'=>435,'img'=>'/home/image2/1_2_hide.png','link'=>'','type'=>'img'),
		//array('x'=>105,'y'=>325,'img'=>'/home/image2/1_3_hide.png','link'=>'','type'=>'img'),
		array('x'=>155,'y'=>150,'img'=>'/home/image2/1_4_hide.png','link'=>'starList?id=2','type'=>'img'),
		//array('x'=>490,'y'=>30,'img'=>'/home/image2/2_1_hide_strong.png','link'=>'','type'=>'img'),
		//array('x'=>550,'y'=>150,'img'=>'/home/image2/2_2_hide_strong.png','link'=>'','type'=>'img'),
		array('x'=>720,'y'=>30,'img'=>'/home/image2/2_3_hide_strong.png','link'=>'starList?id=3','type'=>'img'),
		//array('x'=>920,'y'=>90,'img'=>'/home/image2/2_4_hide_strong.png','link'=>'','type'=>'img'),
		array('x'=>1200,'y'=>250,'img'=>'/home/image2/3_1_hide_strong.png','link'=>'starList?id=4','type'=>'img'),
		//array('x'=>1100,'y'=>570,'img'=>'/home/image2/3_2_hide_strong.png','link'=>'','type'=>'img'),
		array('x'=>25,'y'=>60,'ywidth'=>100,'yheigth'=>100,'img'=>'/home/image2/imgHead1.png','link'=>'','type'=>'img'),
		array('x'=>225,'y'=>10,'img'=>'/home/image2/userinfo_exit2.png','link'=>'click:ajax:api/loginOut','type'=>'img'), //退出
		//array('x'=>1450,'y'=>180,'img'=>'/home/image2/myFriendBtn.png','link'=>'','type'=>'img'), //好友
		//array('x'=>1490,'y'=>350,'img'=>'/home/image2/btn_yuezhan.png','link'=>'','type'=>'img'),
		array('x'=>1490,'y'=>470,'img'=>'/home/image2/btn_continue_study_new.png','link'=>'','type'=>'img'), //继续学习
		array('x'=>1490,'y'=>570,'img'=>'/home/image2/btn_records_.png','link'=>'','type'=>'img'), //学习记录
		//array('x'=>0,'y'=>570,'img'=>'/home/image2/btn_shared_result.png','link'=>'','type'=>'img'),
	);
	//用户等级评定
	protected  $grade=array(
		2=>'新手I',
		3=>'高手',
	);
	function member_grade($num){
		foreach($this->grade as $k=>$v){
			if($num<=$k){
				return $v;
			}
		}
	}
	function get_index($user=''){
		if(!empty($user)){
			$res=M('member')->where(['id'=>$user['id']])->first();
			$userinfo=$res->toArray();
			if($info=M('member_info')->where(['userId'=>$user['id']])->first()){
				$userdata=$info->toArray();
				$subject_num=$userdata['subject_num'];
			}else{
				$adddata=array(
					'userId'=>$userinfo['id'],
					'subject_num'=>0,
				);
				M('member_info')->insertGetId($adddata);
				$subject_num=0;
			}
			return array(
			 'is_login'=>1,
			 'userinfo'=>$userinfo,
			 'font'=>"亲爱的".substr($userinfo['userName'],0,3),
			 'font1'=>substr($userinfo['userName'],3)."同学:".$this->member_grade($subject_num),
			 'weizhi'=>$this->userinfoindexdata,
			);
		}else{
			return array(
			 'is_login'=>0,
			 'weizhi'=>$this->indexdata,
			);
		}
	}
}
