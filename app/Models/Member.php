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

class Member extends Model
{
	protected $table = 'member';
    protected $fillable = ['id', 'title', 'title','mobile','created_at','updated_at','deleted_at'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function check_login($request)
    {   
		$userName=$request['userName'];
		$passWord=$request['password'];
	//	session(['authcode'=>'sd']);
	    if(session('authcode')!=$request['randImage']){
			return ['code'=>-1,'msg'=>'验证码错误'];
		}else if(empty($passWord)||empty($userName)){
			return ['code'=>-1,'msg'=>'同学有登录信息没有填写'];
		}else if(($res=$this->where('userName',$userName)->orwhere('mobile',$userName)->first())){
			if($res->password== md5($passWord)){
				$userinfo=$res->toArray();
				session(['userinfo'=>$userinfo]);
			    return ['code'=>1,'msg'=>'登录成功']; 
			}else{
				return ['code'=>-1,'msg'=>'密码错误'];
			}
		}else{
			return ['code'=>-1,'msg'=>'同学用户不存在'];
		}
	}
	public function register($request){
		if(!empty($request['userName'])&&!empty($request['mobile'])){
			$res=$this->where('userName',$request['userName'])->orWhere('mobile',$request['mobile'])->get(); 
			//var_dump($res->toArray()); die;
			if(!$res->toArray()){
				$adddata=array(
					'userName'=>$request['userName'],
					'password'=>md5($request['pass']),
					'mobile'=>$request['mobile'],
					'created_at'=>time(),
					'updated_at'=>time(),
				);
				if($id=$this->insertGetId($adddata)){
					$userinfo=$this->where('id',$id)->first();
					session(['userinfo'=>$userinfo->toArray()]);
					return ['code'=>1,'msg'=>'注册成功'];
				}else{
					return ['code'=>-1,'msg'=>'注册失败'];
				}
			}else{
				return ['code'=>-1,'msg'=>'同学这个用户名或者手机号已经注册了'];
			}
		}
	}
	public function getCaptcha(){
		
		//默认返回的是黑色的照片
		$image = imagecreatetruecolor(100, 30);
		//将背景设置为白色的
		$bgcolor = imagecolorallocate($image, 255, 255, 255);
		//将白色铺满地图
		imagefill($image, 0, 0, $bgcolor);
		//空字符串，每循环一次，追加到字符串后面  
		$captch_code='';
		   //验证码为随机四个数字
			for ($i=0; $i < 4; $i++) { 
				$fontsize=6;
				$fontcolor=imagecolorallocate($image,rand(0,120),rand(0,120),rand(0,120));
				
				//产生随机数字0-9
				$fontcontent = rand(0,9);
				$captch_code.= $fontcontent;
			   //数字的位置，0，0是左上角。不能重合显示不完全
				$x=($i*100/4)+rand(5,10);
				$y=rand(5,10);
				imagestring($image,$fontsize,$x,$y,$fontcontent,$fontcolor);
			}
			//var_dump($captch_code); die;
			session(['authcode'=>$captch_code]);
			//$_SESSION['authcode'] = $captch_code;
			//为验证码增加干扰元素，控制好颜色，
			//点   
			for ($i=0; $i < 200; $i++) { 
				$pointcolor = imagecolorallocate($image,rand(50,200),rand(50,200),rand(50,200));
				imagesetpixel($image, rand(1,99), rand(1,29), $pointcolor);
			}
			//为验证码增加干扰元素
			//线   
			for ($i=0; $i < 3; $i++) { 
				$linecolor = imagecolorallocate($image,rand(80,220),rand(80,220),rand(80,220));
				imageline($image, rand(1,99), rand(1,29),rand(1,99), rand(1,29) ,$linecolor);
			}
			header('content-type:image/png');
			imagepng($image);
			//销毁
			imagedestroy($image);
	}
}
