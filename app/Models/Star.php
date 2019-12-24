<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
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


class Star extends Model
{
	protected $table = 'star';
    protected $fillable = ['id', 'star_title','parent_id','rusn_id','img','desc','created_at','updated_at','deleted_at'];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
	 public function get_star($requset){
		if($res=$this->where(['id'=>$requset['id']])->first()){
			return $res->toArray(); 
		}
	 }
	  function get_starList_son($requset){
		if($res=$this->where(['parent_id'=>$requset['id']])->get()){
			return $res->toArray(); 
		}
	 }
	  function get_sta_parsen($info){
		 $res=$this->where(['id'=>$info['parent_id']])->first();
		 return $res->toArray(); 
	 }
	  public function get_star_items($id){
		if($res=$this->where(['id'=>$id])->first()){
			return $res->toArray(); 
		}else{
		   return [];
		}
	 }

}
