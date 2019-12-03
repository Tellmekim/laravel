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
		array('x'=>320,'y'=>590,'img'=>'/home/image2/1_1_hide.png','link'=>'','type'=>'img'),
		array('x'=>315,'y'=>435,'img'=>'/home/image2/1_2_hide.png','link'=>'','type'=>'img'),
		array('x'=>105,'y'=>315,'img'=>'/home/image2/1_3_hide.png','link'=>'','type'=>'img'),
		array('x'=>155,'y'=>120,'img'=>'/home/image2/1_4_hide.png','link'=>'','type'=>'img'),
		array('x'=>490,'y'=>30,'img'=>'/home/image2/2_1_hide_strong.png','link'=>'','type'=>'img'),
		
		array('x'=>550,'y'=>150,'img'=>'/home/image2/2_2_hide_strong.png','link'=>'','type'=>'img'),
		array('x'=>720,'y'=>30,'img'=>'/home/image2/2_3_hide_strong.png','link'=>'','type'=>'img'),
		array('x'=>920,'y'=>90,'img'=>'/home/image2/2_4_hide_strong.png','link'=>'','type'=>'img'),
		
		array('x'=>1200,'y'=>250,'img'=>'/home/image2/3_1_hide_strong.png','link'=>'','type'=>'img'),
		array('x'=>1100,'y'=>570,'img'=>'/home/image2/3_2_hide_strong.png','link'=>'','type'=>'img'),
		array('x'=>80,'y'=>30,'img'=>'/home/image2/btn_login.png','link'=>'','type'=>'img'),
		array('x'=>320,'y'=>30,'img'=>'/home/image2/btn_reg.png','link'=>'','type'=>'img'),
	);
	function get_index($userinfo=''){
		if(!empty($userinfo)){
			return array(
			 'is_login'=>1,
			 'weizhi'=>$this->indexdata,
			);
		}else{
			return array(
			 'is_login'=>0,
			 'weizhi'=>$this->indexdata,
			);
		}
	}
}
