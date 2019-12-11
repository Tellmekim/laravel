<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

class Course extends Model
{ 
	protected $table = 'course';
	protected $requset_id;
	function get_coures_list($requset){
	  $course = DB::table('course')->where('star_id',$requset['id'])->simplePaginate(5);
	  return $course->toArray();
	}
	public function get_page($requset){
		$this->requset_id=!empty($requset['id'])?$requset['id']:0;
		$reslut=[];
		$limit=8;
		$page=!empty($requset['page'])?$requset['page']:0;
		$reslut['page']=$page=max($page,1);
		$offset=$limit*($page-1);
		$reslut['count_nums']=$count_nums=DB::table('course')->where('star_id',$requset['id'])->count();
		$reslut['pg']=$this->page($page,$count_nums,$limit,5,'page');
		if($list=DB::table('course')->where('star_id',$requset['id'])->orderBy('number','ASC')->offset($offset)->limit($limit)->get()){
			$reslut['list']=$list->toArray();
		}else{
			$reslut['list']=[];
		}
		return $reslut;
	}

	function page($page,$count_nums,$limit,$size,$class_name='page'){
		#总页数
		$page_total = ceil($count_nums/$limit); #进一法取整（取大于2.3的最小整数）

		$str = '<div class="'.$class_name.'">';
		if($page!=1){
			$str .= '<a href="'.$this->get_param().'page=1">第一页</a>';
			$str .= '<a href="'.$this->get_param().'page='.($page-1).'">上一页</a>';
		}else{
			$str .= '<a class="disabled page_active">第一页</a>';
			$str .= '<a class="disabled page_active">上一页</a>';
		}
		
		if($page<=floor($size/2)){  //第1种情况
			$first = 1;
			$last = $page_total>$size ? $size : $page_total;
		}else if($page>$page_total-floor($size/2)){ //第3种情况
			$first = $page_total-$size+1<=0 ? 1 : $page_total-$size+1;
			$last = $page_total;
		}else{ //第2种情况
			$first = $page - floor($size/2);
			$last = $page + floor($size/2);
		}

		for($i=$first; $i<=$last; $i++){
			if($i==$page){
				$str .= "<a class='page_active'>$i</a>";
			}else{
				$str .= "<a href='".$this->get_param()."page=$i'>$i</a>";
			}   
		}

		if($page!=$page_total){
			$str .= '<a href="'.$this->get_param().'page='.($page+1).'">下一页</a>';
			$str .= '<a href="'.$this->get_param().'page='.$page_total.'">最后一页</a>';
		}else{
			$str .= '<a class="disabled page_active">下一页</a>';
			$str .= '<a class="disabled page_active">最后一页</a>';
		}
		$str .= '</div>';

		return $str;
	}
	function get_param(){
		$str="/course?id=".$this->requset_id."&";
		return $str;
	}
	function get_detail($requset){
		if($res=$this->where('course_id',$requset['id'])->first()){
			return $res->toArray();
		}else{
			return [];
		}
		
	}
	function get_info($id){
		//获取课程所有视频所有资料
		if($group_list=DB::table('course_group')->where('course_id',$id)->orderBy('orderby','ASC')->get()){
			$img_list=DB::table('course_img')->where('course_id',$id)->orderBy('orderby','ASC')->get();
			$voice_list=DB::table('course_voice')->where('course_id',$id)->orderBy('orderby','ASC')->get();
			$reslut=[];
			foreach($group_list  as  $items){
				$son=[];
				foreach($img_list as $k=>$item){
					if($items->group_id==$item->group_id){
						$v['img'][]=(array)$item;
					}
				}
				foreach($voice_list as $k=>$item){
					if($items->group_id==$item->group_id){
						$v['voice'][]=(array)$item;
					}
				}
				$reslut[]=$v;
			}
			return $reslut;
		}else{
			return [];
		}
		
	}
}
