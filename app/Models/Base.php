<?php

namespace App\Models;
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
class Base extends Model
{ 
    protected $model;
	  public function __construct($model='') {
		  parent::__construct();
		  //引用类型
		  if($model){
			$this->model=$model;
		  }
	  }
	  public function import(){
		  $model=ucfirst(strtolower($this->model));
		   $a  =  __NAMESPACE__  .  '\\'  .  $model ;
		     return new  $a ;
		   
	 }
}
